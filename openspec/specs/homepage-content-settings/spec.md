# homepage-content-settings Specification

## Purpose
TBD - created by archiving change centralized-homepage-settings. Update Purpose after archive.
## Requirements
### Requirement: Centralized Homepage Settings Page in Filament Admin
The system SHALL provide a dedicated `Homepage Settings` page (`ManageHomepageSettings`) under the `Website Content` navigation group in the Filament Admin Panel for managing all homepage configuration fields.

#### Scenario: Admin accesses Homepage Settings page
- **WHEN** an authenticated admin navigates to `Website Content > Homepage Settings` in Filament Admin
- **THEN** the system displays a tabbed interface containing section visibility toggles and customizable copy/media fields for all homepage sections.

#### Scenario: Admin saves Homepage Settings
- **WHEN** an admin updates fields in the Homepage Settings form and submits the form
- **THEN** the system SHALL store or update each setting key in the `settings` database table and display a success notification.

### Requirement: Granular Section Visibility Controls
The system SHALL allow administrators to toggle the visibility of individual homepage sections on or off.

#### Scenario: Section toggled off in Filament Admin
- **WHEN** an admin sets a section visibility setting (e.g., `home_show_testimonials`) to `false` and saves
- **THEN** the homepage (`resources/views/home.blade.php`) SHALL omit rendering that section partial completely.

#### Scenario: Section toggled on in Filament Admin
- **WHEN** an admin sets a section visibility setting to `true` or leaves it unset
- **THEN** the homepage SHALL render that section partial.

### Requirement: Customizable Homepage Content with Default Protection
The system SHALL render custom titles, subtitles, body text, bullets, and media configured in settings, falling back to original template defaults if a setting is empty or unset.

#### Scenario: Custom setting configured
- **WHEN** an admin enters custom text for a setting (e.g., `home_hero_title = "Find Your Dream Ride"`)
- **THEN** the frontend Blade partial SHALL display the custom string `"Find Your Dream Ride"`.

#### Scenario: Setting unset or empty
- **WHEN** a setting key does not exist in the database or contains a null value
- **THEN** the frontend Blade partial SHALL display the fallback default string defined in the `setting('key', 'Default Copy')` helper call.

