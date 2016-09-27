<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Amipanel\Http\Requests;

class Logincontroller extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }
}
