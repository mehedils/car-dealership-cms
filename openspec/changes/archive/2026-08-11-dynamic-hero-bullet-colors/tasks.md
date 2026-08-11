## 1. Custom Blade Component Creation

- [x] 1.1 Create `resources/views/components/tick-icon.blade.php` with dynamic `@props(['color', 'size'])`.
- [x] 1.2 Update `.list-ticks-green li` in `public/assets/css/custom.css` to disable background images and enforce flex alignment.

## 2. Blade View Integration

- [x] 2.1 Update `resources/views/sections/hero.blade.php` to use `<x-tick-icon />` for bullet list items.
- [x] 2.2 Update `resources/views/sections/cta.blade.php` to use `<x-tick-icon />` for feature list items.

## 3. Verification

- [x] 3.1 Verify checkmark bullet icons update dynamically when primary theme color is changed in Filament Admin Settings.
