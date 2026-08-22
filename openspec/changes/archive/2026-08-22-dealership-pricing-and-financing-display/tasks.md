## 1. Database & Filament CMS

- [x] 1.1 Create migration to add `original_price` to `cars` table and update `App\Models\Car` casts and guarded properties.
- [x] 1.2 Add `original_price` field under `Pricing & Inclusions` tab in `app/Filament/Resources/CarResource.php`.

## 2. Blade Templates & Rental Rate Purge

- [x] 2.1 Update `resources/views/cars-details.blade.php` to purge `/ day`, prominently render total purchase price with currency, strike-through original price, and financing badge tag.
- [x] 2.2 Update `resources/views/partials/car-card.blade.php` to render total purchase price, strike-through discount comparison, and monthly installment sub-tag without rental labels.
- [x] 2.3 Remove static `/ day` labels from `resources/views/dealer-details.blade.php`.

## 3. Seed Data, Localization & Verification

- [x] 3.1 Update `database/seeders/DatabaseSeeder.php` with sample `original_price` discounts and add Spanish localization keys in `lang/es.json`.
- [x] 3.2 Run test suite and verify `/cars`, homepage, and `/cars/{slug}` render purchase pricing and financing badges cleanly.
