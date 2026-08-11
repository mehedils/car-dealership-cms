## ADDED Requirements

### Requirement: Dynamic Play Button Blade Component
The system SHALL provide a Blade component `<x-play-button />` that dynamically renders a video play button using theme primary background color (`setting('primary_color')`) and icon text color (`setting('button_text_color')`).

#### Scenario: User views CTA section video play button
- **WHEN** the CTA section is rendered on the homepage
- **THEN** the video play button SHALL display with the dynamic primary brand theme color instead of a static green PNG.

### Requirement: Play Button Micro-animations
The system SHALL provide smooth hover scale and shadow elevation micro-animations for the play button component.

#### Scenario: User hovers over video play button
- **WHEN** a user hovers over the video play button
- **THEN** the play button SHALL scale smoothly (`transform: scale(1.12)`) with glowing shadow elevation.
