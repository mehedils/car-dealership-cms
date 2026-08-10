## Context

The HTML template layout and partials exist in `resources/views/sections/`, but contain static placeholder data and numbered file suffixes (e.g. `hero-1`, `cars-listing-1`). We will refactor file names to semantic identifiers and populate them using data retrieved by `HomeController`.

## Goals / Non-Goals

**Goals:**
- Implement `HomeController` with eager-loaded queries (`with(['media', 'brand', 'carType'])`) to prevent N+1 query performance issues.
- Rename template section files (`hero-1` -> `hero`, `search-1` -> `search`, `cars-listing-1` -> `cars-featured`, `cars-listing-2` -> `cars-latest`, `cta-1` -> `cta`).
- Bind `@foreach` loops for Brands, Featured Cars, Latest Cars, Car Types, Services, Why Us Features, Testimonials, and Blog Posts.

**Non-Goals:**
- Implementing the interactive AJAX filter logic (covered in Step 2: Car Inventory & Search).

## Decisions

- **Eager Loading:** Always eager load `media`, `brand`, `carType`, `fuelType`, and `location` relations on `Car` queries to keep database queries under ~5 per page render.
- **Image Fallbacks:** Use Spatie's `getFirstMediaUrl('gallery')` with fallbacks to template static assets if no media attachment exists.

## Risks / Trade-offs

- **[Missing Assets]** → If database record has no image, template styling might break. Mitigation: Add optional `?? asset('assets/imgs/default-car.jpg')` fallback checks in Blade.
