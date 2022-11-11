<?php

namespace Database\Factories;

use App\Models\Admin\JobPost;
use App\Models\Admin\SkillCategory;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_unique_code' => $this->faker->unique->text(191),
            'project_title' => $this->faker->text,
            'project_description' => $this->faker->text,
            'budget_type' => $this->faker->numberBetween(0, 127),
            'budget' => $this->faker->randomNumber(2),
            'budget_per_hour' => $this->faker->randomNumber(2),
            'total_hour' => $this->faker->randomNumber(0),
            'total_budget_for_client' => $this->faker->randomNumber(2),
            'public_visibility' => $this->faker->numberBetween(0, 127),
            'freelancer_working_type' => $this->faker->numberBetween(0, 127),
            'preffered_freelancer_location_country' => $this->faker->text(191),
            'job_location_city' => $this->faker->text(191),
            'job_starting_date' => $this->faker->date,
            'job_starting_date_timestamp' => $this->faker->text(191),
            'job_ending_time' => $this->faker->time,
            'job_ending_time_timestamp' => $this->faker->text(191),
            'job_total_duration' => $this->faker->numberBetween(0, 8388607),
            'job_total_length' => $this->faker->numberBetween(0, 8388607),
            'estimate_project_duration_type' => $this->faker->text(191),
            'estimate_project_duration_time' => $this->faker->time,
            'estimate_project_duration_time_timestamp' => $this->faker->text(
                191
            ),
            'promotion_type' => $this->faker->numberBetween(0, 127),
            'job_post_slug' => $this->faker->text(191),
            'post_expire_date' => $this->faker->dateTime,
            'post_expire_date_timestamp' => $this->faker->text(191),
            'status' => $this->faker->numberBetween(0, 127),
            'skill_category_id' => SkillCategory::factory(),
            'skill_sub_category_id' => SkillSubCategory::factory(),
            'client_user_id' => \App\Models\User::factory(),
        ];
    }
}
