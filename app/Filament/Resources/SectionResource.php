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
                Forms\Components\Select::make('room_id')
                        ->relationship(name: 'room', titleAttribute: 'room')
                        ->label('Room')
                            ->preload()
                            ->reactive()
                            ->required(),
                Forms\Components\Select::make('faculty_id')
                        ->relationship(name: 'faculty', titleAttribute: 'full_name')
                        ->label('Faculty')
                        ->preload()
                        ->reactive()
                        ->required(),
                Forms\Components\Select::make('section')
                    ->options([
                        'A' => 'Section A',
                        'B' => 'Section B', 
                    ])
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
                            ->required()
                            ,
                            Forms\Components\Select::make('day')
                            ->options([
                                'monday' => 'Monday',
                                'tuesday' => 'Tuesday',
                                'wednesday' => 'Wednesday',
                                'thursday' => 'Thursday',
                                'friday' => 'Friday',
                                'saturday' => 'Saturday',
                            ])
                            ->required(),
                            Forms\Components\TimePicker::make('time_start'),
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
                Tables\Columns\TextColumn::make('level_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('faculty_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('section')
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }    
}
