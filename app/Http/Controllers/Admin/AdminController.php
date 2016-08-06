<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\UpdateProfileRequest;
use App\Models\Attachment;

class AdminController extends BaseController
{
    public function edit($id)
    {
        $user = $this->user();

        if (!$user) {
            abort(404);
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update($id, UpdateProfileRequest $request)
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

        return redirect(route('admin.users.edit', $user));
    }
}
