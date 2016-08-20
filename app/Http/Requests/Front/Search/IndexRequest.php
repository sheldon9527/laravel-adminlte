<?php

namespace App\Http\Requests\Front\Search;

use App\Http\Requests\Front\Request;

class IndexRequest extends Request
{
    public function rules()
    {
        return [
            'search' => 'string',
        ];
    }
}
