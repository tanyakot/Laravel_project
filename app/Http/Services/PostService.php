<?php


namespace App\Http\Services;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostReuest;
use App\Models\Post;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class PostService

{

    public function storeCreatePost(CreatePostRequest $request)
    {
       $validatedData = $request->validated();
       $post = new Post();
       $post->title = Arr::get($validatedData, 'title', 'Unknown');
       $post->description = Arr::get($validatedData, 'description', 'Unknown');
       $post->user_id = $request->user()->id;
      $post->save();

        return $post;

    }

    public function updatePost(Post $post, UpdatePostReuest $request)
    {

        if ($newTitle=Arr::get($validatedData, 'title')){
            $post->title = $newTitle;
        }
        if ($newDescription = Arr::get($validatedData, 'description')){
            $post-> description = $newDescription;
        }
        $post -> save();
        return $post;
    }


    public function destroyPost(Post $post, \Illuminate\Http\Request $request )
    {
        $post->delete();
        return $post;

    }
    public function getPosts(?User $user = null)
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(15);
        foreach ($posts as &$post) {
            $count = 0;
            $iLiked = false;

            foreach ($post['likes'] as $like) {
                $count++;
                if ($user && $iLiked === false && $like['user_id'] == $user->id) {
                    $iLiked = true;
                }
            }

            $post['likes'] = $count;
            $post['liked_by_me'] = $iLiked;
        }

        return $posts;
    }


    public function setLike(int $postId, User $user): bool
    {

        $like = DB::table('post_likes')
            ->where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if (!is_null($like)) {
            DB::table('post_likes')
                ->where('user_id', $user->id)
                ->where('post_id', $postId)
                ->delete();

            return false;
        }

        DB::table('post_likes')
            ->insert([
                'user_id' => $user->id,
                'post_id' => $postId
            ]);

        return true;
    }
}
