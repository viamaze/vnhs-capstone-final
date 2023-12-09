<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;


use App\Models\Section;
use App\Models\Subject;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Models\SectionItem;
class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Student Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level')
                ->label('Grade Level')
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('specialization_id')
                    ->relationship(name: 'specialization', titleAttribute: 'specialization_code')
                    ->label('Specialization')
                    ->preload()
                    ->live(),

                Forms\Components\Select::make('teacher_id')
                    ->relationship(name: 'teacher', titleAttribute: 'full_name')
                        ->label('Adviser')
                        ->options(fn (Get $get): Collection =>Teacher::query()
                        ->where('level_id', $get('level_id'))
                        ->pluck('full_name', 'id'))
                        ->preload()
                        ->live()
                        ->required(),
                Forms\Components\Select::make('classroom_id')
                        ->relationship(name: 'classroom', titleAttribute: 'classroom')
                        ->label('Classroom')
                        ->preload()
                        ->live(),
                Forms\Components\TextInput::make('section')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level.level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization.specialization')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section')
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->label('Adviser')
                    ->searchable(),
                Tables\Columns\TextColumn::make('classroom.classroom')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level')
                ->preload(),
                Tables\Filters\SelectFilter::make('specialization')
                ->relationship('specialization', 'specialization')
                ->preload(),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }    
}
