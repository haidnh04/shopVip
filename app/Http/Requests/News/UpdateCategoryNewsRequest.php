<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryNewsRequest extends FormRequest
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
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thể loại tin tức bắt buộc phải nhập',
            'name.max' => 'Tên thể loại tin tức phải dưới :max ký tự',

            'active.required' => 'Tên thể loại tin tức bắt buộc phải chọn',
        ];
    }
}
