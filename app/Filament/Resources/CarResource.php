<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    public static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }

    public static function getModelLabel(): string
    {
        return __('Car');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Cars');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('Basic Info'))
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('Name'))
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (\Filament\Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->label(__('Slug'))
                                    ->required(),
                                Forms\Components\Select::make('brand_id')
                                    ->label(__('Brand'))
                                    ->relationship('brand', 'name')
                                    ->required(),
                                Forms\Components\Select::make('car_type_id')
                                    ->label(__('Car Type'))
                                    ->relationship('carType', 'name')
                                    ->required(),
                                Forms\Components\Select::make('fuel_type_id')
                                    ->label(__('Fuel Type'))
                                    ->relationship('fuelType', 'name')
                                    ->required(),
                                Forms\Components\Select::make('location_id')
                                    ->label(__('Location'))
                                    ->relationship('location', 'name')
                                    ->required(),
                                Forms\Components\Select::make('amenities')
                                    ->label(__('Amenities'))
                                    ->relationship('amenities', 'name')
                                    ->multiple(),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label(__('Is Featured'))
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label(__('Description'))
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Specifications'))
                            ->schema([
                                Forms\Components\TextInput::make('mileage')
                                    ->label(__('Mileage'))
                                    ->numeric(),
                                Forms\Components\TextInput::make('transmission')
                                    ->label(__('Transmission')),
                                Forms\Components\TextInput::make('seats')
                                    ->label(__('Seats'))
                                    ->numeric(),
                                Forms\Components\TextInput::make('doors')
                                    ->label(__('Doors'))
                                    ->numeric(),
                                Forms\Components\TextInput::make('luggage')
                                    ->label(__('Luggage')),
                                Forms\Components\TextInput::make('engine_capacity')
                                    ->label(__('Engine')),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Images'))
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                                    ->label(__('Gallery'))
                                    ->collection('gallery')
                                    ->multiple()
                                    ->reorderable()
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Pricing & Inclusions'))
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->label(__('Price'))
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),
                                Forms\Components\TextInput::make('duration')
                                    ->label(__('Duration')),
                                Forms\Components\TextInput::make('rating')
                                    ->label(__('Rating'))
                                    ->required()
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Textarea::make('included_in_price')
                                    ->label(__('Included in Price'))
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('carType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fuelType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('mileage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('transmission')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seats')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('doors')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('luggage')
                    ->searchable(),
                Tables\Columns\TextColumn::make('engine_capacity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
