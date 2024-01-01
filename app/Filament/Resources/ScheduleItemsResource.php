<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleItemsResource\Pages;
use App\Filament\Resources\ScheduleItemsResource\RelationManagers;
use App\Models\ScheduleItems;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleItemsResource extends Resource
{
    protected static ?string $model = ScheduleItems::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('schedule_id')
                    ->relationship('schedule', 'id')
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject', 'id')
                    ->required(),
                Forms\Components\TextInput::make('day')
                    ->maxLength(255),
                Forms\Components\TextInput::make('start_time')
                    ->maxLength(255),
                Forms\Components\TextInput::make('end_time')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('schedule.level.level')
                ->label('Grade Level')
                ->sortable(),
            Tables\Columns\TextColumn::make('schedule.specialization.specialization')
                ->sortable(),
            Tables\Columns\TextColumn::make('schedule.section.section')
                ->sortable(),
            Tables\Columns\TextColumn::make('subject.subject')
                ->listWithLineBreaks(),
            Tables\Columns\TextColumn::make('day')
                ->listWithLineBreaks(),
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
            'index' => Pages\ListScheduleItems::route('/'),
            'create' => Pages\CreateScheduleItems::route('/create'),
            'edit' => Pages\EditScheduleItems::route('/{record}/edit'),
        ];
    }    
}
