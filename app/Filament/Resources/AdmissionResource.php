<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmissionResource\Pages;
use App\Filament\Resources\AdmissionResource\RelationManagers;
use App\Models\Admission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use App\Models\Enrollment;
use App\Models\Specialization;
use App\Models\Section;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\SchoolYear;

class AdmissionResource extends Resource
{
    protected static ?string $model = Admission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('school_year_id')
                ->relationship(name: 'school_year', titleAttribute: 'year_term', modifyQueryUsing: fn (Builder $query) => $query->where('archived', 0))
                ->label('School Year')
                    ->preload()
                    ->live()
                    ->required(),

                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level', modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'))
                ->label('Grade Level')
                    ->preload()
                    ->live()
                    ->required()
                    ->dehydrated(false),

                Forms\Components\Select::make('specialization_id')
                    ->relationship(name: 'specialization', titleAttribute: 'specialization')
                    ->label('Specialization')
                    ->preload()
                    ->live()
                    ->required()
                    ->dehydrated(false),

                Forms\Components\Select::make('section_id')
                    ->label('Section')
                    ->options(fn (Get $get): Collection =>Section::query()
                    ->where('level_id', $get('level_id'))
                    ->where('specialization_id', $get('specialization_id'))
                    ->pluck('section', 'id'))
                    ->preload()
                    ->live()
                    ->required()
                    ->dehydrated(false),

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

                Forms\Components\Select::make('schedule_id')
                    ->options(fn (Get $get): Collection =>Schedule::query()
                    ->where('level_id', $get('level_id'))
                    ->where('specialization_id', $get('specialization_id'))
                    ->where('section_id', $get('section_id'))
                    ->pluck('schedule_name', 'id'))
                    ->label('Schedule')
                    ->preload()
                    ->live()
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school_year.year_term')
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('schedule.schedule_name')
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
            'index' => Pages\ListAdmissions::route('/'),
            'create' => Pages\CreateAdmission::route('/create'),
            'edit' => Pages\EditAdmission::route('/{record}/edit'),
        ];
    }
}
