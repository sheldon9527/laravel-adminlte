<?php

namespace App\Http\Requests\Admin\Article;

use App\Http\Requests\Admin\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'tag' => 'required',
            'status' => 'required|in:active,inactive',
            'is_front' => 'required|in:1,0',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请填写标题',
            'description.required' => '请填写描述',
            'content.required' => '请填写内容',
            'tag.required' => '请填写标签',
            'status.required' => '请选择是否显示',
            'status.in' => '选择是否显示状态不对',
            'is_front.required' => '请选择是否置顶',
            'is_front.in' => '选择置顶参数不对',
            'category_id.required' => '请选择系统分类',
            'category_id.numeric' => '系统分类必须为数字',
            'category_id.exists' => '选择系统分类不存在',
        ];
    }
}
