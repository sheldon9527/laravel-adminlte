<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\Admin\Request;

class SendCodeRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '请填写邮箱',
        ];
    }
}
