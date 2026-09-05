## 1. Dynamic Contact Page & Branch Locations

- [x] 1.1 Create a database migration adding nullable `phone` and `email` columns to the `locations` table and verify migration applies cleanly via `php artisan migrate`.
- [x] 1.2 Update `app/Filament/Resources/LocationResource.php` form and table schemas to include `phone` and `email` fields.
- [x] 1.3 Update `routes/web.php` `/contact` route closure to retrieve and pass all `Location` records (`$locations = Location::all()`) to `resources/views/contact.blade.php`.
- [x] 1.4 Refactor `resources/views/contact.blade.php` to iterate over `$locations`, displaying branch cards with dynamic name, address, phone, and email, with fallback to primary dealership settings when no locations exist.

## 2. Homepage Brands Showcase Headings

- [x] 2.1 Add a Brands Showcase tab to `app/Filament/Pages/ManageHomepageSettings.php` with text fields for `home_brands_title`, `home_brands_subtitle`, and `home_brands_button_text`.
- [x] 2.2 Update `resources/views/sections/brand.blade.php` to dynamically output `home_brands_title`, `home_brands_subtitle`, and `home_brands_button_text` with template fallbacks.

## 3. About Us Page Story & Hero Customization

- [x] 3.1 Add an About Page tab to `app/Filament/Pages/ManageSettings.php` with fields for `about_hero_title`, `about_hero_subtitle`, `about_hero_bg_image`, `about_story_badge`, `about_story_title`, `about_story_description`, and `about_story_image`.
- [x] 3.2 Update `resources/views/about.blade.php` to render the dynamic story title, badge, narrative body, and imagery with template fallbacks.

## 4. Testing and Automated Verification

- [x] 4.1 Write automated feature tests in `tests/Feature/DynamicContentTest.php` asserting that custom settings for brands, about story, and contact locations render correctly on `/`, `/about`, and `/contact`.
- [x] 4.2 Run `php artisan test` to confirm all unit and feature tests pass with zero regressions.
- [x] 4.3 Run `bun tests/visual_e2e_test.js` to confirm all 18 routes pass cleanly with zero console or network errors.
