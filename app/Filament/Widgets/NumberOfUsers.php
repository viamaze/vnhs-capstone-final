<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NumberOfUsers extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('No. of Users', User::query()->count()),
            Stat::make('No. of Students', Student::query()->count()),
        ];
    }
}
