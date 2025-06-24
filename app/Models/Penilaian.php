<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'guru_id',
        'nilai',
        'komentar',
        'tanggal',
        'jenis_penilaian',
    ];

    public function siswa()
    {
        return $this->belongsTo(\App\Models\User::class, 'siswa_id');
    }
    
    public function guru()
    {
        return $this->belongsTo(\App\Models\User::class, 'guru_id');
    }
    
    public function mataPelajaran()
    {
        return $this->belongsTo(\App\Models\MataPelajaran::class);
    }
}