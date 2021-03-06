<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\Admin\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '请填写邮箱',
            'password.required' => '请填写密码',
        ];
    }
}
