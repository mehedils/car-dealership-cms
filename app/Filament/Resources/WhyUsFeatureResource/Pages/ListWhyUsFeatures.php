<?php

namespace App\Filament\Resources\WhyUsFeatureResource\Pages;

use App\Filament\Resources\WhyUsFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyUsFeatures extends ListRecords
{
    protected static string $resource = WhyUsFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
