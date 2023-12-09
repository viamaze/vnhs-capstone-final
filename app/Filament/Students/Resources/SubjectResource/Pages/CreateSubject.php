<?php

namespace App\Filament\Students\Resources\SubjectResource\Pages;

use App\Filament\Students\Resources\SubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubject extends CreateRecord
{
    protected static string $resource = SubjectResource::class;
}
