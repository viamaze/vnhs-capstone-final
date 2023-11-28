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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Support\Carbon;



class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Student Management';

    

    public function mount(): void 
    {
        $student_id = 'VNHS' . Carbon::now()->year . random_int(1000000, 9999999);

        $this->form->fill([
            'student_id' => $this->student_id,
        ]);
    } 

    public static function form(Form $form): Form
    {

        $student_id = 'VNHS' . Carbon::now()->year . random_int(1000000, 9999999);

        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Wizard\Step::make('Student Information')
                    ->schema([
                        Forms\Components\TextInput::make('student_id')
                        ->default($student_id)
                        ->maxLength(255),
                        Forms\Components\Select::make('grade_level')
                        ->options([
                            'Grade 7' => 'Grade 7',
                            'Grade 8' => 'Grade 8',
                            'Grade 9' => 'Grade 9',
                            'Grade 10' => 'Grade 10',
                            'Grade 11' => 'Grade 11',
                            'Grade 12' => 'Grade 12',
                        ]),
                        Forms\Components\TextInput::make('lname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mi')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ext')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('gender')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('dob'),
                        Forms\Components\TextInput::make('pob')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('civil_status')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nationality')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('religion')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_number')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('height')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('weight')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('bloodtype')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ethnicity')
                            ->maxLength(255),
                        
                        
                    ])
                    ->icon('heroicon-m-user')
                    ->columns(3),
                    Wizard\Step::make('Address')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('province')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('municipality')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('barangay')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('zipcode')
                            ->maxLength(255),
                    ])->icon('heroicon-m-map')
                    ->columns(3),
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
                    ])->columns(2),
                    Wizard\Step::make('Emergency Contact')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contact')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_mobile')
                            ->maxLength(255),
                    ])->columns(2)
                ])
                ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_id')
                    ->label('Student ID No.')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lname')
                    ->label('Last Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fname')
                    ->label('First Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pre-enrolled' => 'info',
                    'enrolled' => 'success',
                })
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pre-enrolled' => 'Pre-Enrolled',
                    'enrolled' => 'Enrolled',
                ])
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
