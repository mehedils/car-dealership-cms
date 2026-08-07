## ADDED Requirements

### Requirement: Template-Aware Database Seeding
The system SHALL provide a DatabaseSeeder that generates realistic data and utilizes existing template images from `public/assets/imgs`.

#### Scenario: Seeding the database
- **WHEN** the command `php artisan db:seed` is run
- **THEN** the database is populated with taxonomies, cars, reviews, and content.
- **AND** template images are attached to the models correctly using simple string paths or Spatie Media Library.
