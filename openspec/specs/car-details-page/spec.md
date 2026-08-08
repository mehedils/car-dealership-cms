# car-details-page Specification

## Purpose
Provides dynamic single car showcase details, specifications, media gallery, dealer inquiry submission, and related vehicle recommendations.

## Requirements

### Requirement: Car details route binding by slug
The system SHALL support route binding `/cars/{car:slug}` to fetch and render single car details dynamically based on the car's unique slug.

#### Scenario: Navigating to a valid car details page
- **WHEN** a user visits `/cars/toyota-camry-2025`
- **THEN** the system fetches the car record with matching slug
- **THEN** the page renders car title, price, brand, location, specifications, and media gallery

### Requirement: Dynamic vehicle gallery & specifications
The system SHALL display all attached Spatie Media gallery photos and technical specifications (mileage, transmission, fuel type, seats, doors, engine capacity).

#### Scenario: Displaying vehicle gallery and specs
- **WHEN** viewing a car details page
- **THEN** the main banner and slider render the car's media library images
- **THEN** the features bar displays accurate specs from the database

### Requirement: Dealership inquiry form submission
The system SHALL allow users to submit an inquiry message for the specific vehicle, persisting the entry to the `inquiries` table.

#### Scenario: Submitting a valid car inquiry
- **WHEN** a user fills out their name, email, phone, and message in the inquiry sidebar
- **THEN** the system creates a new `Inquiry` record associated with `car_id`
- **THEN** the user receives a success confirmation message

### Requirement: Related vehicles display
The system SHALL fetch and display up to 4 related vehicles sharing the same brand or car type in a bottom carousel.

#### Scenario: Viewing related vehicles
- **WHEN** viewing a car details page
- **THEN** the related cars section renders active vehicles from the same brand or car type using standard car card partials
