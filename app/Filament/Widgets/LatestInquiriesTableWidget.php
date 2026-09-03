<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesTableWidget extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Inquiry::query()->with('car')->latest()->limit(5)
            )
            ->heading(__('Recent Buyer Inquiries'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Buyer Name'))
                    ->description(fn (Inquiry $record): ?string => $record->email),
                Tables\Columns\TextColumn::make('car.name')
                    ->label(__('Vehicle of Interest'))
                    ->placeholder(__('General Inquiry'))
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new', 'pending' => 'warning',
                        'received' => 'primary',
                        'read', 'seen' => 'info',
                        'contacted' => 'info',
                        'closed', 'replied' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => __('New'),
                        'pending' => __('Pending'),
                        'received' => __('Received'),
                        'read' => __('Read'),
                        'seen' => __('Seen'),
                        'contacted' => __('Contacted'),
                        'closed' => __('Closed'),
                        'replied' => __('Replied'),
                        default => ucfirst($state),
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Received'))
                    ->since()
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
