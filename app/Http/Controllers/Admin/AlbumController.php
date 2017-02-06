<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Album\StoreRequest;
use App\Http\Requests\Admin\Album\UpdateRequest;
use App\Models\Picture;

class AlbumController extends BaseController
{
    /**
     * [index 列表]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        $user = $this->user();
        $name = $request->get('name');
        $status = $request->get('status');
        $searchColumns = ['name', 'status'];
        $pictuteNames =$user->albums;

        return view('admin.album.index', compact('pictuteNames', 'searchColumns'));
    }

    /**
     * [store 创建]
     * @param  StoreRequest $request [description]
     * @return [type]                [description]
     */
    public function store(StoreRequest $request)
    {
        $user = $this->user();
        $album = new Picture();
        $album->admin_id = $user->id;
        $album->name = $request->get('name');
        $album->description = $request->get('description');
        $album->status = $request->get('status');
        $album->is_front = $request->get('is_front');
        $album->save();

        return redirect(route('admin.albums.index'));
    }

    /**
     * [update 更新]
     * @param  [type]        $id      [description]
     * @param  UpdateRequest $request [description]
     * @return [type]                 [description]
     */
    public function update($id, UpdateRequest $request)
    {
        $user = $this->user();
        $album = $user->albums()->find($id);
        if (!$album) {
            abort(404);
        }

        $album->name = $request->get('name');
        $album->description = $request->get('description');
        $album->status = $request->get('status');
        $album->is_front = $request->get('is_front');
        $album->save();

        return redirect(route('admin.albums.index'));
    }


    /**
     * [destory 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destory($id)
    {
        $user = $this->user();
        $album = $user->albums()->find($id);

        if (!$album) {
            abort(404);
        }
        $album->delete();

        return redirect(route('admin.albums.index'));
    }
}
