## ADDED Requirements

### Requirement: Configurable Brands Showcase Section Headings
The system SHALL provide administration settings in `ManageHomepageSettings` to configure the section title, subtitle, and action button text for the homepage Brands showcase section.

#### Scenario: Admin configures custom Brands section headings
- **WHEN** an admin sets `home_brands_title`, `home_brands_subtitle`, and `home_brands_button_text` in the Brands tab of Homepage Settings and saves
- **THEN** the homepage Brands section SHALL render the custom title, subtitle, and button text.

#### Scenario: Brand headings unset or empty
- **WHEN** brand heading settings are unset or empty in the database
- **THEN** the homepage Brands section SHALL render the default copy: `"Premium Brands"`, `"Unveil the Finest Selection of High-End Vehicles"`, and `"Show All Brands"`.
