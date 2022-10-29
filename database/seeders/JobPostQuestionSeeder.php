<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\JobPostQuestion;

class JobPostQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobPostQuestion::factory()
            ->count(5)
            ->create();
    }
}
