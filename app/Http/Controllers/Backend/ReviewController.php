<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Product;
use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Notifications\ReviewNotification;

/**
 * Class ReviewController
 *
 * @package App\Http\Controllers\Backend
 */
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reviews = Review::withUser()
            ->withProduct()
            ->latest()
            ->get();

        return view('backend.review.index', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReviewRequest $request
     * @return array
     */
    public function store(StoreReviewRequest $request)
    {
        $user = $request->user();

        $review = $user->reviews()->create($request->all());

        // TODO: add notification
        $review->notify(new ReviewNotification());

        $product = Product::find($request->product_id);

        $result = [
            'user_name' => $request->user()->name,
            'time' => $review->created_at,
            'product_rating' => $product->rating
        ];

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        $review->notifications()->delete();

        return $review->delete();
    }
}
