<?php

namespace App\Http\Requests\Front\Article;

use App\Http\Requests\Front\Request;

class IndexRequest extends Request
{
    public function rules()
    {
        return [
            'tag' => 'string',
        ];
    }
}
