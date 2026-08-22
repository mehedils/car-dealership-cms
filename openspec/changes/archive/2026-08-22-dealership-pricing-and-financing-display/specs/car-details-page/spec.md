## MODIFIED Requirements

### Requirement: Car details route binding by slug
The system SHALL support route binding `/cars/{car:slug}` to fetch and render single car details dynamically based on the car's unique slug, displaying prominent purchase pricing and a monthly financing badge without any rental rate labels.

#### Scenario: Navigating to a valid car details page
- **WHEN** a user visits `/cars/toyota-camry-2025`
- **THEN** the system fetches the car record with matching slug
- **THEN** the page renders car title, total purchase price (e.g. `$28,500 USD`), brand, location, specifications, and media gallery
- **AND** displays an estimated monthly payment tag (e.g. `"Financiamiento disponible desde $380/mes"`)
- **AND** does NOT display `/ day`, `/per day`, or `/hour` rental text.
