## Context

`resources/views/partials/car-card.blade.php` is the shared partial used by Featured Vehicles, Latest Arrivals, Inventory listings, and Related Cars. Removing lines 12–20 (`<div class="card-rating">`) cleans up all car cards centrally.

## Goals / Non-Goals

**Goals:**
- Remove `<div class="card-rating">...</div>` block from `resources/views/partials/car-card.blade.php`.

**Non-Goals:**
- Removing full review submission features on single car detail pages.

## Decisions

1. **Centralized Partial Edit**:
   - *Decision*: Edit `resources/views/partials/car-card.blade.php`.
   - *Rationale*: Solves the requirement across all 4 sections simultaneously.
