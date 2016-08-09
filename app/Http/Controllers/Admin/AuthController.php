<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Auth\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Admin;

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

    public function getSignup()
    {
        return view('admin.auth.signup');
    }

    public function postSignup()
    {
        return view('admin.auth.signup');
    }

    public function sendCode(Request $request)
    {
        $email = $request->get('email');
        // $request->flash();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['success' => 0, 'error' => '邮箱格式不正确', 'email' => $email]);
        }

        $admin = Admin::where('email', $email)->first();

        if ($admin) {
            return response()->json(['success' => 0, 'error' => '账号已经存在', 'email' => $email]);
        }

        if (!$this->sendVerifyCode($email)) {
            return response()->json(['success' => 0, 'error' => '发送失败', 'email' => $email]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => 1, 'email' => $email]);
        }
    }
    // 发送验证码，存入cache
    private function sendVerifyCode($email)
    {
        $code = $this->generateVerifyCode(6);

        $ret = $this->sendVerifyEmail($email, $code);
        if ($ret) {
            $expireMinutes = 10;
            $cacheKey = $this->getVerifyKey($email);
            \Cache::store('database')->put($cacheKey, $code, $expireMinutes);
        }

        return $ret;
    }

    // 发送验证邮件
    private function sendVerifyEmail($email, $code)
    {
        $view = 'email.verify-code';
        \Mail::send($view, ['code' => $code], function ($message) use ($email) {
            $message->to($email)->subject('Sheldon 博客网站');
        });
        $ret = count(\Mail::failures()) == 0 ? true : false;

        return $ret;
    }

    //  生成验证码
    private function generateVerifyCode($bit)
    {
        if (env('APP_DEBUG')) {
            return '1234';
        }

        $startNumber = 0;
        $endNUmber = pow(10, $bit) - 1;

        $verifyCode = sprintf('%06d', mt_rand($startNumber, $endNUmber));

        return $verifyCode;
    }

    // 根据用户名生成验证key
    private function getVerifyKey($email)
    {
        return 'verifyCode-'.$email;
    }

    public function logout()
    {
        app('admin')->logout();

        return redirect(route('admin.auth.login.get'));
    }
}
