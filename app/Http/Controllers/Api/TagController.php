<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::published()
            ->pluck('name');

        return $tags;
    }

    /**
     * @param Tag $tag
     * @throws \Exception
     */
    public function softDelete(Tag $tag)
    {
        $tag->delete();
    }

    /**
     * @param $id
     */
    public function restoreItem($id)
    {
        $tag = Tag::onlyTrashed()->findOrFail($id);

        $tag->restore();
    }

    /**
     * @param $id
     */
    public function forceDelete($id)
    {
        $tag = Tag::onlyTrashed()->findOrFail($id);

        $tag->forceDelete();
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Tag $tag)
    {
        $user = User::findOrFail($request->user_id);

        $tag->update($request->all());

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
