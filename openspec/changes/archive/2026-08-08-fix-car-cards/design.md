## Context

The system utilizes Spatie Media Library to attach images to Car models, generating absolute URLs based on `APP_URL`. When `APP_URL` lacks the port number used during local development (e.g. `http://localhost` instead of `http://127.0.0.1:8000`), the frontend attempts to load broken paths. The frontend template `resources/views/partials/car-card.blade.php` also uses CSS classes and layout structures that are better suited to single-word vehicle models and rental platforms.

## Goals / Non-Goals

**Goals:**
- Fix broken absolute URLs for images in development.
- Improve the layout resilience of the car cards (ellipsis truncation for long text).
- Adapt the UI to correctly represent a dealership inventory (price only, no "duration").
- Optimize button footprint to prevent layout breaking.

**Non-Goals:**
- Completely redesigning the car card from scratch.
- Creating a separate UI for rentals vs sales.

## Decisions

- **`.env` Configuration over code fixes:** Rather than stripping absolute URLs in code or writing a custom accessor, we will simply fix the `.env` configuration which is the standard Laravel way of resolving the correct `asset()` URLs.
- **`text-truncate` instead of `line-clamp`:** `text-truncate` is a native Bootstrap class already available in the project, avoiding the need for custom CSS while successfully preventing horizontal overflow.
- **Button styling:** We will modify the HTML structure of the "View Details" button. Specifically, we'll remove the `btn btn-gray` class in favor of an arrow icon (`➔` or an SVG), or a narrower button text like "View" to prevent line wrapping when space is constrained.

## Risks / Trade-offs

- **Risk:** Existing instances in the database will still have `'duration' => 'per day'` if they are not re-seeded.
  - **Mitigation:** The blade template will no longer attempt to read or render the duration attribute. We will also update the seeder to prevent new ones from being generated this way.
