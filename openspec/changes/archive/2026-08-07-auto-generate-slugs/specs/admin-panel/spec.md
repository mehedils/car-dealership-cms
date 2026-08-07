## ADDED Requirements

### Requirement: Automatic Slug Generation
The admin forms for models containing a `slug` field (`Brand`, `CarType`, `Car`, `Service`, `BlogPost`) SHALL automatically compute and pre-fill the slug from the primary name or title field while leaving the slug field editable.

#### Scenario: Admin enters a brand name
- **WHEN** the admin types a name into the Brand form and moves focus away
- **THEN** the slug field is automatically populated with the URL-slugified version of that name.
- **AND** the admin can manually modify the generated slug before saving.

### Requirement: Hide Slug Field From List Tables
The list tables for models with slugs (`Brand`, `CarType`, `Car`, `Service`, `BlogPost`) SHALL NOT display the `slug` column by default, keeping the list view clean and focused on primary content.

#### Scenario: Admin views entity index tables
- **WHEN** the admin views the index table for Brands, Car Types, Cars, Services, or Blog Posts
- **THEN** the `slug` column is hidden or omitted from the table view.
