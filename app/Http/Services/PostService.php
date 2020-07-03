<?php


namespace App\Http\Services;


class PostService
{
    public function getPosts(?User $user = null): array
    {
        $posts =  Post::query()->with('likes')->get()->toArray();

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
            DB::table('post_likes')->where('user_id', $user->id)
                ->where('post_id', $postId)
                ->delete();

            return false;
        }

        DB::table('post_likes')->insert([
            'user_id' => $user->id,
            'post_id' => $postId
        ]);

        return true;
    }
}
