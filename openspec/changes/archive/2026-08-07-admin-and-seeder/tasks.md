## 1. Inventory Resources

- [x] 1.1 Generate Filament Resources for `Brand`, `CarType`, `FuelType`, `Location`, and `Amenity`.
- [x] 1.2 Group these resources under the "Inventory" navigation group.
- [x] 1.3 Implement the `CarResource` with a Tabbed form (Basic Info, Specifications, Images, Pricing & Inclusions).
- [x] 1.4 Integrate `SpatieMediaLibraryFileUpload` in the `CarResource` for image gallery management.

## 2. Customer Interaction Resources

- [x] 2.1 Generate Filament Resources for `Inquiry` and `Review`.
- [x] 2.2 Group these resources under the "Leads & Reviews" navigation group.
- [x] 2.3 Ensure `Review` resource has a boolean toggle for `is_approved`.

## 3. Website Content Resources

- [x] 3.1 Generate Filament Resources for `Service`, `Faq`, `Testimonial`, `BlogPost`, `TeamMember`, and `WhyUsFeature`.
- [x] 3.2 Group these resources under the "Website Content" navigation group.

## 4. Settings Management

- [x] 4.1 Generate a custom Filament Page or Resource for `Setting` to manage global key-value configurations.
- [x] 4.2 Group under "Settings" navigation group.

## 5. Template-Aware Database Seeder

- [x] 5.1 Implement taxonomy seeding (Brands, Types, Locations, etc.) reading from `public/assets/imgs` where applicable.
- [x] 5.2 Implement `Car` seeding with `faker`, attaching images from `public/assets/imgs/cars-details` via Spatie Media Library using `preservingOriginal()`.
- [x] 5.3 Implement content seeding (Testimonials, Blog Posts, Services) using relevant images from `public/assets/imgs`.
- [x] 5.4 Seed fake reviews and inquiries.
- [x] 5.5 Run `php artisan db:seed` and verify database population and media attachment.
