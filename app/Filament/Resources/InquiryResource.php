<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Filament\Resources\InquiryResource\RelationManagers;
use App\Models\Inquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Leads');
    }

    public static function getModelLabel(): string
    {
        return __('Lead');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Leads');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('car_id')
                    ->label(__('Car'))
                    ->relationship('car', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label(__('Phone'))
                    ->tel(),
                Forms\Components\Textarea::make('message')
                    ->label(__('Message'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status')
                    ->label(__('Status'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
