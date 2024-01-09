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
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Fieldset;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\ViewColumn;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
   
    protected static ?string $navigationGroup = 'Schedule Management';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                ->label('Grade Level')
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
                                ->options(fn (Get $get): Collection =>Subject::query()
                                ->where('level_id', $get('../../level_id'))
                                ->pluck('subject', 'id'))
                                ->preload()
                                ->live()
                                ->required(),
                                Forms\Components\CheckboxList::make('day')
                                    ->options([
                                            'M' => 'M',
                                            'T' => 'T',
                                            'W' => 'W',
                                            'TH' => 'TH',
                                            'F' => 'F',
                                            'S' => 'S',
                                        ])->columns(3),

                                Select::make('start_time')
                                    ->options([
                                        '6:00AM' => '6:00AM',
                                        '6:30AM' => '6:30AM',
                                        '7:00AM' => '7:00AM',
                                        '7:30AM' => '7:30AM',
                                        '8:00AM' => '8:00AM',
                                        '8:30AM' => '8:30AM',
                                        '9:00AM' => '9:00AM',
                                        '9:30AM' => '9:30AM',
                                        '10:00AM' => '10:00AM',
                                        '10:30AM' => '10:30AM',
                                        '11:00AM' => '11:00AM',
                                        '11:30AM' => '11:30AM',
                                        '12:00PM' => '12:00PM',
                                        '12:30PM' => '12:30PM',
                                        '1:00PM' => '1:00PM',
                                        '1:30PM' => '1:30PM',
                                        '2:00PM' => '2:00PM',
                                        '2:30PM' => '2:30PM',
                                        '3:00PM' => '3:00PM',
                                        '3:30PM' => '3:30PM',
                                        '4:00PM' => '4:00PM',
                                        '4:30PM' => '4:30PM',
                                        '5:00PM' => '5:00PM',
                                        '5:30PM' => '5:30PM',
                                        '6:00PM' => '6:00PM',

                                ]),
                                Select::make('end_time')
                                    ->options([
                                        '6:00AM' => '6:00AM',
                                        '6:30AM' => '6:30AM',
                                        '7:00AM' => '7:00AM',
                                        '7:30AM' => '7:30AM',
                                        '8:00AM' => '8:00AM',
                                        '8:30AM' => '8:30AM',
                                        '9:00AM' => '9:00AM',
                                        '9:30AM' => '9:30AM',
                                        '10:00AM' => '10:00AM',
                                        '10:30AM' => '10:30AM',
                                        '11:00AM' => '11:00AM',
                                        '11:30AM' => '11:30AM',
                                        '12:00PM' => '12:00PM',
                                        '12:30PM' => '12:30PM',
                                        '1:00PM' => '1:00PM',
                                        '1:30PM' => '1:30PM',
                                        '2:00PM' => '2:00PM',
                                        '2:30PM' => '2:30PM',
                                        '3:00PM' => '3:00PM',
                                        '3:30PM' => '3:30PM',
                                        '4:00PM' => '4:00PM',
                                        '4:30PM' => '4:30PM',
                                        '5:00PM' => '5:00PM',
                                        '5:30PM' => '5:30PM',
                                        '6:00PM' => '6:00PM',
                                ]),
                        ])
                        ->columns(4)
                        ->columnSpan('full')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level.level')
                    ->label('Grade Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization.specialization')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section.section')
                    ->sortable(),
                Tables\Columns\TextColumn::make('scheduleItems.subject.subject')
                    ->listWithLineBreaks(),
                Tables\Columns\TextColumn::make('scheduleItems.day')
                    ->label('Day')
                    ->getStateUsing(function ($record) {
                        return $record->scheduleItems->pluck('day')->flatten();
                    })
                    ->listWithLineBreaks(),
                
                Tables\Columns\TextColumn::make('scheduleItems.start_time')
                    ->label('Start Time')
                    ->listWithLineBreaks(),
                Tables\Columns\TextColumn::make('scheduleItems.end_time')
                    ->label('End Time')
                    ->listWithLineBreaks(), 
                Tables\Columns\TextColumn::make('scheduleItems.subject.teacher.full_name')
                    ->listWithLineBreaks(),
                
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
                Tables\Actions\ViewAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('level.level')
                ->label('Grade Level'),
                Infolists\Components\TextEntry::make('specialization.specialization'),
                Infolists\Components\TextEntry::make('section.teacher.full_name')
                ->label('Adviser'),
                Infolists\Components\TextEntry::make('section.section')
                ->columnSpan(2),

                Fieldset::make('Subjects')
                ->schema([
                    TextEntry::make('scheduleItems.subject.subject')
                    ->label('Subject')
                    ->listWithLineBreaks(),
                    TextEntry::make('scheduleItems.day')
                    ->getStateUsing(function ($record) {
                        return $record->scheduleItems->pluck('day', 'subject_id')->collapse();
                    })
                    ->label('Day'),
                    TextEntry::make('scheduleItems.start_time')
                    ->label('Start Time')
                    ->listWithLineBreaks(),
                    TextEntry::make('scheduleItems.end_time')
                    ->label('End Time')
                    ->listWithLineBreaks(),
                    TextEntry::make('scheduleItems.subject.teacher.full_name')
                        ->label('Teacher')
                        ->listWithLineBreaks()
                ])
                ->columns(5)
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
            'view' => Pages\ViewSchedule::route('/{record}'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }    
}
