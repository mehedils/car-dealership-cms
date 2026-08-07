## ADDED Requirements

### Requirement: Admin Resources and Navigation
The system SHALL provide Filament resources for all 14 CMS models, organized into intuitive navigation groups.

#### Scenario: Admin views sidebar
- **WHEN** the admin logs into the Filament dashboard
- **THEN** they see navigation groups for "Inventory", "Leads & Reviews", "Website Content", and "Settings".

### Requirement: Car Management Form
The system SHALL provide a tabbed interface for creating and editing Cars, including image gallery management.

#### Scenario: Admin uploads car images
- **WHEN** the admin edits a car
- **THEN** they can upload multiple images via the Spatie Media Library file uploader on the "Images" tab.
