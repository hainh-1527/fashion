<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::withUser()
            ->latest()
            ->get();

        return view('backend.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTagRequest $request)
    {
        $user = $request->user();

        $user->tags()->create($request->all());

        return redirect()->route('tag.index')->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $request->merge(['user_id' => $request->user()->id]);

        $tag->update($request->all());

        return redirect()->route('tag.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $tags = Tag::onlyTrashed()
            ->withUser()
            ->get();

        return view('backend.tag.trash', compact('tags'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->tags_id)) {
            return redirect()->route('tag.trash')->with('warning', __('please_select_an_item'));
        }

        Tag::onlyTrashed()
            ->whereKey($request->tags_id)
            ->restore();

        return redirect()->route('tag.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        Tag::onlyTrashed()
            ->restore();

        return redirect()->route('tag.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        Tag::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('tag.trash')->with('success', __('restore_success'));
    }
}
