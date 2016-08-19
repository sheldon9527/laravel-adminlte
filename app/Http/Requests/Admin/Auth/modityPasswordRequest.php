<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\Admin\Request;

class modityPasswordRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required',
            'code' => 'required',
            'password' => 'required|alpha_num|between:6,20|confirmed',
            'password_confirmation' => 'required|alpha_num|between:6,20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '请填写邮箱',
            'code.required' => '请填写验证码',
            'password.required' => '请输入新密码',
            'password.alpha_num' => '请输入新密码必须仅包含字母、数字',
            'password.between' => '请输入新密码必须仅6-20字符',
            'password.confirmed' => '两次输入密码不一致',
            'password_confirmation.required' => '请输入确认密码',
            'password_confirmation.alpha_num' => '请输入确认密码必须仅包含字母、数字',
            'password_confirmation.between' => '请输入确认密码必须仅6-20字符',
        ];
    }
}
