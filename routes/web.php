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

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');

Route::get('register', 'RegisterController@showRegForm')->name('register');
Route::post('register', 'RegisterController@register');


Route::group(['middleware' => ['auth']], function () {
    Route::post('create-post', 'PostController@createPost');
    Route::get('/', 'PostController@index');
    Route::post('like', 'PostController@like');
    Route::get('comments/{postId}', 'PostController@getComments');
    Route::post('comment', 'PostController@postComment');
});
