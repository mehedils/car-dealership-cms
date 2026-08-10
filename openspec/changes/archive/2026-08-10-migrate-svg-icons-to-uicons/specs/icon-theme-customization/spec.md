## ADDED Requirements

### Requirement: Icon Font Class Migration
The application SHALL render user interface and vehicle specification icons using Flaticon UIcons CSS font classes (`fi fi-rr-*`) instead of static `.svg` image assets or raw inline `<svg>` blocks.

#### Scenario: Rendering car specification icons
- **WHEN** a user views a car detail or car listing card
- **THEN** the specifications (mileage, fuel, transmission, seats, doors, luggage) SHALL be displayed as UIcons font elements (`<i class="fi fi-rr-*"></i>`) inheriting text color

#### Scenario: Dynamic primary theme color responsiveness
- **WHEN** the dealer or administrator updates the primary brand color setting (`--bs-primary`)
- **THEN** all rendered UIcons SHALL dynamically adopt the new primary color without modifying asset files

#### Scenario: Hover and dark mode contrast responsiveness
- **WHEN** an icon is contained within an interactive button, link, or dark mode container
- **THEN** the icon color SHALL dynamically inherit the active hover or dark mode foreground text color

#### Scenario: Preservation of multi-color brand logo assets
- **WHEN** site logo graphics (`logo-w.svg`, `logo-d.svg`, `favicon.svg`) are rendered
- **THEN** the system SHALL retain standard `<img>` asset tags to preserve multi-color brand vector illustrations
