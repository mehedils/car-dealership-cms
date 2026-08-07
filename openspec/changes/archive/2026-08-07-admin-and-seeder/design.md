## Context

The CMS is backed by 14 Eloquent models to provide dynamic control over the car dealership website. We need a clean, structured admin interface using Filament and a data seeder that leverages the existing frontend images located in `public/assets/imgs` to provide a realistic preview of the site immediately upon setup.

## Goals / Non-Goals

**Goals:**
- Design a structured Filament navigation using grouped sidebars (Inventory, Leads & Reviews, Website Content, Settings).
- Create a complex, tabbed form for the `CarResource` including Spatie Media Library integration for image galleries.
- Implement a `DatabaseSeeder` that uses local filesystem paths to attach real template images to the models.

**Non-Goals:**
- Creating custom Filament theme/styling beyond basic navigation grouping.
- Generating real data from APIs; the seeder will use Faker for text and local images for visuals.

## Decisions

### Admin Navigation Groups
- **Inventory**: `Brand`, `CarType`, `FuelType`, `Location`, `Amenity`, `Car`.
- **Leads & Reviews**: `Inquiry`, `Review`.
- **Website Content**: `Service`, `Faq`, `Testimonial`, `BlogPost`, `TeamMember`, `WhyUsFeature`.
- **Settings**: A specific Filament page or resource for global key-value `Settings`.

### Car Form Architecture
- Due to the large number of fields on the `Car` model, we will use the `Tabs` layout component in Filament (`Basic Info`, `Specifications`, `Images`, `Pricing & Inclusions`).
- Image upload will be handled by Filament's `SpatieMediaLibraryFileUpload` to automatically attach uploaded files to the `gallery` collection.

### Seeder Strategy
- The seeder will rely heavily on `File::glob(public_path('assets/imgs/*/*'))` to find existing images.
- It will randomly pick images from specific directories (e.g., `brand/`, `cars-details/`) and attach them either as string paths (for simple icons) or via `$model->addMedia()->preservingOriginal()` for Spatie media.

## Risks / Trade-offs

- **[Performance during seeding]** → Attaching 20+ cars with multiple images via Spatie will take a few seconds during `db:seed`. Mitigation: Use `preservingOriginal()` instead of copying the files around excessively to keep the seeder reasonably fast.
