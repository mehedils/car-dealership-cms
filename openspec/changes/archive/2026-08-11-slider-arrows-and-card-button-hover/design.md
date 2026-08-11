## Context

In `sections/cars-featured.blade.php`, Swiper JS injects default `:after` pseudo-element text icons (`'prev'` and `'next'`), causing visual clashing and unstyled blue font icon text. Simultaneously, car card View buttons lack visual feedback on hover.

## Goals / Non-Goals

**Goals:**
- Suppress Swiper `:after` pseudo-elements in `public/assets/css/custom.css`.
- Style slider navigation buttons (`.swiper-button-prev-style-1` and `.swiper-button-next-style-1`) with flex alignment and primary brand background hover transitions (`var(--bs-brand-2)`).
- Add micro-animations (`transform: translateY(-2px) scale(1.04)` and shadow glow) to `.card-button .btn` and `.card-journey-small .btn-primary`.

**Non-Goals:**
- Modifying Swiper JS core library.

## Decisions

1. **CSS Pseudo-element Suppression**:
   - *Decision*: Set `.swiper-button-prev-style-1::after, .swiper-button-next-style-1::after, .swiper-button-prev::after, .swiper-button-next::after { display: none !important; content: "" !important; }`.
   - *Rationale*: Cleanly removes default Swiper font glyphs without breaking Swiper event handlers.

2. **Button Micro-animation Feedback**:
   - *Decision*: Target `.card-button .btn` and `.card-journey-small .btn-primary` with cubic-bezier transition curves and scale/shadow hover states.
   - *Rationale*: Provides modern, responsive tactile feedback to user interactions.
