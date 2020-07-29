<?php


namespace App\Http\Services;


class MailService

{
    public function sendEmail ($to_name, $to_email)
    {
        $data = ['user' => 'Tanya'];
        \Illuminate\Support\Facades\Mail::send('emails.mail',$data, function ($message) use ($to_name, $to_email) {

            $message->to($to_name, $to_email)
                ->subject("Welcome to blog!");
            $message->from("tanyakotol5@gmail.com", "Blog Email");
        });
    }
}
