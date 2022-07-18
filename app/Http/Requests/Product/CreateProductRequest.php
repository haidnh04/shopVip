<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'description' => 'nullable|max:5000',
            'content' => 'nullable|max:30000',
            'amount' => 'required|numeric',
            'weight' => 'nullable|numeric',
            'dimensions' => 'nullable|max:255|numeric',
            'materials' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'size' => 'nullable|max:255',
            'file' => 'required',
            'menu_id' => 'required',
            'price' => 'nullable|numeric',
            'price_sale' => 'nullable|numeric',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',

            'description.max' => 'Tóm tắt sản phẩm tối đa 5000 ký tự',

            'content.max' => 'Chi tiết sản phẩm tối đa 30000 ký tự',

            'amount.required' => 'Bạn cần thêm số lượng sản phẩm',
            'amount.numeric' => 'Số lượng sản phẩm phải là dạng số',
            // 'amount.max' => 'Số lượng sản phẩm tối đa 11 ký tự',

            'weight.numeric' => 'Cân nặng sản phẩm phải là dạng số',
            // 'weight.max' => 'Cân nặng sản phẩm tối đa 11 ký tự',

            'dimensions.max' => 'Kích cỡ có thể nhập tối đa 255 ký tự',

            'materials.max' => 'Chất liệu có thể nhập tối đa 255 ký tự',

            'color.max' => 'Màu có thể nhập tối đa 255 ký tự',

            'size.max' => 'kích cỡ có thể nhập tối đa 255 ký tự',

            'file.required' => 'Bạn cần thêm ảnh sản phẩm',
            // 'file.max' => 'ảnh có thể nhập tối đa 255 ký tự',

            'price.numeric' => 'Giá sản phẩm phải là dạng số',
            // 'price.max' => 'Giá sản phẩm tối đa 11 số',

            'price_sale.numeric' => 'Giá KM sản phẩm phải là dạng số',
            // 'price_sale.max' => 'Giá KM sản phẩm tối đa 11 số',

        ];
    }
}
