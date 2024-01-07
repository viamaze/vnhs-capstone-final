<?php

namespace App\Filament\Teachers\Resources\AdvisoryResource\Pages;

use App\Filament\Teachers\Resources\AdvisoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdvisories extends ListRecords
{
    protected static string $resource = AdvisoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
