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

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?int $navigationSort = 1;

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
                                Forms\Components\Grid::make(4)->schema([
                                    Forms\Components\TextInput::make('year')
                                        ->label(__('Year'))
                                        ->numeric()
                                        ->minValue(1900)
                                        ->maxValue((int) date('Y') + 2),
                                    Forms\Components\TextInput::make('model')
                                        ->label(__('Model')),
                                    Forms\Components\Select::make('condition')
                                        ->label(__('Condition'))
                                        ->options([
                                            'new' => __('New'),
                                            'used' => __('Used'),
                                            'certified' => __('Certified'),
                                        ])
                                        ->default('used')
                                        ->required(),
                                    Forms\Components\Select::make('status')
                                        ->label(__('Status'))
                                        ->options([
                                            'available' => __('Available'),
                                            'reserved' => __('Reserved'),
                                            'sold' => __('Sold'),
                                        ])
                                        ->default('available')
                                        ->required(),
                                ]),
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
                                    ->label(__('Mileage (km)'))
                                    ->numeric(),
                                Forms\Components\TextInput::make('transmission')
                                    ->label(__('Transmission')),
                                Forms\Components\TextInput::make('seats')
                                    ->label(__('Seats'))
                                    ->numeric(),
                                Forms\Components\TextInput::make('doors')
                                    ->label(__('Doors'))
                                    ->numeric(),
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
                                Forms\Components\TextInput::make('monthly_payment')
                                    ->label(__('Monthly Installment (Optional Override)'))
                                    ->numeric()
                                    ->prefix('$'),
                                Forms\Components\TextInput::make('rating')
                                    ->label(__('Rating'))
                                    ->required()
                                    ->numeric()
                                    ->default(5),
                                Forms\Components\Textarea::make('included_in_price')
                                    ->label(__('Included in Price / Warranty'))
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('condition')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'success',
                        'certified' => 'warning',
                        default => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => __('New'),
                        'certified' => __('Certified'),
                        default => __('Used'),
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'reserved' => 'warning',
                        'sold' => 'gray',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'available' => __('Available'),
                        'reserved' => __('Reserved'),
                        'sold' => __('Sold'),
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->numeric()
                    ->formatStateUsing(fn ($state) => $state ? number_format($state) . ' km' : '-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('transmission')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('condition')
                    ->options([
                        'new' => __('New'),
                        'used' => __('Used'),
                        'certified' => __('Certified'),
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => __('Available'),
                        'reserved' => __('Reserved'),
                        'sold' => __('Sold'),
                    ]),
                Tables\Filters\SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label(__('Brand')),
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
