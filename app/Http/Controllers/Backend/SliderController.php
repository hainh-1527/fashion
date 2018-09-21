<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Image;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SliderController
 *
 * @package App\Http\Controllers\Backend
 */
class SliderController extends Controller
{
    use Image;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::withUser()
            ->latest()
            ->get();

        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSliderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSliderRequest $request)
    {
        // Todo: upload file
        $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.slider'));

        $request->merge(['thumbnail' => $thumbnail]);

        $user = $request->user();

        $user->sliders()->create($request->all());

        return redirect()->route('slider.index')->with('success', __('add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSliderRequest $request
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($request->hasFile('file')) {
            // Todo: upload file
            $thumbnail = $this->upload($request->file('file'), config('backend.path_upload.slider'));

            $request->merge(['thumbnail' => $thumbnail]);
        }

        $request->merge(['user_id' => $request->user()->id]);

        $slider->update($request->all());

        return redirect()->route('slider.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        $sliders = Slider::onlyTrashed()
            ->withUser()
            ->get();

        return view('backend.slider.trash', compact('sliders'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->sliders_id)) {
            return redirect()->route('slider.trash')->with('warning', __('please_select_an_item'));
        }

        Slider::onlyTrashed()
            ->whereKey($request->sliders_id)
            ->restore();

        return redirect()->route('slider.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        Slider::onlyTrashed()
            ->restore();

        return redirect()->route('slider.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        Slider::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('slider.trash')->with('success', __('restore_success'));
    }
}
