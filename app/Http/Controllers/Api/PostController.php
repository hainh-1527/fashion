<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use Image;

    /**
     * @param Post $post
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(Post $post)
    {
        return $post->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        return $post->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        // Todo: delete file upload
        // $this->deleteFile($post->thumbnail);

        return $post->forceDelete();
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        $user = User::findOrFail($request->user_id);

        $post->update($request->all());

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
