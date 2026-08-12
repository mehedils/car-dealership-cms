## ADDED Requirements

### Requirement: Car Card Clean Layout Without Rating Badge
The system SHALL render car cards (`resources/views/partials/car-card.blade.php`) without the rating and review badge element.

#### Scenario: User views car cards on homepage or inventory
- **WHEN** car cards are rendered on the website
- **THEN** the `<div class="card-rating">` badge SHALL NOT be rendered, presenting a clean title and spec layout.
