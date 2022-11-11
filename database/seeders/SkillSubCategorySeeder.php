<?php

namespace Database\Seeders;

use App\Models\Admin\SkillSubCategory;
use Illuminate\Database\Seeder;

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
