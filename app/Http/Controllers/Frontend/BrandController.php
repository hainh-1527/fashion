<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandController extends Controller
{
    public function products($slug)
    {
        try {
            $brand = Brand::findBySlugOrFail($slug);

            $products = $brand->products()
                ->published()
                ->latest()
                ->paginate(config('frontend.paginate.product'));

            return view('frontend.brand.products', compact('brand', 'products'));
        } catch (ModelNotFoundException $e) {
            return view('frontend.page.404');
        }
    }
}
