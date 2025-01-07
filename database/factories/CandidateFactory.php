<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'visi' => $this->faker->sentence,
            'misi' => $this->faker->sentence,
            'jargon' => $this->faker->sentence,
            'photo' => $this->faker->imageUrl(),
            'period_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
