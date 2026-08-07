## Context

The foundation is prepared with Laravel Filament and Spatie Media Library. Now we need to create the complete database schema and Eloquent models to represent every dynamic section of the car dealership website. This encompasses vehicle inventory, customer inquiries, and page content elements.

## Goals / Non-Goals

**Goals:**
- Design a relational schema ensuring zero wasted template sections.
- Create fully functional Eloquent models with defined relationships (`belongsTo`, `hasMany`, `belongsToMany`).
- Use standard string paths for simple logo/icon fields while reserving Spatie Media Library for car galleries.

**Non-Goals:**
- Generating the Filament Resource classes in this change.
- Modifying Blade templates or frontend controllers.

## Decisions

### Field Types
- `price`: Uses `decimal(10, 2)` for standardized currency storage.
- `mileage`, `seats`, `doors`: Use `integer`.
- `rating`: Uses `decimal(2, 1)` to allow for precise 4.5 style ratings.
- `slug`: Ensured to be unique across taxonomy models and cars for clean URL routing.

### Media Handling Strategy
- `Car` model will implement `HasMedia` and use Spatie for complex gallery management.
- Small iconography (e.g., `Brand` logo, `Amenity` icon, `WhyUsFeature` icon) will use simple `string` storage (path to file) to keep queries lightweight and simple.

### Cascade Deletions
- `Review`, `Inquiry` (where `car_id` is set), and `amenity_car` pivot records will cascade on delete if a `Car` is deleted, ensuring database consistency.

## Risks / Trade-offs

- **[Performance on Car Listings]** → Mitigation: Proper indexing on foreign keys (`brand_id`, `car_type_id`, `fuel_type_id`, `location_id`) will ensure fast filtering queries.
