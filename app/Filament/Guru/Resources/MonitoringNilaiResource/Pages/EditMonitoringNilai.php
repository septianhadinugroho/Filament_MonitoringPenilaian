<?php

namespace App\Filament\Guru\Resources\MonitoringNilaiResource\Pages;

use App\Filament\Guru\Resources\MonitoringNilaiResource\MonitoringNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringNilai extends EditRecord
{
    protected static string $resource = MonitoringNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
