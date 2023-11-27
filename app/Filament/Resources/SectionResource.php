<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Enums\FiltersLayout;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level')
                ->label('Grade Level')
                    ->preload()
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('specialization_id')
                    ->relationship(name: 'specialization', titleAttribute: 'specialization')
                    ->label('Specialization')
                        ->preload()
                        ->reactive()
                        ->required(),
                Forms\Components\Select::make('section')
                    ->options([
                        'Section A' => 'Section A',
                        'Section B' => 'Section B', 
                    ])
                    ->required(),
                Forms\Components\Select::make('faculty_id')
                    ->relationship(name: 'faculty', titleAttribute: 'full_name')
                    ->label('Faculty')
                    ->preload()
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('room_id')
                        ->relationship(name: 'room', titleAttribute: 'room')
                        ->label('Room')
                            ->preload()
                            ->reactive()
                            ->required(),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make(name: 'sectionItems')
                        ->label(label: 'Subjects')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('subject_id')
                            ->relationship(name: 'subject', titleAttribute: 'subject')
                            ->label('Subject')
                            ->preload()
                            ->reactive()
                            ->required(),
                            Forms\Components\CheckboxList::make('day')
                            ->options([
                                'monday' => 'Monday',
                                'tuesday' => 'Tuesday',
                                'wednesday' => 'Wednesday',
                                'thursday' => 'Thursday',
                                'friday' => 'Friday',
                                'saturday' => 'Saturday',
                            ])->columns(2),
                            Forms\Components\TimePicker::make('time_start')
                            ->datalist([
                                '06:00',
                                '06:30',
                                '07:00',
                                '07:30',
                                '08:00',
                                '08:30',
                                '09:00',
                                '09:30',
                                '10:00',
                                '10:30',
                                '11:00',
                                '11:30',
                                '12:00',
                            ]),
                            Forms\Components\TimePicker::make('time_end')
                        ])
                        ->addActionLabel('Add Subject')
                        ->columns(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level.level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization.specialization')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('section')
                    ->searchable(),

                Tables\Columns\TextColumn::make('faculty.full_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room.room')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sectionItems.time_start')
                ->label('Start'),
                Tables\Columns\TextColumn::make('sectionItems.time_end')
                ->label('End')
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
