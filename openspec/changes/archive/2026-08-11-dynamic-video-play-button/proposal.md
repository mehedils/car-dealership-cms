## Why

The homepage CTA video play button relies on a static, hardcoded neon green PNG image asset (`public/assets/imgs/cta/cta-1/play.png`), preventing it from respecting the primary theme color configured in the Admin Panel.

## What Changes

- **Create Reusable Play Button Component**: Create `resources/views/components/play-button.blade.php` accepting `@props(['size', 'bg', 'color'])` that dynamically defaults to primary theme color settings (`setting('primary_color')` and `setting('button_text_color')`).
- **Update CTA Section**: Replace the static `.btn-play` image background in `resources/views/sections/cta.blade.php` with `<x-play-button />`.
- **Add Micro-animations**: Add smooth hover scaling and shadow glow styles in `public/assets/css/custom.css`.

## Capabilities

### New Capabilities
- `dynamic-play-button-component`: Dynamic SVG video play button Blade component with theme color integration.

### Modified Capabilities
- None.

## Impact

- **New File**: `resources/views/components/play-button.blade.php`.
- **Modified Views**: `resources/views/sections/cta.blade.php`.
- **Modified Styles**: `public/assets/css/custom.css`.
