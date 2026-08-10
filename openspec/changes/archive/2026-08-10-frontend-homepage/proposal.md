## Why

Currently, the homepage renders static template content. To turn Carento into a fully functional dealership platform, the homepage sections must dynamically pull real data from database models (Cars, Brands, Car Types, Services, Testimonials, Blog Posts) and template section files need to be refactored into clean, non-numbered Blade partial names.

## What Changes

- Create `HomeController` to handle the homepage route `/` and fetch data for all homepage sections.
- Refactor section file names in `resources/views/sections/` to remove template numbers (`hero-1` -> `hero`, `search-1` -> `search`, `cars-listing-1` -> `cars-featured`, `cars-listing-2` -> `cars-latest`, `cta-1` -> `cta`).
- Bind Blade template sections to dynamic Eloquent models and Spatie Media Library images.
- Populate search filter dropdowns dynamically with Brands, Car Types, and Locations.

## Capabilities

### New Capabilities
- `frontend-homepage`: Dynamic rendering of the car dealership homepage using Eloquent models.

### Modified Capabilities
<!-- None -->

## Impact

- Modifies `routes/web.php`
- Creates `app/Http/Controllers/HomeController.php`
- Renames and updates files in `resources/views/sections/`
- Updates `resources/views/home.blade.php`
