## Why

Currently, the single car details view (`/cars-details-3`) uses static HTML mockups with fake images and dummy text. To turn this application into a functional single-dealer car showcase, we need a dedicated controller that resolves car records by slug, loads media galleries, specifications, amenities, and related inventory, while providing an inquiry form for prospective buyers to contact the dealership.

## What Changes

- Create `CarDetailController` (`show($slug)`) to find cars by slug and load relationships (`brand`, `carType`, `fuelType`, `location`, `amenities`, `reviews`, `media`).
- Update `routes/web.php` to define clean route `GET /cars/{car:slug}`.
- Refactor `resources/views/cars-details.blade.php` to dynamically display vehicle specs, Spatie Media gallery photos, description, and amenities.
- Implement an Inquiry sidebar form that submits customer contact details & notes to the `inquiries` database table.
- Implement a "Related Cars" section at the bottom of the page reusing `partials.car-card`.

## Capabilities

### New Capabilities

- `car-details-page`: Single car view with dynamic gallery, specifications, amenities, related vehicles, and inquiry form submission.

### Modified Capabilities

- *(None)*

## Impact

- `app/Http/Controllers/CarDetailController.php`
- `routes/web.php`
- `resources/views/cars-details.blade.php`
- `app/Http/Controllers/InquiryController.php` or inquiry form handler
