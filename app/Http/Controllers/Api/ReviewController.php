<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Notifications\ReviewNotification;

class ReviewController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        return $review->delete();
    }
}
