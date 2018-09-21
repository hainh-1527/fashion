<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function products($slug)
    {
        try {
            $category = Category::findBySlugOrFail($slug);

            $categories = Category::published()
                ->get();

            $breadcrumbs = Helper::breadcrumb($categories, $category->parent_id)
                ->reverse();

            $products = $category->products()
                ->published()
                ->latest()
                ->paginate(config('frontend.paginate.product'));

            return view('frontend.category.products', compact('category', 'products', 'breadcrumbs'));
        } catch (ModelNotFoundException $e) {
            return view('frontend.page.404');
        }
    }

    public function posts($slug)
    {
        try {
            $category = Category::findBySlugOrFail($slug);

            $categories = Category::published()
                ->get();

            $breadcrumbs = Helper::breadcrumb($categories, $category->parent_id)
                ->reverse();

            $posts = $category->posts()
                ->withTagsPublished()
                ->withUser()
                ->published()
                ->latest()
                ->paginate(config('frontend.paginate.post'));

            return view('frontend.category.posts', compact('category', 'posts', 'breadcrumbs'));
        } catch (ModelNotFoundException $e) {
            return view('frontend.page.404');
        }
    }
}
