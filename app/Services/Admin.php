<?php

namespace App\Services;

use App\Models\Admin as AdminModel;

class Admin
{
    protected $user;

    public function attempt(array $credentials = [])
    {
        if (!array_key_exists('email', $credentials) || !array_key_exists('password', $credentials)) {
            return false;
        }

        $admin = AdminModel::where('email', $credentials['email'])->first();

        if (!$admin) {
            return false;
        }

        if (password_verify($credentials['password'], $admin->password)) {
            session([$this->getName() => $admin->id]);
            $this->user = $admin;

            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->user = null;
        \Session::forget($this->getName());
    }

    public function getName()
    {
        return 'login_'.md5(get_class($this));
    }

    public function user()
    {
        if (!is_null($this->user)) {
            return $this->user;
        }

        $id = session($this->getName());

        $user = null;

        if (!is_null($id)) {
            $user = AdminModel::find($id);
        }

        if (is_null($user)) {
            return false;
        }

        return $this->user = $user;
    }

    public function check()
    {
        return !is_null($this->user());
    }

    public function guest()
    {
        return !$this->check();
    }
}
