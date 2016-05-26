<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\User;
use App\Transformers\UserTransformer;

class UserController extends BaseController
{
    public function login()
    {
        $rules = [
            'name' => 'required',
            'password' => 'required|alpha_num|between:6,20',
        ];

        $validator = \Validator::make($this->request->all(), $rules);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator->messages()->all());
        }

        //登录名
        $username = $this->request->get('name');
        //密码
        $password = $this->request->get('password');

        //email
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        $token = \JWTAuth::attempt($credentials);

        $user = \Auth::user();

        return $this->response->item($user, new UserTransformer())->addMeta('token', $token);
    }
    public function show($id)
    {
        $user = \Auth::user();

        return $this->response->item($user, new UserTransformer());
    }
}
