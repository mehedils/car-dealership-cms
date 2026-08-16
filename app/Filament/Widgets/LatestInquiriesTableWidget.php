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
                    ->colors([
                        'warning' => 'new',
                        'info' => 'contacted',
                        'success' => 'closed',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Received'))
                    ->since()
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
