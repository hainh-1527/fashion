<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Image;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
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
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $brands = $this->brandRepository->getAll();

        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBrandRequest $request)
    {
        // Todo: upload file
        $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.brand'));

        $request->merge([
            'user_id' => $request->user()->id,
            'thumbnail' => $thumbnail
        ]);

        $this->brandRepository->store($request);

        return redirect()->route('brand.index')->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $brand = $this->brandRepository->edit($id);

        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBrandRequest $request
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $request->merge(['user_id' => $request->user()->id]);

        if ($request->hasFile('file')) {
            // Todo: upload file
            $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.brand'));

            $request->merge(['thumbnail' => $thumbnail]);
        }

        $this->brandRepository->update($request, $id);

        return redirect()->route('brand.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $brands = $this->brandRepository->getTrashed();

        return view('backend.brand.trash', compact('brands'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->brands_id)) {
            return redirect()->route('brand.trash')->with('warning', __('please_select_an_item'));
        }

        $this->brandRepository->restore($request);

        return redirect()->route('brand.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        $this->brandRepository->restoreAll();

        return redirect()->route('brand.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        $this->brandRepository->restoreTime($time);

        return redirect()->route('brand.trash')->with('success', __('restore_success'));
    }
}
