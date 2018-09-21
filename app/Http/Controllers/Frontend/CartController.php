<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Product;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Cart::count()) {
            return view('frontend.cart.index');
        } else {
            return view('frontend.cart.empty');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout()
    {
        if ($user = Auth::user()) {
            if (Cart::count()) {
                return view('frontend.cart.checkout', compact('user'));
            } else {
                return view('frontend.cart.empty');
            }
        } else {
            return view('frontend.cart.not_login');
        }
    }

    /**
     * @param StoreOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeOrder(StoreOrderRequest $request)
    {
        $user = $request->user();

        // TODO: Add the data to the Order table
        $order = $user->orders()->create($request->all());

        // TODO: Add the corresponding items in Cart by Order_id
        foreach (Cart::content() as $cart) {
            $order->products()->attach($cart->id, [
                'price' => $cart->price,
                'qty' => $cart->qty,
            ]);
        }

        // TODO: Send mail & add notification
        $order->notify(new OrderNotification($request));

        // TODO: Destroy cart
        Cart::destroy();

        return redirect()->route('frontend.order.success');
    }

    /**
     * Add cart ajax
     *
     * @param Request $request
     * @return array
     */
    public function add(Request $request)
    {
        $product = Product::findOrfail($request->product_id);

        Cart::add(
            $product->id,
            $product->name,
            $request->qty,
            $product->real_price,
            [
                'thumbnail' => $product->thumbnail,
                'slug' => $product->slug
            ]
        );

        $result = [
            'content' => $this->getCartContent(),
            'count' => Cart::count(),
            'total' => Cart::subtotal(0)
        ];

        return $result;
    }

    /**
     * Remove item cart ajax
     *
     * @param Request $request
     * @return array
     */
    public function remove(Request $request)
    {
        Cart::remove($request->cart_id);

        $result = [
            'content' => $this->getCartContent(),
            'count' => Cart::count(),
            'total' => Cart::subtotal(0)
        ];

        return $result;
    }

    /**
     * Update Item cart ajax
     *
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        $cart = Cart::update($request->cart_id, $request->qty);

        $result = [
            'content' => $this->getCartContent(),
            'subtotal' => $cart->subtotal,
            'count' => Cart::count(),
            'total' => Cart::subtotal(0),
        ];

        return $result;
    }

    /**
     * @return array
     */
    private function getCartContent()
    {
        $result = [];

        foreach (Cart::content() as $cart) {
            $result[] = [
                'url' => route('frontend.product.show', $cart->options->slug),
                'thumbnail' => $cart->options->thumbnail,
                'name' => $cart->name,
                'qty' => $cart->qty,
                'price' => number_format($cart->price),
            ];
        }

        return $result;
    }
}
