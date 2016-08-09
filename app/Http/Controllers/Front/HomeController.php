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

        $articles = $user->articles()->orderBy('id', 'desc')->paginate(1);

        return view('front.index', compact('user','articles'));
    }
}
