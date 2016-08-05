<?php

namespace App\Http\Controllers\Admin;

class ArticleController extends BaseController
{
    public function index()
    {
        # code...
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store()
    {
        dd($this->request->all());

        return rediect(route('admin.articles.store'));
    }
}
