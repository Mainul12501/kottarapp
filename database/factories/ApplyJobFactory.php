<?php

namespace Database\Factories;

use App\Models\Admin\ApplyJob;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyJobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplyJob::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proposal_text' => $this->faker->text,
            'budget_proposal' => $this->faker->randomNumber(0),
            'first_time_proposal_submit' => $this->faker->numberBetween(0, 127),
            'project_starting_date' => $this->faker->dateTime,
            'project_ending_date' => $this->faker->dateTime,
            'is_selected_for_project' => $this->faker->numberBetween(0, 127),
            'status' => $this->faker->numberBetween(0, 127),
            'job_post_id' => \App\Models\JobPost::factory(),
            'freelancer_user_id' => \App\Models\User::factory(),
        ];
    }
}
