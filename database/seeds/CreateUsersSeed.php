<?php

use Illuminate\Database\Seeder;

class CreateUsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[];
        for ($i=0; $i<100; $i++){
            $rnd= time() . md5(rand(1,100000)) . rand(1,100000) . rand(1,10000);
            $users[]=[
                'name'=> 'Dummy User',
                'email'=> "test+$rnd@gmail.com",
                'password' => \Illuminate\Support\Facades\Hash::make('useruser')

            ];
        }
        \App\Models\User::insert($users);
    }
}
