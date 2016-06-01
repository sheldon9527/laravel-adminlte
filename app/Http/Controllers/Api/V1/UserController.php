<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Models\User;
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

        $username = $this->request->get('name');
        $password = $this->request->get('password');

        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (!$token = \JWTAuth::attempt($credentials)) {
            $validator->after(function ($validator) {
                $validator->errors()->add('message', trans('error.auth.invalid_login'));
            });
        }

        if ($validator->fails()) {
            return $this->errorBadRequest($validator->messages()->all());
        }

        $user = \Auth::user();

        return $this->response->item($user, new UserTransformer())->addMeta('token', $token);
    }
    
    public function show($id)
    {
        $user = \Auth::user();

        return $this->response->item($user, new UserTransformer());
    }
}
