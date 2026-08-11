## ADDED Requirements

### Requirement: Conditional social icon visibility
The system SHALL only display social media icons in the header topbar and footer when valid URLs are configured for those platforms.

#### Scenario: Social link URL is set
- **WHEN** a social link setting (e.g. `social_facebook`) contains a non-empty URL other than `#`
- **THEN** the system SHALL render the corresponding social icon with the configured link

#### Scenario: Social link URL is empty or set to placeholder
- **WHEN** a social link setting is empty, null, or equals `#`
- **THEN** the system SHALL hide that social icon from the topbar and footer
