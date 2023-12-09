<?php

namespace App\Filament\Resources\EnrollmentResource\Widgets;

use Filament\Widgets\Widget;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Carbon;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Enums\FiltersLayout;

use App\Models\Enrollment;
use App\Models\Specialization;
use App\Models\Section;
use App\Models\Student;
use App\Models\Level;

class CreateEnrollmentWidget extends Widget implements HasForms
{

    use InteractsWithForms;

    protected static string $view = 'filament.resources.enrollment-resource.widgets.create-enrollment-widget';

    protected int | string | array $columnSpan = 'full';
 
    public ?array $data = [];
 
    public function mount(): void
    {
        $this->form->fill();
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
            ])->statePath('data');
            
    }

    public function create(): void
    {
        Enrollment::create($this->form->getState());
        $this->form->fill();
        $this->dispatch('enrollment-created');
    }
    
}
