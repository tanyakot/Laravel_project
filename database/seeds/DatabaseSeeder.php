<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $start=

            $this->call(CreateUsersSeed::class);
        $this->call(CreatePostLikesSeed::class);
    }
}
