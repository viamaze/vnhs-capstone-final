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
                    ->relationship(name: 'specialization', titleAttribute: 'specialization')
                    ->label('Specialization')
                    ->options(fn (Get $get): Collection =>Specialization::query()
                    ->where('level_id', $get('level_id'))
                    ->pluck('specialization', 'id'))
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('section')
                    ->options([
                        'Section A' => 'Section A',
                        'Section B' => 'Section B', 
                    ])
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->relationship(name: 'teacher', titleAttribute: 'full_name')
                    ->options(fn (Get $get): Collection =>Teacher::query()
                    ->where('level_id', $get('level_id'))
                    ->pluck('full_name', 'id'))
                    ->label('Teacher')
                    ->preload()
                    ->reactive()
                    ->required(),
                    
                    Forms\Components\Select::make('classroom_id')
                    ->relationship(name: 'classroom', titleAttribute: 'classroom')
                    ->label('Classroom')
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
                            ->label('Subject')
                            ->relationship(name: 'subject', titleAttribute: 'subject')
                            ->preload()
                            ->live()
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

                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom.classroom')
                    ->numeric()
                    ->sortable(),


                Tables\Columns\TextColumn::make('sectionItems.day')
                    ->label('Day')
                    ->getStateUsing(function ($record) {
                        return $record->sectionItems->pluck('day')[0];
                    })
                    ->badge(),
            
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
