<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use Image;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::withUser()
            ->latest()
            ->get();

        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::ofTypePost()
            ->arrayFormSelect();

        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        // Todo: upload file
        $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.post'));

        $request->merge(['thumbnail' => $thumbnail]);

        $user = $request->user();

        $post = $user->posts()->create($request->all());

        $post->tags()->sync($this->getTagsId($request->tags));

        $post->categories()->sync($request->categories_id);

        return redirect()->route('post.index')->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::ofTypePost()
            ->arrayFormSelect();

        $comments = $post->comments()
            ->withUser()
            ->get();

        return view('backend.post.edit', compact('post', 'categories', 'tags', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('file')) {
            // TODO: upload file
            $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.post'));

            $request->merge(['thumbnail' => $thumbnail]);
        }

        $request->merge(['user_id' => $request->user()->id]);

        $post->update($request->all());

        $post->tags()->sync($this->getTagsId($request->tags));

        $post->categories()->sync($request->categories_id);

        return redirect()->route('post.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $posts = Post::onlyTrashed()
            ->withUser()
            ->get();

        return view('backend.post.trash', compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->posts_id)) {
            return redirect()->route('post.trash')->with('warning', __('please_select_an_item'));
        }

        Post::onlyTrashed()
            ->whereKey($request->posts_id)
            ->restore();

        return redirect()->route('post.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        Post::onlyTrashed()
            ->restore();

        return redirect()->route('post.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        Post::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('post.trash')->with('success', __('restore_success'));
    }

    /**
     * @param $tags
     * @return array
     */
    public function getTagsId($tags)
    {
        if (empty($tags)) {
            return [];
        } else {
            $tags = explode(',', $tags);

            $tags_id = [];

            foreach ($tags as $tag) {
                $tags_id[] = Tag::firstOrCreate(['name' => $tag])->id;
            }

            return $tags_id;
        }
    }
}
