<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vote::factory()->count(10)->create();
    }
}
