<?php

namespace App\Filament\Siswa\Resources\NilaiSiswaResource;

use App\Models\Penilaian;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class NilaiSiswaResource extends Resource
{
    protected static ?string $model = Penilaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $modelLabel = 'Nilai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'nama')
                    ->searchable()
                    ->preload()
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
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('siswa_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('mataPelajaran.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_penilaian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.name')
                    ->label('Dinilai Oleh'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'nama'),
                Tables\Filters\SelectFilter::make('jenis_penilaian')
                    ->options([
                        'UTS' => 'UTS',
                        'UAS' => 'UAS',
                        'Tugas' => 'Tugas',
                        'Kuis' => 'Kuis',
                        'Praktikum' => 'Praktikum',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilaiSiswas::route('/'),
            'create' => Pages\CreateNilaiSiswa::route('/create'),
            'edit' => Pages\EditNilaiSiswa::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Siswa tidak bisa membuat nilai, hanya melihat dan mengedit (jika diizinkan)
    }
}