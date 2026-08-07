## Why

To make the car dealership website fully dynamic, we need to replace the static arrays in `config/cars.php` and hardcoded Blade sections with robust database tables and Eloquent models. This enables the dealer to manage all inventory, site content, and incoming leads through the Filament admin panel.

## What Changes

- Create migrations and Eloquent models for **Inventory** (`Brand`, `CarType`, `FuelType`, `Location`, `Amenity`, `Car`, `amenity_car`).
- Create migrations and models for **Customer Interactions** (`Inquiry`, `Review`).
- Create migrations and models for **Template Content** (`Service`, `WhyUsFeature`, `Testimonial`, `BlogPost`, `Faq`, `TeamMember`).
- Create a key-value `Setting` model for global configurations.
- Define Eloquent relationships (e.g., `Car` belongsTo `Brand`, `Car` hasMany `Review`, `Car` belongsToMany `Amenity`).

## Capabilities

### New Capabilities
- `database-models`: Creation of all database migrations and Eloquent models to support the dynamic architecture.

### Modified Capabilities
<!-- None -->

## Impact

- **Database**: Adds 14 new tables to the database.
- **Models**: Adds 14 new Eloquent models to the `app/Models` directory.
