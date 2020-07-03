<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', "PostController");

Route::get('posts', 'PostController@paginate');

Route::post('posts/{post_id}/like', 'PostLikeController@like')-> name('Like');



Route::get('mail', 'MailController@send');


