<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'visi', 'misi', 'jargon', 'photo', 'period_id'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'kandidat_id');
    }
}
