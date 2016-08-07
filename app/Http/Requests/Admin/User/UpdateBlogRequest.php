<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\Admin\Request;

class UpdateBlogRequest extends Request
{
    public function rules()
    {
        $id = app('admin')->user()->id;
        if($id == 1){
            $rules =[
                'blog_url' => 'alpha_dash|between:6,20',
            ];
        }else {
            $rules =[
                'blog_url' => 'required|alpha_dash|between:6,20',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'blog_url.required' => '请输入blog访问链接',
            'blog_url.alpha_dash' => '输入的blog仅包含字母、数字、破折号（ - ）以及下划线（ _ ）。',
            'blog_url.between' => '输入的blog访问链接必须是6-20位',
        ];
    }
}
