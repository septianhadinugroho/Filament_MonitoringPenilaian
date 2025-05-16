<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->role === 'admin',
            'guru' => $this->role === 'guru',
            'siswa' => $this->role === 'siswa',
            default => false,
        };
    }

    // Relasi untuk siswa
    public function nilaiSebagaiSiswa()
    {
        return $this->hasMany(Penilaian::class, 'siswa_id');
    }

    // Relasi untuk guru
    public function nilaiSebagaiGuru()
    {
        return $this->hasMany(Penilaian::class, 'guru_id');
    }

    // Relasi kelas
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa', 'siswa_id', 'kelas_id');
    }

    // Scope untuk role
    public function scopeGuru($query)
    {
        return $query->where('role', 'guru');
    }

    public function scopeSiswa($query)
    {
        return $query->where('role', 'siswa');
    }

    
}