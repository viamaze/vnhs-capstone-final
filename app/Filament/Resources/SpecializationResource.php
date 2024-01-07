<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpecializationResource\Pages;
use App\Filament\Resources\SpecializationResource\RelationManagers;
use App\Models\Specialization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Textarea;

class SpecializationResource extends Resource
{
    protected static ?string $model = Specialization::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationGroup = 'Subject Management';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('specialization_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('specialization')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('specialization_code')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('specialization')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
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
            'index' => Pages\ListSpecializations::route('/'),
            'create' => Pages\CreateSpecialization::route('/create'),
            'edit' => Pages\EditSpecialization::route('/{record}/edit'),
        ];
    }    
}
