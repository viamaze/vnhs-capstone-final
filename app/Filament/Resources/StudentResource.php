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
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use App\Models\Municipality;
use App\Models\Barangay;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\SelectColumn;
class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Student Management';

    protected static ?string $navigationLabel = 'Student Data Information';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('created_at', 'desc');
    }

    public static function form(Form $form): Form
    {
        $student_id = 'VNHS' . Carbon::now()->year . random_int(1000000, 9999999);

        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Wizard\Step::make('Student Information')
                    ->schema([
                        Section::make('Student Information')
                        ->schema([
                            Forms\Components\TextInput::make('student_id')
                            ->default($student_id)
                            ->label('Student ID Number')
                            ->maxLength(255)
                            ->readonly(),
                            Forms\Components\TextInput::make('lrn')
                            ->label('Student LRN')
                            ->maxLength(255),
                            Forms\Components\Select::make('level_id')
                            ->relationship(name: 'level', titleAttribute: 'level', modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'))
                            ->label('Grade Level')
                                ->preload()
                                ->live()
                                ->required(),
                        ])->columns(3),
                        
                        Section::make('Status')
                        ->schema([
                            Radio::make('student_status')
                            ->label('Student Status')
                            ->options([
                                'New Student' => 'New Student',
                                'Transferee' => 'Transferee',
                                'Old Student' => 'Old Student',
                            ]),
                            Radio::make('enrollment_status')
                            ->label('Enrollment Status')
                            ->options([
                                'Enrolled' => 'Enrolled',
                                'Pre-Enrolled' => 'Pre-Enrolled',
                                'Reviewing' => 'Reviewing',
                            ]),
                            Toggle::make('active_student')
                            ->onColor('success')
                            ->offColor('danger')
                            ->label('Active'),
                        ])->columns(3),

                        Section::make('Requirements')
                        ->description('Please submit if available')
                        ->schema([
                            Toggle::make('psa_birth')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('PSA Birth Certificate'),
                            Toggle::make('form_138')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('FORM 138'),
                            Toggle::make('form_137')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('FORM 137'),
                            Toggle::make('good_moral')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('Good Moral'),
                            Toggle::make('id_picture')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('2x2 ID Picture'),
                            Toggle::make('med_cert')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('Medical Certificate'),
                            Toggle::make('e_signature')
                            ->onColor('info')
                            ->offColor('gray')
                            ->label('E-Signature')
                            ])->columns(3)
                    ])
                    ->icon('heroicon-m-user')
                    ->columns(2),
                    Wizard\Step::make('Personal Data Information')
                    ->schema([
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
                        Forms\Components\Select::make('suffix')
                            ->label('Suffix')
                            ->options([
                                'Jr.' => 'Jr.',
                                'Sr.' => 'Sr.',
                                'II' => 'II',
                                'III' => 'III',
                                'IV' => 'IV',
                            ]),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ]),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->format('Y/m/d')
                            ->required(),
                        Forms\Components\TextInput::make('place_of_birth')
                            ->maxLength(255),
                        Forms\Components\Select::make('civil_status')
                            ->label('Civil Status')
                            ->options([
                                'Single' => 'Single',
                                'Married' => 'Married',
                                'Divorce' => 'Divorce',
                                'Widower' => 'Widower',
                            ])
                            ->required(),
                        Forms\Components\Select::make('nationality')
                            ->options([
                                'Filipino' => 'Filipino',
                                'American' => 'American',
                            ])
                            ->required(),
                        Forms\Components\Select::make('religion')
                            ->options([
                                'Roman Catholic' => 'Roman Catholic',
                                'Islam' => 'Islam',
                                'Iglesia ni Cristo' => 'Iglesia ni Cristo',
                                'Philippine Independent Church' => 'Philippine Independent Church',
                                'Seventh-day Adventist' => 'Seventh-day Adventist',
                                'Bible Baptist Church' => 'Bible Baptist Church',
                                'United Church of Christ in the Philippines' => 'United Church of Christ in the Philippines',
                                'Jehovah\'s Witnesses' => 'Jehovah\'s Witnesses',
                                'Church of Christ' => 'Church of Christ',
                                'Others' => 'Others',
                            ])
                            ->searchable(),
                        Forms\Components\TextInput::make('contact_number')
                            ->label('Contact Number')
                            ->mask('+63999-999-9999')
                            ->placeholder('+639XX-XXX-XXXX')
                            ->tel()
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('height')
                            ->label('Height(cm)')
                            ->numeric()
                            ->inputMode('decimal'),
                        Forms\Components\TextInput::make('weight')
                            ->label('Weight(kg)')
                            ->numeric()
                            ->inputMode('decimal'),
                        Forms\Components\Select::make('bloodtype')
                            ->options([
                                'A+' => 'A+',
                                'A-' => 'A-',
                                'B+' => 'B+',
                                'B-' => 'B-',
                                'AB+' => 'AB+',
                                'AB-' => 'AB-',
                                'O+' => 'O+',
                                'O-' => 'O-',
                            ])
                            ->required()
                            ->searchable(),
                        Forms\Components\Select::make('ethnicity')
                            ->options([
                                'Cebuano' => 'Cebuano',
                                'Ilonggo' => 'Ilonggo',
                                'Tagalog' => 'Tagalog',
                                'Ilocano' => 'Ilocano',
                                'Bisaya' => 'Bisaya',
                            ])
                            ->required()
                            ->searchable(),
                    ])
                    ->icon('heroicon-m-user')
                    ->columns(3),
                    Wizard\Step::make('Address')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->required(),
                            Forms\Components\Select::make('province_id')
                        ->relationship(name: 'province', titleAttribute: 'province')
                            ->preload()
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('municipality_id')
                            ->relationship(name: 'municipality', titleAttribute: 'municipality')
                                ->label('Municipality')
                                ->options(fn (Get $get): Collection =>Municipality::query()
                                ->where('province_id', $get('province_id'))
                                ->pluck('municipality', 'id'))
                                ->preload()
                                ->live()
                                ->required(),
                        Forms\Components\Select::make('barangay_id')
                                ->relationship(name: 'barangay', titleAttribute: 'barangay')
                                ->label('Barangay')
                                ->options(fn (Get $get): Collection =>Barangay::query()
                                ->where('municipality_id', $get('municipality_id'))
                                ->pluck('barangay', 'id'))
                                ->preload()
                                ->live()
                                ->required(),
                        Forms\Components\TextInput::make('zipcode')
                            ->maxLength(255),
                    ])->icon('heroicon-m-map')
                    ->columns(3),
                    Wizard\Step::make('Parent/Guardian Information')
                    ->schema([
                        Section::make('Father\'s Information')
                        ->schema([
                            Forms\Components\TextInput::make('father_last_name')
                            ->label('Father\'s Last Name')
                            ->maxLength(255),
                            Forms\Components\TextInput::make('father_first_name')
                            ->label('Father\'s First Name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('father_middle_name')
                                ->label('Father\'s Middle Name')
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
                                ->mask('+63999-999-9999')
                                ->placeholder('+639XX-XXX-XXXX')
                                ->maxLength(255),
                            Forms\Components\Select::make('father_educational')
                            ->label('Educational Attainment')
                             ->options([
                                'College Graduate' => 'College Graduate',
                                'College Undergraduate' => 'College Undergraduate',
                                'Highschool Graduate' => 'Highschool Graduate',
                                'Highschool Undergraduate' => 'Highschool Undergraduate',
                                'Elementary Graduate' => 'Elementary Graduate',
                                'Elementary Undergraduate' => 'Elementary Undergraduate',
                                'Others' => 'Others',
                                ]),
                        ])
                        ->columns(2),
                        Section::make('Mother Information')
                            ->schema([
                                Forms\Components\TextInput::make('mother_last_name')
                            ->label('Mother\'s Last Name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_first_name')
                            ->label('Mother\'s First Name')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_middle_name')
                            ->label('Mother\'s Middle Name')
                                ->maxLength(255),
                            Forms\Components\DatePicker::make('mother_dob')
                            ->label('Date of Birth'),
                            Forms\Components\TextInput::make('mother_occupation')
                            ->label('Occupation')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_monthlyincome')
                            ->label('Monthly Income')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_yearlycomp')
                            ->label('Yearly Compensation')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('mother_contactno')
                            ->label('Contact Number')
                            ->mask('+63999-999-9999')
                            ->placeholder('+639XX-XXX-XXXX')
                                ->maxLength(255),
                            Forms\Components\Select::make('mother_educational')
                            ->label('Educational Attainment')
                             ->options([
                                'College Graduate' => 'College Graduate',
                                'College Undergraduate' => 'College Undergraduate',
                                'Highschool Graduate' => 'Highschool Graduate',
                                'Highschool Undergraduate' => 'Highschool Undergraduate',
                                'Elementary Graduate' => 'Elementary Graduate',
                                'Elementary Undergraduate' => 'Elementary Undergraduate',
                                'Others' => 'Others',
                                ]),
                            ])->columns(2)
                    ])->columns(2),
                    Wizard\Step::make('Emergency Contact Details')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contact_person')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_mobile')
                            ->mask('+63999-999-9999')
                            ->placeholder('+639XX-XXX-XXXX')
                            ->maxLength(255),
                    ])->columns(2),
                    Wizard\Step::make('Login Details')
                    ->schema([
                        Fieldset::make('Login')
                        ->relationship('user')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create'),
                        Forms\Components\TextInput::make('role')
                            ->default(User::ROLE_STUDENT)
                            ->readOnly(),
                        ]),
                    ])->columns(2),
                    
                ])
                ->columnSpan('full')
                ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at')
            ->columns([
                Tables\Columns\TextColumn::make('enrollment_status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Enrolled' => 'success',
                    'Pre-Enrolled' => 'gray',
                    'Reviewing' => 'warning',
                }),

                Tables\Columns\TextColumn::make('student_status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'New Student' => 'success',
                    'Transferee' => 'warning',
                    'Old Student' => 'info',
                }),
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
                SelectColumn::make('level.level')
                ->options([
                    'Grade 7' => 'Grade 7',
                    'Grade 8' => 'Grade 8',
                    'Grade 9' => 'Grade 9',
                    'Grade 10' => 'Grade 10',
                ]),
               
                CheckboxColumn::make('active_student')
                ->label('Active'),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level', modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'))
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
            ->filtersFormColumns(4)
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
