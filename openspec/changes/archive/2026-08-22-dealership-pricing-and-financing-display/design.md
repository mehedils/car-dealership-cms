## Context

The dealership requirements specify removing all legacy rental pricing syntax (`/ day`, `/hour`, `/per day`) and displaying total vehicle retail purchase prices, optional strike-through MSRP discounts, and estimated monthly financing badges.

See `proposal.md` for motivation and scope.

## Goals / Non-Goals

**Goals:**
- Purge `/ day`, `/per day`, `/hour` across `cars-details.blade.php`, `partials/car-card.blade.php`, and `dealer-details.blade.php`.
- Add `original_price` column to `cars` database table (nullable decimal).
- Expose `original_price` field in Filament `CarResource` under `Pricing & Inclusions`.
- Render prominent total purchase price (e.g. `$28,500 USD` on detail page, `$28,500` on cards) and strike-through original price if `original_price > price`.
- Render dynamic financing badges:
  - On `cars-details.blade.php`: `<span class="badge bg-light text-primary border rounded-pill px-3 py-1 mt-1 text-xs-bold"><i class="fi fi-rr-credit-card me-1"></i>{{ __('Financiamiento disponible desde $:amount/mes', ['amount' => number_format($car->estimated_monthly_payment)]) }}</span>`
  - On `partials/car-card.blade.php`: `<span class="text-xs neutral-500 mt-1 d-block">{{ __('Desde :amount/mes', ['amount' => '$' . number_format($monthly)]) }}</span>`

**Non-Goals:**
- Modifying non-pricing vehicle specifications or amenities.

## Decisions

1. **Database Schema & Model**:
   - Migration: `2026_08_22_013000_add_original_price_to_cars_table.php` adding `$table->decimal('original_price', 10, 2)->nullable()->after('price');`.
   - Update `Car` model `$casts` to include `'original_price' => 'decimal:2'`.
2. **Filament CMS Resource**:
   - In `app/Filament/Resources/CarResource.php`, add `TextInput::make('original_price')->label(__('Original / MSRP Price (Optional Strike-through)'))->numeric()->prefix('$')`.
3. **Card & Detail Blade Templates**:
   - In `partials/car-card.blade.php`, organize `.card-price` to show price + strike-through and a sub-line with `"Desde $380/mes"`.
   - In `cars-details.blade.php`, update header price column to display total price, currency suffix (`USD`), strike-through original price, and financing badge tag while deleting `/ day`.
   - In `dealer-details.blade.php`, remove static `/ day` labels.
4. **Localization**:
   - Provide Spanish translations in `lang/es.json` for all financing badge strings.

## Risks / Trade-offs

- [Layout in card footer] → Verify that the two-line price block in `.card-price` aligns neatly with the right-hand `"View Details"` button in `partials/car-card.blade.php` without wrapping or height issues.
