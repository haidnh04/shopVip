<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //Nhập tên ít nhất 5 ký tự và phải nhập
            'name' => 'required|min:5',
            //Nhập email phải có và nhập đúng định dạng
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@()^*]).*$/|min:6',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên bắt buộc phải nhập',
            'name.min' => 'Họ vè tên phải từ :min ký tự trở lên',

            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống',

            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.confirmed' => 'Mật khẩu xác nhận chưa đúng',

            'password.min' => 'Mật khẩu nhỏ nhất phải 6 ký tự',
            'password.regex' => 'Mật khẩu phải có 1 chữ viết hoa và 1 chữ viết thường, 1 chữ số và 1 ký tự đặc biệt như !$#%@()^*',

            'role.required' => 'Vai trò bắt buộc phải chọn',

            'status.required' => 'Vai trò bắt buộc phải chọn',
        ];
    }
}
