<?php

namespace App\Filament\Resources\EnrollmentResource\Widgets;
use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;

use App\Models\Enrollment;
use App\Models\Specialization;
use App\Models\Section;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Level;

use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\Widget;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('school_year_id')
                    ->options(fn (Get $get): Collection =>SchoolYear::query()
                    ->where('archived', 0)
                    ->pluck('year_term', 'id'))
                    ->label('School Year')
                    ->preload()
                    ->live()
                    ->required(),

                Select::make('level_id')
                    ->options(fn (Get $get): Collection =>Level::query()
                    ->pluck('level', 'id'))
                    ->label('Grade Level')
                    ->preload()
                    ->live()
                    ->required(),

                Select::make('student_id')
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
                Select::make('specialization_id')
                    ->options(fn (Get $get): Collection =>Specialization::query()->orderby('specialization','asc')
                    ->pluck('specialization', 'id'))
                    ->label('Specialization')
                    ->preload()
                    ->live()
                    ->required(),
                Select::make('section_id')
                    ->label('Section')
                    ->options(fn (Get $get): Collection =>Section::query()
                    ->where('level_id', $get('level_id'))
                    ->where('specialization_id', $get('specialization_id'))
                    ->pluck('section', 'id'))
                    ->preload()
                    ->live()
                    ->required(),
            ])
            ->columns(2)
            ->statePath('data');
    }


    public function create(): void
    {
        Enrollment::create($this->form->getState());
        $this->form->fill();
        $this->dispatch('enrollment-created');
    }

}
