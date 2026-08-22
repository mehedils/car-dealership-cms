## Why

The dealership website must present vehicles as retail and pre-owned vehicle purchases rather than rentals. Legacy rental rate indicators (`/ day`, `/hour`, `/month`) must be completely purged across the entire website. The total vehicle purchase price must be prominently displayed (with currency and strike-through original MSRP if discounted), paired with an attractive financing tag (e.g., "Financiamiento disponible desde $380/mes") to drive buyer engagement and finance inquiries.

## What Changes

- **Rental Rate Purge**:
  - Remove all occurrences of `/ day`, `/per day`, `/hour`, or rental rate suffixes across all views (`cars-details.blade.php`, `partials/car-card.blade.php`, `dealer-details.blade.php`, etc.).
- **Total Purchase Price Display & Strike-Through**:
  - Display the prominent vehicle purchase price formatted with currency (e.g., `$28,500 USD`).
  - Add support for an optional `original_price` field in `cars` database table and Filament `CarResource`.
  - When `original_price` is present and greater than `price`, render a strike-through discount comparison (e.g. `~~$32,000~~ $28,500`).
- **Financing Badges & Monthly Payment Tags**:
  - On vehicle detail page (`cars-details.blade.php`), render a dedicated financing tag next to the price: `"Financiamiento disponible desde $380/mes"` (localized via `__()`).
  - On vehicle cards (`partials/car-card.blade.php`), display the concise monthly installment subtitle below the price: `"Desde $380/mes"`.
  - Calculate the estimated monthly payment using `$car->estimated_monthly_payment` or admin-configured `monthly_payment` override.

## Capabilities

### Modified Capabilities
- `car-details-page`: Requires purging rental suffixes, displaying total purchase price prominently with currency and strike-through original price if discounted, and rendering the financing availability tag.
- `dealership-inventory-search-and-grid`: Requires vehicle cards (`partials/car-card.blade.php`) to display total purchase price, strike-through discount comparison, and monthly installment estimate without rental labels.

## Impact

- `database/migrations/`: New migration to add `original_price` column to `cars` table.
- `app/Models/Car.php`: Added `original_price` to guarded/casts.
- `app/Filament/Resources/CarResource.php`: Added `original_price` field under `Pricing & Inclusions`.
- `resources/views/cars-details.blade.php`: Updated header pricing block with purchase price, strike-through MSRP, and financing badge.
- `resources/views/partials/car-card.blade.php`: Updated price container with purchase price, discount strike-through, and monthly installment tag.
- `resources/views/dealer-details.blade.php`: Removed static `/ day` labels.
- `database/seeders/DatabaseSeeder.php`: Updated car seeding to include realistic `original_price` discounts and `monthly_payment` values.
