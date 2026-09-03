## Purpose

Provides a dual-source icon management system allowing administrators to either pick vector icons from an expanded library or upload custom SVG/PNG image files, with unified rendering across the website.

## ADDED Requirements

### Requirement: Dual-Source Icon Management in Admin
The Filament administrative interface for Amenities, Services, and Why Us Features SHALL provide administrators with two distinct icon input methods: selecting an icon from an expanded vector icon library, or uploading a custom icon image file.

#### Scenario: Selecting an icon from the vector library
- **WHEN** an administrator chooses to pick from the icon library
- **THEN** the system SHALL provide a searchable visual grid of vector icons (including automotive, transport, tool, and business symbols) and persist the selected icon identifier

#### Scenario: Uploading a custom icon image file
- **WHEN** an administrator chooses to upload a custom icon
- **THEN** the system SHALL allow uploading vector SVG, PNG, or WebP files and store the file in public storage

#### Scenario: Icon precedence
- **WHEN** both a custom uploaded file and a library icon identifier are present or toggled
- **THEN** the custom uploaded icon file SHALL take precedence when rendering on the frontend

### Requirement: Unified Smart Frontend Icon Rendering
The frontend application SHALL provide a unified icon rendering mechanism capable of displaying custom uploaded image files, Blade vector icons, and legacy font icon classes seamlessly.

#### Scenario: Rendering an uploaded custom icon image
- **WHEN** the stored icon value represents a file path (e.g. ending in `.svg`, `.png`, `.webp`, or located within storage)
- **THEN** the frontend SHALL render an `<img>` tag with appropriate dimensions, styling, and alt text

#### Scenario: Rendering a vector library icon
- **WHEN** the stored icon value represents a Blade icon identifier (e.g. `tabler-*` or `heroicon-*`)
- **THEN** the frontend SHALL render the inline SVG vector icon component dynamically

#### Scenario: Rendering a legacy font icon class
- **WHEN** the stored icon value starts with a CSS icon class prefix (e.g. `fi ` or `fi-rr-`)
- **THEN** the frontend SHALL render an `<i>` element with the corresponding CSS class
