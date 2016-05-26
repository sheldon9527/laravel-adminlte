<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $user;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
