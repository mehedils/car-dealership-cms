## Why

Category card arrow buttons (`.card-popular .card-button a`) suffer from poor visual alignment and hover contrast issues—the arrow icon turns bright neon green over a solid red circle on card hover.

## What Changes

- **Category Card Arrow Styling & Hover Contrast**: Update `.card-popular .card-button a` and its hover state in `public/assets/css/custom.css` to enforce perfect flex center alignment and crisp white (`#ffffff`) arrow icons on hover over primary theme background (`var(--bs-brand-2)`).
- **Inline SVG Arrow in View**: Replace Flaticon `<i>` tag in `resources/views/sections/categories.blade.php` with a clean SVG arrow for precision center alignment.

## Capabilities

### New Capabilities
- `category-card-arrow-button-styling`: Styled category card circular arrow buttons with white hover icon contrast.

### Modified Capabilities
- None.

## Impact

- **Views**: `resources/views/sections/categories.blade.php`.
- **Styles**: `public/assets/css/custom.css`.
