<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Raw Key-Value Settings';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label('Setting Key (Fixed)')
                    ->disabled()
                    ->degraded()
                    ->required(),
                Forms\Components\Group::make()
                    ->schema(function (Forms\Get $get, ?Model $record) {
                        $key = $record?->key ?? $get('key');
                        if (str_ends_with((string) $key, '_color')) {
                            return [
                                Forms\Components\ColorPicker::make('value')
                                    ->label('Value')
                                    ->required(),
                            ];
                        }
                        if (in_array($key, ['contact_address', 'google_map_embed', 'site_slogan'])) {
                            return [
                                Forms\Components\Textarea::make('value')
                                    ->label('Value')
                                    ->rows(3),
                            ];
                        }
                        return [
                            Forms\Components\TextInput::make('value')
                                ->label('Value'),
                        ];
                    })
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Setting Key')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
