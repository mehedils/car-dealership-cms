## Why

Currently, admins must manually type out URL slugs for entities like Brands, Car Types, Cars, Services, and Blog Posts. Automatically pre-filling the slug as the user types the name or title saves time, prevents typos, and ensures consistency while keeping the field fully editable.

## What Changes

- Add reactive state listeners (`live(onBlur: true)` and `afterStateUpdated`) to auto-populate the `slug` field based on `name` or `title` across all relevant Filament resources.
- Resources impacted: `BrandResource`, `CarTypeResource`, `CarResource`, `ServiceResource`, `BlogPostResource`.

## Capabilities

### New Capabilities
<!-- None -->

### Modified Capabilities
- `admin-panel`: Slugs will be automatically generated from title/name fields while remaining manually editable.

## Impact

- Modifies `app/Filament/Resources/BrandResource.php`
- Modifies `app/Filament/Resources/CarTypeResource.php`
- Modifies `app/Filament/Resources/CarResource.php`
- Modifies `app/Filament/Resources/ServiceResource.php`
- Modifies `app/Filament/Resources/BlogPostResource.php`
