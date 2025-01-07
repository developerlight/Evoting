<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'kelas', 
        'nis', 
        'status', 
        'role', 
        'user_id'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'siswa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasVoted($periode_id)
    {
        return $this->votes()->where('periode_id', $periode_id)->exists();
    }
}
