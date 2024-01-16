<?php

namespace App\Filament\Teachers\Pages;
use Illuminate\Support\Str;
use App\Models\User;

use Filament\Pages\Page;
use Filament\Actions\Action;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.teachers.pages.dashboard';

    public function getHeading(): string
    {
        $logged_user = Str::ucfirst(auth()->user()->name);
        return "Welcome {$logged_user}!";
    }


}
