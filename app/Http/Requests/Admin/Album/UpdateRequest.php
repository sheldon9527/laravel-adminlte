<?php

namespace App\Http\Requests\Admin\Album;

use App\Http\Requests\Admin\Request;

class UpdateRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:active,inactive',
            'is_front' => 'required|in:1,0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写标题',
            'description.required' => '请填写描述',
            'status.required' => '请填写状态',
            'is_front.required' => '请填写是否置顶',
        ];
    }
}
