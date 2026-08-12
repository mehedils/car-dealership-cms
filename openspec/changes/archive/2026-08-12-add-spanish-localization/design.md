## Context

The website `carento-laravel` is a single-language car dealership website built for a Mexican client. The developer speaks English, requiring a togglable localization setup. Laravel provides standard translation features via `config/app.php` and `APP_LOCALE`. Filament v3 provides native built-in Spanish translations for system controls when `app.getLocale()` returns `'es'`.

## Goals / Non-Goals

**Goals:**
- Implement a 100% Spanish translation across the public Blade views and Filament Admin Panel when `APP_LOCALE=es`.
- Retain `APP_LOCALE=en` capability so the developer can work in English locally.
- Provide a comprehensive `lang/es.json` mapping file.
- Update all 15 Filament resource files to wrap labels, groups, and tab titles in `__('...')`.
- Ensure database seeders seed default taxonomies in Spanish.

**Non-Goals:**
- Multi-language URL routing (e.g. `/es/cars` vs `/en/cars`) as this site is single-language for production.
- Real-time language switcher widget on the frontend header (client requires single language production).

## Decisions

1. **Use `lang/es.json` for JSON Translation Keys**:
   - *Rationale*: JSON translation files (`lang/es.json`) allow writing full English sentences/keys like `__('Search Cars')` directly in Blade files and Filament resources without maintaining nested PHP translation array keys.

2. **Wrap Filament Resource Group & Tab Names**:
   - *Rationale*: Filament v3 natively translates system actions (Create, Edit, Delete, Save, Cancel), but custom resource labels, navigation groups, and form tab titles require explicit `__('...')` calls.

3. **Seeder Taxonomy Translation**:
   - *Rationale*: Seeding Spanish taxonomy names (e.g. *Sedán*, *Gasolina*, *Aire Acondicionado*) ensures the database contains native Spanish strings for the client upon deployment.

## Risks / Trade-offs

- **[Risk] Missed hardcoded string in Blade view** → *Mitigation*: Audit all `.blade.php` files in `resources/views/` and check UI elements thoroughly under `APP_LOCALE=es`.
- **[Risk] Dynamic DB content in English during testing** → *Mitigation*: Re-run `php artisan migrate:fresh --seed` with updated Spanish seeders.
