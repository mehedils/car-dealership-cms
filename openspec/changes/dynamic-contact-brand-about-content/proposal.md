## Why

Currently, key customer touchpoints across the website contain hardcoded text, placeholder international branches, and static narratives:
1. The `/contact` page hardcodes dummy international locations (Tokyo, London, Paris) in static HTML while an existing `LocationResource` in Filament Admin remains disconnected from the route.
2. The `/about` page hardcodes the dealership company story, headline, and executive portrait in English, preventing the dealership from personalizing their corporate background and imagery.
3. The homepage Brands section hardcodes the "Premium Brands" title, subtitle, and CTA button text, which may conflict with dealerships offering commercial or economy pre-owned vehicles.

This change connects the existing `Location` model to the contact page and exposes content settings for the About Us story and Homepage Brands section in the Filament Admin Panel.

## What Changes

- **Contact Page Dynamic Locations**:
  - Update the `/contact` route in `routes/web.php` to fetch all active `Location` records from the database.
  - Update `resources/views/contact.blade.php` to dynamically iterate over database locations, displaying branch name, address, phone, email, and map link.
  - Provide a clean fallback card using `site_name`, `contact_address`, `contact_phone`, and `contact_email` when no individual `Location` records exist.
- **Homepage Brand Section Dynamic Headings**:
  - Add `home_brands_title`, `home_brands_subtitle`, and `home_brands_button_text` fields to `ManageHomepageSettings` under the Brands Showcase section tab.
  - Update `resources/views/sections/brand.blade.php` to dynamically display these settings with template fallbacks.
- **About Us Page Dynamic Story & Hero**:
  - Add an "About Page" (`about_*`) tab to `ManageSettings` (or `ManageHomepageSettings`) with fields for:
    - `about_hero_title` and `about_hero_subtitle`
    - `about_story_badge` (e.g. "Who We Are")
    - `about_story_title` (e.g. "Dedicated to Excellence in Automotive Solutions")
    - `about_story_description` (textarea / rich text for company history)
    - `about_story_image` (file upload for dealership / founder photo)
  - Update `resources/views/about.blade.php` to render these dynamic settings with sensible fallbacks.

## Capabilities

### New Capabilities
None.

### Modified Capabilities
- `dealership-pages`: Add dynamic branch location rendering to `/contact` and dynamic company narrative/imagery to `/about`.
- `homepage-content-settings`: Add configurable heading and subtitle settings for the Brands showcase section.

## Impact

- **Routes**: `routes/web.php` (`/contact` closure updated to pass `$locations`).
- **Admin Pages**:
  - `app/Filament/Pages/ManageHomepageSettings.php` (Brands tab added/extended).
  - `app/Filament/Pages/ManageSettings.php` (About Page tab added).
- **Views**:
  - `resources/views/contact.blade.php`
  - `resources/views/about.blade.php`
  - `resources/views/sections/brand.blade.php`
- **Database / Models**: Uses existing `Location` model and `Setting` key-value storage. No breaking database migrations required.
