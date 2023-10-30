<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacultyResource\Pages;
use App\Filament\Resources\FacultyResource\RelationManagers;
use App\Models\Faculty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ext')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('dob')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pob')
                    ->maxLength(255),
                Forms\Components\TextInput::make('civilstatus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nationality')
                    ->maxLength(255),
                Forms\Components\TextInput::make('religion')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contactno')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('barangay')
                    ->maxLength(255),
                Forms\Components\TextInput::make('municipality')
                    ->maxLength(255),
                Forms\Components\TextInput::make('province')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_contact')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_mobile')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_tel')
                    ->tel()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFaculties::route('/'),
            'create' => Pages\CreateFaculty::route('/create'),
            'edit' => Pages\EditFaculty::route('/{record}/edit'),
        ];
    }    
}
