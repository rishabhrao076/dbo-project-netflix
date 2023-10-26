<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillingHistory>
 */
class BillingHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->uuid(),
            'billing_address' => fake()->address(),
            'billing_date' => fake()->dateTimeBetween('-1 year','now'),
        ];
    }
}
