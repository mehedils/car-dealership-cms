## Context

The current `Why Choose Us` section in `resources/views/sections/why-us.blade.php` displays 4 items as raw numbered circles with fake Latin database seed text, creating a visually sparse and unbranded appearance.

See `proposal.md` for motivation.

## Goals / Non-Goals

**Goals:**
- Design a modern, cohesive card layout for `sections.why-us` with rounded corners, clean padding, subtle border, and background card coloring (`.card-why-dealership`).
- Include icon badges with soft brand background tints (`rgba(var(--bs-primary-rgb), 0.1)`) and Flaticon Uicons representing inspection, financing, pricing, and warranty.
- Add CSS transition hover effects (`transform: translateY(-5px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);`).
- Provide meaningful dealership default data in database seeders and template fallbacks.

**Non-Goals:**
- Removing the `WhyUsFeature` model or database table.
- Changing other homepage sections.

## Decisions

1. **Card Architecture**:
   - Class name: `.card-why-dealership` inside `resources/views/sections/why-us.blade.php`.
   - Layout: Bootstrap `col-lg-3 col-md-6 mb-30` grid for 4 responsive cards.
   - Icon handling: Render dynamic Flaticon uicon (`$feature->icon` or mapped fallback e.g. `fi-rr-shield-check`, `fi-rr-badge-percent`, `fi-rr-dollar`, `fi-rr-award`).
2. **Styling**:
   - Add `.card-why-dealership` rules in `public/assets/css/custom.css`.
   - Ensure complete light/dark theme compatibility.
3. **Database Seed Data**:
   - Update `DatabaseSeeder.php` with 4 real dealership pillars and seed the database.

## Risks / Trade-offs

- [Icon fallback] → If a record has an empty icon or unrecognized heroicon string, cleanly map to the standard Uicons (`fi-rr-shield-check`, etc.).
