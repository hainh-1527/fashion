<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Order::select('user_id')
            ->distinct()
            ->withUser()
            ->latest()
            ->get();

        return view('backend.customer.index', compact('customers'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $orders = $user->orders()
            ->latest()
            ->get();

        return view('backend.order.index', compact('orders'));
    }
}
