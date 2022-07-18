<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'summary' => 'nullable|max:5000',
            'content' => 'nullable|max:30000',
            'file' => 'nullable',
            'hightlight' => 'nullable',
            'view' => 'nullable',
            'kind_id' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề tin tức bắt buộc phải nhập',
            'name.max' => 'Tiêu đề tin tức phải dưới :max ký tự',

            'summary.max' => 'Tóm tắt tin tức phải dưới :max ký tự',

            'content.max' => 'Nội dung tin tức phải dưới :max ký tự',

            'kind_id.required' => 'Loại tin tức bắt buộc phải chọn',

            'active.required' => 'Kích hoạt tin tức bắt buộc phải chọn',
        ];
    }
}
