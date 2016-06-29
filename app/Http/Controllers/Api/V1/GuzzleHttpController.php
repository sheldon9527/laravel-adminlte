<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;

class GuzzleHttpController extends BaseController
{
    public function getInfo()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user', [
            'auth' => ['985829902@qq.com', 'yxd985829902'],
        ]);
         $res->getStatusCode();
        // 200
         $res->getHeaderLine('content-type');
        // 'application/json; charset=utf8'
        return  $res->getBody();
    }
}
