<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Skill_name' => $this->faker->text(255),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'skill_category_id' => \App\Models\SkillCategory::factory(),
            'skill_sub_category_id' => \App\Models\SkillSubCategory::factory(),
        ];
    }
}
