<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Leads');
    }

    public static function getModelLabel(): string
    {
        return __('Review');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Reviews');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('car_id')
                    ->label(__('Car'))
                    ->relationship('car', 'name')
                    ->required(),
                Forms\Components\TextInput::make('user_name')
                    ->label(__('Name'))
                    ->required(),
                Forms\Components\TextInput::make('user_email')
                    ->label(__('Email'))
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('rating')
                    ->label(__('Rating'))
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('comment')
                    ->label(__('Comment'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_approved')
                    ->label(__('Active'))
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
                Tables\Columns\TextColumn::make('user_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->boolean(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
