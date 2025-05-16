<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_siswa', 'kelas_id', 'siswa_id');
    }
}