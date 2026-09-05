# static-settings-management Specification

## Purpose
TBD - created by archiving change configureable-static-settings. Update Purpose after archive.

## Requirements

### Requirement: Fixed Static Settings Registry
The system SHALL maintain a fixed catalog of static setting keys in the application and database, preventing administrators from creating new setting keys or deleting existing setting keys.

#### Scenario: Attempting to create or delete setting keys
- **WHEN** an administrator views the settings management panel in Filament
- **THEN** key creation and deletion actions SHALL be disabled, permitting edits only to values of existing static keys

### Requirement: Tabbed Settings Dashboard
The Filament admin panel SHALL present a single, consolidated Settings dashboard page grouping fixed setting keys by domain (General, Contact Info, Social Media, Theme Colors, Inventory, and Footer), serving as the exclusive administrative entry point for application configuration while omitting redundant raw key-value resource listings from the navigation menu.

#### Scenario: Navigating to site settings
- **WHEN** an administrator accesses the admin navigation menu
- **THEN** exactly one primary Settings item SHALL be presented for configuring site settings, and raw key-value table resources SHALL NOT appear in the navigation menu

#### Scenario: Editing settings by category
- **WHEN** an administrator navigates to the Settings page in Filament
- **THEN** form fields SHALL be organized into logical tabs with human-readable labels and dedicated inputs corresponding to each fixed setting key

### Requirement: Configurable Theme Colors
The system SHALL provide visual ColorPicker controls for theme color keys (`primary_color`, `secondary_color`, `accent_color`, `button_text_color`) and dynamically inject the corresponding CSS `:root` variables into the HTML layout head.

#### Scenario: Updating primary brand color
- **WHEN** an administrator changes `primary_color` to a new HEX value in Filament Settings and saves
- **THEN** the application layout SHALL render updated `--bs-brand-2`, `--bs-button-bg`, and `--bs-primary` CSS variables dynamically in the head tag

### Requirement: Global Settings Helper and Blade Binding
The system SHALL provide a global helper function `setting(key, fallback)` to retrieve active settings values and bind them across `header.blade.php`, `footer.blade.php`, and `contact.blade.php`.

#### Scenario: Retrieving setting value in Blade
- **WHEN** a Blade view calls `setting('contact_email', 'sale@carento.com')`
- **THEN** the system SHALL return the stored value from the database, or the fallback value if unconfigured
