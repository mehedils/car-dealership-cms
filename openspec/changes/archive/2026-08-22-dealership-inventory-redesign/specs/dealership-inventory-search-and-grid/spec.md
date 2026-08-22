## Purpose

Provides a comprehensive dealership sales search engine, customizable page header banner, interactive vehicle cards with status badges and buying triggers, multi-parameter sorting, and empty state fallbacks for the `/cars` inventory route.

## ADDED Requirements

### Requirement: Dealership Page Header and CMS Background Configuration
The system SHALL display dealership-focused headline copy and badges on the `/cars` inventory page header. The hero background image and promotional copy SHALL be configurable via Filament CMS settings with a fallback to a default showroom asset.

#### Scenario: Displaying default dealership header copy
- **WHEN** a visitor navigates to `/cars`
- **THEN** the header displays dealership messaging such as "Inventario de Vehículos Nuevos y Usados" and "Encuentra el auto que estás buscando"
- **AND** does NOT display rental terms like "car rental" or "cars for rent".

#### Scenario: Admin updates inventory hero banner
- **WHEN** an admin uploads a custom hero banner image in Filament Settings
- **THEN** `/cars` renders the uploaded image as the header background.

### Requirement: Dealership Sales Search Engine
The system SHALL provide a dedicated sales search bar and sidebar filters connected directly to the database via Eloquent, replacing all rental-specific fields (pickup/return locations and datepickers).

#### Scenario: Filtering by condition
- **WHEN** a user selects a condition (Todos, Nuevos, Usados, Certificados)
- **THEN** the vehicle list updates to include only cars matching that condition.

#### Scenario: Cascading Make and Model selection
- **WHEN** a user selects a specific Make (Brand)
- **THEN** the Model dropdown dynamically updates to display only models associated with that selected Make.

#### Scenario: Numeric and range filters
- **WHEN** a user adjusts Year range, Price range, or Max Mileage
- **THEN** the system filters vehicles where `year`, `price`, and `mileage` fall within the selected boundaries.

#### Scenario: Taxonomy and specification filters
- **WHEN** a user selects Body Type, Transmission, or Fuel Type
- **THEN** the system filters cars matching those exact relational or column values.

### Requirement: Vehicle Card Specs and Dealership CTAs
The system SHALL render vehicle cards in the inventory grid highlighting dealership purchasing specifications (Price, Year, Mileage, Transmission, Fuel Type) while hiding rental seating/luggage metrics. Each card SHALL include a status badge and primary buying CTAs.

#### Scenario: Viewing vehicle specifications on card
- **WHEN** a vehicle card is rendered in the grid
- **THEN** it displays total price, year, mileage in km, transmission, fuel type, and an estimated monthly financing tag (or financing availability indicator)
- **AND** does not display passenger seat or luggage baggage count.

#### Scenario: Rendering vehicle status badge
- **WHEN** a vehicle has a status or condition (Nuevo, Usado, Certificado, Reservado, Vendido)
- **THEN** a styled, color-coded badge is rendered on top of the vehicle card thumbnail image.

#### Scenario: Triggering quote or appointment CTA
- **WHEN** a user clicks "Solicitar Cotización" or "Agendar Cita" on a vehicle card
- **THEN** the lead inquiry modal opens with the selected vehicle's information pre-filled.

### Requirement: Dealership Sorting, Results Counter, and Empty State
The system SHALL allow sorting by price (asc/desc), year (desc), mileage (asc), and recently added. It SHALL display an accurate vehicle results counter and a user-friendly empty state with a reset filter button and custom car request CTA when 0 vehicles match.

#### Scenario: Sorting vehicle inventory
- **WHEN** a user chooses a sort option (e.g., "Precio: Menor a Mayor", "Año: Más Reciente")
- **THEN** the results list is sorted according to the selected criteria.

#### Scenario: Viewing results counter
- **WHEN** viewing filtered or unfiltered inventory
- **THEN** the counter displays dealership terminology such as "Mostrando 1 - 12 de 48 vehículos".

#### Scenario: Empty state on zero matches
- **WHEN** a filter combination produces 0 matching vehicles
- **THEN** an empty state is displayed containing a message, a "Limpiar Filtros" button, and a contact/vehicle sourcing inquiry action.

### Requirement: Secondary Clutter Removal
The `/cars` inventory page SHALL NOT render duplicate homepage sections such as the duplicate brand logo carousel ticker or duplicate fleet intro headings.

#### Scenario: Browsing inventory page
- **WHEN** a user visits `/cars`
- **THEN** the page contains only the hero header, search filters, inventory grid, toolbar, and pagination.
