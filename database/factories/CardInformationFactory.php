<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardInformation>
 */
class CardInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => strtoupper(fake()->name()),
            'cvv' => fake()->numberBetween(111,999),
            'card_number' => fake()->creditCardNumber(),
            'expiry' => fake()->creditCardExpirationDate(),
        ];
    }
}
