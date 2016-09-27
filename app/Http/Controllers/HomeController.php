<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Amipanel\Http\Requests;

class HomeController extends Controller
{
    public function getHome()
    {
        return view('home.index');
    }
}
