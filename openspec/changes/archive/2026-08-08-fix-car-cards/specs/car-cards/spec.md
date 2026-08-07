## ADDED Requirements

### Requirement: Car cards must not display rental duration pricing
The system SHALL display the raw price of the car without appending a "per day" or duration label, as the platform represents a single dealer inventory of cars for sale.

#### Scenario: Displaying car price
- **WHEN** a user views a car card on the homepage
- **THEN** the pricing section displays the price formatted as currency
- **THEN** the pricing section does not display "/ day" or any rental duration unit

### Requirement: Car names must not overflow or break layout
The system SHALL handle long car or dealership names on car cards elegantly without overflowing the card boundaries or breaking flex layouts.

#### Scenario: Long car name presentation
- **WHEN** a car name exceeds the available horizontal space in the card title
- **THEN** the text is truncated using an ellipsis rather than overflowing horizontally or wrapping awkwardly

### Requirement: Car card "View Details" action must be compact
The system SHALL present a compact UI element for the "View Details" call to action to prevent layout cramping in the card footer.

#### Scenario: Interacting with car card details
- **WHEN** a user views the footer of a car card
- **THEN** the link to view the car details is presented cleanly without breaking onto multiple lines
