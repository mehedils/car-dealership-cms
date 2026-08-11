## 1. Filament Admin FileUpload Control

- [x] 1.1 Add `FileUpload::make('home_hero_bg_image')` in `app/Filament/Pages/ManageHomepageSettings.php` (Hero Section tab) with dimension hint `Optimal size: 3838×1784 px or 1920×892 px (~2.15:1 Ratio)`.

## 2. Frontend Rendering & CSS Override

- [x] 2.1 Update `resources/views/sections/hero.blade.php` to resolve `home_hero_bg_image` URL and pass `--hero-bg-url` inline style on `.bg-shape`.
- [x] 2.2 Add CSS rule in `public/assets/css/custom.css` setting `.block-banner-home1 .bg-shape::before { background-image: var(--hero-bg-url, url(../imgs/hero/hero-1/banner.png)) !important; }`.

## 3. Verification

- [x] 3.1 Verify Filament Hero Section displays the image upload control with exact image size guidance.
- [x] 3.2 Test uploading a custom hero image and verifying fallback behavior.
