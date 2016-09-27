<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Amipanel\Http\Requests;

class MemberController extends Controller
{
    public function getHome()
    {
        return view('member.home');
    }
}
