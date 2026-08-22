## MODIFIED Requirements

### Requirement: Car details route binding by slug
The system SHALL support route binding `/cars/{car:slug}` to fetch and render single car details dynamically based on the car's unique slug, presenting a clean header with prominent purchase pricing and financing badges while omitting review rating badges, fleet codes, location map links, and wishlist buttons.

#### Scenario: Navigating to a valid car details page
- **WHEN** a user visits `/cars/toyota-camry-2025`
- **THEN** the system fetches the car record with matching slug
- **THEN** the page renders car title, total purchase price, specifications, media gallery, and financing badge
- **AND** does NOT render review rating pill badges, rental fleet codes, location map links, or wishlist buttons in the header.
