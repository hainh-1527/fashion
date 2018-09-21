<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::latest()
            ->get();

        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        return view('backend.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // TODO: Update order
        $order->update($request->all());

        return redirect()->route('order.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $orders = Order::onlyTrashed()
            ->get();

        return view('backend.order.trash', compact('orders'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->orders_id)) {
            return redirect()->route('order.trash')->with('warning', __('please_select_an_item'));
        }

        Order::onlyTrashed()
            ->whereKey($request->orders_id)
            ->restore();

        return redirect()->route('order.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        Order::onlyTrashed()
            ->restore();

        return redirect()->route('order.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        Order::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('order.trash')->with('success', __('restore_success'));
    }
}
