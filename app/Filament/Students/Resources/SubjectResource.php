<?php

namespace App\Filament\Students\Resources;

use App\Filament\Students\Resources\SubjectResource\Pages;
use App\Filament\Students\Resources\SubjectResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectResource extends Resource
{
    // protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Subjects';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

/*     public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->join('students', 'users.student_id', '=', 'students.id')->join('enrollments', 'users.student_id', '=', 'enrollments.student_id')->join('schedules', 'enrollments.section_id', '=', 'schedules.section_id')->join('schedule_items', 'schedules.id', '=', 'schedule_items.schedule_id')->join('subjects', 'schedule_items.subject_id', '=', 'subjects.id')->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')->select('enrollments.*', 'students.*','users.*', 'schedules.*', 'schedule_items.*', 'subjects.*', 'teachers.*')->where('users.id', auth()->id());
    } */

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::query()->join('students', 'users.student_id', '=', 'students.id')->join('enrollments', 'users.student_id', '=', 'enrollments.student_id')->join('schedules', 'enrollments.section_id', '=', 'schedules.section_id')->join('schedule_items', 'schedules.id', '=', 'schedule_items.schedule_id')->join('subjects', 'schedule_items.subject_id', '=', 'subjects.id')->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')->select('enrollments.*', 'students.*','users.*', 'schedules.*', 'schedule_items.*', 'subjects.*', 'teachers.*')->where('users.id', auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->listWithLineBreaks()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->listWithLineBreaks()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Teacher')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->headerActions([
                Action::make('export')
                ->openUrlInNewTab(),
                Action::make('print')
                ->openUrlInNewTab()
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'view' => Pages\ViewSubject::route('/{record}'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }    
}
