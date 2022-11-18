<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'user_details_id'=> 1,
                'name'           => 'Super Admin',
                'email'          => 'mainul125011@gmail.com',
                'password'       => bcrypt('mainul125011@gmail.com'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
