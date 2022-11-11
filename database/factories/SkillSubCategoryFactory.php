<?php

namespace Database\Factories;

use App\Models\Admin\SkillCategory;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SkillSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Sub_category_name' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'skill_category_id' => SkillCategory::factory(),
        ];
    }
}
