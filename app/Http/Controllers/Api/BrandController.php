<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Image;
use App\Models\User;
use App\Repositories\Contracts\BrandRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    use Image;

    protected $brandRepository;

    /**
     * BrandController constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        return $this->brandRepository = $brandRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function softDelete($id)
    {
        return $this->brandRepository->softDelete($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreItem($id)
    {
        return $this->brandRepository->restoreItem($id);
    }

    /**
     * @param $id
     */
    public function forceDelete($id)
    {
        $thumbnail = $this->brandRepository->forceDelete($id);

        // TODO: Delete file upload
        // $this->deleteFile($thumbnail);

        return;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->brandRepository->update($request, $id);

        $user = User::findOrFail($request->user_id);

        $time = date(config('common.format_time'));

        $user_name = $user->name;

        return response()->json(compact('time', 'user_name'));
    }
}
