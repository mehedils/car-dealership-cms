<?php

namespace App\Filament\Resources\AmenityResource\Pages;

use App\Filament\Resources\AmenityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAmenity extends CreateRecord
{
    protected static string $resource = AmenityResource::class;
    protected static ?string $title = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (($data['icon_type'] ?? 'library') === 'upload' && !empty($data['icon_file'])) {
            $data['icon'] = $data['icon_file'];
        }
        unset($data['icon_type'], $data['icon_file']);

        return $data;
    }
}
