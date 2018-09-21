<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::search($request->q)
            ->paginate(config('frontend.paginate.product'));

        return view('frontend.product.search', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::WhereSlug($slug)
            ->published()
            ->first();

        if (empty($product)) {
            return view('frontend.page.404');
        }

        $reviews = $product->reviews()
            ->withUser()
            ->get();

        $samCategory = $product->categories()
            ->published()
            ->withProductsPublished()
            ->get();

        $comments = $product->comments()
            ->withUser()
            ->toTree();

        $commentable_id = $product->id;
        $commentable_type = 'product';

        return view('frontend.product.show', compact('product', 'reviews', 'samCategory', 'comments', 'commentable_id', 'commentable_type'));
    }
}
