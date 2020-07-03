<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{

    public function send()
    {
        $to_name = 'Tanya Nikolaevna';
        $to_email = 'tanya@gmail.com';
        $data = ['user' => 'Tanya'];
        \Illuminate\Support\Facades\Mail::send('emails.mail',$data, function ($message) use ($to_name, $to_email){
            $message->to($to_email,$to_name)
                ->subject("Welcome to blog!");
            $message->from("tanya@gmail.com" , "Blog Email");
        }
    }
}
