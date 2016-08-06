<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreRequest;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        $user = $this->user();

        $roots = $user->categories()->orderBy('weight', 'desc')->get();

        return view('admin.categories.index', compact('roots'));
    }

    public function store(StoreRequest $request)
    {
        $category = Category::create($request->only(['name']));

        $category->admin_id = $this->user()->id;
        $weight = $user->categories()->max('weight');
        $category->weight = $weight + 1;
        $category->save();

        return redirect(route('admin.categories.index'));
    }

    public function update($id, Request $request)
    {
        $user = $this->user();

        $category = $user->categories()->find($id);

        if (!$category) {
            abort(404);
        }

        // if ($operate = $request->get('operate')) {
        //     $weight = $category->weight;
        //     $symbol = ['up' => '>', 'down' => '<'];
        //     $operate = ['up' => 'asc', 'down' => 'desc'];
        //
        //     $operateCategory = Category::where('weight', $symbol[$orderby], $weight)->orderBy('weight', $operate[$orderby])->first();
        //     if ($operateCategory) {
        //         dd($operateCategory);
        //         $category->weight = $operateCategory->weight;
        //         $operateCategory->weight = $weight;
        //         $category->save();
        //         $operateCategory->save();
        //
        //         return response()->json(['success' => 1]);
        //     }
        // }

        if ($name = $request->get('name')) {
            $category->name = $name;

            $category->save();
        }

        return redirect(route('admin.categories.index'));
    }

    public function destroy($id)
    {
        $user = $this->user();

        $category = $user->categories()->find($id);

        if (!$category) {
            abort(404);
        }

        $category->articles()->update(['articles.category_id' => 0]);

        $category->delete();

        return redirect(route('admin.categories.index'));
    }
}
