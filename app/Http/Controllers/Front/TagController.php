<?php

namespace App\Http\Controllers\Front;

class TagController extends BaseController
{
    public function tagShow($customPath = null)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }

        $articles = $user->articles;

        $tags = [];
        foreach ($articles as $article) {
            $articleTags = $article->tags;
            foreach ($articleTags as $articleTag) {
                $tags[$articleTag->id] = $articleTag->name;
            }
        }

        return view('front.tag.show', compact('user', 'tags'));
    }
}
