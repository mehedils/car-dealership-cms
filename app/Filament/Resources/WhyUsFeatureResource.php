<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsFeatureResource\Pages;
use App\Filament\Resources\WhyUsFeatureResource\RelationManagers;
use App\Models\WhyUsFeature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhyUsFeatureResource extends Resource
{
    protected static ?string $model = WhyUsFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getModelLabel(): string
    {
        return __('Highlight');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Highlights');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),

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

                Forms\Components\TextInput::make('sort_order')
                    ->label(__('Sort Order'))
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                Tables\Columns\ViewColumn::make('icon')
                    ->label(__('Icon'))
                    ->view('filament.tables.columns.icon-preview')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label(__('Sort Order'))
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListWhyUsFeatures::route('/'),
            'create' => Pages\CreateWhyUsFeature::route('/create'),
            'edit' => Pages\EditWhyUsFeature::route('/{record}/edit'),
        ];
    }
}
