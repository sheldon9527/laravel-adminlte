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
}
