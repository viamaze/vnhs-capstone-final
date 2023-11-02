<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MunicipalityResource\Pages;
use App\Filament\Resources\MunicipalityResource\RelationManagers;
use App\Models\Municipality;
use App\Models\Barangay;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Illuminate\Support\Collection;


class MunicipalityResource extends Resource
{
    protected static ?string $model = Municipality::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('province_id')
                    ->relationship('province','province')
                    ->preload()
                    ->live()
                    ->required(),

                Forms\Components\Select::make('municipality_id')
                    ->relationship('municipality','municipality')
                    ->label('Municipality')
                    ->options(fn (Get $get): Collection =>Municipality::query()
                    ->where('province_id', $get('province_id'))
                    ->pluck('municipality', 'id'))
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('barangay_id')
                    
                    ->label('Barangay')
                    ->options(fn (Get $get): Collection =>Barangay::query()
                    ->where('municipality_id', $get('municipality_id'))
                    ->pluck('barangay', 'id'))
                    ->preload()
                    ->live()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('municipality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province_id')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListMunicipalities::route('/'),
            'create' => Pages\CreateMunicipality::route('/create'),
            'edit' => Pages\EditMunicipality::route('/{record}/edit'),
        ];
    }    
}
