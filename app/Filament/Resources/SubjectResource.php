<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Teacher;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';
    protected static ?string $navigationGroup = 'Teacher Management';
    
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
                    
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('teacher_id')
                        ->relationship(name: 'teacher', titleAttribute: 'full_name')
                            ->label('Teacher')
                            ->options(fn (Get $get): Collection =>Teacher::query()
                            ->where('level_id', $get('level_id'))
                            ->pluck('full_name', 'id'))
                            ->preload()
                            ->live()
                            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level.level')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level.level')
                ->options([
                    'Grade 7' => 'Grade 7',
                    'Grade 8' => 'Grade 8',
                    'Grade 9' => 'Grade 9',
                    'Grade 10' => 'Grade 10',
                    'Grade 11' => 'Grade 11',
                    'Grade 12' => 'Grade 12',
                ])
            ])
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }

}
