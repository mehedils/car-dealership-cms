<?php

namespace App\Filament\Resources\WhyUsFeatureResource\Pages;

use App\Filament\Resources\WhyUsFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyUsFeature extends EditRecord
{
    protected static string $resource = WhyUsFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
