<?php

namespace App\Filament\Students\Pages;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Student;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.students.pages.dashboard';

    public $students;

    public function mount()
    {
    
        $this->students = Student::join('enrollments', 'enrollments.student_id', '=','students.id')->join('specializations','specializations.id','=','enrollments.specialization_id')->join('sections','sections.id','=','enrollments.section_id')->select('students.*','enrollments.*', 'specializations.*','sections.*')->where('user_id','=',auth()->user()->id)->get();
    }

    public function getHeading(): string
    {
        $logged_user = Str::ucfirst(auth()->user()->name);
        return "Welcome {$logged_user}!";
    }

}
