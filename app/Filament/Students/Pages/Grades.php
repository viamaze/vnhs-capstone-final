<?php

namespace App\Filament\Students\Pages;

use Filament\Pages\Page;

class Grades extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.students.pages.grades';
}
