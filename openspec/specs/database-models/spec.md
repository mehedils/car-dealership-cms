# database-models Specification

## Purpose
Defines database schema, migrations, and Eloquent models for inventory, taxonomy, media, and user interaction entities.

## Requirements

### Requirement: Database Migrations and Models
The system SHALL contain migrations and Eloquent models for all required inventory, content, and interaction entities.

#### Scenario: Running Migrations
- **WHEN** the `php artisan migrate` command is executed
- **THEN** 14 new tables are created without errors (including cars, taxonomies, reviews, inquiries, services, etc).
- **AND** the schema matches the designed constraints and foreign key relationships.

#### Scenario: Eloquent Relationships
- **WHEN** querying a `Car` model
- **THEN** it correctly loads relationships to `Brand`, `CarType`, `FuelType`, `Location`, `Amenities`, and `Reviews`.
