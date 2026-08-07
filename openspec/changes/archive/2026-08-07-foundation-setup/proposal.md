## Why

To prepare the application for dynamic content management, we need to install and configure the essential core packages (Laravel Filament V3 and Spatie Media Library) and verify that the foundation installs and passes baseline tests cleanly.

## What Changes

- Install `filament/filament` (V3) and run panel setup (`php artisan filament:install --panels`).
- Install `spatie/laravel-medialibrary` and the Filament media library plugin.
- Publish Spatie Media Library database migrations.
- Run database migrations and verify baseline test suite setup.

## Capabilities

### New Capabilities
- `foundation-setup`: Core package installation, admin panel initialization, media library setup, and baseline verification testing.

### Modified Capabilities
<!-- None -->

## Impact

- **Composer Dependencies**: Adds `filament/filament`, `spatie/laravel-medialibrary`, and `filament/spatie-laravel-media-library-plugin`.
- **Database**: Adds media library table migration.
- **Config**: Adds Filament panel provider and media library configuration.
