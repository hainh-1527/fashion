<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Image;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Backend
 */
class ProductController extends Controller
{
    use Image;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::withUser()
            ->withBrand()
            ->latest()
            ->get();

        $brands = Brand::withTrashed()
            ->pluck('name', 'id')
            ->prepend(__('select'), '');

        return view('backend.product.index', compact('products', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::ofTypeProduct()
            ->arrayFormSelect();

        $brands = Brand::pluck('name', 'id')
            ->prepend(__('select'), '');

        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        // Todo: upload file
        $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.product'));

        $request->merge(['thumbnail' => $thumbnail]);

        $user = $request->user();

        $product = $user->products()->create($request->all());

        $product->categories()->sync($request->categories_id);

        return redirect()->route('product.index')->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::ofTypeProduct()
            ->arrayFormSelect();

        $brands = Brand::pluck('name', 'id')
            ->prepend(__('select'), '');

        $reviews = $product->reviews()
            ->withUser()
            ->get();

        $comments = $product->comments()
            ->withUser()
            ->get();

        return view('backend.product.edit', compact('product', 'categories', 'brands', 'reviews', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('file')) {
            // Todo: upload file
            $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.product'));

            $request->merge(['thumbnail' => $thumbnail]);
        }

        if (empty($request->feature)) {
            $request->merge(['feature' => 0]);
        }

        $request->merge(['user_id' => $request->user()->id]);

        $product->update($request->all());

        $product->categories()->sync($request->categories_id);

        return redirect()->route('product.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $products = Product::onlyTrashed()
            ->withUser()
            ->get();

        return view('backend.product.trash', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->products_id)) {
            return redirect()->route('product.trash')->with('warning', __('please_select_an_item'));
        }

        Product::onlyTrashed()
            ->whereKey($request->products_id)
            ->restore();

        return redirect()->route('product.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        Product::onlyTrashed()
            ->restore();

        return redirect()->route('product.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        Product::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('product.trash')->with('success', __('restore_success'));
    }
}
