## 1. Icon Library Package & Config Setup

- [x] 1.1 Install `owenvoke/blade-fontawesome` via Composer. Verify package registration in `composer.json` and vendor autoloading.
- [x] 1.2 Configure `config/icon-picker.php` to register `fontawesome-solid`, `fontawesome-regular`, and `fontawesome-brands` alongside `heroicons` for `Guava\FilamentIconPicker`. Verify icon sets are available to the picker.

## 2. Reusable Frontend Icon Component

- [x] 2.1 Create `resources/views/components/app-icon.blade.php` supporting uploaded image files, Blade vector dynamic components, and legacy font classes. Verify standalone component rendering for each format.
- [x] 2.2 Update `resources/views/sections/why-us.blade.php` to render feature icons using `<x-app-icon>`. Verify section rendering on the homepage.
- [x] 2.3 Update `resources/views/sections/services.blade.php` and `resources/views/services.blade.php` to render service icons using `<x-app-icon>`. Verify service cards on homepage and services page.
- [x] 2.4 Update `resources/views/cars-details.blade.php` to render vehicle amenity icons using `<x-app-icon>`. Verify car details features list.

## 3. Admin Dual-Source Icon Management in Filament

- [x] 3.1 Update `AmenityResource.php` with dual-source icon fields (Library Picker + Custom File Upload) and state synchronization on save. Verify admin form and table rendering.
- [x] 3.2 Update `ServiceResource.php` with dual-source icon fields (Library Picker + Custom File Upload) and state synchronization on save. Verify admin form and table rendering.
- [x] 3.3 Update `WhyUsFeatureResource.php` with dual-source icon fields (Library Picker + Custom File Upload) and state synchronization on save. Verify admin form and table rendering.

## 4. End-to-End Verification

- [x] 4.1 Verify picking a library icon (e.g. `fas-car`, `fas-gas-pump`) saves and renders cleanly on both admin and frontend.
- [x] 4.2 Verify uploading a custom SVG/PNG file saves to storage and renders cleanly in amenity/service/feature cards.
- [x] 4.3 Verify backward compatibility with existing records using `fi fi-rr-*` and `heroicon-*`.
