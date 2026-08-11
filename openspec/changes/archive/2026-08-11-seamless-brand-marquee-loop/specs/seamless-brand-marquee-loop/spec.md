## ADDED Requirements

### Requirement: Infinite Circular Marquee Scrolling
The system SHALL display the Premium Brands marquee ticker as a continuous, infinite circular loop without blank whitespace gaps at the end of the brand list.

#### Scenario: User views Premium Brands marquee ticker
- **WHEN** a user views the homepage brand marquee ticker
- **THEN** the brand items SHALL scroll infinitely without stopping or leaving a blank whitespace gap on the right.

### Requirement: Uniform Brand Logo Dimensions
The system SHALL enforce uniform card heights (`72px`) and logo image bounding frames (`32px` max height) across all brand cards in the ticker.

#### Scenario: Brand cards are rendered in the marquee
- **WHEN** brand logos of varying aspect ratios are displayed in the ticker
- **THEN** all brand cards SHALL display with identical height (`72px`) and baseline alignment.

### Requirement: Overflow Visible and Arrow Vertical Alignment
The system SHALL set `overflow: visible` on `.carouselTicker__list` to prevent hover boundary clipping and align the "Show All Brands" header arrow optically with the text cap-height.

#### Scenario: User hovers over a brand card or views header link
- **WHEN** a user hovers over a brand card or views the header link
- **THEN** the card SHALL translate upwards without top-border clipping, and the arrow icon SHALL sit on the optical vertical center line of the header text.
