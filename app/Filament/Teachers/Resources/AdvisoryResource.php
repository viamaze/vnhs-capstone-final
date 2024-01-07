<?php

namespace App\Filament\Teachers\Resources;

use App\Filament\Teachers\Resources\AdvisoryResource\Pages;
use App\Filament\Teachers\Resources\AdvisoryResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class AdvisoryResource extends Resource
{
    // protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Section';

/*     public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->join('teachers', 'users.teacher_id', '=', 'teachers.id')->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')->join('schedule_items', 'subjects.id', '=', 'schedule_items.subject_id')->join('schedules', 'schedule_items.schedule_id', '=', 'schedules.id')->join('levels', 'schedules.level_id', '=', 'levels.id')->join('specializations', 'schedules.specialization_id', '=', 'specializations.id')->join('sections', 'schedules.section_id', '=', 'sections.id')->select('teachers.*','subjects.*','schedule_items.*', 'schedules.*', 'levels.*','specializations.*', 'sections.*')->where('users.id', auth()->id());
    } */

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::query()->join('teachers', 'users.teacher_id', '=', 'teachers.id')->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')->join('schedule_items', 'subjects.id', '=', 'schedule_items.subject_id')->join('schedules', 'schedule_items.schedule_id', '=', 'schedules.id')->join('levels', 'schedules.level_id', '=', 'levels.id')->join('specializations', 'schedules.specialization_id', '=', 'specializations.id')->join('sections', 'schedules.section_id', '=', 'sections.id')->select('teachers.*','subjects.*','schedule_items.*', 'schedules.*', 'levels.*','specializations.*', 'sections.*')->where('users.id', auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Grade Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization_code')
                    ->label('Specialization')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAdvisories::route('/'),
            'create' => Pages\CreateAdvisory::route('/create'),
            'view' => Pages\ViewAdvisory::route('/{record}'),
            'edit' => Pages\EditAdvisory::route('/{record}/edit'),
        ];
    }    
}
