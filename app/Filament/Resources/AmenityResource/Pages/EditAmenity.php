<?php

namespace App\Filament\Resources\AmenityResource\Pages;

use App\Filament\Resources\AmenityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmenity extends EditRecord
{
    protected static string $resource = AmenityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $icon = $data['icon'] ?? '';
        $isUpload = str_contains($icon, '/') || str_ends_with($icon, '.svg') || str_ends_with($icon, '.png') || str_ends_with($icon, '.webp');

        $data['icon_type'] = $isUpload ? 'upload' : 'library';
        if ($isUpload) {
            $data['icon_file'] = $icon;
            $data['icon'] = null;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (($data['icon_type'] ?? 'library') === 'upload' && !empty($data['icon_file'])) {
            $data['icon'] = $data['icon_file'];
        }
        unset($data['icon_type'], $data['icon_file']);

        return $data;
    }
}
