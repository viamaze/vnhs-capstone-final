<?php

namespace App\Livewire;

use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Carbon;

class CreateStudent extends Component implements HasForms
{
    use InteractsWithForms;
    public $status = 'pre-enrolled', $student_id;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $this->student_id = "VNHS" . Carbon::now()->year . random_int(100000, 999999);
        
        return $form
            ->schema([

                Wizard::make([
                    Wizard\Step::make('Personal Information')
                        ->schema([
                            Forms\Components\Select::make('level_id')
                                ->relationship('level', 'level'),
                            Forms\Components\TextInput::make('student_id')
                                ->maxLength(255)
                                ->default($this->student_id),
                            Forms\Components\TextInput::make('status')
                                ->maxLength(255)
                                ->default($this->status),
                            Forms\Components\TextInput::make('lastname')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('firstname')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('middlename')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mi')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('ext')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('gender')
                                ->maxLength(255),
                            Forms\Components\DatePicker::make('date_of_birth'),
                            Forms\Components\TextInput::make('place_of_birth')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('civil_status')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('nationality')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('religion')
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
                            ]),
                        Wizard\Step::make('Address Information')
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
                            ]),
                        Wizard\Step::make('Parents/Guardian Information')
                            ->schema([
                                Forms\Components\TextInput::make('father_last_name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('father_first_name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('father_middle_name')
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
                            Forms\Components\TextInput::make('father_address')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_last_name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_first_name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_middle_name')
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
                            Forms\Components\TextInput::make('mother_address')
                                ->maxLength(255),
                            ]),

                        Wizard\Step::make('Emergency Contact Information')
                            ->schema([
                                Forms\Components\TextInput::make('emergency_contact_person')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('emergency_address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('emergency_mobile')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('full_name')
                                    ->maxLength(255),
                            ]),
                ])->submitAction(new HtmlString('<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>'))  
            ])
            ->statePath('data')
            ->model(Student::class);
    }

    

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Student::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.create-student');
    }
}