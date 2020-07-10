<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostReuest;
use App\Http\Services\PostService;
use App\Models\Post;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $user = Auth::user();
        return view('posts', ['posts' => Post::with('user')->get(), 'user' => $user]);
    }

    public function show(Post $post,  \Illuminate\Http\Request $request)
    {
        $user = $request->user();
        if (!$user || $user->id !== $post->user_id){
            return redirect('/posts');
        }
        return view('postsinfo', ['post' => $post]);
    }

    public function store(CreatePostRequest $request)
    {
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

    public function update(Post $post, UpdatePostReuest $request)
    {
        $user = $request->user();
        if (!$user || $user->id !== $post->user_id){
            return redirect('/posts');
        }
        $validatedData = $request->validated();

        if (!$validatedData){
            return redirect('/posts');
        }
        if ($newTitle=Arr::get($validatedData, 'title')){
            $post->title = $newTitle;
        }
        if ($newDescription = Arr::get($validatedData, 'description')){
            $post-> description = $newDescription;
        }
        $post -> save();
        return redirect('/posts');
    }

    public function destroy(Post $post, \Illuminate\Http\Request $request )
    {
        $user = $request->user();
        if (!$user || $user->id !== $post->user_id) {
            return redirect('/posts');
        }
        $post->delete();
        return redirect('/posts');

    }

    public function paginate()
    {
        $posts = Post::paginate(5);

        return view('posts', compact('posts'));
    }



    public function like(int $postId, Request $request)
    {
        if (!($user = $request->user())) {
            return response()->json(['error' => true, 'message' => "Unauth!"], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['status' => $this->PostServices->setLike($postId, $user)]);
    }
}
