<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use EndaEditor;

class ArticleController extends BaseController
{
    public function index(Request $request)
    {
        $user = $this->user();
        $articles = $user->articles();
        $categories = Category::all();
        $searchColumns = ['title', 'category_id', 'status', 'tag'];
        if ($title = $request->get('title')) {
            $articles->where('title', 'like', '%'.$title.'%');
        }
        if ($categoryId = $request->get('category_id')) {
            $articles->where('category_id', $categoryId);
        }
        if ($status = $request->get('status')) {
            $articles->where('status', $status);
        }
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

        return view('admin.article.index', compact('articles', 'searchColumns', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.article.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $content = $request->get('content');
        $content = EndaEditor::MarkDecode($content);
        $article = new Article();
        $article->admin_id = $this->user()->id;
        $article->category_id = $request->get('category_id');
        $article->title = $request->get('title');
        $article->description = $request->get('description');
        $article->content = $content;
        $article->markdown = $request->get('content');
        $article->status = strtolower($request->get('status'));
        $article->is_front = $request->get('is_front');
        $article->save();
        if ($tag = $request->get('tag')) {
            $this->DealTag($tag, $article);
        }

        return redirect(route('admin.articles.index'));
    }

    public function edit($id)
    {
        $user = $this->user();
        $article = $user->articles()->find($id);
        if (!$article) {
            abort(404);
        }
        $categories = Category::all();

        return view('admin.article.edit', compact('article', 'categories'));
    }

    public function update($id, UpdateRequest $request)
    {
        $user = $this->user();
        $article = $user->articles()->find($id);
        if (!$article) {
            abort(404);
        }
        $content = $request->get('content');
        $content = EndaEditor::MarkDecode($content);
        $article->admin_id = $user->id;
        $article->category_id = $request->get('category_id');
        $article->title = $request->get('title');
        $article->description = $request->get('description');
        $article->content = $content;
        $article->markdown = $request->get('content');
        $article->status = strtolower($request->get('status'));
        $article->is_front = $request->get('is_front');
        $article->save();
        $article->tags()->detach();
        if ($tag = $request->get('tag')) {
            $this->DealTag($tag, $article);
        }

        return redirect(route('admin.articles.show', $id));
    }
    public function show($id)
    {
        $user = $this->user();
        $article = $user->articles()->find($id);
        if (!$article) {
            abort(404);
        }

        return view('admin.article.show', compact('article'));
    }

    public function destory($id)
    {
        $user = $this->user();
        $article = $user->articles()->find($id);

        if (!$article) {
            abort(404);
        }
        $article->delete();

        return redirect(route('admin.articles.index'));
    }

    public function updateStatus($id, Request $request)
    {
        $user = $this->user();
        $article = $user->articles()->find($id);

        if (!$article) {
            abort(404);
        }

        if ($request->get('is_front') && in_array($request->get('is_front'), [0, 1])) {
            $article->is_front = $request->get('is_front');
        }
        if ($request->get('status') && in_array($request->get('status'), ['active', 'inactive'])) {
            $article->status = strtolower($request->get('status'));
        }

        $article->save();

        return redirect(route('admin.articles.index'));
    }

    public function DealTag($tag, $article)
    {
        $tag = explode(',', $tag);
        $tags = array_filter($tag);
        $tagIds = [];

        foreach ($tags as $k => $t) {
            if ($t) {
                if ($modelTag = Tag::where('name', 'like', $t)->first()) {
                    $tagIds[] = $modelTag->id;
                } else {
                    $newModelTag = new Tag();
                    $newModelTag->name = $t;
                    $newModelTag->save();
                    $tagIds[] = $newModelTag->id;
                }
            }
        }

        $article->tags()->attach($tagIds);
    }
}
