## Context

Feature list bullet points (`.list-ticks-green li`) use static background images (`tick-list.svg`) containing hardcoded green fill colors. Theme primary color changes in Filament Admin Settings do not propagate to the checkmark icons.

## Goals / Non-Goals

**Goals:**
- Create an anonymous Laravel Blade component `<x-tick-icon color="..." size="..." />` (`resources/views/components/tick-icon.blade.php`).
- Pass `setting('primary_color', '#70f46d')` dynamically to the component.
- Integrate `<x-tick-icon />` into `sections/hero.blade.php` and `sections/cta.blade.php`.
- Adjust `.list-ticks-green li` in `custom.css` so inline SVG checkmarks align seamlessly with text.

**Non-Goals:**
- Removing standard CSS helper classes.

## Decisions

1. **Inline SVG Blade Component `<x-tick-icon />`**:
   - *Decision*: Create `resources/views/components/tick-icon.blade.php` accepting `@props(['color' => setting('primary_color', '#70f46d'), 'size' => 26])`.
   - *Rationale*: Allows direct Blade prop binding, clean SVG color control, and reuse across any template section.

2. **CSS Layout Alignment**:
   - *Decision*: Set `.list-ticks-green li { background-image: none !important; padding-left: 0 !important; display: inline-flex; align-items: center; gap: 10px; }`.
   - *Rationale*: Replaces absolute background images with modern flexbox alignment for SVG components.
