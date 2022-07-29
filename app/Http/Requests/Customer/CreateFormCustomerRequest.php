<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormCustomerRequest extends FormRequest
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
            'phone' => 'required|max:255|numeric',
            'address' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'content' => 'nullable|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập họ và tên',
            'name.max' => 'Họ và tên bạn có thể nhập tối đa 255 ký tự',

            'phone.required' => 'Bạn cần nhập số điện thoại',
            'phone.max' => 'Số điện thoại có thể nhập tối đa 255 ký tự',
            'phone.numeric' => 'Số điện thoại phải là dạng số',

            'address.required' => 'Bạn cần nhập địa chỉ',
            'address.max' => 'Đỉa chỉ có thể nhập tối đa 255 ký tự',

            'email.max' => 'Email bạn có thể nhập tối đa 255 ký tự',
            'email.email' => 'Email của bạn phải đúng định dạng thư điện tử',

            'content.max' => 'Ghi chú có thể nhập tối đa 1000 ký tự',
        ];
    }
}
