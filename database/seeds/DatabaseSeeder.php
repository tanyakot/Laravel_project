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
            $this->call(CreatePostLikesSeed::class);
            $this->call(CreateUsersSeed::class);
    }
}
