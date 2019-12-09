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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/', 'PostsController@index');

Route::get('/post/{post}', 'PostsController@show');

Route::post('/post', 'PostsController@store');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/link/{user}', 'LinkController@store')->name('link.store');

Route::get('/delete-post/{post}', 'PostsController@Delete')->name('post.delete');

Route::get('/post/edit/{post}', 'PostsController@edit')->name('post.edit');

Route::patch('/post/{post}', 'PostsController@update')->name('post.update');

Route::post('/edit', 'PostsController@postEditPost')->name('edit.title');

Route::get('/delete-comment/{comment}', 'CommentController@Delete')->name('comment.delete');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');

Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('users', 'UsersController@index')->name('users.display');






