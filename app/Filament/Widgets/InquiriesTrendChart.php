<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Widgets\ChartWidget;

class InquiriesTrendChart extends ChartWidget
{
    protected static ?int $sort = 2;

    public function getHeading(): ?string
    {
        return __('Buyer Inquiries (Last 6 Months)');
    }

    protected function getData(): array
    {
        $inquiryCounts = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->startOfMonth()->subMonths($i);
            $labels[] = $date->format('M Y');

            $count = Inquiry::whereBetween('created_at', [
                $date->copy()->startOfMonth(),
                $date->copy()->endOfMonth(),
            ])->count();

            $inquiryCounts[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => __('Inquiries Received'),
                    'data' => $inquiryCounts,
                    'fill' => 'start',
                    'borderColor' => '#70f46d',
                    'backgroundColor' => 'rgba(112, 244, 109, 0.15)',
                    'tension' => 0.35,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
