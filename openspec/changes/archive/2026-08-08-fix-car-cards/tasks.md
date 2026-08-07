## 1. Environment Configuration

- [x] 1.1 Update `.env` to set `APP_URL=http://127.0.0.1:8000` so Spatie Media Library absolute URLs resolve correctly for local development.

## 2. Seeder Updates

- [x] 2.1 Update `database/seeders/DatabaseSeeder.php` to completely remove the `'duration' => 'per day'` assignment during Car creation.

## 3. UI and Blade Template Refactoring

- [x] 3.1 Update `resources/views/partials/car-card.blade.php` to remove the `/ {{ duration }}` rendering logic from the pricing block.
- [x] 3.2 Update `resources/views/partials/car-card.blade.php` to replace the `text-nowrap` class on the car title with `text-truncate` to elegantly truncate long names.
- [x] 3.3 Update `resources/views/partials/car-card.blade.php` to modify the "View Details" button to a compact arrow icon or narrower text and remove the bulky `btn-gray` horizontal padding.
