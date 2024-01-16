<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Infolists;
use Filament\Infolists\Infolist;

use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use Filament\Actions\ReplicateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Teacher Management';
    protected static ?string $navigationLabel = 'Teacher Information';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Advisory')
                    ->schema([
                        Forms\Components\Select::make('level_id')
                        ->label('Grade Level Advisory')
                        ->relationship(name: 'level', titleAttribute: 'level')
                        ->preload()
                        ->live()
                        ->required(),
                        Forms\Components\Select::make('department_id')
                        ->label('Department')
                        ->relationship(name: 'department', titleAttribute: 'department')
                        ->preload()
                        ->live()
                        ->required(),
                        Forms\Components\TextInput::make('remarks')
                        ->label('Remarks')
                        ->maxLength(255),
                    ]),
                    Wizard\Step::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                        ->label('First Name')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('middle_name')
                        ->label('Middle Name')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('last_name')
                        ->label('Last Name')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('middle_initial')
                        ->label('Middle Initial')
                        ->length(1)
                        ->maxLength(1),
                    Forms\Components\Select::make('suffix')
                        ->options([
                            'Jr.' => 'Jr.',
                            'Sr.' => 'Sr.',
                            'II' => 'II',
                            'III' => 'III',
                            'IV' => 'IV',
                        ])->searchable(),
                    Forms\Components\Select::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->searchable(),
                        Forms\Components\DatePicker::make('date_of_birth')
                        ->label('Date of Birth')
                        ->format('m/d/Y')
                        ->required(),
                    Forms\Components\TextInput::make('place_of_birth')
                        ->label('Place of Birth')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\Select::make('civil_status')
                        ->label('Civil Status')
                        ->options([
                            'single' => 'Single',
                            'married' => 'Married',
                            'divorce' => 'Divorce',
                            'widower' => 'Widower',
                        ])
                        ->required()
                        ->searchable(),
                    Forms\Components\Select::make('nationality')
                        ->options([
                            'filipino' => 'Filipino',
                            'american' => 'American',
                        ])
                        ->required()
                        ->searchable(),
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
                        ->required()
                        ->searchable(),
                    Forms\Components\TextInput::make('contact_number')
                        ->label('Contact Number')
                        ->tel()
                        ->maxLength(255)
                        ->required(),
                    ])->columns(2),
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
                        Forms\Components\TextInput::make('zip_code')
                                ->maxLength(255)
                                ->required(),
                            ])->columns(2),
                            Wizard\Step::make('Emergency Contact')
                            ->schema([
                                Forms\Components\TextInput::make('emergency_contactperson')
                                    ->label('Contact Person')
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('emergency_address')
                                    ->label('Address')
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('emergency_mobile')
                                    ->label('Mobile Number')
                                    ->maxLength(255)
                                    ->required(),
                    ]),
                    Wizard\Step::make('User Details')
                    ->schema([
                        Fieldset::make('Login')
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
                            ->default(User::ROLE_FACULTY)
                            ->readOnly()
                            ->required(),
                        ]),
                    ]),
                ])
                ->columnSpan('full')->skippable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level.level')
                    ->label('Advisory'),
                Tables\Columns\TextColumn::make('department.department'),
                Tables\Columns\TextColumn::make('full_name')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('contact_number')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                ->relationship('level', 'level')
                ->preload(),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                Tables\Actions\ReplicateAction::make()
                ->excludeAttributes(['full_name']),
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('level.level')
                ->label('Grade Level'),
                Infolists\Components\TextEntry::make('section.section')
                ->columnSpan(2),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }    
}
