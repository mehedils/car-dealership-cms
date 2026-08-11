## Why

Currently, feature bullet tick icons (`.list-ticks-green li`) used in the Hero and CTA sections rely on a static SVG background image (`tick-list.svg`) with hardcoded green fill (`#5EDD5B`). Consequently, when the primary brand color is changed in Filament Admin Settings, the bullet checkmark icons remain green rather than adapting dynamically to match the configured brand primary theme color (`setting('primary_color')`).

## What Changes

- **Custom Blade Component `<x-tick-icon />`**: Create a reusable Laravel Blade component `resources/views/components/tick-icon.blade.php` that renders inline SVG checkmark graphics accepting dynamic `color` (defaulting to `setting('primary_color', '#70f46d')`) and checkmark fill (`setting('button_text_color', '#101010')`).
- **Blade Template Integration**: Update `resources/views/sections/hero.blade.php` and `resources/views/sections/cta.blade.php` to render `<x-tick-icon />` directly inline inside list items.
- **CSS Styling Adjustment**: Update `.list-ticks-green li` in `public/assets/css/custom.css` to disable background images and align inline flex items cleanly.

## Capabilities

### New Capabilities
- `dynamic-bullet-theme-colors`: Custom Blade component `<x-tick-icon />` for dynamic SVG checkmark rendering accepting primary brand colors.

### Modified Capabilities
- None.

## Impact

- **New Blade Component**: `resources/views/components/tick-icon.blade.php`.
- **Blade Templates**: `resources/views/sections/hero.blade.php`, `resources/views/sections/cta.blade.php`.
- **CSS**: `public/assets/css/custom.css`.
