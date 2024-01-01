<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use App\Models\User;
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
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Student Management';

    protected static ?string $navigationLabel = 'Student Data Information';

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
                        Forms\Components\Select::make('status')
                        ->options([
                            'pre-enrolled' => 'Pre-Enroll',
                            'reviewing' => 'Reviewing',
                            'enrolled' => 'Enrolled',
                        ]),
                        Forms\Components\TextInput::make('student_id')
                        ->default($student_id)
                        ->label('Student ID')
                        ->maxLength(255),

                        Forms\Components\Select::make('level_id')
                        ->relationship(name: 'level', titleAttribute: 'level')
                        ->label('Grade Level')
                            ->preload()
                            ->live()
                            ->required(),
                        Forms\Components\TextInput::make('firstname')
                            ->label('First Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('middlename')
                            ->label('Middle Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lastname')
                            ->label('Last Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mi')
                            ->label('Middle Initial')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ext')
                            ->label('Extension(\'Sr\', \'Jr\')')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('gender')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_birth')
                        ->native(false),
                        Forms\Components\TextInput::make('place_of_birth')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('civil_status')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nationality')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('religion')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_number')
                            ->label('Contact Number')
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
                        Forms\Components\TextInput::make('father_last_name')
                        ->label('Father Last Name')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('father_first_name')
                        ->label('Father First Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_middle_name')
                            ->label('Father Middle Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make
                        ('father_ext')
                        ->label('Extension(\'Sr\', \'Jr\')')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('father_dob')
                        ->label('Date of Birth'),
                        Forms\Components\TextInput::make('father_occupation')
                        ->label('Occupation')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_monthlyincome')
                        ->label('Monthly Income')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_yearlycomp')
                        ->label('Yearly Compensation')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_contactno')
                        ->label('Contact Number')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_educational')
                        ->label('Educational Attainment')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_last_name')
                        ->label('Mother Last Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_first_name')
                        ->label('Mother First Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_middle_name')
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
                        Forms\Components\TextInput::make('emergency_contact_person')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_mobile')
                            ->maxLength(255),
                    ])->columns(2),
                    Wizard\Step::make('Login Details')
                    ->schema([
                        Fieldset::make('User Details')
                        ->relationship('user')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('role')
                            ->default(User::ROLE_STUDENT)
                            ->required(),
                        
                        ]),
                    ])->columns(2)
                ])
                ->columnSpan('full')
                ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pre-enrolled' => 'info',
                    'reviewing' => 'warning',
                    'enrolled' => 'success',
                }),
                Tables\Columns\TextColumn::make('student_id')
                    ->label('Student ID No.')
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('lastname')
                    ->label('Last Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstname')
                    ->label('First Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level.level')
                    ->label('Grade Level')
                    ->searchable(),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level')
                ->preload(),
                Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pre-enrolled' => 'Pre-Enrolled',
                    'enrolled' => 'Enrolled',
                ])
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
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
