<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function main()
    {
        $sliders = Slider::published()
            ->get();

        $saleProducts = Product::published()
            ->ofSale()
            ->take(config('frontend.paginate.saleProduct'))
            ->get();

        $newProducts = Product::published()
            ->latest()
            ->take(config('frontend.paginate.newProduct'))
            ->get();

        return view('frontend.home.main', compact('sliders', 'newProducts', 'saleProducts'));
    }

    public function search(Request $request)
    {
        $posts = Post::search($request->q)
            ->get();

        $products = Product::search($request->q)
            ->get();

        $categories = Category::search($request->q)
            ->get();

        $brands = Brand::search($request->q)
            ->get();

        $tags = Tag::search($request->q)
            ->get();

        $results = collect();

        foreach ($posts as $post) {
            $results[] = collect([
                'title' => $post->title,
                'content' => $post->excerpt,
                'link' => route('frontend.post.show', $post->slug)
            ]);
        }

        foreach ($products as $product) {
            $results[] = collect([
                'title' => $product->name,
                'content' => $product->excerpt,
                'link' => route('frontend.product.show', $product->slug)
            ]);
        }

        foreach ($categories as $category) {
            $results[] = collect([
                'title' => $category->name,
                'content' => null,
                'link' => $category->type == 'product'
                    ? route('frontend.category.product', $category->slug)
                    : route('frontend.category.post', $category->slug)
            ]);
        }

        foreach ($brands as $brand) {
            $results[] = collect([
                'title' => $brand->name,
                'content' => null,
                'link' => route('frontend.brand.products', $brand->slug)
            ]);
        }

        foreach ($tags as $tag) {
            $results[] = collect([
                'title' => $tag->name,
                'content' => null,
                'link' => route('frontend.tag.posts', $tag->slug)
            ]);
        }

        return view('frontend.home.search', compact('results'));
    }
}
