<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'start_date' => $startDate = fake()->dateTimeBetween('-1 year', 'now'),
            'end_date' => (clone $startDate)->modify('+1 day'),
            'status' => 'ditutup',
        ];
    }
}
