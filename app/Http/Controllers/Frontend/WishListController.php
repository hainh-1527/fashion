<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\WishListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        $wishList = $user->wishList;

        return view('frontend.user.wish_list', compact('wishList'));
    }

    /**
     * @param WishListRequest $request
     */
    public function store(WishListRequest $request)
    {
        $user = $request->user();

        $user->wishList()->syncWithoutDetaching($request->product_id);
    }

    /**
     * @param WishListRequest $request
     */
    public function destroy(WishListRequest $request)
    {
        $user = $request->user();

        $user->wishList()->detach($request->product_id);
    }
}
