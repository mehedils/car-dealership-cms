## Why

The Carento platform is configured for a single car dealership, but the current navigation header contains multi-dealer links (`/dealer-listing`, `/dealer-details`), hardcoded sample car detail links (`/cars-details-3`), an unmaintained offcanvas menu, and unoptimized listing URLs (`/cars-list-1`). Cleaning up navigation to focus on single-dealership conversion paths, optimizing URLs to `/cars`, and adding dedicated Services and About Us pages will significantly improve user experience, brand credibility, and direct lead generation.

## What Changes

- **Navigation Header Cleanup**: Remove multi-dealer dropdown links (`/dealer-listing`, `/dealer-details`) and static sample link (`/cars-details-3`). Remove offcanvas drawer and replace hamburger icon on header right with a high-converting "Inquire Now" CTA button.
- **Global Lead Collection Modal**: Implement a site-wide modal form triggered by the header CTA button that captures Name, Phone, Email, and Message, submitting to the existing `inquiries.store` endpoint.
- **URL Optimization**: Update inventory listing routing from `/cars-list-1` to clean `/cars` URL across all navigation links, buttons, and section partials.
- **New Dedicated Pages**: Create dedicated `Services` (`/services`) and `About Us` (`/about`) pages and routes.

## Capabilities

### New Capabilities
- `single-dealer-header`: Single dealership navigation header featuring direct links and a Lead Collection CTA modal trigger.
- `dealership-pages`: Dedicated Services (`/services`) and About Us (`/about`) pages for showcasing dealership services, team, and company background.

### Modified Capabilities
- `car-inventory-routing`: Clean inventory listing route accessible via `/cars`.

## Impact

- **Views**: `resources/views/partials/header.blade.php`, `resources/views/partials/mobile-menu.blade.php`, `resources/views/layouts/app.blade.php`, `resources/views/partials/footer.blade.php`, `resources/views/services.blade.php`, `resources/views/about.blade.php`.
- **Routes**: `routes/web.php`.
- **Controllers/Models**: Integration with `InquiryController`, `Service`, `WhyUsFeature`, and `TeamMember` models.
