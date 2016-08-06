<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\Admin\Request;

class UpdateEmailRequest extends Request
{
    public function rules()
    {
        return [
            'password' => 'required|alpha_num|between:6,20',
            'email' => 'required|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => '请输入密码',
            'email.required' => '请填写邮箱',
            'password.alpha_num' => '请输入密码必须仅包含字母、数字',
            'password.between' => '请输入密码必须仅6-20字符',
            'email.unique' => '填写邮箱已经存在',
        ];
    }
}
