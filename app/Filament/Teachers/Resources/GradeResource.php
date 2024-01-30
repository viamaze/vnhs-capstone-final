<?php

namespace App\Filament\Teachers\Resources;

use App\Filament\Teachers\Resources\GradeResource\Pages;
use App\Filament\Teachers\Resources\GradeResource\RelationManagers;
use App\Models\Grade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Forms\Get;
use App\Models\Student;
use Illuminate\Support\Collection;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                ->relationship(name: 'student', titleAttribute: 'full_name')
                ->options(fn (Get $get): Collection =>Student::query()
                ->where('enrollment_status', 'enrolled')
                ->where('active_student', 1)
                ->pluck('full_name', 'id'))
                ->label('Student')
                    ->preload()
                    ->live()
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject', 'subject'),
                Forms\Components\TextInput::make('first_grading')
                    ->maxLength(255),
                Forms\Components\TextInput::make('second_grading')
                    ->maxLength(255),
                Forms\Components\TextInput::make('third_grading')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fourth_grading')
                    ->maxLength(255),
                Forms\Components\TextInput::make('final_grade')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.subject')
                    ->numeric()
                    ->sortable(),
                    TextInputColumn::make('first_grading')
                    ->searchable(),
                    TextInputColumn::make('second_grading')
                    ->searchable(),
                    TextInputColumn::make('third_grading')
                    ->searchable(),
                    TextInputColumn::make('fourth_grading')
                    ->searchable(),
                    TextInputColumn::make('final_grade')
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
