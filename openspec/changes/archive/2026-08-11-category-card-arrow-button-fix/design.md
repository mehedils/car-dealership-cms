## Context

Category card arrow buttons (`.card-popular .card-button a`) suffer from text font-icon alignment shifts and inherit green link hover colors over red background circles.

## Goals / Non-Goals

**Goals:**
- Replace `<i>` tag in `resources/views/sections/categories.blade.php` with inline SVG arrow.
- Add CSS rules in `public/assets/css/custom.css` enforcing `display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%;` and `color: #ffffff !important` on hover.

**Non-Goals:**
- Modifying non-popular card layouts.

## Decisions

1. **Inline SVG + High Specificity Hover Contrast**:
   - *Decision*: Replace `<i>` tag with `<svg>` and enforce `.card-popular:hover .card-button a { color: #ffffff !important; }`.
   - *Rationale*: Eliminates font glyph alignment shifts and guarantees high-contrast white arrows over red background circles.
