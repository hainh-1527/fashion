<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @param Order $order
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(Order $order)
    {
        return $order->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);

        return $order->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);

        $order->notifications()->delete();

        return $order->forceDelete();
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Order $order)
    {
        // TODO: Update order
        $order->update($request->only('status'));

        $time = date(config('common.format_time'));

        $user_name = $order->user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
