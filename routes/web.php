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

/*Route::get('/', function () {
    return view('home');
});*/

// Authentification
Auth::routes();
Route::get('/auth/confirm/{id}/{token}', 'Auth\RegisterController@registerConfirm');

// Affichage liste  des articles
Route::get('/', 'PostController@index')->name('home');
Route::get('post/category:{category}', 'PostController@indexCategory')->name('post.category.list');
Route::get('post/tag:{tag}', 'PostController@indexTag')->name('post.tag.list');

// Affichage d'un article
Route::get('/post/{category}/{slug}', 'PostController@show')->name('post');


// BACKEND
Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('category', 'Admin\CategoryController');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('post', 'Admin\PostController');
});
Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('video', 'Admin\VideoController');
});
Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('tag', 'Admin\TagController');
});
Route::get('admin/tag/{slug}', 'Admin\PostController@tag')->name('admin.posts.tag');



// via Middleware Auth

// ACCOUNT USER
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function() {
    Route::get('/my-account', 'AccountController@accueil')->name('my-account ');
    Route::get('userBoard.passwordForm', 'AccountController@showFormPassword');
    Route::post('userBoard.passwordForm', 'AccountController@updatePassword');
});
