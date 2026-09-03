<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getModelLabel(): string
    {
        return __('Service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Services');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label(__('Slug'))
                    ->helperText(__('Slug Helper'))
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label(__('Image'))
                    ->image(),

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

                Forms\Components\Toggle::make('is_active')
                    ->label(__('Active'))
                    ->required(),
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
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('Image')),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
