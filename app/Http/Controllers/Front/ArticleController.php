<?php

namespace App\Http\Controllers\Front;

class ArticleController extends BaseController
{
    public function articleShow($customPath = null,$id)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }

        $article = $user->articles()->find($id);

        return view('front.article.show', compact('user','article'));
    }
}
