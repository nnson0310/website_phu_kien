<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
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
            //
            'username' => 'bail | required | max: 30 | unique:tbl_users,username', //khong duoc them khoang trang khi su dung unique
            'email' => 'bail | required | max: 255 | unique:tbl_users,email',
            'password' => 'bail | required ',
            'phone' => 'bail | required | regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            //
            'username.required' => 'Tên tài khoản không được bỏ trống',
            'username.max' => 'Tên tài khoản không được vượt quá 30 kí tự',
            'username.unique' => 'Tên tài khoản đã tồn tại. Xin vui lòng thử lại.',
            'email.required' => 'Email không được bỏ trống',
            'email.max' => 'Email không được vượt quá 255 kí tự',
            'email.unique' => 'Email đã tồn tại. Xin vui lòng thử lại.',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.regex' => 'Định dạng số điện thoại chưa đúng',
            'phone.size' => 'Số điện thoại chưa đúng',
        ];
    }
}
