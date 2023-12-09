<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;

use App\Models\Enrollment;
use App\Models\Specialization;
use App\Models\Section;
use App\Models\Student;

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
use Illuminate\Support\Carbon;


class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function mount(): void 
    {
        $student_id = 'VNHS' . Carbon::now()->year . random_int(1000000, 9999999);

        $this->form->fill([
            'student_id' => $this->student_id,
        ]);
    } 

    public static function form(Form $form): Form
    {
        $student_id = 'VNHS' . Carbon::now()->year . random_int(1000000, 9999999);

        return $form
            ->schema([
                
                Forms\Components\Select::make('school_year')
                ->options([
                    '2023-2024' => '2023-2024',
                    '2024-2025' => '2024-2025',
                    '2026-2027' => '2026-2027',
                ]),
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level')
                ->label('Grade Level')
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('student_id')
                ->relationship(name: 'student', titleAttribute: 'full_name')
                ->label('Student')
                    ->preload()
                    ->live()
                    ->required()
                    ->searchable()
                    ->createOptionForm([
                        Forms\Components\Wizard::make([
                            Wizard\Step::make('Student Information')
                            ->schema([
                                Forms\Components\TextInput::make('student_id')
                                ->default($student_id)
                                ->maxLength(255),
                                Forms\Components\Select::make('grade_level')
                                ->options([
                                    'Grade 7' => 'Grade 7',
                                    'Grade 8' => 'Grade 8',
                                    'Grade 9' => 'Grade 9',
                                    'Grade 10' => 'Grade 10',
                                    'Grade 11' => 'Grade 11',
                                    'Grade 12' => 'Grade 12',
                                ]),
                                Forms\Components\TextInput::make('lname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('fname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mi')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ext')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('gender')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('dob'),
                                Forms\Components\TextInput::make('pob')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('civil_status')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nationality')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('religion')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_number')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('height')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('weight')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('bloodtype')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ethnicity')
                                    ->maxLength(255),
                                
                                
                            ])
                            ->icon('heroicon-m-user')
                            ->columns(3),
                            Wizard\Step::make('Address')
                            ->schema([
                                Forms\Components\TextInput::make('address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('province')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('municipality')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('barangay')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('zipcode')
                                    ->maxLength(255),
                            ])->icon('heroicon-m-map')
                            ->columns(3),
                            Wizard\Step::make('Parents Information')
                            ->schema([
                                Forms\Components\TextInput::make('father_lname')
                                ->maxLength(255),
                                Forms\Components\TextInput::make('father_fname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_mname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_ext')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('father_dob'),
                                Forms\Components\TextInput::make('father_occupation')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_monthlyincome')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_yearlycomp')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_contactno')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('father_educational')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_lname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_fname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_mname')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_ext')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('mother_dob'),
                                Forms\Components\TextInput::make('mother_occupation')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_monthlyincome')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_yearlycomp')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_contactno')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mother_educational')
                                    ->maxLength(255),
                            ])->columns(2),
                            Wizard\Step::make('Emergency Contact')
                            ->schema([
                                Forms\Components\TextInput::make('emergency_contact')
                                ->maxLength(255),
                                Forms\Components\TextInput::make('emergency_address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('emergency_mobile')
                                    ->maxLength(255),
                            ])->columns(2)
                        ])
                        ->columnSpan('full'),
                    ]),
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
                    ->where('specialization_id', $get('specialization_id'))
                    ->pluck('section', 'id'))
                    ->preload()
                    ->live()
                    ->required(),
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
                Tables\Columns\TextColumn::make('school_year')
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
                Tables\Columns\TextColumn::make('student.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'enrolled' => 'success',
                        'pre-enrolled' => 'warning',
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
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
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
