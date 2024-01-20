<?php

namespace App\Filament\Teachers\Resources;

use App\Filament\Teachers\Resources\GradeResource\Pages;
use App\Filament\Teachers\Resources\GradeResource\RelationManagers;
use App\Models\Grade;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;

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
                ->preload()
                ->live()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Student::query()->join('enrollments','enrollments.student_id','=','students.id')->join('sections','enrollments.section_id','=','sections.id')->join('schedules','schedules.section_id','=','sections.id')->join('schedule_items','schedule_items.schedule_id','=','schedules.id')->join('subjects', 'subjects.id','=','schedule_items.subject_id')->join('teachers','teachers.id','=','subjects.teacher_id')->join('users','users.id','=','teachers.user_id')->select('students.*', 'subjects.*','sections.*')->where('teachers.user_id',auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('level.level'),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('full_name')
                ->sortable(),
                Tables\Columns\TextColumn::make('subject'),
                TextInputColumn::make('first_grading')
                ->label('1st Grading'),
                TextInputColumn::make('second_grading')
                ->label('2nd Grading'),
                TextInputColumn::make('third_grading')
                ->label('3rd Grading'),
                TextInputColumn::make('fourth_grading')
                ->label('4th Grading'),
                TextInputColumn::make('final_grade')
            ])
            ->filters([
                SelectFilter::make('level')
                ->relationship('level', 'level'),
                
            ],layout: FiltersLayout::AboveContent)
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
