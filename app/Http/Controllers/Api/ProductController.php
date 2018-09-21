<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    use Image;

    /**
     * @param Product $product
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(Product $product)
    {
        return $product->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        return $product->restore();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        if ($product->orders->count()) {
            return response()->json(__('the_product_exists_in_the_order_please_delete_the_order_then_go_back_to_delete_the_product'), 201);
        }

        $product->comments()->delete();

        // Todo: delete file upload
        // $this->deleteFile($product->thumbnail);

        return $product->forceDelete();
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $user = User::findOrFail($request->user_id);

        $product->update($request->all());

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
