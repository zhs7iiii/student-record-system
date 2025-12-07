<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'short_name' => fake()->randomLetter.fake()->randomLetter.'-'.fake()->randomDigit.fake()->randomDigit,
            'full_name' => implode('-',fake()->words(2))
        ];
    }
}
