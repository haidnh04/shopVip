<?php

namespace App\Http\Requests\Slide;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'url' => 'nullable|max:255',
            'file' => 'required',
            'sort_by' => 'required|numeric',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên slide bắt buộc phải nhập',
            'name.max' => 'Tên slide phải dưới :max ký tự',

            // 'url.required' => 'URL bắt buộc phải nhập',
            'url.max' => 'URL phải dưới :max ký tự',

            'file.required' => 'Ảnh bắt buộc phải chọn',

            'sort_by.required' => 'Sắp xếp bắt buộc phải nhập',
            'sort_by.numeric' => 'Sắp xếp phải là dạng số',

            'active.required' => 'Kích hoạt bắt buộc phải chọn',
        ];
    }
}
