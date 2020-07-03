<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        // $posts=Post::all();
        //dd($posts);
        return view('posts', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('postsinfo', ['post' => $post]);
    }

    public function store(CreatePostRequest $request)
    {
//$title=$request->title ?? '';
        // $description=$request->description ?? '';
        //  dd($title, $description);
        //dd($request->validated());
        if (!$user = $request->user()) {
            die("user unauthorized");
        }
        $validatedData = $request->validated();
        $post = new Post();
        $post->title = Arr::get($validatedData, 'title', 'Unknown');
        $post->description = Arr::get($validatedData, 'description', 'Unknown');
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('posts');

    }

    public function update($id)
    {
        die("Update of Posts");
    }

    public function destroy($id)
    {

        die("Delete of Posts");
    }

    public function paginate()
    {

        $posts = Post::paginate(5);

        return view('posts', compact('posts'));
    }


}
