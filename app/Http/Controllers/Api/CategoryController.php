<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param Category $category
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(Category $category)
    {
        Category::where('parent_id', $category->id)->update(['parent_id' => null]);

        return $category->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        return $category->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        return $category->forceDelete();
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        $user = User::findOrFail($request->user_id);

        $category->update($request->all());

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }

    /**
     * @param Request $request
     */
    public function sortOrder(Request $request)
    {
        $data = Helper::treeToArray($request->sort_order);

        foreach ($data as list($id, $parent_id, $sort)) {
            $category = Category::findOrFail($id);
            $category->update([
                'parent_id' => $parent_id,
                'sort_order' => $sort,
            ]);
        }

        return;
    }
}
