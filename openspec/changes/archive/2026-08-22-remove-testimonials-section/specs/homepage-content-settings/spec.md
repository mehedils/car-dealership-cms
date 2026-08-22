## MODIFIED Requirements

### Requirement: Centralized Homepage Settings Page in Filament Admin
The system SHALL provide a dedicated `Homepage Settings` page (`ManageHomepageSettings`) under the `Website Content` navigation group in the Filament Admin Panel for managing all homepage configuration fields, omitting testimonials configuration.

#### Scenario: Admin accesses Homepage Settings page
- **WHEN** an authenticated admin navigates to `Website Content > Homepage Settings` in Filament Admin
- **THEN** the system displays a tabbed interface containing section visibility toggles and customizable copy/media fields for active homepage sections (Hero, Featured Vehicles, CTA Promo, Car Categories, Why Choose Us, Latest Arrivals, Services, Blog/News).
- **AND** does NOT include a Testimonials tab or toggle.

### Requirement: Granular Section Visibility Controls
The system SHALL allow administrators to toggle the visibility of individual active homepage sections on or off.

#### Scenario: Section toggled off in Filament Admin
- **WHEN** an admin sets a section visibility setting (e.g., `home_show_services`) to `false` and saves
- **THEN** the homepage (`resources/views/home.blade.php`) SHALL omit rendering that section partial completely.

#### Scenario: Section toggled on in Filament Admin
- **WHEN** an admin sets a section visibility setting to `true` or leaves it unset
- **THEN** the homepage SHALL render that section partial.
