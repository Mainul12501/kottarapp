<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillSubCategory;

class SkillSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkillSubCategory::factory()
            ->count(5)
            ->create();
    }
}
