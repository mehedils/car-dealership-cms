## Why

Currently, Swiper slider navigation buttons (`.swiper-button-prev-style-1` and `.swiper-button-next-style-1`) suffer from a pseudo-element conflict where Swiper's default CSS injects unstyled blue font icon text (`'prev'` / `'next'`) over the circular buttons. Additionally, the **View** button on car cards lacks visual feedback and micro-animations on hover.

## What Changes

- **Slider Navigation Button Fix**: Override Swiper `:after` pseudo-elements (`display: none !important; content: "" !important;`) and style slider navigation buttons with theme brand colors (`var(--bs-brand-2)`) and clean Flaticon arrows.
- **Car Card Button Hover Feedback**: Add smooth hover micro-animations (`transform: translateY(-2px) scale(1.04)`, glow shadow, and brightness shift) for `.card-button .btn` and `.card-journey-small .btn-primary`.

## Capabilities

### New Capabilities
- `slider-navigation-and-card-button-hover`: Styled slider navigation buttons and rich hover micro-animations for car card buttons.

### Modified Capabilities
- None.

## Impact

- **CSS File**: `public/assets/css/custom.css`.
- **UI Components**: Featured Vehicles section slider navigation arrows and car cards.
