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
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class SubjectResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'subjects-enrolled';

    protected static ?string $modelLabel = 'Subject Enrolled';

    protected static ?string $pluralModelLabel = 'Subject Enrolled';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->join('students', 'users.id', '=', 'students.user_id')->join('enrollments','enrollments.student_id','=','students.id')->join('sections','sections.id','=','enrollments.section_id')->join('schedules','schedules.section_id','=','sections.id')->join('schedule_items','schedule_items.schedule_id','=','schedules.id')->join('subjects','schedule_items.subject_id','=','subjects.id')->join('teachers','subjects.teacher_id','=','teachers.id')->select('users.id','students.id','sections.section','schedule_items.*','subjects.*','teachers.*','enrollments.*')->where('users.id', auth()->id());
    }

    public static function table(Table $table): Table
    {
        return $table
           /*  ->query(User::query()->join('students', 'users.id', '=', 'students.user_id')->join('enrollments', 'students.id', '=','enrollments.student_id')->join('schedules', 'enrollments.section_id','=','schedules.section_id')->join('schedule_items', 'schedules.id', '=', 'schedule_items.schedule_id')->join('subjects', 'schedule_items.subject_id', '=', 'subjects.id')->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')->select('enrollments.*','schedules.*','schedule_items.*', 'subjects.*', 'teachers.*')->where('users.id', auth()->id())) */
            ->columns([
                Tables\Columns\TextColumn::make('level.level')
                ->label('Grade Level'),
                Tables\Columns\TextColumn::make('specialization.specialization'),
                Tables\Columns\TextColumn::make('section.section'),
                Tables\Columns\TextColumn::make('subject.subject'),
                Tables\Columns\TextColumn::make('day'),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
                Tables\Columns\TextColumn::make('teacher.full_name'),
                Tables\Columns\TextColumn::make('teacher.contact_number')
                ->label('Contact Number'),

            ])
            ->filters([
                SelectFilter::make('school_year_id')
                ->options([
                    '1' => '2024-2025',
                    '2' => '2025-2026',
                    '3' => '2026-2027',
                    '4' => '2027-2028',
                ])
                ->label('School Year')
                ->default(1)
                ], layout: FiltersLayout::AboveContent)
                ->hiddenFilterIndicators()
            ->actions([
                
            ])
            ->headerActions([
                ExportAction::make()
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
            //'view' => Pages\ViewSubject::route('/{record}'),
            //'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }    
}
