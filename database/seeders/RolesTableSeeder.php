<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Student',
                'slug'  => str_replace(' ', '-', 'Student')
            ],
            [
                'id'    => 2,
                'title' => 'SME',
                'slug'  => str_replace(' ', '-', 'SME')
            ],
            [
                'id'    => 3,
                'title' => 'Admin',
                'slug'  => str_replace(' ', '-', 'Admin')
            ],
            [
                'id'    => 4,
                'title' => 'Trainer',
                'slug'  => str_replace(' ', '-', 'Trainer')
            ],
            [
                'id'    => 5,
                'title' => 'Super Admin',
                'slug'  => str_replace(' ', '-', 'Super Admin')
            ],
        ];

        Role::insert($roles);
    }
}
