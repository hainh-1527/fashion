<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(User $user)
    {
        return $user->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        return $user->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        // TODO: Delete comment
        foreach ($user->comments as $comment) {
            $comment->notifications()->delete();
        }

        $user->comments()->delete();

        // TODO: Delete review
        foreach ($user->reviews as $review) {
            $review->notifications()->delete();
        }

        // TODO: Delete order
        foreach ($user->orders as $order) {
            $order->notifications()->delete();
        }

        // TODO: Update category
        $user->categories()->update(['user_id' => 1]);

        // TODO: Update post
        $user->posts()->update(['user_id' => 1]);

        // TODO: Update product
        $user->products()->update(['user_id' => 1]);

        // TODO: Update brand
        $user->brands()->update(['user_id' => 1]);

        // TODO: Update slider
        $user->categories()->update(['user_id' => 1]);

        return $user->forceDelete();
    }
}
