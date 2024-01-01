<?php

namespace App\Filament\Students\Resources;

use App\Filament\Students\Resources\StudentResource\Pages;
use App\Filament\Students\Resources\StudentResource\RelationManagers;

use App\Models\Student;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->join('enrollments', 'students.id', '=', 'enrollments.student_id')->join('schedules', 'enrollments.section_id','=','schedules.section_id')->join('schedule_items', 'schedules.id','=','schedule_items.schedule_id')->join('subjects','schedule_items.subject_id','=','subjects.id')->join('teachers','subjects.teacher_id','=','teachers.id')->select('enrollments.*','students.*', 'schedules.*','schedule_items.*','subjects.*','teachers.*')->where('user_id', auth()->id());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->numeric()
                    ->sortable(),
                
                    Tables\Columns\TextColumn::make('day')
                    ->numeric()
                    ->sortable(),

                    Tables\Columns\TextColumn::make('start_time')
                    ->numeric()
                    ->sortable(),

                    Tables\Columns\TextColumn::make('end_time')
                    ->numeric()
                    ->sortable(),

                    Tables\Columns\TextColumn::make('full_name')
                    ->numeric()
                    ->sortable(),

                
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
