<?php

namespace Database\Factories;

use App\Models\Admin\SkillCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SkillCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
