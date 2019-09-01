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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::middleware(['auth'])->group(function()
{
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('profile','UserController');
	Route::get('change-password/{id}','UserController@changePass')->name('profile.change-pass');
	Route::patch('update-password/{id}','UserController@updatePass')->name('profile.update-pass');

	Route::resource('product', 'ProductController');
});