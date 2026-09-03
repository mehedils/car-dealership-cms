<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (($data['icon_type'] ?? 'library') === 'upload' && !empty($data['icon_file'])) {
            $data['icon'] = $data['icon_file'];
        }
        unset($data['icon_type'], $data['icon_file']);

        return $data;
    }
}
