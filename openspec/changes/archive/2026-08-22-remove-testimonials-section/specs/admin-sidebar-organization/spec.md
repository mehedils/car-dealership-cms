## MODIFIED Requirements

### Requirement: Structured Group Hierarchy & Explicit Sorting
The system SHALL group all active resources into `Inventory`, `Leads`, `Content`, and `Settings` groups, ordered sequentially via `$panel->navigationGroups()` and explicit `$navigationSort` values, excluding Testimonials from navigation.

#### Scenario: Navigating ordered sidebar groups
- **WHEN** an administrator expands the `Content` navigation group in the sidebar
- **THEN** items inside the group SHALL display active content resources (Blog Posts, Services, FAQs, Highlights, Team Members) without displaying Testimonials.
