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


Route::get('/admin', 'AdminController@admin')->middleware('admin')->name('user.list');

Route::get('/admin/posts', 'AdminController@adminposts')->middleware('admin')->name('post.list');

Route::get('/admin/comments', 'AdminController@admincomments')->middleware('admin')->name('comment.list');

Route::delete('admin/destroyuser/{user}', 'AdminController@destroyUser')->middleware('admin');

Route::delete('/destroypost/{post}', 'AdminController@destroyPost')->middleware('admin');

Route::delete('/destroycomment/{comment}', 'AdminController@destroyComment')->middleware('admin');

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

Route::get('posts/{post}/comments', 'CommentController@index');

Route::post('posts/{post}/comment', 'CommentController@store');

Route::delete('/posts/comment/delete/{comment}', 'CommentController@destroy');

Route::put('/posts/comment/edit/{comment}', 'CommentController@update')->name('comment.update');










