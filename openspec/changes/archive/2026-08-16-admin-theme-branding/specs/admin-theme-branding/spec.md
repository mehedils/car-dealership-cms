## ADDED Requirements

### Requirement: Dynamic Admin Panel Primary Color
The Filament Admin Panel SHALL evaluate and apply the primary color from the `primary_color` setting dynamically across all panel UI elements (such as buttons, links, active navigation items, focus states, and badges) with automatic fallback to `#70f46d`.

#### Scenario: Valid primary color setting configured
- **WHEN** the `primary_color` setting is set to a valid hex color code in Site Settings
- **THEN** the admin panel generates and applies the corresponding 50–950 shade color palette as the primary theme color for all Filament components

#### Scenario: Empty or invalid primary color setting fallback
- **WHEN** the `primary_color` setting is empty, invalid, or during unseeded database execution
- **THEN** the admin panel falls back to `#70f46d` and renders without throwing an error

### Requirement: Admin Panel & Login Screen Brand Logo
The Filament Admin Panel and Login Screen SHALL display the configured site logo (`site_logo_dark` in light mode, `site_logo_light` in dark mode) and favicon with proper height and aspect ratio constraints.

#### Scenario: Custom logos uploaded in settings
- **WHEN** custom logo images are uploaded in Site Settings under "Logo & Branding"
- **THEN** the Filament login card and admin sidebar render the uploaded image assets according to the active dark/light mode theme

#### Scenario: Logo fallback to default theme assets
- **WHEN** no custom logos are uploaded in settings
- **THEN** the Filament login card and admin sidebar fall back to the default theme SVG assets (`assets/imgs/template/logo-d.svg` and `assets/imgs/template/logo-w.svg`)

#### Scenario: Site Name and Favicon Integration
- **WHEN** navigating to the Filament login page or admin panel
- **THEN** the page title uses the dynamic `site_name` setting and browser tab displays the dynamic `site_favicon` asset
