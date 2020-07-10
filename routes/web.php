<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', "PostController")-> middleware('auth');

Route::get('posts', 'PostController@paginate');

Route::post('posts/{post_id}/like', 'PostLikeController@like')-> name('Like');



//Route::get('mail', 'MailController@sendEmail');


Route::get('mail', function (){
        $to_name = 'Tanya Nikolaevna';
        $to_email = 'tanya@gmail.com';
        $data = ['user' => 'Tanya'];
        \Illuminate\Support\Facades\Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Welcome to blog!");
            $message->from("tanya@gmail.com", "Blog Email");
        });
});
