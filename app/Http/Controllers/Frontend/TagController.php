<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function posts($slug)
    {
        try {
            $tag = Tag::findBySlugOrFail($slug);

            $posts = $tag->posts()
                ->withTagsPublished()
                ->withUser()
                ->published()
                ->latest()
                ->paginate(config('frontend.paginate.post'));

            return view('frontend.tag.posts', compact('tag', 'posts'));
        } catch (ModelNotFoundException $e) {
            return view('frontend.page.404');
        }
    }
}
