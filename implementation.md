# Single-Dealer Dynamic Website Migration Strategy

This plan outlines the architecture and steps to convert the existing static template into a fully dynamic, configurable website tailored for a single dealership.

## Goal
To make "every aspect" of the website configurable for the dealership owner without needing to write code, utilizing a powerful admin dashboard.

## Technical Architecture
- **Framework**: Laravel 11
- **Admin Panel**: Laravel Filament (V3) - Provides a rapid, beautiful, and highly functional interface for managing database records and settings.
- **Media Management**: Spatie Media Library (integrated with Filament) for handling car thumbnail images and image galleries.
- **Recommended Image Sizes**: 
  - **Car Images (Thumbnails & Gallery)**: 1200x800 pixels (3:2 aspect ratio) for best display on details and listing pages.
  - **Hero/Banner Images**: 1920x1080 pixels (16:9 aspect ratio) for full-width sections.
  - **Team Member Photos**: 800x800 pixels (1:1 aspect ratio, square).

## Proposed Changes

### 1. Database & Models
We will create dynamic models instead of hardcoded configurations.

#### Core Inventory Models
- **`Car`**: The central model. Contains fields like name, price, duration, rating, and an **`is_featured` boolean toggle**.
  - **Core Specifications**: Fixed columns for `mileage`, `transmission`, `seats`, `doors`, `luggage`, and `engine_capacity`.
  - **Included In Price**: A nullable rich-text field. If left blank, it will automatically fall back to the global template defined in settings.
  - Has relationships to types, amenities, and reviews.
- **`CarType`**, **`FuelType`**, **`Amenity`**, **`Location`**: Configurable taxonomies.

#### Customer Interaction Models
- **`Inquiry` / `Lead`**: To capture contact form submissions.
- **`Review`**: To capture user reviews for specific cars (includes name, rating, comment, and an `is_approved` boolean so the dealer can moderate them).

#### Additional Content Models
- **`Faq`**: A model to manage global Frequently Asked Questions (Question, Answer, sort order) that will display on the car details page.
- **`TeamMember`**: To showcase sales representatives and staff.

#### Site Configuration & SEO
- **`Setting`**: A key-value store to manage global site content:
  - Branding, Contact info, Social Links.
  - **Global Included in Price Template**: A rich-text default template for inclusions.
  - **Global SEO**: Configurable Meta Title and Meta Description for the main site.

### 2. Admin Dashboard (Filament)
- Install and configure Laravel Filament.
- Create **Filament Resources** with full CRUD capabilities for:
  - Cars, Car Types, Fuel Types, Amenities, Locations.
  - Team Members.
  - FAQs.
  - **Reviews**: A resource to moderate reviews (approve/reject or delete).
  - **Leads/Inquiries**: A read-only resource to manage customer inquiries.
- Create a **Settings Page** within Filament to manage global site configurations, SEO, and the default "Included in Price" template.

### 3. Frontend Refactoring
- **Controllers**: Refactor to query the database via Eloquent.
- **Views**: Update Blade templates to display dynamic data.
  - Specification icons will be hardcoded, displaying dynamic column values.
- **Car Details Accordions**:
  - **Included in the price**: Displays the car's specific text, or falls back to the global template if empty.
  - **Question Answers**: Loops through the global `Faq` models.
  - **Reviews**: Displays only `is_approved` reviews for that car and includes a working form to submit new reviews.
- **Remove Rent Section**: Remove the "Rent This Vehicle" sections.
- **Routes**: Update routes to reflect the dynamic pages.

## Verification Plan

### Automated Tests
- We will write and run automated tests using Pest/PHPUnit to ensure frontend routes load and Filament CRUDs work.

### Manual Verification
- Add a test `Car`, `Faq`, and `Review` in Filament.
- Verify the "Included in price" fallback logic works (when car field is empty vs filled).
- Submit a review on the frontend and verify it stays hidden until the dealer approves it in Filament.
- Submit a contact form and verify it appears in the Leads section.
- Verify the "Rent This Vehicle" section is removed.
