<?php


namespace App\Http\Controllers;


//use App\Http\Requests\CreatePostRequest;
//use App\Models\Post;
//use App\Models\User;
//use Illuminate\Support\Arr;

class PaginationController extends Controller
{
    public function posts()
    {
        $posts=Post::with('user')->get();
        $posts=Post::paginate(5);
        // $posts=Post::all();
        //dd($posts);
        return view('posts', ['posts'=> $posts]);
    }

}
