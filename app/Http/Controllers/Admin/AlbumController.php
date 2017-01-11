<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Album\{StoreRequest,UpdateRequest};
use App\Models\Picture;

class AlbumController extends BaseController
{
    public function index(Request $request)
    {

        $user = $this->user();
        $name = $request->get('name');
        $status = $request->get('status');
        $searchColumns = ['name', 'status'];
        $pictuteNames =$user->albums;

        return view('admin.album.index', compact('pictuteNames','searchColumns'));
    }


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


    public function update($id,UpdateRequest $request)
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
