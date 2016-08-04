<?php

namespace App\Http\Controllers\Admin;

class ArticleController extends BaseController
{
    public function create()
    {
        return view('admin.dashboard');
    }
}
