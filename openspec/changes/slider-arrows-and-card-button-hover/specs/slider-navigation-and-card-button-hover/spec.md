## ADDED Requirements

### Requirement: Styled Slider Navigation Buttons
The system SHALL style Swiper navigation buttons (`.swiper-button-prev-style-1` and `.swiper-button-next-style-1`) as theme-aligned circular buttons without default Swiper `:after` pseudo-element font icon conflicts.

#### Scenario: User views slider navigation buttons
- **WHEN** slider navigation buttons are rendered
- **THEN** Swiper default `:after` pseudo-elements SHALL be hidden, and Flaticon icons SHALL render centered inside theme-colored circular buttons.

### Requirement: Car Card View Button Hover Feedback
The system SHALL provide smooth hover micro-animations (`transform: translateY(-2px) scale(1.04)` with shadow glow elevation) for car card View buttons (`.card-button .btn` / `.card-journey-small .btn-primary`).

#### Scenario: User hovers over car card View button
- **WHEN** a user hovers over the View button on a car card
- **THEN** the button SHALL scale smoothly with an upward lift and shadow glow feedback.
