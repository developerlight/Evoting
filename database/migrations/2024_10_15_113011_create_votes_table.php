<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('students');
            $table->foreignId('kandidat_id')->constrained('candidates');
            $table->foreignId('periode_id')->constrained('periods');
            $table->dateTime('tanggal_pemilihan');
            $table->timestamps();

            // Mencegah siswa memilih lebih dari sekali di satu periode
            $table->unique(['siswa_id', 'periode_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
