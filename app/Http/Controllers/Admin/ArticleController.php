<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Article\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends BaseController
{
    public function index(Request $request)
    {
        $user = $this->user();
        $articles = $user->articles();
        $categories = Category::all();

        $searchColumns = ['title', 'category_id', 'status'];

        if ($title = $request->get('title')) {
            $articles->where('title', 'like', '%'.$title.'%');
        }

        if ($categoryId = $request->get('category_id')) {
            $articles->where('category_id', $categoryId);
        }

        if ($status = $request->get('status')) {
            $articles->where('status', $status);
        }

        $articles = $articles->orderBy('id', 'desc')->paginate();

        return view('admin.article.index', compact('articles','searchColumns','categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.article.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $article = new Article();

        $article->admin_id = $this->user()->id;
        $article->category_id = $request->get('category_id');
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->catalog = $request->get('catalog');
        $article->status = strtolower($request->get('status'));
        $article->is_front = $request->get('is_front');

        $article->save();

        if ($tag = $request->get('tag')) {
            $tag = explode(',',$tag);
            $tags =  array_filter($tag);
            $tagIds =[];
            foreach ($tags as $t) {
                if($t){
                    if($modelTag = Tag::where('name',$t)->first()){
                        $tagIds[] = $modelTag->id;
                    }else {
                        $newModelTag = new Tag();
                        $newModelTag->name = $t;
                        $newModelTag->save();
                        $tagIds[] =$newModelTag->id;
                    }
                }
            }

            $article->tags()->attach($tagIds);
        }

        return redirect(route('admin.articles.index'));
    }
}
