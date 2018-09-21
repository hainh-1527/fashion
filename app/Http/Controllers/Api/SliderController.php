<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Image;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    use Image;

    /**
     * @param Slider $slider
     * @return bool|null
     * @throws \Exception
     */
    public function softDelete(Slider $slider)
    {
        return $slider->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        $slider = Slider::onlyTrashed()->findOrFail($id);

        return $slider->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $slider = Slider::onlyTrashed()->findOrFail($id);

        //TODO: Delete file upload
        // $this->deleteFile($slider->thumbnail);

        return $slider->forceDelete();
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $user = User::findOrFail($request->user_id);

        $slider->update($request->all());

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
