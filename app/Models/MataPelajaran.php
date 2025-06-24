<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    public function penilaian()
    {
        return $this->hasMany(\App\Models\Penilaian::class, 'mata_pelajaran_id');
    }
}