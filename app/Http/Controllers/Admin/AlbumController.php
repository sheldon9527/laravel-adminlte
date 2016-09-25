<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Album\StoreRequest;
use App\Model\Picture;

class AlbumController extends BaseController
{
    // public function index(Request $request)
    // {
    //
    //     $user = $this->user();
    //
    //     $name = $request->get('name');
    //     $status = $request->get('status');
    //     $searchColumns = ['name', 'status'];
    //     $pictuteNames =$user->pictures;
    //     $attachments ='';
    //
    //     if($name && $status){
    //         $pictureName = $user->pictures()
    //                 ->where('name',$name)
    //                 ->where('status',$status)
    //                 ->first();
    //         if($pictureName){
    //             $attachments = $pictureName->attachments;
    //         }
    //     }else {
    //         $attachments = $user->attachments()->where('attachable_type','App\Models\Picture')->get();
    //     }
    //
    //     return view('admin.album.index', compact('pictuteNames','attachments','searchColumns'));
    // }
    //

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
        $album->save();

        return redirect(route('admin.albums.index'));
    }



    public function destory($id)
    {
        $user = $this->user();
        $article = $user->albums()->find($id);

        if (!$article) {
            abort(404);
        }
        $article->delete();

        return redirect(route('admin.albums.index'));
    }
}
