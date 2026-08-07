## Why

The homepage car cards currently display several UI and functionality issues that degrade the user experience. The images are not loading because the app URL doesn't match the environment port, the text formatting for car names causes overflowing text to be abruptly chopped off, and since the platform represents a single dealer inventory (cars for sale rather than rent), the "per day" label on pricing is inaccurate and confusing. Additionally, the "View Details" button occupies excessive horizontal space, creating a cramped layout in the card footer.

## What Changes

- Update `.env` `APP_URL` to include the local development port `http://127.0.0.1:8000` to fix broken Spatie Media Library absolute URLs.
- Remove the `/ day` pricing suffix from the `car-card.blade.php` partial.
- Remove `duration` seeding from `DatabaseSeeder.php`.
- Change `text-nowrap` to `text-truncate` in `car-card.blade.php` to prevent long names from breaking layout and ensure they have an elegant ellipsis.
- Refactor the "View Details" button in `car-card.blade.php` into a compact icon or a cleaner, narrower button to relieve the tight layout constraints.

## Capabilities

### New Capabilities

- `car-cards`: Define the styling and behavior rules for the reusable car card UI component.

### Modified Capabilities

- *(None)*

## Impact

- `resources/views/partials/car-card.blade.php`
- `.env` configuration requirements
- `database/seeders/DatabaseSeeder.php`
