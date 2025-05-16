<?php

namespace App\Filament\Guru\Widgets;

use App\Models\Penilaian;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatistikKelas extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSiswa = User::siswa()->count();
        $totalNilai = Penilaian::where('guru_id', Auth::id())->count();
        $rataRataKelas = Penilaian::where('guru_id', Auth::id())->avg('nilai');
        
        return [
            Stat::make('Total Siswa', $totalSiswa)
                ->description('Jumlah siswa di sekolah')
                ->color('primary'),
            Stat::make('Total Penilaian', $totalNilai)
                ->description('Jumlah penilaian yang telah diberikan')
                ->color('success'),
            Stat::make('Rata-rata Kelas', number_format($rataRataKelas, 2))
                ->description('Nilai rata-rata kelas Anda')
                ->color($rataRataKelas >= 75 ? 'success' : ($rataRataKelas >= 50 ? 'warning' : 'danger')),
        ];
    }
}