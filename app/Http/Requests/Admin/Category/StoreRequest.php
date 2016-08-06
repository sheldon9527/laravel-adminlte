<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\Admin\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写分类名称',
        ];
    }
}
