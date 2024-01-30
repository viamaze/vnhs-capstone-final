<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;

use App\Models\Enrollment;
use App\Models\Specialization;
use App\Models\Section;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\SchoolYear;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-arrow-down';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
    
                Forms\Components\Select::make('school_year_id')
                ->relationship(name: 'school_year', titleAttribute: 'year_term', )
                ->label('School Year')
                    ->preload()
                    ->live()
                    ->required()
                    ->options(fn (Get $get): Collection =>SchoolYear::query()
                    ->where('archived', 0)
                    ->pluck('year_term', 'id')),
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level', modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'))
                ->label('Grade Level')
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('student_id')
                    ->relationship(name: 'student', titleAttribute: 'full_name')
                    ->options(fn (Get $get): Collection =>Student::query()
                    ->where('level_id', $get('level_id'))
                    ->where('enrollment_status', 'enrolled')
                    ->where('active_student', 1)
                    ->pluck('full_name', 'id'))
                    ->label('Student')
                        ->preload()
                        ->live()
                        ->required()
                        ->searchable(),
                Forms\Components\Select::make('specialization_id')
                    ->relationship(name: 'specialization', titleAttribute: 'specialization')
                    ->label('Specialization')
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('section_id')
                    ->relationship(name: 'section', titleAttribute: 'section')
                            ->label('Section')
                            ->options(fn (Get $get): Collection =>Section::query()
                            ->where('level_id', $get('level_id'))
                            ->where('specialization_id', $get('specialization_id'))
                            ->pluck('section', 'id'))
                            ->preload()
                            ->live()
                            ->required(),
            ]);
    }
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('student.student_id')
                ->label('Student ID No.')
                ->badge()
                ->color('success'),
                TextEntry::make('school_year.year_term')
                ->label('School Year'),
                TextEntry::make('level.level')
                ->label('Grade Level'),
                TextEntry::make('student.full_name')
                ->label('Full Name'),
                TextEntry::make('section.section')
                ->columnSpan(2),
                TextEntry::make('specialization.specialization')
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.student_id')
                ->label('Student ID No.')
                ->badge()
                ->color('success')
                ->sortable(),
            Tables\Columns\TextColumn::make('school_year.year_term')
                ->searchable(),
            Tables\Columns\TextColumn::make('student.full_name')
                ->label('Full Name')
                ->sortable(),
            Tables\Columns\TextColumn::make('level.level')
                ->label('Grade Level')
                ->sortable(),
            Tables\Columns\TextColumn::make('specialization.specialization')
                ->sortable(),
            Tables\Columns\TextColumn::make('section.section')
                ->sortable(),
            Tables\Columns\TextColumn::make('student.enrollment_status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Enrolled' => 'success',
                    'Pre-Enrolled' => 'warning',
                }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('school_year')
                ->options([
                    '2023-2024' => '2023-2024',
                    '2024-2025' => '2024-2025',
                    '2025-2026' => '2025-2026',
                    '2027-2028' => '2027-2028',
                ]),
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level')
                ->preload(),
                Tables\Filters\SelectFilter::make('specialization')
                ->relationship('specialization', 'specialization')
                ->preload()
                
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
            'view' => Pages\ViewEnrollment::route('/{record}'),
            'edit' => Pages\EditEnrollment::route('/{record}/edit'),
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            EnrollmentResource\Widgets\CreateEnrollmentWidget::class,
        ];
    }

}
