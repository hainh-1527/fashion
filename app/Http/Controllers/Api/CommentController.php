<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @return array
     */
    public function store(StoreCommentRequest $request)
    {
        if ($request->commentable_type == 'post') {
            $model = Post::findOrFail($request->commentable_id);
        } elseif ($request->commentable_type == 'product') {
            $model = Product::findOrFail($request->commentable_id);
        }

        $comment = $model->comments()->create($request->all());

        // TODO: add notification
        $comment->notify(new CommentNotification());

        $result = [
            'user_name' => $comment->user->name,
            'time' => $comment->created_at,
        ];

        return $result;
    }

    /**
     * @param Comment $comment
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->children()->delete();

        return $comment->delete();
    }
}
