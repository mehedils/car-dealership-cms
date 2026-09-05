## ADDED Requirements

### Requirement: Dedicated Contact Page with Dynamic Dealership Locations
The system SHALL provide a dedicated Contact page at `/contact` displaying dealership branch locations populated dynamically from the `Location` database model.

#### Scenario: User visits Contact page with existing branch locations
- **WHEN** a user navigates to `/contact` and one or more `Location` records exist in the database
- **THEN** the platform SHALL render cards for each location displaying its branch name, address, telephone, email, and interactive map link.

#### Scenario: User visits Contact page with no branch locations defined
- **WHEN** a user navigates to `/contact` and no `Location` records exist in the database
- **THEN** the platform SHALL render a fallback contact card using the primary `site_name`, `contact_address`, `contact_phone`, and `contact_email` settings.

## MODIFIED Requirements

### Requirement: Dedicated About Us Page
The system SHALL provide a dedicated About Us page at `/about` displaying dealership background, Why Choose Us features, team members, and testimonials, supporting customizable company narrative, headline, and imagery managed via administration settings.

#### Scenario: User visits About page
- **WHEN** a user navigates to `/about`
- **THEN** the platform SHALL render the About page displaying company history, why choose us features, team members, and testimonials, respecting customizable story settings if configured or falling back to defaults.
