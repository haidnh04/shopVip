<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderService
{

    public function getAll()
    {
        return Slider::orderByDesc('id')->get();
    }

    public function store($request)
    {
        try {
            Slider::create($request->all());
        } catch (\Exception $err) {
            //with('msg', 'Thêm sản phẩm không thành công');
            return false;
        }
        return true;
    }

    public function update($request, $slider)
    {
        try {
            $slider->name = $request->name;
            $slider->url = $request->url;
            $slider->file = $request->file;
            $slider->sort_by = $request->sort_by;
            $slider->active = $request->active;
            $slider->save();
        } catch (\Exception $err) {
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = $request->id;
        $slider = Slider::where('id', $id)->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->file);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}
