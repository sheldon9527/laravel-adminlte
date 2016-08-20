<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\Search\IndexRequest;

class SearchController extends BaseController
{
    public function searchIndex($customPath = null, IndexRequest $request)
    {
        $user = $this->verificateUser($customPath);

        if (!$user) {
            abort(404);
        }
        $seach = $request->get('search');
        $articles = $user->articles()->where('title', 'like', '%'.$seach.'%');

        $articles = $articles->orderBy('id', 'desc')->paginate(20);

        return view('front.article.index', compact('articles', 'user'));
    }
}
