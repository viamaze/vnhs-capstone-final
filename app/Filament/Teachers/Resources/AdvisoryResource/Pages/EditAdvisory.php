<?php

namespace App\Filament\Teachers\Resources\AdvisoryResource\Pages;

use App\Filament\Teachers\Resources\AdvisoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdvisory extends EditRecord
{
    protected static string $resource = AdvisoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
