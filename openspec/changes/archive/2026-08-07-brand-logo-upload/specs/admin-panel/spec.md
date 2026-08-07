## ADDED Requirements

### Requirement: Brand Logo Image Upload
The system SHALL provide a file upload component for the `logo` field when creating or editing a `Brand` in the Filament admin panel. The uploaded image path SHALL be saved as a string in the database and the file stored in the `brands` storage directory.

#### Scenario: Admin uploads a brand logo
- **WHEN** the admin creates or edits a Brand
- **THEN** they can select an image file from their computer for the logo
- **AND** the image preview is displayed in the list table.
