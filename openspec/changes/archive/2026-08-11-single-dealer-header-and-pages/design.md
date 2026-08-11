## Context

The application is a single-dealership platform built on Laravel and Blade templates. The current navigation header (`resources/views/partials/header.blade.php` and `mobile-menu.blade.php`) retains leftover template dropdowns (`/dealer-listing`, `/dealer-details`, `/cars-details-3`) and an unmaintained offcanvas menu. Additionally, inventory listing URL is `/cars-list-1`, and dedicated Services (`/services`) and About Us (`/about`) routes/views do not exist.

## Goals / Non-Goals

**Goals:**
- Simplify top-level navigation to 5 clean direct links: Home (`/`), Cars (`/cars`), Services (`/services`), About Us (`/about`), Contact (`/contact`).
- Remove multi-dealer dropdowns, demo car detail links, and offcanvas drawer.
- Replace offcanvas trigger in the header with a prominent "Inquire Now" CTA button that opens a Lead Collection Modal.
- Implement `/cars` inventory listing route and update links across the project.
- Implement `/services` and `/about` pages backed by existing Eloquent models (`Service`, `WhyUsFeature`, `TeamMember`, `Testimonial`).

**Non-Goals:**
- Modifying Filament admin backend models or database schemas (existing models and database tables already support services, team, inquiries, why us, and settings).

## Decisions

1. **Global Lead Modal Component**:
   - Include a Lead Collection Modal component (`partials/lead-modal.blade.php`) inside `resources/views/layouts/app.blade.php` so it is globally available to any button with `data-bs-toggle="modal" data-bs-target="#leadModal"`.
   - Form posts to existing `route('inquiries.store')` handled by `InquiryController@store`.

2. **Clean Route Aliasing**:
   - In `routes/web.php`, map `Route::get('/cars', CarsListController::class)->name('cars.index');`.
   - Add a 301 redirect from `/cars-list-1` to `/cars` to maintain backwards compatibility.

3. **Services & About View Templates**:
   - `/services`: Create `resources/views/services.blade.php` fetching `Service::all()`.
   - `/about`: Create `resources/views/about.blade.php` fetching `WhyUsFeature::all()`, `TeamMember::all()`, and `Testimonial::all()`.

## Risks / Trade-offs

- **[Risk] Offcanvas script references**:
  - *Mitigation*: Clean `#btn-offcanvas` button without breaking the mobile menu drawer `#btn-mobile-menu`.
