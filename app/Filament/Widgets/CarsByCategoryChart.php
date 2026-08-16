<?php

namespace App\Filament\Widgets;

use App\Models\CarType;
use Filament\Widgets\ChartWidget;

class CarsByCategoryChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public function getHeading(): ?string
    {
        return __('Showroom by Body Type');
    }

    protected function getData(): array
    {
        $types = CarType::has('cars')
            ->withCount('cars')
            ->get();

        if ($types->isEmpty()) {
            return [
                'datasets' => [
                    [
                        'data' => [0],
                        'backgroundColor' => ['#e4e6e8'],
                    ],
                ],
                'labels' => [__('No vehicles listed')],
            ];
        }

        $labels = $types->pluck('name')->toArray();
        $counts = $types->pluck('cars_count')->toArray();

        $colors = [
            '#70f46d',
            '#8acfff',
            '#f59e0b',
            '#ec4899',
            '#8b5cf6',
            '#06b6d4',
            '#10b981',
            '#f43f5e',
        ];

        $backgroundColors = array_slice($colors, 0, count($labels));
        while (count($backgroundColors) < count($labels)) {
            $backgroundColors = array_merge($backgroundColors, $colors);
        }
        $backgroundColors = array_slice($backgroundColors, 0, count($labels));

        return [
            'datasets' => [
                [
                    'label' => __('Vehicles'),
                    'data' => $counts,
                    'backgroundColor' => $backgroundColors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
