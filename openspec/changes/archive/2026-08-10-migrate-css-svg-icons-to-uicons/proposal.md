## Why

CSS background images in `public/assets/css/main.css` reference static SVG icon assets (`star.svg`, `mile.svg`, `fuel.svg`, `seat.svg`, `automatic.svg`, `check.svg`, `checked.svg`, form popup SVGs). Because these icons are rendered as static background images, they cannot dynamically inherit brand theme colors (`var(--bs-primary)`) or button text colors. Migrating these background SVGs to UIcons webfont glyphs and CSS `mask-image` rules ensures complete site-wide brand color consistency.

## What Changes

- Replace CSS background SVGs in `main.css` (`.card-rating`, `.card-facitlities`, `.cb-container`, `.username-icon`, `.email-icon`, `.pass-icon`) with UIcons pseudo-elements (`::before`/`::after`) or CSS `mask-image` rules.
- Replace remaining hardcoded template background icon containers in Blade templates with native UIcons font icon tags (`<i class="fi fi-rr-*"></i>`).
- Ensure all input field icons, card rating badges, checkmarks, and specs icons inherit CSS brand variables dynamically.

## Capabilities

### New Capabilities
- `css-icon-theme-customization`: CSS-level UIcons and mask-image rules enabling full dynamic color customization for background icons.

### Modified Capabilities

## Impact

- `public/assets/css/main.css`
- `resources/views/**/*.blade.php`
