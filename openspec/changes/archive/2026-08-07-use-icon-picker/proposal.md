## Why

Currently, models like `Amenity`, `Service`, and `WhyUsFeature` require the dealership owner to manually type icon names (e.g., `heroicon-o-check-circle`) into a text input. This is poor UX. We want to provide a visual, searchable icon picker to make managing content as simple as possible.

## What Changes

- Install the `guava/filament-icon-picker` package.
- Update `AmenityResource`, `ServiceResource`, and `WhyUsFeatureResource` to replace the `TextInput` for the `icon` field with the new `IconPicker` component.

## Capabilities

### New Capabilities
<!-- None -->

### Modified Capabilities
- `admin-panel`: Forms for models with icons will use a visual icon picker instead of a text input.

## Impact

- Adds `guava/filament-icon-picker` dependency via Composer.
- Modifies `app/Filament/Resources/AmenityResource.php`
- Modifies `app/Filament/Resources/ServiceResource.php`
- Modifies `app/Filament/Resources/WhyUsFeatureResource.php`
