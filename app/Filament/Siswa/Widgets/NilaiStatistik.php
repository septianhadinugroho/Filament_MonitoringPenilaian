<?php

namespace App\Filament\Siswa\Widgets;

use App\Models\Penilaian;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class NilaiStatistik extends BaseWidget
{
    protected function getStats(): array
    {
        $nilai = Penilaian::where('siswa_id', Auth::id())->get();
        
        $rataRata = $nilai->avg('nilai');
        $tertinggi = $nilai->max('nilai');
        $terendah = $nilai->min('nilai');
        
        return [
            Stat::make('Rata-rata Nilai', number_format($rataRata, 2))
                ->description('Nilai rata-rata semua mata pelajaran')
                ->color($rataRata >= 75 ? 'success' : ($rataRata >= 50 ? 'warning' : 'danger')),
            Stat::make('Nilai Tertinggi', $tertinggi ?? '-')
                ->description('Nilai tertinggi yang diperoleh')
                ->color('success'),
            Stat::make('Nilai Terendah', $terendah ?? '-')
                ->description('Nilai terendah yang diperoleh')
                ->color($terendah >= 75 ? 'success' : ($terendah >= 50 ? 'warning' : 'danger')),
        ];
    }
}