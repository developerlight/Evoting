<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil semua ID dari tabel yang relevan
        $studentIds = Student::pluck('id')->toArray();
        $candidateIds = Candidate::pluck('id')->toArray();
        $periodIds = Period::pluck('id')->toArray();

        return [
            'siswa_id' => fake()->randomElement($studentIds),
            'kandidat_id' => fake()->randomElement($candidateIds),
            'periode_id' => fake()->randomElement($periodIds),
            'tanggal_pemilihan' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
