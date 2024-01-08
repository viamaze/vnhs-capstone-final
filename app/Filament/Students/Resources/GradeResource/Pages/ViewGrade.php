<?php

namespace App\Filament\Students\Resources\GradeResource\Pages;

use App\Filament\Students\Resources\GradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGrade extends ViewRecord
{
    protected static string $resource = GradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
