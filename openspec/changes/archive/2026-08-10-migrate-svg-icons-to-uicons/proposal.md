## Why

Currently, the Carento theme relies on static `.svg` asset files loaded via `<img>` tags and raw inline `<svg>` blocks with hardcoded hex colors across Blade views. Because `<img>` elements create isolated shadow contexts and inline SVGs use fixed hex fills (e.g., `#101010`), CSS variables like `--bs-primary` and hover states cannot customize icon colors dynamically across dealer themes and dark mode. Migrating these icons to the built-in UIcons (`fi-rr-*`) icon font library allows instant, site-wide CSS color control via `currentColor` and custom brand variables.

## What Changes

- Replace static `.svg` `<img>` tags and raw `<svg>` code blocks across 22 Blade view templates with UIcons (`<i class="fi fi-rr-*"></i>`) icon font elements.
- Map automotive, navigation, rating, filter, contact, and interface icons to their respective Flaticon UIcons classes (`fi-rr-dashboard`, `fi-rr-gas-pump`, `fi-rr-user`, `fi-rr-marker`, `fi-rr-star`, `fi-rr-arrow-up`, etc.).
- Ensure all replaced icons inherit CSS text color, hover states, and dynamic primary brand theme variables (`var(--bs-primary)`, `var(--bs-button-text)`).
- Preserve specific multi-color asset illustrations where icon fonts do not apply (e.g. site logo SVGs).

## Capabilities

### New Capabilities
- `icon-theme-customization`: Site-wide icon styling capability allowing icons to dynamically adapt to dealer primary accent colors, dark mode, and hover states via UIcons font classes.

### Modified Capabilities
*(None - no existing capability spec requirements are changing)*

## Impact

- **Affected Code**: `resources/views/cars-details.blade.php`, `resources/views/cars-list.blade.php`, `resources/views/dealer-details.blade.php`, `resources/views/dealer-listing.blade.php`, `resources/views/contact.blade.php`, `resources/views/partials/*.blade.php`, and `resources/views/sections/*.blade.php`.
- **Dependencies**: Utilizes the pre-bundled `uicons-regular-rounded.css` in `public/assets/css/vendors/` (no new npm/composer package required).
- **APIs/Database**: No backend database or API contract changes.
