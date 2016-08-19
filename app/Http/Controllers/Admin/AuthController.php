<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Auth\StoreRequest;
use App\Http\Requests\Admin\Auth\SignupRequest;
use App\Http\Requests\Admin\Auth\modityPasswordRequest;
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

    public function postSignup(SignupRequest $request)
    {
        $code = $request->get('code');
        $email = $request->get('email');
        $blogUrl = $request->get('blog_url');
        $password = $request->get('password');
        $request->flash();
        $cacheKey = $this->getVerifyKey($email);
        $verifyCodeCache = \Cache::store('database')->get($cacheKey);

        $admin = Admin::where('email', $email)->first();

        if ($admin) {
            return redirect(route('admin.auth.signup.get'))->withErrors(['邮箱已经存在']);
        }

        if ($code != $verifyCodeCache) {
            return redirect(route('admin.auth.signup.get'))->withErrors(['验证码不正确']);
        }
        if ($blogUrl == 'manager') {
            return redirect(route('admin.auth.signup.get'))->withErrors(['博客连接已经存在']);
        }

        $admin = Admin::where('blog_url', $blogUrl)->first();
        if ($admin) {
            return redirect(route('admin.auth.signup.get'))->withErrors(['博客名称已经存在']);
        }

        $newAdmin = new Admin();

        $newAdmin->email = $email;
        $newAdmin->blog_url = $blogUrl;
        $newAdmin->password = bcrypt($password);

        $newAdmin->save();

        \Cache::store('database')->forget($cacheKey);

        $request->flashOnly('email');

        return view('admin.auth.success');
    }

    public function sendCode(Request $request)
    {
        $email = $request->get('email');
        // $request->flash();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['success' => 0, 'error' => '*邮箱格式不正确', 'email' => $email]);
        }

        if (!$this->sendVerifyCode($email)) {
            return response()->json(['success' => 0, 'error' => '*发送失败', 'email' => $email]);
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

    public function password()
    {
        return view('admin.auth.modityPassword');
    }

    public function modityPassword(modityPasswordRequest $request)
    {
        $code = $request->get('code');
        $email = $request->get('email');
        $password = $request->get('password');
        $request->flash();
        $cacheKey = $this->getVerifyKey($email);
        $verifyCodeCache = \Cache::store('database')->get($cacheKey);

        $admin = Admin::where('email', $email)->first();

        if (!$admin) {
            return redirect(route('admin.auth.signup.get'))->withErrors(['邮箱不已经存在']);
        }

        if ($code != $verifyCodeCache) {
            return redirect(route('admin.auth.signup.get'))->withErrors(['验证码不正确']);
        }

        $admin->password = bcrypt($password);

        $admin->save();

        \Cache::store('database')->forget($cacheKey);

        return view('admin.auth.success');
    }

    public function logout()
    {
        app('admin')->logout();

        return redirect(route('admin.auth.login.get'));
    }
}
