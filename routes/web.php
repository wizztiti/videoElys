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

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Authentification
Auth::routes();
Route::get('/auth/confirm/{id}/{token}', 'Auth\RegisterController@registerConfirm');

// Affichage liste des articles
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/category:{category}', 'PostController@indexCategory')->name('blog.category.list');
Route::get('/blog/tag:{tag}', 'PostController@indexTag')->name('blog.tag.list');

// Affichage d'un article
Route::get('/blog/{category}/{post}', 'PostController@show')->name('blog.post');


// Affichage liste des formations
Route::get('/formation', 'FormationController@index')->name('formation.list');
Route::get('/formation/category:{category}', 'FormationController@indexCategory')->name('formation.category.list');
Route::get('/formation/tag:{tag}', 'FormationController@indexTag')->name('formation.tag.list');

// Affichage d'une formation
Route::get('/formation/{category}/{formation}', 'FormationController@show')->name('formation.show');



// Affichage d'un chapitre de formation
Route::get('/formation/{category}/{formation}/{chapter}', 'ChapterController@show')->name('chapter.show');


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/

Route::name('admin')->prefix('admin')->get('/', 'Admin\AdminController@index');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('post', 'Admin\PostController');
    Route::resource('video', 'Admin\VideoController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('formation', 'Admin\FormationController');
    Route::resource('chapter', 'Admin\ChapterController');
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
