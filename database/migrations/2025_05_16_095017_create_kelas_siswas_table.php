<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kelas_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('siswa_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_siswa');
    }
};