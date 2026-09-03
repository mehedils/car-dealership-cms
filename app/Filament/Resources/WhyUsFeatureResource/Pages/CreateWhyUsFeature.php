<?php

namespace App\Filament\Resources\WhyUsFeatureResource\Pages;

use App\Filament\Resources\WhyUsFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWhyUsFeature extends CreateRecord
{
    protected static string $resource = WhyUsFeatureResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (($data['icon_type'] ?? 'library') === 'upload' && !empty($data['icon_file'])) {
            $data['icon'] = $data['icon_file'];
        }
        unset($data['icon_type'], $data['icon_file']);

        return $data;
    }
}
