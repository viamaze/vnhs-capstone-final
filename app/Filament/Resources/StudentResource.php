<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Wizard\Step::make('Student Information')
                    ->schema([
                        Forms\Components\TextInput::make('student_id')
                         ->maxLength(255),
                        Forms\Components\TextInput::make('student_lname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_fname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_mname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_mi')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_ext')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_gender')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('student_dob'),
                        Forms\Components\TextInput::make('student_pob')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_civilstatus')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_nationality')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_religion')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_contactnumber')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_height')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_weight')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_bloodtype')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_ethnicity')
                            ->maxLength(255),
                        
                    ]),
                    Wizard\Step::make('Address')
                    ->schema([
                        Forms\Components\TextInput::make('student_address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_province')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_municipality')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_barangay')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_zipcode')
                            ->maxLength(255),
                    ]),
                    Wizard\Step::make('Parents Information')
                    ->schema([
                        Forms\Components\TextInput::make('father_lname')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('father_fname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_mname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_ext')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('father_dob'),
                        Forms\Components\TextInput::make('father_occupation')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_monthlyincome')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_yearlycomp')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_contactno')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_educational')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_lname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_fname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_mname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_ext')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('mother_dob'),
                        Forms\Components\TextInput::make('mother_occupation')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_monthlyincome')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_yearlycomp')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_contactno')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_educational')
                            ->maxLength(255),
                    ]),
                ])
                ->columnSpan('full')
                ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Submit
                    </x-filament::button>
                BLADE)))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_lname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_fname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_mname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_mi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
