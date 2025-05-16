<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('users');
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajarans');
            $table->foreignId('guru_id')->constrained('users');
            $table->decimal('nilai', 5, 2);
            $table->text('komentar')->nullable();
            $table->date('tanggal');
            $table->string('jenis_penilaian'); // UTS, UAS, Tugas, dll.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};