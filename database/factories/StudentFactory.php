<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nis = $this->faker->unique()->regexify('[0-9]{10}');
        $name = $this->faker->name();
        return [
            'name' => $name,
            'kelas' => $this->faker->regexify('(X|XI|XII) (IPS|IPA|AGAMA) [1-3]'),
            'email' => str_replace(' ', '', $name) . '@example.com',
            'nis' => $nis,
            'status' => $this->faker->randomElement(['sudah', 'belum']),
            'password' => Hash::make($nis),
            'role' => 'user',
        ];
    }
}
