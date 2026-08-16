## Context

The Carento application uses Filament 3 for its administrative panel (`/admin`) and login view (`/admin/login`). Currently, `AdminPanelProvider.php` is configured with hardcoded static values (`Color::Amber` for panel colors, default text for branding). The application already maintains dynamic settings for `primary_color`, `site_name`, `site_logo_dark`, `site_logo_light`, and `site_favicon` in the `settings` table, accessible via the `setting()` helper.

## Goals / Non-Goals

**Goals:**
- Dynamically synchronize Filament 3's primary color palette with the `primary_color` setting (default `#70f46d`).
- Dynamically display the theme logo in both the Filament Login Page and the Admin Panel Sidebar with light/dark mode support.
- Set dynamic browser tab favicon and brand title across the admin interface.
- Provide safe fallbacks so that database unreachability or CLI invocations never break.

**Non-Goals:**
- Overhauling custom Blade auth views or replacing Filament's built-in login architecture.
- Altering the existing frontend CSS variables in `layouts/app.blade.php`.

## Decisions

### 1. Evaluate Dynamic Colors via Closures and `Color::hex()`
- **Decision**: Pass a closure returning `Color::hex($sanitizedColor)` to `$panel->colors(['primary' => ...])`.
- **Rationale**: Filament's `Color::hex()` automatically computes the complete 50–950 color shade scale using Spatie color conversion, ensuring proper contrast on buttons, active navigation states, badges, and focus rings. Closures delay resolution to runtime requests.
- **Alternatives Considered**: 
  - *Hardcoding CSS stylesheets*: Requires build steps or complex asset pipeline changes.
  - *Filament Color enum constants*: Limits options to predefined names (Amber, Blue, Green, etc.) instead of precise hex customization.

### 2. Dual Logo Binding (Light Mode & Dark Mode)
- **Decision**: Configure `$panel->brandLogo(...)` with `site_logo_dark` (with fallback to `/assets/imgs/template/logo-d.svg`) and `$panel->darkModeBrandLogo(...)` with `site_logo_light` (with fallback to `/assets/imgs/template/logo-w.svg`).
- **Rationale**: Filament seamlessly switches brand logos when the user toggles dark mode in the admin panel. The `setting()` helper automatically handles stored uploads (`storage/settings/*`) and fallback assets.

### 3. Logo Display Dimensioning
- **Decision**: Set `$panel->brandLogoHeight('2.5rem')`.
- **Rationale**: Matches the Carento SVG/PNG 4:1 aspect ratio without expanding the sidebar header excessively.

## Risks / Trade-offs

- **[Risk] Invalid Hex Format Entered by User** → **Mitigation**: Sanitize with regex (`/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/`) before calling `Color::hex()`; fallback to `#70f46d` if malformed.
- **[Risk] Database Unreachable During CLI Commands** → **Mitigation**: The `setting()` helper already encapsulates cache/database calls within `try/catch` blocks and returns fallbacks safely.
