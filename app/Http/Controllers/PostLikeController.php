<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;

class PostLikeController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        return view('home', ['posts' => $this->postService->getPosts($request->user())]);
    }

    public function like(int $postId, Request $request)
    {
        if (!($user = $request->user())) {
            return response()->json(['error' => true, 'message' => "Unauth!"], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['status' => $this->postService->setLike($postId, $user)]);
    }
}
