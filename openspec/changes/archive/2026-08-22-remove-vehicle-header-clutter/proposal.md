## Why

The vehicle details header currently renders several legacy template elements that clutter the top of the single vehicle page (`resources/views/cars-details.blade.php`):
1. A hardcoded review badge (`★ 4.96 (672 reviews)`)
2. Location info and map link (`📍 Chicago Show on map`)
3. A rental fleet code (`Fleet Code: LVA-4125`)
4. An unfunctional wishlist button (`Wishlist`)

Eliminating these elements provides a clean, modern, dealer-focused vehicle presentation highlighting only the vehicle name, retail purchase price, and financing badge.

## What Changes

- **Single Vehicle Header Cleanup ([`resources/views/cars-details.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/cars-details.blade.php))**:
  - Remove `<div class="tour-rate">` containing the review score and reviews count.
  - Remove the location paragraph and `"Show on map"` link from the meta row.
  - Remove the `"Fleet Code: LVA-4125"` paragraph and link.
  - Remove the `"Wishlist"` button, preserving the functional `Share` button with clean alignment.
  - Simplify the top header spacing so the vehicle title and pricing display prominently without unnecessary white space or empty containers.

## Capabilities

### Modified Capabilities
- `car-details-page`: Removes review badge, location line, fleet code, and wishlist button from the top vehicle showcase header on single vehicle detail pages.

## Impact

- `resources/views/cars-details.blade.php`: Header markup updated to remove review pill, location/map metadata, fleet code, and wishlist button.
