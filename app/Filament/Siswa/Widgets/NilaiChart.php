<?php

namespace App\Filament\Widgets\Siswa;

use App\Models\Penilaian;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class NilaiChart extends ChartWidget
{
    protected static ?string $heading = 'Perkembangan Nilai';

    protected function getData(): array
    {
        $nilai = Penilaian::where('siswa_id', Auth::id())
            ->orderBy('tanggal')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Nilai',
                    'data' => $nilai->pluck('nilai'),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => '#3b82f6',
                    'tension' => 0.1,
                ],
            ],
            'labels' => $nilai->pluck('mataPelajaran.nama'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}