## Context

The hero search component in `resources/views/sections/search.blade.php` previously rendered generic search filters (Location, Brand, Car Type). We are transforming this into a horizontal lead inquiry / test drive form with a searchable vehicle dropdown component and direct submission to `InquiryController@store`.

## Goals / Non-Goals

**Goals:**
- Create a modern horizontal form layout inside `sections/search.blade.php`.
- Build a searchable vehicle dropdown using native Bootstrap 5 dropdown markup and lightweight vanilla JS filtering.
- Pass available active vehicles from `HomeController` to `sections.search`.
- Submit lead details (`car_id`, `name`, `phone`, `email`, `message`) to `POST /inquiries` with validation feedback.

**Non-Goals:**
- Heavy external JS dependencies like Select2 or Choice.js (native Bootstrap + lightweight JS ensures zero extra bundle overhead).
- Modifying backend database schemas (uses existing `inquiries` table & model).

## Decisions

1. **Native Bootstrap 5 Dropdown with Live Input Search**:
   - Rationale: Carento uses Bootstrap 5 dropdown styles (`.btn-dropdown-search`, `.dropdown-menu`). Adding a search `<input>` inside `.dropdown-menu` with vanilla JS keyup filtering delivers instant searchable options while matching the site's UI seamlessly.
2. **Reuse `InquiryController@store`**:
   - Rationale: The `inquiries` table and controller already exist. We map `car_id`, `name`, `phone`, and set a default message ("Hero Callback Request / Test Drive").

## Risks / Trade-offs

- **[Risk]** If no cars exist in the database, the dropdown will be empty.
  - *Mitigation*: Fallback option "General Inquiry / Any Vehicle" in the dropdown list.
