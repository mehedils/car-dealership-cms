## Context

The Carento Laravel platform contains legacy front-end view templates derived from a static HTML template bundle. These templates embed SVG icons as either `<img src="/assets/imgs/.../*.svg">` or raw inline `<svg>` elements with fixed `#101010` fill properties.

Since `public/assets/css/vendors/uicons-regular-rounded.css` is already imported into `public/assets/css/main.css` and its associated WOFF2 font files reside in `public/fonts/uicons/`, we can replace SVG asset references with UIcons font classes (`<i class="fi fi-rr-*"></i>`) without adding new frontend build steps or npm packages.

## Goals / Non-Goals

**Goals:**
- Replace static `.svg` `<img>` tags and raw `<svg>` elements across 22 Blade views with UIcons `<i>` tags.
- Ensure icons inherit dynamic primary CSS color (`var(--bs-primary)`), button text colors, and dark mode styles seamlessly.
- Establish a standardized icon mapping reference across car specifications, header, search filters, dealer listings, and footer components.

**Non-Goals:**
- Replacing multi-color brand logo files (`logo-w.svg`, `logo-d.svg`, `favicon.svg`).
- Refactoring the main Bootstrap/Custom CSS theme structure.

## Decisions

### Decision 1: Use Pre-bundled Flaticon UIcons instead of Third-Party NPM Packages
- **Choice**: Utilize `uicons-regular-rounded` already present in `public/assets/css/vendors/`.
- **Rationale**: Zero external HTTP downloads or composer dependencies needed. Immediate compatibility with existing site styles.
- **Alternatives Considered**:
  - *Lucide Icons*: Excellent tree-shaking, but requires installing composer package `blade-lucide`.
  - *FontAwesome 6*: Requires downloading a 500KB+ font bundle or CDN dependency.

### Decision 2: Standardized Icon Mapping Matrix
- **Car Specs**: `km.svg` → `fi-rr-dashboard`, `diesel.svg`/`fuel.svg` → `fi-rr-gas-pump`, `auto.svg` → `fi-rr-settings-sliders`, `seat.svg` → `fi-rr-user`, `bag.svg` → `fi-rr-box`, `door.svg` → `fi-rr-door-closed`, `suv.svg` → `fi-rr-car`.
- **Header/Footer**: `menu.svg` → `fi-rr-menu-burger`, `location` → `fi-rr-marker`, `email` → `fi-rr-envelope`, `back-to-top` → `fi-rr-arrow-up`.
- **Ratings & Filters**: `star.svg` → `fi-rr-star`, `search` → `fi-rr-search`, `filter` → `fi-rr-filter`.

## Risks / Trade-offs

- **[Risk] Minor visual differences in line weight**: UIcons line weights might differ slightly from the original theme SVGs.
  - *Mitigation*: Use `fi-rr-*` (regular rounded) which matches the soft rounded corner aesthetic of Carento.
- **[Risk] Unhandled SVG edge cases**: Omitting a view could leave isolated static SVGs.
  - *Mitigation*: Complete inventory search performed across all 22 Blade views.
