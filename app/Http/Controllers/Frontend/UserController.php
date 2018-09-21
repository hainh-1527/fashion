<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();

        return view('frontend.user.my_profile', compact('user'));
    }

    public function myOrder()
    {
        $user = Auth::user();

        $orders = $user->orders()
            ->latest()
            ->get();

        return view('frontend.user.my_order', compact('orders'));
    }

    public function myOrderDetail($id)
    {
        $order = Order::findOrFail($id);

        return view('frontend.user.my_order_detail', compact('order'));
    }
}
