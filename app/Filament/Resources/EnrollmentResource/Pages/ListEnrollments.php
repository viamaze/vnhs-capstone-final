<?php

namespace App\Filament\Resources\EnrollmentResource\Pages;

use App\Filament\Resources\EnrollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Livewire\Attributes\On;

class ListEnrollments extends ListRecords
{
    protected static string $resource = EnrollmentResource::class;

    #[On('enrollment-created')] 
    public function refresh() {}

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array 
    {
        return [
            EnrollmentResource\Widgets\CreateEnrollmentWidget::class,
        ];
    } 

}
