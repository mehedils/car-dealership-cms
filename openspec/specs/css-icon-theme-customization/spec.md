# CSS Icon Theme Customization

## Purpose
Defines CSS-level background icon masking and pseudo-element styling rules to ensure background SVG assets dynamically respond to primary brand variable changes.

## Requirements

### Requirement: CSS Background Icons Render via UIcons / Theme Masks
The application CSS (`main.css`) SHALL replace static SVG `background-image` references for icons with UIcons font glyphs or CSS `mask-image` rules so icon colors dynamically adapt to `--bs-primary` and theme variables.

#### Scenario: CSS background icon renders with primary brand color
- **WHEN** a user changes the site primary brand color variable (`--bs-primary`)
- **THEN** all CSS background icons (input field icons, badge stars, checkmarks, spec labels) dynamically render using the updated brand color

### Requirement: Custom Checkboxes and Radios Use UIcons
Custom checkbox and radio indicator elements in CSS SHALL use UIcons webfont glyphs (`fi fi-rr-check`) instead of static checkmark SVG images.

#### Scenario: Checkbox is toggled on
- **WHEN** a user checks a filter checkbox
- **THEN** the checkmark indicator displays the UIcons webfont check glyph styled with the button text color (`var(--bs-button-text)`)
