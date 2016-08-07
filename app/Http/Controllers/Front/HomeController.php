<?php

namespace App\Http\Controllers\Front;

class HomeController extends BaseController
{
    public function index($customPath = null)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }

        return view('front.index', compact('user'));
    }
}
