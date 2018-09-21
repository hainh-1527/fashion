<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Backend
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type)
    {
        $categories = Category::withUser()
            ->ofType($type)
            ->get();

        return view('backend.category.index', compact('categories', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($type)
    {
        return view('backend.category.create', compact('categories', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $user = $request->user();

        $user->categories()->create($request->all());

        return redirect()->route('category.index', $request->type)->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->merge(['user_id' => $request->user()->id]);

        $category->update($request->all());

        return redirect()->route('category.index', $category->type)->with('success', __('update_success'));
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sortOrder($type)
    {
        $categories = Category::ofType($type)
            ->sortByOrder()
            ->arrayToTree();

        return view('backend.category.sort_order', compact('categories', 'type'));
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash($type)
    {
        $categories = Category::onlyTrashed()
            ->withUser()
            ->ofType($type)
            ->get();

        return view('backend.category.trash', compact('categories', 'type'));
    }

    /**
     * @param Request $request
     * @param $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, $type)
    {
        if (empty($request->categories_id)) {
            return redirect()->route('category.trash', $type)->with('warning', __('please_select_an_item'));
        }

        Category::onlyTrashed()
            ->whereKey($request->categories_id)
            ->restore();

        return redirect()->route('category.trash', $type)->with('success', __('restore_success'));
    }

    /**
     * @param $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll($type)
    {
        Category::onlyTrashed()
            ->ofType($type)
            ->restore();

        return redirect()->route('category.index', $type)->with('success', __('restore_success'));
    }

    /**
     * @param $type
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($type, $time)
    {
        Category::onlyTrashed()
            ->ofType($type)
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('category.trash', $type)->with('success', __('restore_success'));
    }
}
