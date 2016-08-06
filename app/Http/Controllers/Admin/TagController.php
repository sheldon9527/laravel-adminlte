<?php

namespace App\Http\Controllers\Admin;

class TagController extends BaseController
{
    public function index()
    {
        $user = $this->user();

        $articles = $user->articles;

        $tags = [];
        foreach ($articles as $article) {
            $articleTags = $article->tags;
            foreach ($articleTags as $articleTag) {
                $tags[$articleTag->id] = $articleTag->name;
            }
        }

        return view('admin.tag.index', compact('tags'));
    }
}
