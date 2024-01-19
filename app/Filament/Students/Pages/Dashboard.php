<?php

namespace App\Filament\Students\Pages;
use Illuminate\Support\Str;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.students.pages.dashboard';

    
    public function getHeading(): string
    {
        $logged_user = Str::ucfirst(auth()->user()->name);
        return "Welcome {$logged_user}!";
    }

}
