<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmenityResource\Pages;
use App\Filament\Resources\AmenityResource\RelationManagers;
use App\Models\Amenity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AmenityResource extends Resource
{
    protected static ?string $model = Amenity::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }

    public static function getModelLabel(): string
    {
        return __('Feature');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Features');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),

                Forms\Components\Radio::make('icon_type')
                    ->label(__('Icon Type'))
                    ->options([
                        'library' => __('Select from Icon Library'),
                        'upload' => __('Upload Custom Icon (SVG / PNG)'),
                    ])
                    ->default(fn (?Model $record) => ($record && (str_contains($record->icon ?? '', '/') || str_ends_with($record->icon ?? '', '.svg') || str_ends_with($record->icon ?? '', '.png') || str_ends_with($record->icon ?? '', '.webp'))) ? 'upload' : 'library')
                    ->live()
                    ->dehydrated(false),

                \Guava\FilamentIconPicker\Forms\IconPicker::make('icon')
                    ->label(__('Icon from Library'))
                    ->visible(fn (Forms\Get $get) => ($get('icon_type') ?? 'library') === 'library')
                    ->searchable()
                    ->dehydrateStateUsing(function ($state, Forms\Get $get) {
                        if ($get('icon_type') === 'upload') {
                            return $get('icon_file');
                        }
                        return $state;
                    }),

                Forms\Components\FileUpload::make('icon_file')
                    ->label(__('Upload Custom Icon File'))
                    ->image()
                    ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                    ->directory('icons')
                    ->preserveFilenames()
                    ->visible(fn (Forms\Get $get) => $get('icon_type') === 'upload')
                    ->formatStateUsing(fn (?Model $record) => ($record && (str_contains($record->icon ?? '', '/') || str_ends_with($record->icon ?? '', '.svg') || str_ends_with($record->icon ?? '', '.png') || str_ends_with($record->icon ?? '', '.webp'))) ? $record->icon : null)
                    ->dehydrated(false)
                    ->helperText(__('Upload a custom SVG, PNG, or WebP icon file.')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\ViewColumn::make('icon')
                    ->label(__('Icon'))
                    ->view('filament.tables.columns.icon-preview')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
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
            'index' => Pages\ListAmenities::route('/'),
            'create' => Pages\CreateAmenity::route('/create'),
            'edit' => Pages\EditAmenity::route('/{record}/edit'),
        ];
    }
}
