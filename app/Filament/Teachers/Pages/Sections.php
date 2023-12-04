<?php

namespace App\Filament\Teachers\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;

class Sections extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.teachers.pages.sections';

    protected ?string $heading = 'Custom Page Heading';

    protected ?string $subheading = 'Custom Page Subheading';
}


