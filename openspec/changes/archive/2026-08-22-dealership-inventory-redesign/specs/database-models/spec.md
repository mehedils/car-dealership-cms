## MODIFIED Requirements

### Requirement: Database Migrations and Models
The system SHALL contain migrations and Eloquent models for all required inventory, content, and interaction entities, including extended sales attributes on the `Car` model (`year`, `model`, `condition`, `status`).

#### Scenario: Running Migrations
- **WHEN** the `php artisan migrate` command is executed
- **THEN** all tables are created or updated without errors (including cars table with `year`, `model`, `condition`, and `status` columns).
- **AND** the schema matches the designed constraints and foreign key relationships.

#### Scenario: Eloquent Relationships
- **WHEN** querying a `Car` model
- **THEN** it correctly loads relationships to `Brand`, `CarType`, `FuelType`, `Location`, `Amenities`, and `Reviews`.
