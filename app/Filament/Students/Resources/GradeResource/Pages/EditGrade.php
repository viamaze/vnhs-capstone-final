<?php

namespace App\Filament\Students\Resources\GradeResource\Pages;

use App\Filament\Students\Resources\GradeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrade extends EditRecord
{
    protected static string $resource = GradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
