<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';
    protected $primaryKey = 'id';   
    protected $fillable = [
        'siswa_id',
        'kandidat_id',
        'periode_id',
        'tanggal_pemilihan',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }

    // Definisikan relasi dengan model Candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'kandidat_id');
    }

    // Definisikan relasi dengan model ElectionPeriod
    public function period()
    {
        return $this->belongsTo(Period::class, 'periode_id');
    }
}
