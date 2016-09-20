<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Picture;

class PictureController extends BaseController
{
    public function index(Request $request)
    {
        $user = $this->user();
        $pictuteNames =$user->pictures();
        
        $names = $pictuteNames;

        return view('admin.picture.index', compact('pictuteNames'));
    }
}
