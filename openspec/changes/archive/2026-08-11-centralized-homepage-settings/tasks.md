## 1. Filament Admin Homepage Settings Page Setup

- [x] 1.1 Create `App\Filament\Pages\ManageHomepageSettings` page class under navigation group `Website Content`.
- [x] 1.2 Create Blade view `resources/views/filament/pages/manage-homepage-settings.blade.php`.
- [x] 1.3 Build 9 form tabs in `ManageHomepageSettings.php`: Section Visibility, Hero Section, Featured Vehicles, CTA Banner, Categories, Why Choose Us, Latest Arrivals, Services & Testimonials, and Blog & News.
- [x] 1.4 Implement save method in `ManageHomepageSettings.php` to persist form values into the `settings` database table.

## 2. Frontend Blade View Integration & Default Protection

- [x] 2.1 Update `resources/views/home.blade.php` to wrap each homepage section `@include` in a `@if(setting('home_show_*', true))` conditional check.
- [x] 2.2 Update `resources/views/sections/hero.blade.php` to use `setting('home_hero_*', 'Default')` copy and bullet points.
- [x] 2.3 Update `resources/views/sections/cars-featured.blade.php` to use dynamic title and subtitle settings.
- [x] 2.4 Update `resources/views/sections/cta.blade.php` to use dynamic badge, title, description, video link, promo image, and bullet settings.
- [x] 2.5 Update `resources/views/sections/categories.blade.php` to use dynamic title and subtitle settings.
- [x] 2.6 Update `resources/views/sections/why-us.blade.php` to use dynamic title and subtitle settings.
- [x] 2.7 Update `resources/views/sections/cars-latest.blade.php` to use dynamic title and subtitle settings.
- [x] 2.8 Update `resources/views/sections/services.blade.php` to use dynamic title and subtitle settings.
- [x] 2.9 Update `resources/views/sections/testimonials.blade.php` to use dynamic title and subtitle settings.
- [x] 2.10 Update `resources/views/sections/blog.blade.php` to use dynamic title, subtitle, and button text settings.

## 3. Verification & Testing

- [x] 3.1 Verify Filament Admin panel displays `Website Content > Homepage Settings` and correctly loads/saves values into `settings` table.
- [x] 3.2 Test toggling individual sections off/on to confirm `resources/views/home.blade.php` respects section visibility settings.
- [x] 3.3 Verify unconfigured settings fall back cleanly to original template copy without layout breakage.
