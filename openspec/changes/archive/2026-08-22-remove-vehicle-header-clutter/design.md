## Context

The vehicle details header (`resources/views/cars-details.blade.php`) currently renders legacy template artifacts:
1. `<div class="tour-rate">`: Hardcoded `4.96 (672 reviews)`
2. `<div class="tour-metas">`: Location icon/link and `Fleet Code: LVA-4125`
3. `<div class="tour-meta-right">`: `<a class="btn btn-wishlish">`

See `proposal.md` for background and user screenshots.

## Goals / Non-Goals

**Goals:**
- Clean up `tour-header` in `resources/views/cars-details.blade.php`.
- Remove review badge, location line & map link, fleet code, and wishlist button.
- Retain the vehicle title, purchase price, monthly financing badge, and the `Share` action cleanly.
- Ensure proper margin/padding so the vehicle title and gallery flow naturally.

**Non-Goals:**
- Modifying vehicle specifications bar, description, or lead inquiry sidebar.

## Decisions

1. **Header Layout Restructuring**:
   - In `resources/views/cars-details.blade.php`, remove `<div class="tour-rate">`.
   - Remove `<div class="tour-meta-left">` (which housed the location and fleet code).
   - Place the `<div class="tour-meta-right">` (or single `btn-share`) neatly or align it alongside the pricing/title row.
   - Retain breadcrumbs above the title.

## Risks / Trade-offs

- None; removing static clutter improves readability, performance, and dealership branding.
