<?php

namespace Database\Seeders;

use App\Models\Admin\JobPostFile;
use Illuminate\Database\Seeder;

class JobPostFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobPostFile::factory()
            ->count(5)
            ->create();
    }
}
