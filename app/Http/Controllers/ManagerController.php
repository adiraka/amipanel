<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Amipanel\Http\Requests;

class ManagerController extends Controller
{
    public function getHome()
    {
        return view('manager.home');
    }
}
