## Why

With the database schema established, the dealership owner needs a robust, intuitive admin interface to manage inventory and content. Furthermore, to develop and test the frontend effectively, we need a realistic database seeder that utilizes the template's existing image assets to ensure the site looks finished from day one.

## What Changes

- Create Filament Admin Resources for all 14 models (grouped by Inventory, Leads & Reviews, Content, Settings).
- Implement a custom Filament Page or specific fields for the `Setting` model.
- Build a comprehensive `DatabaseSeeder` that dynamically scans `public/assets/imgs` and creates realistic data for Brands, Car Types, Cars, Reviews, and Content, attaching the existing static images via Spatie Media Library and standard string paths.

## Capabilities

### New Capabilities
- `admin-panel`: Filament resources for managing the entire CMS.
- `data-seeder`: A template-aware DatabaseSeeder that populates the database using existing `public/assets/imgs`.

### Modified Capabilities
<!-- None -->

## Impact

- Adds Filament resource classes to `app/Filament/Resources`.
- Overwrites `database/seeders/DatabaseSeeder.php` with substantial logic.
- Depends on `spatie/laravel-medialibrary` for image attachment during seeding.
