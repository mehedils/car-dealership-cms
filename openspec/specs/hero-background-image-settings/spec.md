# hero-background-image-settings Specification

## Purpose
TBD - created by archiving change hero-background-image-upload. Update Purpose after archive.
## Requirements
### Requirement: Hero Background Image Upload Control
The system SHALL provide a `FileUpload` field for `home_hero_bg_image` in Filament Admin (`Homepage Settings > Hero Section`) displaying guidance for ideal banner dimensions (`3838×1784 px` or `1920×892 px`, `~2.15:1 Ratio`).

#### Scenario: Admin uploads custom hero image
- **WHEN** an admin uploads an image to the `Hero Background Image` field and saves settings
- **THEN** the system SHALL store the file path under `settings` in the database and display the uploaded image as the homepage hero background.

#### Scenario: Hero background image unset
- **WHEN** no image is uploaded to `home_hero_bg_image`
- **THEN** the homepage hero section SHALL fall back to rendering `assets/imgs/hero/hero-1/banner.png`.

