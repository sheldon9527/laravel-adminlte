<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Auth\StoreRequest;

class AuthController extends BaseController
{
    public function getLogin()
    {
        if ($this->user()) {
            return redirect(route('admin.dashboard'));
        }

        return view('admin.auth.login');
    }

    public function postLogin(StoreRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $adminService = app('admin');

        if (!$token = $adminService->attempt($credentials)) {
            $request->flashOnly('email');

            return redirect(route('admin.auth.login.get'))->withErrors(['用户名或密码错误']);
        }

        $redirect = session('url.intended') ?: route('admin.dashboard');

        return redirect($redirect);
    }

    public function logout()
    {
        app('admin')->logout();

        return redirect(route('admin.auth.login.get'));
    }
}
