<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Amipanel\Http\Requests;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('admin.home');
    }
}
