<?php

namespace App\Filament\Resources\CountryResource\RelationManagers;

use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\State;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relationships')
                    ->schema([
                        Forms\Components\Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name')
                            ->live()
                            ->searchable()
                            ->preload()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city', null);
                            })
                            ->required(),
                        Forms\Components\Select::make('state_id')
                        ->label('State Name')
                            // ->relationship(name: 'state', titleAttribute: 'name')
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->afterStateUpdated(fn(Set $set) => $set('city_id', null))
                            ->live()
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('city_id')
                            // ->relationship(name: 'city', titleAttribute: 'name')
                            ->label('City Name')
                            ->options(fn(Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->live()
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('department_id')
                            ->relationship(name: 'department', titleAttribute: 'name')
                            ->required(),


                    ])->columns(2),

                Forms\Components\Section::make('User Name ')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required(),
                        Forms\Components\TextInput::make('last_name')
                            ->required(),

                    ])->columns(2),

                Forms\Components\Section::make('User Adress')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->required(),
                        Forms\Components\TextInput::make('zip_code')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Dates')
                    ->schema([
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->Native(false)
                            ->displayFormat('d/m/y')
                            ->required(),
                        Forms\Components\DatePicker::make('date_hired')
                            ->Native(false)
                            ->displayFormat('d/m/y')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('first_name')
            ->columns([
                Tables\Columns\TextColumn::make('first_name'),
                
                Tables\Columns\TextColumn::make('last_name'),
                    
                Tables\Columns\TextColumn::make('department.name'),
                
                Tables\Columns\TextColumn::make('state.name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
