<?php

namespace App\Filament\Teachers\Resources;

use App\Filament\Teachers\Resources\AdvisoryResource\Pages;
use App\Filament\Teachers\Resources\AdvisoryResource\RelationManagers;
use App\Models\User;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use Filament\Forms\Components\TextInput;
use Filament\Actions\ViewAction;

class AdvisoryResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Section';

    protected static ?string $slug = 'sections';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->join('teachers', 'users.id', '=', 'teachers.user_id')->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')->join('schedule_items', 'subjects.id', '=', 'schedule_items.subject_id')->join('schedules', 'schedule_items.schedule_id', '=', 'schedules.id')->join('levels', 'schedules.level_id', '=', 'levels.id')->join('specializations', 'schedules.specialization_id', '=', 'specializations.id')->join('sections', 'schedules.section_id', '=', 'sections.id')->join('classrooms','sections.classroom_id', '=','classrooms.id')->select('teachers.*','subjects.*','schedule_items.*', 'schedules.*', 'levels.*','specializations.*', 'sections.*', 'classrooms.*')->where('users.id', auth()->id());
    }

    public static function table(Table $table): Table
    {
        return $table
           /*  ->query(User::query()->join('teachers', 'users.id', '=', 'teachers.user_id')->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')->join('schedule_items', 'subjects.id', '=', 'schedule_items.subject_id')->join('schedules', 'schedule_items.schedule_id', '=', 'schedules.id')->join('levels', 'schedules.level_id', '=', 'levels.id')->join('specializations', 'schedules.specialization_id', '=', 'specializations.id')->join('sections', 'schedules.section_id', '=', 'sections.id')->join('classrooms','sections.classroom_id', '=','classrooms.id')->select('teachers.*','subjects.*','schedule_items.*', 'schedules.*', 'levels.*','specializations.*', 'sections.*', 'classrooms.*')->where('users.id', auth()->id())) */
            ->columns([
                Tables\Columns\TextColumn::make('level')
                    ->label('Grade Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialization_code')
                    ->label('Specialization')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section')
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->sortable(),
                   Tables\Columns\TextColumn::make('classroom')
                    ->sortable(),
            ])
           
            ->filters([
                //
            ])
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('email')
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
