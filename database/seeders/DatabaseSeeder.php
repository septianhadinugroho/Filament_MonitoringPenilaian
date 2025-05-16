<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Guru
        $guru = User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru@example.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        // Siswa
        $siswa = User::create([
            'name' => 'Siswa Contoh',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // Mata Pelajaran
        $matematika = MataPelajaran::create([
            'nama' => 'Matematika',
            'deskripsi' => 'Pelajaran tentang angka dan logika',
        ]);

        $ipa = MataPelajaran::create([
            'nama' => 'IPA',
            'deskripsi' => 'Pelajaran tentang ilmu pengetahuan alam',
        ]);

        // Kelas
        $kelas10 = Kelas::create([
            'nama' => 'Kelas 10',
            'deskripsi' => 'Kelas 10 SMA',
        ]);

        $kelas11 = Kelas::create([
            'nama' => 'Kelas 11',
            'deskripsi' => 'Kelas 11 SMA',
        ]);

        // Hubungkan siswa dengan kelas
        $siswa->kelas()->attach($kelas10);

        // Buat penilaian contoh
        \App\Models\Penilaian::create([
            'siswa_id' => $siswa->id,
            'mata_pelajaran_id' => $matematika->id,
            'guru_id' => $guru->id,
            'nilai' => 85,
            'komentar' => 'Sangat baik dalam memahami konsep',
            'tanggal' => now(),
            'jenis_penilaian' => 'UTS',
        ]);

        \App\Models\Penilaian::create([
            'siswa_id' => $siswa->id,
            'mata_pelajaran_id' => $ipa->id,
            'guru_id' => $guru->id,
            'nilai' => 78,
            'komentar' => 'Perlu meningkatkan pemahaman praktikum',
            'tanggal' => now(),
            'jenis_penilaian' => 'UTS',
        ]);
    }
}