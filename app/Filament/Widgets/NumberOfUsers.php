<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NumberOfUsers extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('No. of Users', User::query()->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('success'),

            Stat::make('No. of Students', Student::query()->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('success'),

            Stat::make('No. of Subjects', Subject::query()->count()),
            Stat::make('No. of Teachers', Teacher::query()->count()),
            

        ];
    }
}
