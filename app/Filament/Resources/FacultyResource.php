<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacultyResource\Pages;
use App\Filament\Resources\FacultyResource\RelationManagers;
use App\Models\Faculty;
use App\Models\Municipality;
use App\Models\Barangay;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('middle_name')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('last_name')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('middle_initial')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('ext')
                        ->maxLength(255),
                    Forms\Components\Select::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->searchable(),
                        Forms\Components\DatePicker::make('date_of_birth')
                        ->format('m/d/Y')
                        ->required(),
                    Forms\Components\TextInput::make('place_of_birth')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\Select::make('civil_status')
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
                    Forms\Components\TextInput::make('religion')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('contact_number')
                        ->tel()
                        ->maxLength(255)
                        ->required(),
                    ])->columns(2),
                    Wizard\Step::make('Address')
                    ->schema([
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
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->required(),
                            ])->columns(2),
                            Wizard\Step::make('Emergency Contact')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contactperson')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('emergency_address')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('emergency_mobile')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('emergency_tel')
                            ->tel()
                            ->maxLength(255)
                            ->required(),
                    ]),
                    Wizard\Step::make('Subject Advisory')
                    ->schema([
                        Forms\Components\Select::make('level_id')
                        ->label('Grade Level Advisory')
                        ->relationship(name: 'level', titleAttribute: 'level')
                        ->preload()
                        ->live()
                        ->required(),
                        Forms\Components\Select::make('subject_major')
                        ->options([
                            'math' => 'math',
                            'science' => 'science',
                            'english' => 'english',
                            'filipino' => 'filipino',
                        ])
                        ->required()
                        ->searchable(),
                    ]),
                    Wizard\Step::make('Profile Image')
                    ->schema([
                        Forms\Components\FileUpload::make('profile_image')
                    ]),
                ])
                ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name'),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('level.level')
                    ->label('Advisory Level'),
                Tables\Columns\ImageColumn::make('profile_image')
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListFaculties::route('/'),
            'create' => Pages\CreateFaculty::route('/create'),
            'edit' => Pages\EditFaculty::route('/{record}/edit'),
        ];
    }    
}
