## Context

The Latest Arrivals section currently uses `row align-items-end mb-30` without bottom margins on the text block, causing the header button to float top-heavy.

## Goals / Non-Goals

**Goals:**
- Update `resources/views/sections/cars-latest.blade.php` to use `row align-items-center mb-40`.
- Update paragraph bottom margin (`mb-0`) and add `d-inline-flex align-items-center gap-2` on the button.

**Non-Goals:**
- Modifying car card grid layout inside the section.

## Decisions

1. **Vertical Flex Center Alignment (`align-items-center`)**:
   - *Decision*: Update row class to `row align-items-center mb-40` and set subtitle paragraph `mb-0`.
   - *Rationale*: Perfect visual balance across mobile, tablet, and desktop viewports.
