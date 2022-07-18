<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKindNewsRequest extends FormRequest
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
            'category_id' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên loại tin tức bắt buộc phải nhập',
            'name.max' => 'Tên loại tin tức phải dưới :max ký tự',

            'category_id.required' => 'Thể loại tin tức bắt buộc phải chọn',

            'active.required' => 'Tên loại tin tức bắt buộc phải chọn',
        ];
    }
}
