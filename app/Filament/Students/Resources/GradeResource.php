<?php

namespace App\Filament\Students\Resources;

use App\Filament\Students\Resources\GradeResource\Pages;
use App\Filament\Students\Resources\GradeResource\RelationManagers;
use App\Models\Subject;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\TextColumn;

class GradeResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $modelLabel = 'Grades';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function table(Table $table): Table
    {
        return $table
        ->query(User::query()->join('students', 'users.id', '=', 'students.user_id')->join('enrollments', 'students.id', '=','enrollments.student_id')->select('enrollments.*')->join('schedules', 'enrollments.section_id','=','schedules.section_id')->join('schedule_items', 'schedules.id', '=', 'schedule_items.schedule_id')->join('subjects', 'schedule_items.subject_id', '=', 'subjects.id')->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')->select('schedules.*','schedule_items.*', 'subjects.*', 'teachers.*')->where('users.id', auth()->id()))
            ->columns([
                TextColumn::make('subject'),
                TextColumn::make('first_grading')
                ->label('1ST Grading'),
                TextColumn::make('second_grading')
                ->label('2ND Grading'),
                TextColumn::make('third_grading')
                ->label('3RD Grading'),
                TextColumn::make('fourth_grading')
                ->label('4TH Grading'),
                TextColumn::make('Final Grade')
                ->label('Final Grade')
            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->bulkActions([
                
            ])
            ->emptyStateActions([
                
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
            'view' => Pages\ViewGrade::route('/{record}'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }    
}
