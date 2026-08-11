## ADDED Requirements

### Requirement: Clean Cars Route
The system SHALL route `/cars` to the inventory listing controller and support existing `/cars-list-1` requests via alias/redirect.

#### Scenario: User visits /cars
- **WHEN** a user navigates to `/cars`
- **THEN** the platform SHALL display the vehicle inventory listing page.
