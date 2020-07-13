<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', "PostController")-> middleware('auth');

Route::get('posts', 'PostController@paginate');

//Route::get('mail', 'MailController@send');

Route::post('/posts/{post_id}/like', 'PostsController@like')->name('like');

Route::get('/send-email', 'FeedbackController@send');

Route::get('/about', function (){
    return view('about');
});
