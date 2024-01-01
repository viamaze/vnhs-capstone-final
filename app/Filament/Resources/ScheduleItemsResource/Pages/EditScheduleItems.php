<?php

namespace App\Filament\Resources\ScheduleItemsResource\Pages;

use App\Filament\Resources\ScheduleItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScheduleItems extends EditRecord
{
    protected static string $resource = ScheduleItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
