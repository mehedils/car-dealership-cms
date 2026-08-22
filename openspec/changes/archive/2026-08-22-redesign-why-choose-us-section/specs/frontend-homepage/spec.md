## MODIFIED Requirements

### Requirement: Dynamic Homepage Data Rendering
The application SHALL render homepage sections dynamically using data retrieved from the database via `HomeController`, displaying structured dealership value proposition cards with thematic icons for the Why Choose Us section.

#### Scenario: User visits the homepage and views Why Choose Us
- **WHEN** a visitor navigates to `/` and scrolls to the Why Choose Us section
- **THEN** the section displays four elevated value proposition cards featuring dealership icons (e.g. Certified Inspection, Financing, Transparent Pricing, Warranty), bold titles, and benefit descriptions.
- **AND** cards feature interactive hover elevation animations and theme-coordinated styling.
