<?php

namespace App\Http\Requests\Admin\Album;

use App\Http\Requests\Admin\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请填写标题',
            'description.required' => '请填写描述',
        ];
    }
}
