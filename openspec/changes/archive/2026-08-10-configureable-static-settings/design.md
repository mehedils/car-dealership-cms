## Context

The application currently has a generic `SettingResource` in Filament built on top of a key-value `settings` database table. In its current state, administrators can freely add, modify, or delete key strings. To make the site reliably configurable, setting keys must be fixed and immutable in the system while values remain fully editable.

## Goals / Non-Goals

**Goals:**
- Define a fixed registry of static setting keys covering General, Contact, Socials, Colors, and Footer categories.
- Ensure initial settings are populated automatically via seeders / service providers.
- Convert Filament's Setting management into a tabbed dashboard page (or constrained resource) with disabled creation/deletion and read-only keys.
- Add visual `ColorPicker` fields for brand colors (`primary_color`, `secondary_color`, `accent_color`, `button_text_color`).
- Provide a `setting('key', 'default')` helper function.
- Inject CSS `:root` variables dynamically in `layouts/app.blade.php`.
- Bind settings to `header.blade.php`, `footer.blade.php`, and `contact.blade.php`.

**Non-Goals:**
- Allowing administrators to dynamically define new setting key names.
- Complex multi-tenancy settings scoping.

## Decisions

### Decision 1: Custom Filament Page / Tabbed Form vs. Constrained Resource
- **Choice**: Implement a custom Filament Page (`ManageSettings`) or tabbed form layout for settings.
- **Rationale**: A tabbed form (`General`, `Contact Info`, `Social Media`, `Theme Colors`, `Footer`) provides a clean UI where keys appear as friendly field labels instead of raw key rows. Key creation/deletion actions are omitted entirely.

### Decision 2: Dynamic CSS Variable Injection in `<head>`
- **Choice**: Inject dynamic `:root` CSS variables in `<head>` of `layouts/app.blade.php`.
- **Rationale**: Overriding `--bs-brand-2`, `--bs-button-bg`, `--bs-primary`, `--bs-brand-1`, and `--bs-primary-rgb` at runtime allows color settings to change site-wide instantly without compiling SASS/Tailwind assets.

### Decision 3: Global Setting Helper (`setting()`)
- **Choice**: Register a global helper function `setting($key, $default = null)` wrapped around a simple key-value cache/lookup mechanism.
- **Rationale**: Keeps Blade views clean and readable, ensuring graceful fallbacks if a setting hasn't been configured in the database yet.

## Risks / Trade-offs

- **[Risk] Missing Default Keys in DB** → **Mitigation**: DatabaseSeeder and helper fallbacks ensure default values are always available if DB records are missing.
- **[Risk] Invalid Color HEX Values** → **Mitigation**: Filament `ColorPicker` enforces valid HEX formats.

## Migration Plan

1. Create/update DatabaseSeeder with the complete list of static setting keys and default values.
2. Register `setting()` helper in `app/helpers.php` (or AppServiceProvider).
3. Implement Filament settings dashboard page with tabs and ColorPickers.
4. Add CSS `:root` variable injection in `layouts/app.blade.php`.
5. Update Blade templates (`header.blade.php`, `footer.blade.php`, `contact.blade.php`) to use dynamic settings.
