<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_type' => fake()->numberBetween(1,3),
            'duration' => "0".rand(0,5).":".rand(0,5).rand(0,9).":".rand(0,5).rand(0,9),
            'media_title' => fake()->words(rand(1,5),true),
            'media_description' => fake()->paragraph(),
        ];
    }
}
