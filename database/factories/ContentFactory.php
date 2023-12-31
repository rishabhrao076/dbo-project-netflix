<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(1,5),true),
            'content_type' => fake()->numberBetween(1,3), // 1 is Movie, 2 is TV Show, 3 is Interactive/Game
            'description' => fake()->paragraph(),
            'director' => fake()->name(),
            'rating' => fake()->numberBetween(1,10)
        ];
    }
}
