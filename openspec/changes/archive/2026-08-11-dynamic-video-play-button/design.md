## Context

The CTA section currently uses a static PNG image asset (`public/assets/imgs/cta/cta-1/play.png`) for the video play button. Replacing this with an anonymous Blade component `<x-play-button />` makes it dynamic and responsive to theme color settings.

## Goals / Non-Goals

**Goals:**
- Create `resources/views/components/play-button.blade.php` with customizable `size`, `bg`, and `color` props.
- Update `resources/views/sections/cta.blade.php` to render `<x-play-button />`.
- Add hover micro-animations (`transform: scale(1.12)`, shadow glow) in `public/assets/css/custom.css`.

**Non-Goals:**
- Changing Magnific Popup or YouTube modal behavior.

## Decisions

1. **Anonymous Blade Component Architecture**:
   - *Decision*: Create `resources/views/components/play-button.blade.php` using `@props(['size' => 80, 'bg' => null, 'color' => null])`.
   - *Rationale*: Reusable, accepts dynamic theme fallbacks `setting('primary_color')` and `setting('button_text_color')`.
