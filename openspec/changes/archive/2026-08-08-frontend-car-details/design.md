## Context

The `cars-details.blade.php` layout currently contains static placeholders for breadcrumbs, vehicle galleries, specifications grid, description text, amenities list, dealership inquiry sidebar, and related cars. We need to replace all static sections with dynamic Blade directives backed by `CarDetailController`.

## Goals / Non-Goals

**Goals:**
- Implement `CarDetailController` (`show`) fetching cars by slug with relationships (`brand`, `carType`, `fuelType`, `location`, `amenities`, `reviews`, `media`).
- Update `routes/web.php` to define `/cars/{car:slug}`.
- Bind image gallery to `$car->getMedia('gallery')`.
- Build an `InquiryController` or handler to store customer inquiries in the database.
- Render 4 related cars using `partials.car-card`.

**Non-Goals:**
- Online payment/checkout processing for car purchases.

## Decisions

- **Route Structure:** Use `/cars/{car:slug}` for SEO-friendly URLs.
- **Inquiry Submission:** Use standard POST form submission to `/inquiries` with flash session success message.
- **Media Fallback:** If a car has no media library images, fall back gracefully to template default images.

## Risks / Trade-offs

- **Risk:** Some seeded cars might not have reviews or amenities attached.
  - **Mitigation:** Wrap loops with `@if($car->amenities->isNotEmpty())` guards to ensure safe rendering.
