<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'PostController@getAllPosts')->name('home');
Route::get('/posts', 'PostController@getAllPosts')->name('home');
 Route::get('/add', 'PostController@newPost')->name('add');
Route::post('/posts', 'PostController@createPost');
Route::get('/posts/{id}', 'PostController@editPost');
Route::put('/posts/{id}', 'PostController@updatePost');
Route::post('/posts/like', 'LikeController@likePost');
Route::get('/user/{id}', 'PostController@getUserProfile');
Route::get('/editProfile/{id}', 'PostController@editProfile');
Route::post('/profile', 'PostController@updateProfile')->name('profile');
Route::post('/follow/user', 'PostController@follow');
// Route::get('/ajax_upload', 'PostController@index');

Route::post('/ajax_upload/action', 'PostController@action')->name('ajaxupload.action');





// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
