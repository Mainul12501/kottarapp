<?php

namespace Database\Factories;

use App\Models\Admin\JobPost;
use App\Models\Admin\JobPostFile;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobPostFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobPostFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_url' => $this->faker->text(191),
            'file_type' => $this->faker->text(191),
            'file_size' => $this->faker->randomNumber(0),
            'job_post_id' => JobPost::factory(),
        ];
    }
}
