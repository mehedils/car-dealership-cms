## MODIFIED Requirements

### Requirement: Vehicle Card Specs and Dealership CTAs
The system SHALL render vehicle cards across inventory and homepage car grids highlighting dealership purchasing specifications (Purchase Price, Monthly Financing Installment Tag, Year, Mileage, Transmission, Fuel Type) while omitting rental rate labels.

#### Scenario: Viewing vehicle specifications on card
- **WHEN** a vehicle card is rendered in the grid or carousel
- **THEN** it displays total purchase price (e.g. `$28,500`), monthly installment tag (e.g. `"Desde $380/mes"`), year, mileage in km, transmission, and fuel type
- **AND** does NOT display `/ day`, `/per day`, `/hour`, or rental rate suffixes.
