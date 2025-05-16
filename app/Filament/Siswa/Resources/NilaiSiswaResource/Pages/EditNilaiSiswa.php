<?php

namespace App\Filament\Siswa\Resources\NilaiSiswaResource\Pages;

use App\Filament\Siswa\Resources\NilaiSiswaResource\NilaiSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilaiSiswa extends EditRecord
{
    protected static string $resource = NilaiSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
