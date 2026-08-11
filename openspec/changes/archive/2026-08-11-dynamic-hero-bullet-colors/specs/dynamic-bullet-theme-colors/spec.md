## ADDED Requirements

### Requirement: Custom Blade Component for Dynamic Tick Icons
The system SHALL provide a Blade component `<x-tick-icon />` that renders an inline SVG checkmark with configurable `color` and `size` props.

#### Scenario: Rendering tick icon with default primary color
- **WHEN** `<x-tick-icon />` is rendered in a Blade view without explicit color props
- **THEN** it SHALL use `setting('primary_color', '#70f46d')` as the SVG fill color.

#### Scenario: Rendering tick icon with custom color prop
- **WHEN** `<x-tick-icon :color="'#ff002e'" />` is rendered
- **THEN** it SHALL use `#ff002e` as the SVG fill color.
