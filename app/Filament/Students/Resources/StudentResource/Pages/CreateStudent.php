<?php

namespace App\Filament\Students\Resources\StudentResource\Pages;

use App\Filament\Students\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
}
