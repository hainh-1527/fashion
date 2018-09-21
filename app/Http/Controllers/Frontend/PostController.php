<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::WhereSlug($slug)
            ->withTagsPublished()
            ->withUser()
            ->published()
            ->first();

        if (empty($post)) {
            return view('frontend.page.404');
        }

        $comments = $post->comments()
            ->withUser()
            ->toTree();

        $commentable_id = $post->id;
        $commentable_type = 'post';

        return view('frontend.post.show', compact('post', 'comments', 'commentable_id', 'commentable_type'));
    }
}
