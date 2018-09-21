<?php

namespace App\Http\Controllers\Backend;

use App\Models\Comment;
use App\Http\Controllers\Controller;

/**
 * Class CommentController
 *
 * @package App\Http\Controllers\Backend
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::withUser()
            ->latest()
            ->get();

        return view('backend.comment.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->children()->delete();

        $comment->notifications()->delete();

        $comment->delete();

        return redirect()->route('comment.index')->with('success', __('delete_success'));
    }
}
