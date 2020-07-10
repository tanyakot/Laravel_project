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
        $to_name = 'Tanya Nikolaevna';
        $to_email = 'tanya@gmail.com';
        $data = ['user' => 'Tanya'];
        \Illuminate\Support\Facades\Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Welcome to blog!");
            $message->from("tanya@gmail.com", "Blog Email");
        }
    }
}
