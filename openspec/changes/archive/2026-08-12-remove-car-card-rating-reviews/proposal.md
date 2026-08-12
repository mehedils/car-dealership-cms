## Why

Car cards across the site currently render a star rating and review count badge (`<div class="card-rating">`), which clutters the UI card layout. Removing this badge simplifies car cards for a cleaner, modern presentation.

## What Changes

- **Remove Rating & Review Badge**: Remove `<div class="card-rating">...</div>` from `resources/views/partials/car-card.blade.php`.

## Capabilities

### New Capabilities
- `car-card-rating-removal`: Cleaner car card component without rating & review badge clutter.

### Modified Capabilities
- None.

## Impact

- **Views**: `resources/views/partials/car-card.blade.php`.
