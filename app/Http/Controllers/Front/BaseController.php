<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class BaseController extends Controller
{
    protected $user;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function verificateUser($customPath = null)
    {
        if (!$customPath) {
            $user = Admin::find(1);
        } else {
            $user = Admin::where('blog_url', '=', $customPath)->first();
        }

        return $user;
    }
}
