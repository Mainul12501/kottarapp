<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\TradeLicenseFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class TradeLicenseFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TradeLicenseFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_url' => $this->faker->text(255),
            'file_type' => $this->faker->text(255),
            'file_size' => $this->faker->randomNumber(0),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
