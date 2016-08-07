<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\UpdateProfileRequest;
use App\Http\Requests\Admin\User\UpdateEmailRequest;
use App\Http\Requests\Admin\User\UpdatePasswordRequest;
use App\Http\Requests\Admin\User\UpdateBlogRequest;
use App\Models\Attachment;
use App\Models\Admin;

class AdminController extends BaseController
{
    public function edit()
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        if ($avatar = $request->file('avatar')) {
            $extension = $avatar->getClientOriginalExtension();
            $fileName = hash('ripemd160', time().rand(1000000, 99999999)).'.'.$extension;
            $filePath = (string) $avatar->move('assets/avatars/'.date('y/m/'), $fileName);
            $user->avatar = $filePath;

            Attachment::syncFile($filePath);
        }

        $user->nickname = $request->get('nickname');
        $user->name = $request->get('name');
        $user->birthday = $request->get('birthday');
        $user->gender = strtolower($request->get('gender'));
        $user->save();

        return redirect(route('admin.users.edit'));
    }

    public function editEmail()
    {
        $user = $this->user();
        if (!$user) {
            abort(404);
        }

        return view('admin.user.editEmail');
    }

    public function updateEmail(UpdateEmailRequest $request)
    {
        $user = $this->user();
        if (!$user) {
            abort(404);
        }

        $password = $request->get('password');
        $email = $request->get('email');

        $credentials = ['password' => $password, 'email' => $email];
        $adminService = app('admin');

        if (!$token = $adminService->attempt($credentials)) {
            return redirect(route('admin.users.email.edit'))->withErrors(['旧密码错误']);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect(route('admin.users.email.edit'))->withErrors('邮箱格式不正确');
        }

        $admin = Admin::where('email', '=', $email)->first();

        if ($admin) {
            return redirect(route('admin.users.email.edit'))->withErrors('邮箱已经注册');
        }

        $user->email = $email;

        $user->save();

        return redirect(route('admin.users.email.edit'));
    }

    public function editPassword()
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        return view('admin.user.editPassword');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        $oldPassword = $request->get('old_password');

        $credentials = ['password' => $oldPassword, 'email' => $user->email];

        $adminService = app('admin');

        if (!$token = $adminService->attempt($credentials)) {
            return redirect(route('admin.users.password.edit'))->withErrors(['旧密码错误']);
        }

        $user->password = $request->get('password');

        $user->save();

        return redirect(route('admin.users.password.edit'));
    }


    public function editBlog()
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        return view('admin.user.editBlog',compact('user'));
    }


    public function updateBlog(UpdateBlogRequest $request)
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        $user->blog_url =$request->get('blog_url');

        $user->save();

        return redirect(route('admin.users.blog.edit'));
    }
}
