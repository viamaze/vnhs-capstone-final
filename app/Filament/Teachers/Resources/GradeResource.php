<?php

namespace App\Filament\Teachers\Resources;

use App\Filament\Teachers\Resources\GradeResource\Pages;
use App\Filament\Teachers\Resources\GradeResource\RelationManagers;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\TextColumn;

class GradeResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $modelLabel = 'Grades';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')
                ->label('Subject'),
                TextInputColumn::make('first_grading')
                ->label('1ST Grading'),
                TextInputColumn::make('second_grading')
                ->label('2ND Grading'),
                TextInputColumn::make('third_grading')
                ->label('3RD Grading'),
                TextInputColumn::make('fourth_grading')
                ->label('4TH Grading'),
                TextInputColumn::make('Final Grade')
                ->label('Final Grade')
            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->bulkActions([
                
            ])
            ->emptyStateActions([
                
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'view' => Pages\ViewGrade::route('/{record}'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }    
}
