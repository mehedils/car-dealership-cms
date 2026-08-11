## ADDED Requirements

### Requirement: Styled Slider Navigation Buttons with Clean Inline SVGs
The system SHALL style Swiper navigation buttons (`.swiper-button-prev-style-1` and `.swiper-button-next-style-1`) using clean inline SVG arrows, suppressing all default Swiper `:after` and `:before` pseudo-elements to eliminate dual overlaid icons.

#### Scenario: User views slider navigation buttons
- **WHEN** slider navigation buttons are rendered
- **THEN** default Swiper pseudo-elements SHALL be hidden (`display: none !important`), and single inline SVG arrows SHALL render centered inside circular buttons.

### Requirement: Synchronized Button Hover Micro-animations
The system SHALL provide smooth, synchronized hover micro-animations (`transform: translateY(-2px) scale(1.05)`, glow shadow elevation, and brightness boost) for both car card View buttons (`.card-button .btn`) and slider navigation buttons (`.swiper-button-prev-style-1` / `.swiper-button-next-style-1`).

#### Scenario: User hovers over slider navigation buttons or car card View buttons
- **WHEN** a user hovers over a slider navigation button or car card View button
- **THEN** the element SHALL scale smoothly with an upward lift (`translateY(-2px) scale(1.05)`), glow shadow, and transition to the primary brand theme hover color.

### Requirement: Admin Panel Button Text Color Specificity
The system SHALL override hardcoded CSS specificity rules on `.btn.btn-primary` to strictly honor `Button Text Color` (`--bs-button-text`) and `Button Hover Text Color` (`--bs-button-hover-text`) configured in Filament Admin Settings.

#### Scenario: User configures button text colors in Filament Admin
- **WHEN** custom button text colors are saved in Admin Settings (e.g. `#FFFFFF` text color)
- **THEN** primary buttons and car card buttons SHALL display text in the configured color without being overridden by template CSS defaults.
