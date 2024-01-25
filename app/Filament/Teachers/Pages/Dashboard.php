<?php

namespace App\Filament\Teachers\Pages;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Teacher;
use Filament\Pages\Page;
use Filament\Actions\Action;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.teachers.pages.dashboard';

    public $user, $teachers, $teacher_name;

    public function mount()
    {
    
        $this->teachers = Teacher::where('user_id','like',auth()->user()->id)->get();
    }

    public function getHeading(): string
    {
        $logged_user = Str::ucfirst(auth()->user()->name);
        return "Welcome {$logged_user}!";
    }



}
