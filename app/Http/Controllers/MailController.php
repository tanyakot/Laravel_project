<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function send()
    {
        $to_name = 'Blog Blog';
        $to_email = 'tanyakotol5@gmail.com';
        $data = ['user' => 'Tanya'];
        \Illuminate\Support\Facades\Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Welcome to blog!");
            $message->from("tanyakotol5@gmail.com", "Blog Blog");
        });
    }
}
