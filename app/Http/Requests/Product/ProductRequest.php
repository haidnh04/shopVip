<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:menus,name',
            'file' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'file.required' => 'Bạn cần thêm ảnh sản phẩm',
            'price.required' => 'Bạn cần thêm giá sản phẩm',
            'amount.required' => 'Bạn cần thêm số lượng sản phẩm',
        ];
    }
}
