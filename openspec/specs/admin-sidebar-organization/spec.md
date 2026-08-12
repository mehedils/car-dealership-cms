## ADDED Requirements

### Requirement: Uniform Navigation Label Lengths
The system SHALL display concise, 1-2 word navigation labels across all Filament resources and pages to prevent text wrapping and visual clutter in the admin sidebar.

#### Scenario: Displaying short navigation labels
- **WHEN** an administrator views the Filament admin sidebar
- **THEN** every resource and page label SHALL be 1-2 short words without line wrapping or truncation ellipses

### Requirement: Structured Group Hierarchy & Explicit Sorting
The system SHALL group all resources into `Inventory`, `Leads`, `Content`, and `Settings` groups, ordered sequentially via `$panel->navigationGroups()` and explicit `$navigationSort` values.

#### Scenario: Navigating ordered sidebar groups
- **WHEN** an administrator expands any navigation group in the sidebar
- **THEN** items inside the group SHALL display in explicit logical rank order (e.g. *Cars* as #1 in Inventory, *Leads* as #1 in Leads)

### Requirement: Multi-language Dictionary Parity
The system SHALL provide exact Spanish dictionary key mappings in `lang/es.json` for all updated short navigation titles and group headers.

#### Scenario: Switching locale to Spanish
- **WHEN** `APP_LOCALE=es` is configured in `.env`
- **THEN** all sidebar group titles and item labels SHALL render in Spanish using short 1-2 word translated labels
