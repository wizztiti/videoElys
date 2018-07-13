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
    return view('index');
});

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