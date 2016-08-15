<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\Article\IndexRequest;

class ArticleController extends BaseController
{
    public function articleShow($customPath = null, $id)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }

        $article = $user->articles()->find($id);

        return view('front.article.show', compact('user', 'article'));
    }

    public function articleIndex($customPath = null, IndexRequest $request)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }

        $articles = $user->articles();

        if ($tag = $request->get('tag')) {
            $tag = explode(',', $tag);
            $tags = array_filter($tag);
            $articles->whereHas('tags', function ($query) use ($tags) {
                $query->where('name', 'like', array_shift($tags).'%');
                foreach ($tags as $t) {
                    $query->orWhere('name', 'like', $t.'%');
                }
            });
        }

        $articles = $articles->orderBy('id', 'desc')->paginate();

        return view('front.article.index', compact('articles', 'user'));
    }
}
