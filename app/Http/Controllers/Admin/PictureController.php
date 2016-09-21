<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Picture;

class PictureController extends BaseController
{
    public function index(Request $request)
    {

        $user = $this->user();

        $name = $request->get('name');
        $status = $request->get('status');
        $searchColumns = ['name', 'status'];
        $pictuteNames =$user->pictures;
        $attachments ='';

        if($name && $status){
            $pictureName = $user->pictures()
                    ->where('name',$name)
                    ->where('status',$status)
                    ->first();
            if($pictureName){
                $attachments = $pictureName->attachments;
            }
        }else {
            $attachments = $user->attachments()->where('attachable_type','App\Models\Picture')->get();
        }

        return view('admin.picture.index', compact('pictuteNames','attachments','searchColumns'));
    }
}
