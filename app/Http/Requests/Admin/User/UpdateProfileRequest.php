<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\Admin\Request;

class UpdateProfileRequest extends Request
{
    public function rules()
    {
        return [
            'avatar' => 'image',
            'nickname' => 'required|string',
            'gitHub_name' => 'required',
            'sina_id' => 'required',
            'gender' => 'required|in:male,female,secret',
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '请上传正确头像',
            'nickname.required' => '请填写昵称',
            'gitHub_name.required' => '请填写github name',
            'sina_id.required' => '请填写新浪ID',
            'gender.required' => '请选择性别',
            'gender.in' => '性别选择错误',
        ];
    }
}
