<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;


use App\Models\Schedule;
use App\Models\Specialization;
use App\Models\Subject;
use App\Models\Section;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                ->label('Grade Level Advisory')
                ->relationship(name: 'level', titleAttribute: 'level')
                ->preload()
                ->live()
                ->required(),
                Forms\Components\Select::make('specialization_id')
                ->relationship(name: 'specialization', titleAttribute: 'specialization')
                ->preload()
                ->live()
                ->required(),

                Forms\Components\Select::make('section_id')
                ->relationship(name: 'section', titleAttribute: 'section')
                        ->label('Section')
                        ->options(fn (Get $get): Collection =>Section::query()
                        ->where('level_id', $get('level_id'))
                        ->where('specialization_id', $get('specialization_id'))
                        ->pluck('section', 'id'))
                        ->preload()
                        ->live()
                        ->required(),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make('scheduleItems')
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
                                Forms\Components\TimePicker::make('start_time')
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
                                    ])
                                    ->seconds(false),
                                Forms\Components\TimePicker::make('end_time')
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
                                    ])
                                    ->seconds(false),
                        ])
                        ->columns(2)
                        ->columnSpan('full')
                    ]),
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
                Tables\Columns\TextColumn::make('section.section')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scheduleItems.subject.subject')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('scheduleItems.day')
                    ->label('Day')
                    ->getStateUsing(function ($record) {
                        return $record->scheduleItems->pluck('day')[0];
                    })
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('scheduleItems.start_time')
                    ->label('Start Time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scheduleItems.end_time')
                    ->label('End Time')
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }    
}
