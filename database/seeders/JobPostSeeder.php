<?php

namespace Database\Seeders;

use App\Models\Admin\JobPost;
use Illuminate\Database\Seeder;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobPost::factory()
            ->count(5)
            ->create();
    }
}
