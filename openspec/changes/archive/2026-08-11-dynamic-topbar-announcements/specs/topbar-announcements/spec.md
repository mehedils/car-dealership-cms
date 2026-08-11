## ADDED Requirements

### Requirement: Topbar announcements configuration in admin panel
The admin panel SHALL allow administrators to manage multiple topbar announcement messages with optional CTA text and link URLs using a repeater control.

#### Scenario: Admin configures multiple announcement messages
- **WHEN** the administrator adds announcement items in Site Settings and saves the form
- **THEN** the system SHALL store the list of announcement items in the settings store as a JSON structure

### Requirement: Rotating announcement display on frontend
The header topbar SHALL render configured announcement messages in a rotating ticker when multiple items are active.

#### Scenario: Multiple announcement items exist
- **WHEN** a visitor loads any page featuring the topbar header and multiple announcement items exist
- **THEN** the topbar SHALL display the announcements sequentially with auto-rotating transitions

#### Scenario: Fallback to slogan
- **WHEN** no custom topbar announcement items exist
- **THEN** the topbar SHALL display the default site slogan setting
