<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Slide\SlideService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use App\Http\Requests\Slide\CreateSlideRequest;
use App\Http\Requests\Slide\UpdateSlideRequest;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index(Slider $slider)
    {
        $title = 'Danh sách các Sliders';
        $sliders = $this->sliderService->getAll();
        return view('admin.sliders.list', compact('title', 'sliders', 'slider'));
    }

    public function changeActive(Request $request)
    {
        $user = Slider::find($request->slider_id);
        $user->active = $request->active;
        $user->save();
        return redirect()->route('listSlider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới slider';
        return view('admin.sliders.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideRequest $request)
    {
        $this->sliderService->store($request);
        return redirect()->route('listSlider')->with('msg', 'Tạo slide thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        $title = 'Cập nhật Slider: ' . $slider->name;
        $sliders = $this->sliderService->getAll();
        return view('admin.sliders.edit', compact('title', 'slider', 'sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Slider $slider, UpdateSlideRequest $request)
    {
        $this->sliderService->update($request, $slider);
        return redirect()->route('listSlider')->with('msg', 'Cập nhật Slider thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->sliderService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa sản phẩm thành công',
            ]);
        } else {
        }
    }
}
