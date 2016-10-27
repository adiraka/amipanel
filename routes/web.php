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

Route::get('/testimage', function(){
    $img = Image::make('photo/photo_test.jpg')->resize(500, 500);

    return $img->response('jpg');
});

// Logout
Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::group(['middleware' => ['redirAdmin', 'redirMember', 'redirManager']], function(){
    // Root Redirect
    Route::get('/', function(){
        return redirect()->route('login');
    });
    // Login
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@postLogin']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
    // Root Redirect
    Route::get('/', function(){
        return redirect()->route('admin');
    });
    // Admin Home
    Route::get('/home', ['as' => 'admin', 'uses' => 'AdminController@getHome']);
    // Admin Profile
    Route::get('/profile', ['as' => 'adminProfile', 'uses' => 'EmployeeController@getProfile']);
    // Employee's Management
    Route::get('/employee', ['as' => 'addEmployee', 'uses' => 'EmployeeController@getAddEmployee']);
    Route::post('/employee', ['as' => 'addEmployee', 'uses' => 'EmployeeController@postAddEmployee']);
    Route::get('/employee/view', ['as' => 'viewEmployee', 'uses' => 'EmployeeController@viewEmployee']);
    Route::get('/employee/{id}', ['as' => 'getEmployee', 'uses' => 'EmployeeController@getEmployee']);
    Route::put('/employee/{id}', ['as' => 'editEmployee', 'uses' => 'EmployeeController@editEmployee']);
    Route::get('employee/{id}/delete', ['as' => 'alertEmployee', 'uses' => 'EmployeeController@alertEmployee']);
    Route::delete('/employee/{id}/delete', ['as' => 'deleteEmployee', 'uses' => 'EmployeeController@deleteEmployee']);
});

Route::group(['middleware' => ['auth', 'member'], 'prefix' => 'member'], function(){
    // Root Redirect
    Route::get('/', function(){
        return redirect()->route('member');
    });
    // Member Home
    Route::get('/home', ['as' => 'member', 'uses' => 'MemberController@getHome']);
    // Member Profile
    Route::get('/profile', ['as' => 'memberProfile', 'uses' => 'EmployeeController@getProfile']);
});

Route::group(['middleware' => ['auth', 'manager'], 'prefix' => 'manager'], function(){
    // Root Redirect
    Route::get('/', function(){
        return redirect()->route('manager');
    });
    // Manager Home
    Route::get('/home', ['as' => 'manager', 'uses' => 'ManagerController@getHome']);
    // Manager Profile
    Route::get('/profile', ['as' => 'managerProfile', 'uses' => 'EmployeeController@getProfile']);
});
