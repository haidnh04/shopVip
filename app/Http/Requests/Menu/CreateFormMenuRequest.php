<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormMenuRequest extends FormRequest
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
            'name' => 'required|max:255|unique:menus,name',
            'parent_id' => 'required',
            'description' => 'nullable|max:5000',
            'content' => 'nullable|max:10000',
            'active' => 'required',
            'img' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên danh mục có thể nhập tối đa 255 ký tự',

            'parent_id.required' => 'Bạn cần chọn danh mục cha',
            'description.max' => 'Tóm tắt danh mục có thể nhập tối đa 5000 ký tự',
            'content.max' => 'Nội dung danh mục có thể nhập tối đa 10000 ký tự',
            'active.required' => 'Bạn cần chọn danh mục hoạt động hay không',
            'img.max' => 'Ảnh danh mục có thể nhập tối đa 255 ký tự',
        ];
    }
}
