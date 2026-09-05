## MODIFIED Requirements

### Requirement: Tabbed Settings Dashboard
The Filament admin panel SHALL present a single, consolidated Settings dashboard page grouping fixed setting keys by domain (General, Contact Info, Social Media, Theme Colors, Inventory, and Footer), serving as the exclusive administrative entry point for application configuration while omitting redundant raw key-value resource listings from the navigation menu.

#### Scenario: Navigating to site settings
- **WHEN** an administrator accesses the admin navigation menu
- **THEN** exactly one primary Settings item SHALL be presented for configuring site settings, and raw key-value table resources SHALL NOT appear in the navigation menu

#### Scenario: Editing settings by category
- **WHEN** an administrator navigates to the Settings page in Filament
- **THEN** form fields SHALL be organized into logical tabs with human-readable labels and dedicated inputs corresponding to each fixed setting key
