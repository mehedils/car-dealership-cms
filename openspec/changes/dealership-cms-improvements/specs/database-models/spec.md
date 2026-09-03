## MODIFIED Requirements

### Requirement: Database Migrations and Models
The system SHALL contain migrations and Eloquent models for all required inventory, content, and interaction entities, including extended sales attributes on the `Car` model (`year`, `model`, `condition`, `status`), supporting 9 vehicle lifecycle statuses and 4 vehicle conditions.

#### Scenario: Running Migrations
- **WHEN** the `php artisan migrate` command is executed
- **THEN** all tables are created or updated without errors (including cars table with `year`, `model`, `condition`, and `status` columns).
- **AND** the schema matches the designed constraints and foreign key relationships.

#### Scenario: Eloquent Relationships
- **WHEN** querying a `Car` model
- **THEN** it correctly loads relationships to `Brand`, `CarType`, `FuelType`, `Location`, `Amenities`, and `Reviews`.

#### Scenario: Vehicle Status Options
- **WHEN** creating or updating a car's status
- **THEN** the system supports the 9 defined dealership states: `available` (*Disponible*), `reserved` (*Apartado / Reservado*), `in_negotiation` (*En Negociación*), `sold` (*Vendido*), `delivered` (*Entregado*), `not_available` (*No Disponible*), `in_maintenance` (*En Mantenimiento / Taller*), `in_transit` (*En Tránsito*), and `demo` (*Demo / Prueba de Manejo*).

#### Scenario: Vehicle Condition Options
- **WHEN** creating or updating a car's condition
- **THEN** the system supports the 4 defined condition states: `new` (*Nuevo*), `certified` (*Seminuevo Certificado*), `used` (*Usado*), and `refurbished` (*Reacondicionado*).

#### Scenario: Inquiry Status Options
- **WHEN** viewing or updating an inquiry
- **THEN** the system supports statuses including `pending` (*Pendiente*), `received` (*Recibido*), `read` / `seen` (*Leído / Visto*), `contacted` (*Contactado*), and `closed` (*Cerrado*).
