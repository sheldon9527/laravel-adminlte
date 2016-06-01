<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    use Helpers;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // 返回错误的请求
    protected function errorBadRequest($errors = '')
    {
        if ($errors) {
            $errors = ['errors' => array_values(array_unique($errors))];
        }

        return $this->response->array($errors)->setStatusCode(400);
    }
}
