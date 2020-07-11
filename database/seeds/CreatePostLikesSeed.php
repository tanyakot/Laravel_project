<?php


class CreatePostLikesSeed extends \Illuminate\Database\Seeder
{
public function run()
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $postIds = \App\Post::query()->pluck('id');
    $userIds = \App\User::query()->where('id', '>', 1)->pluck('id');

    $postLikes = [];

    foreach ($postIds as $postId) {
        foreach ($userIds as $userId) {
            if (rand(0,1)) {
                continue;
            }

            $postLikes[] = [
                'user_id' => $userId,
                'post_id' => $postId
            ];
        }
    }

    \App\PostLike::insert($postLikes);
}
}
