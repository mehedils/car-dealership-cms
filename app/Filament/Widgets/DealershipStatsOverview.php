<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use App\Models\Inquiry;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DealershipStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $currency = (string) setting('currency_symbol', '$');

        $totalCars = Car::count();
        $featuredCars = Car::where('is_featured', true)->count();

        $totalValuation = (float) Car::sum('price');
        $avgPrice = (float) ($totalCars > 0 ? Car::avg('price') : 0);

        $totalInquiries = Inquiry::count();
        $newInquiries = Inquiry::whereIn('status', ['new', 'pending', 'received'])->count();

        $formattedValuation = $this->formatCurrencyCompact($currency, $totalValuation);
        $formattedAvgPrice = $currency . number_format($avgPrice);

        return [
            Stat::make(__('Showroom Inventory'), (string) $totalCars)
                ->description($featuredCars . ' ' . __('Featured Models'))
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('primary'),

            Stat::make(__('Showroom Valuation'), $formattedValuation)
                ->description(__('Total Inventory Portfolio'))
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make(__('Buyer Inquiries'), (string) $totalInquiries)
                ->description($newInquiries . ' ' . __('New / Unread Leads'))
                ->descriptionIcon('heroicon-m-envelope')
                ->color($newInquiries > 0 ? 'warning' : 'gray'),

            Stat::make(__('Avg. Vehicle Price'), $formattedAvgPrice)
                ->description(__('Per Showroom Unit'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
        ];
    }

    protected function formatCurrencyCompact(string $currency, float $amount): string
    {
        if ($amount >= 1000000) {
            return $currency . round($amount / 1000000, 2) . 'M';
        }
        if ($amount >= 1000) {
            return $currency . round($amount / 1000, 1) . 'k';
        }

        return $currency . number_format($amount);
    }
}
