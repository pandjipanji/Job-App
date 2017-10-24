<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('templates.home');
});

//users
Route::resource('users','UsersController');
Route::put('submission/{id}','UsersController@app_submission')->name('app_submission');

//admin
Route::resource('admin','AdminController');
Route::get('/show/{id}','AdminController@show_user')->name('show_user');
Route::get('/download/{file}','AdminController@download')->name('file_download');
//ajax
Route::post('/status/get','AdminController@status_get')->name('get_status');
Route::post('/change_status/{id}','AdminController@change_status')->name('change_status');


Route::get('signup', 'SignupController@signup')->name('signup');
Route::post('signup', 'SignupController@signup_store')->name('signup.store');

Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');