<?php

namespace App\Filament\Guru\Widgets;

use App\Models\Penilaian;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class DistribusiNilai extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Nilai Kelas';

    protected function getData(): array
    {
        $nilai = Penilaian::where('guru_id', Auth::id())->get();
        
        $ranges = [
            '90-100' => 0,
            '80-89' => 0,
            '70-79' => 0,
            '60-69' => 0,
            '0-59' => 0,
        ];
        
        foreach ($nilai as $n) {
            $value = $n->nilai;
            if ($value >= 90) $ranges['90-100']++;
            elseif ($value >= 80) $ranges['80-89']++;
            elseif ($value >= 70) $ranges['70-79']++;
            elseif ($value >= 60) $ranges['60-69']++;
            else $ranges['0-59']++;
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => array_values($ranges),
                    'backgroundColor' => [
                        '#10b981', // green
                        '#3b82f6', // blue
                        '#f59e0b', // yellow
                        '#ef4444', // red
                        '#64748b', // slate
                    ],
                ],
            ],
            'labels' => array_keys($ranges),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}