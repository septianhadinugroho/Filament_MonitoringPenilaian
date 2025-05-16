<?php

namespace App\Filament\Admin\Resources\MataPelajaranResource\RelationManagers;

use App\Models\Penilaian;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PenilaianRelationManager extends RelationManager
{
    protected static string $relationship = 'penilaian';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->label('Siswa')
                    ->options(User::where('role', 'siswa')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                    
                Forms\Components\Select::make('guru_id')
                    ->label('Guru')
                    ->options(User::where('role', 'guru')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                    
                Forms\Components\TextInput::make('nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                    
                Forms\Components\Select::make('jenis_penilaian')
                    ->options([
                        'UTS' => 'UTS',
                        'UAS' => 'UAS',
                        'Tugas' => 'Tugas',
                        'Kuis' => 'Kuis',
                        'Praktikum' => 'Praktikum',
                    ])
                    ->required(),
                    
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                    
                Forms\Components\Textarea::make('komentar')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.name')
                    ->label('Siswa')
                    ->sortable()
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('guru.name')
                    ->label('Guru')
                    ->sortable()
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('nilai')
                    ->sortable()
                    ->color(fn (float $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'warning',
                        default => 'danger',
                    }),
                    
                Tables\Columns\TextColumn::make('jenis_penilaian')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'UTS' => 'primary',
                        'UAS' => 'success',
                        default => 'gray',
                    }),
                    
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_penilaian')
                    ->options([
                        'UTS' => 'UTS',
                        'UAS' => 'UAS',
                        'Tugas' => 'Tugas',
                        'Kuis' => 'Kuis',
                        'Praktikum' => 'Praktikum',
                    ]),
                    
                Tables\Filters\SelectFilter::make('siswa_id')
                    ->label('Siswa')
                    ->options(User::where('role', 'siswa')->pluck('name', 'id')),
                    
                Tables\Filters\SelectFilter::make('guru_id')
                    ->label('Guru')
                    ->options(User::where('role', 'guru')->pluck('name', 'id')),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}