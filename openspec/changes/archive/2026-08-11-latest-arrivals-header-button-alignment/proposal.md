## Why

In the Latest Arrivals section (`resources/views/sections/cars-latest.blade.php`), the "View All Inventory" button floats awkwardly high above the section subtitle line due to unaligned flex row properties.

## What Changes

- **Header Alignment Fix**: Update `resources/views/sections/cars-latest.blade.php` to use `row align-items-center mb-40` with `d-inline-flex align-items-center gap-2` on the button link, matching section header conventions across the site.
- **Button Micro-animation**: Ensure the "View All Inventory" button responds with scale and shadow elevation on hover.

## Capabilities

### New Capabilities
- `latest-arrivals-header-alignment`: Clean vertical alignment for Latest Arrivals section header button.

### Modified Capabilities
- None.

## Impact

- **Views**: `resources/views/sections/cars-latest.blade.php`.
