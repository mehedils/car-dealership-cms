# single-dealer-header Specification

## Purpose
TBD - created by archiving change single-dealer-header-and-pages. Update Purpose after archive.
## Requirements
### Requirement: Single Dealer Header Navigation
The system SHALL display a clean, single-dealership navigation header with direct links to Home (`/`), Inventory (`/cars`), Services (`/services`), About Us (`/about`), and Contact Us (`/contact`), omitting multi-dealer dropdowns and static sample car links.

#### Scenario: Header navigation render
- **WHEN** a user visits any page on the platform
- **THEN** the header navigation SHALL display direct links for Home, Cars, Services, About Us, and Contact Us without dealer listing or sample detail dropdowns.

### Requirement: Header Lead Collection CTA Button and Modal
The system SHALL provide a prominent CTA button in the header right section that triggers a global Lead Collection Modal.

#### Scenario: User clicks header CTA button
- **WHEN** a user clicks the "Inquire Now" button in the header
- **THEN** the platform SHALL display a modal containing fields for Name, Phone Number, Email, and Message.

#### Scenario: User submits lead form in modal
- **WHEN** a user submits valid lead information in the header CTA modal
- **THEN** the platform SHALL create a new Inquiry record via `POST /inquiries` and display a success confirmation message.

