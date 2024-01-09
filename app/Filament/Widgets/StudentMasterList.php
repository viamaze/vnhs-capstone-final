<?php

namespace App\Filament\Widgets;
use App\Models\Student;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;

class StudentMasterList extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())
            ->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('lrn')
                    ->label('Student LRN')
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('firstname')
                    ->label('First Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('lastname')
                    ->label('Last Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('level.level')
                    ->label('Grade Level')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level')
                ->preload(),
                Tables\Filters\SelectFilter::make('student_status')
                ->label('Student Status')
                ->options([
                    'New Student' => 'New Student',
                    'Transferee' => 'Transferee',
                    'Old Student' => 'Old Student'
                ]),
                Tables\Filters\SelectFilter::make('enrollment_status')
                ->label('Enrollment Status')
                ->options([
                    'Enrolled' => 'Enrolled',
                    'Pre-Enrolled' => 'Pre-Enrolled',
                    'Reviewing' => 'Reviewing',
                ]),
                Tables\Filters\SelectFilter::make('active_student')
                ->label('Status')
                ->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4);
    }
}
