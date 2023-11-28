<?php

namespace App\Filament\Students\Pages;

use Filament\Pages\Page;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static string $view = 'filament.students.pages.profile';
}
