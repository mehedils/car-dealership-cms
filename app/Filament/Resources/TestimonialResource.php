<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?int $navigationSort = 5;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getModelLabel(): string
    {
        return __('Testimonial');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Testimonials');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author_name')
                    ->label(__('Name'))
                    ->required(),
                Forms\Components\TextInput::make('author_role')
                    ->label(__('Role')),
                Forms\Components\TextInput::make('author_avatar')
                    ->label(__('Image')),
                Forms\Components\Textarea::make('content')
                    ->label(__('Comment'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rating')
                    ->label(__('Rating'))
                    ->required()
                    ->numeric()
                    ->default(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_name')
                    ->label(__('Author'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_role')
                    ->label(__('Role'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_avatar')
                    ->label(__('Photo'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label(__('Rating'))
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
