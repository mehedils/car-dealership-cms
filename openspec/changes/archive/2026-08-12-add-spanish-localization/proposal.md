## Why

The application is built for a Mexican client whose primary language is Spanish. The developer speaks English, so maintaining an English environment locally while delivering a 100% Spanish experience to the client is essential. By utilizing Laravel's native `APP_LOCALE` environment variable, setting `APP_LOCALE=es` will translate the entire application (both the frontend website and the Filament admin panel) to Spanish, while allowing `APP_LOCALE=en` during local development.

## What Changes

- Add central translation dictionary `lang/es.json` containing key-value mappings for all frontend Blade strings and Filament admin custom strings.
- Refactor all static UI strings in Blade templates (`resources/views/`) to use Laravel translation helpers `__('...')`.
- Update all 15 Filament Admin Resources (`app/Filament/Resources/`) to use `__('...')` for navigation groups, tab titles, section titles, table column headers, and field labels.
- Update database seeders (`database/seeders/DatabaseSeeder.php`) to seed default taxonomies, categories, amenities, fuel types, car types, and initial data in Spanish.
- Ensure built-in Filament v3 UI strings natively render in Spanish when `APP_LOCALE=es`.

## Capabilities

### New Capabilities
- `spanish-localization`: Provides full Spanish translation across frontend Blade templates, Filament admin resources, database seeders, and translation dictionary toggled via `APP_LOCALE`.

### Modified Capabilities
<!-- None -->

## Impact

- **Configuration**: `.env` and `config/app.php` use `APP_LOCALE=es` in production.
- **Frontend Views**: All Blade files in `resources/views/` updated with translation strings.
- **Admin Panel**: All Filament Resources in `app/Filament/Resources/` updated to wrap labels with `__('...')`.
- **Database**: Database seeders populate Spanish taxonomies and categories.
- **Dependencies**: Uses built-in Laravel translation system and Filament v3 native locale support.
