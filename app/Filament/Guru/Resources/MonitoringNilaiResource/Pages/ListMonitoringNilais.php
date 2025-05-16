<?php

namespace App\Filament\Guru\Resources\MonitoringNilaiResource\Pages;

use App\Filament\Guru\Resources\MonitoringNilaiResource\MonitoringNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringNilais extends ListRecords
{
    protected static string $resource = MonitoringNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
