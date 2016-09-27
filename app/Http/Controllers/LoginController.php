<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Sentinel;
use Amipanel\User;
use Amipanel\Http\Requests;

class Logincontroller extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
                'email' => $request->email,
                'password' => $request->password,
        ];

        if (Sentinel::authenticate($credentials)) {
            $user = Sentinel::getUser();
            $admin = Sentinel::findRoleBySlug('admin');
            $member = Sentinel::findRoleBySlug('member');
            $author = Sentinel::findRoleBySlug('manager');

            if ($user->inRole($admin)) {
                return redirect()->route('admin');
            } elseif ($user->inRole($member)) {
                return redirect()->route('member');
            } else if ($user->inRole($manager)) {
                return redirect()->route('manager');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('login');
    }
}
