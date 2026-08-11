## Why

Currently, in `Homepage Settings > Hero Section`, there is no option for site administrators to upload a custom background image for the main hero section. The hero background defaults to a hardcoded image asset. Adding a dedicated FileUpload control with ideal resolution guidance (3838×1784 px or 1920×892 px, ~2.15:1 aspect ratio) empowers admins to personalize the dealership banner dynamically.

## What Changes

- **Filament Hero Background Image Upload**: Add a `FileUpload` field for `home_hero_bg_image` in `ManageHomepageSettings.php` under the Hero Section tab, complete with optimal dimension hints (`3838×1784 px` / `1920×892 px`).
- **Dynamic Blade & CSS Rendering**: Update `resources/views/sections/hero.blade.php` and `public/assets/css/custom.css` to pass `--hero-bg-url` into `.bg-shape::before`, falling back to `assets/imgs/hero/hero-1/banner.png` if unset.

## Capabilities

### New Capabilities
- `hero-background-image-settings`: Hero section background image upload control in Filament Admin with ideal size guidance and Blade/CSS fallback handling.

### Modified Capabilities
- None.

## Impact

- **Filament Admin**: `app/Filament/Pages/ManageHomepageSettings.php` (Hero Section tab).
- **Blade & CSS**: `resources/views/sections/hero.blade.php`, `public/assets/css/custom.css`.
