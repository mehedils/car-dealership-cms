## ADDED Requirements

### Requirement: Visual Icon Picker
The system SHALL provide a visual icon picker instead of a text input for models that require an icon field (such as `Amenity`, `Service`, `WhyUsFeature`).

#### Scenario: Admin selects an icon
- **WHEN** the admin creates or edits an Amenity, Service, or Why Us Feature
- **THEN** they can visually search and select an icon using the Guava Filament Icon Picker component.
