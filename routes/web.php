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
Route::get('/', function(){
    return redirect('login');
});

Route::group(['middleware' => ['redirAdmin', 'redirMember', 'redirManager']], function(){
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
    Route::get('/', function(){
        return redirect('admin');
    });
    Route::get('/home', ['as' => 'admin', 'uses' => 'AdminController@getHome']);
});
