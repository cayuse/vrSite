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


// These routes should be available to anyone, even if not logged in
Route::get('/', function () {
    return view('welcome');
});

Route::get('/j/{parameter}', 'JoinController@index');


// These should route to things only
Route::get('classes', function () {
    return view('classes');
});

Route::resource('course', 'CourseController',
    ['except' => ['show', 'destroy']]);

Route::resource('avatars', 'AvatarController',
    ['except' => ['show']]);

Route::resource('users', 'UserController',
    ['except' => ['show', 'destroy', 'create']]);

Route::get('profile', 'UserController@profile');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
