<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;


use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class NumberOfUsers extends BaseWidget
{
    use HasWidgetShield;
    
    protected function getStats(): array
    {
        return [
            Stat::make('No. of Users', User::query()->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('info'),

            Stat::make('Total No. of Students', Student::query()->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('info'),

            Stat::make('No. of Teachers', Teacher::query()->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('info'),

            Stat::make('No. of Male Students', Student::query()->where('gender','Male')->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('info'),

            Stat::make('No. of Female Students', Student::query()->where('gender','Female')->count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 5, 10, 3, 15, 4, 17])
            ->color('info'),
        ];
    }
}
