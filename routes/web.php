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
    return view('home');
});

Auth::routes();
Route::get('/auth/confirm/{id}/{token}', 'Auth\RegisterController@registerConfirm');

Route::prefix('admin')->group(function () {
    Route::resource('category', 'Admin\CategoryController');
});
Route::prefix('admin')->group(function () {
    Route::resource('post', 'Admin\PostController');
});
Route::prefix('admin')->group(function () {
    Route::resource('video', 'Admin\VideoController');
});
Route::prefix('admin')->group(function () {
    Route::resource('tag', 'Admin\TagController');
});

Route::get('/tag/{slug}', 'Admin\PostController@tag')->name('posts.tag');

Route::get('/home', 'HomeController@index')->name('home');
