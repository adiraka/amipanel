<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::group(['middleware' => ['redirAdmin', 'redirMember', 'redirManager']], function(){
    Route::get('/', function(){
        return redirect()->route('login');
    });
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@postLogin']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
    Route::get('/', function(){
        return redirect()->route('admin');
    });
    Route::get('/home', ['as' => 'admin', 'uses' => 'AdminController@getHome']);
});

Route::group(['middleware' => ['auth', 'member'], 'prefix' => 'member'], function(){
    Route::get('/', function(){
        return redirect()->route('member');
    });
    Route::get('/home', ['as' => 'member', 'uses' => 'MemberController@getHome']);
});

Route::group(['middleware' => ['auth', 'manager'], 'prefix' => 'manager'], function(){
    Route::get('/', function(){
        return redirect()->route('manager');
    });
    Route::get('/home', ['as' => 'manager', 'uses' => 'ManagerController@getHome']);
});
