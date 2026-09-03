## MODIFIED Requirements

### Requirement: Car details route binding by slug
The system SHALL support route binding `/cars/{car:slug}` to fetch and render single car details dynamically based on the car's unique slug, with clean currency formatting (omitting hardcoded "USD" tags).

#### Scenario: Navigating to a valid car details page
- **WHEN** a user visits `/cars/toyota-camry-2025`
- **THEN** the system fetches the car record with matching slug
- **THEN** the page renders car title, formatted price with currency symbol (without "USD" suffix), brand, location, specifications, and media gallery

### Requirement: Dynamic vehicle gallery & specifications
The system SHALL display all attached Spatie Media gallery photos and technical specifications with Spanish action buttons (*Ver Todas las Fotos*, *Ver Video*).

#### Scenario: Displaying vehicle gallery and specs
- **WHEN** viewing a car details page
- **THEN** the main banner and slider render the car's media library images with Spanish action buttons
- **THEN** the features bar displays accurate specs from the database

### Requirement: Related vehicles display
The system SHALL fetch and display up to 4 related vehicles sharing the same brand or car type under the localized section title *Vehículos Relacionados*.

#### Scenario: Viewing related vehicles
- **WHEN** viewing a car details page
- **THEN** the related cars section renders active vehicles under the heading *Vehículos Relacionados*
