<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Student;
use Filament\Forms\Components\Grid;

class StudentsChart extends ChartWidget
{
    protected static ?string $heading = 'Number of Students';

    protected function getData(): array
    {

        $data = Trend::model(Student::class)
        ->between(
            start: now()->subYear(),
            end: now(),
        )
        ->perMonth()
        ->count();
            
        return [
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
