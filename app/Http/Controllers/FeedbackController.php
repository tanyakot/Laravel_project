<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostReuest;
use App\Services\LikeService;
use App\Models\Post;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{


    public function send()
    {
        $comment = 'Это сообщение отправлено из формы обратной связи';
        $toEmail = "tanyakotol5@gmail.com";
        Mail::to($toEmail)->send(new FeedbackMail($comment));
        return 'Сообщение отправлено на адрес ' . $toEmail;
    }
}
