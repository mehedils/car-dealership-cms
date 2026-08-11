## Why

Currently, content on the dealership homepage (hero text, bullet points, CTA banner copy, section headings, and section visibility) is hardcoded in Blade views or scattered across settings. Dealership owners cannot customize or toggle homepage sections dynamically from the Filament Admin Panel without developer intervention. Creating a centralized Homepage Settings management interface under a dedicated "Website Content" navigation group in Filament Admin empowers administrators to configure all homepage sections dynamically while preserving full backward compatibility with default template copy.

## What Changes

- **Website Content Navigation Group & Homepage Settings Page**: Create a new Filament Admin page (`ManageHomepageSettings`) under a dedicated `Website Content` navigation group to manage all homepage configuration fields.
- **Section Visibility Controls**: Add boolean toggle settings for all 11 homepage sections (`Hero`, `Search Bar`, `Brands`, `Featured Vehicles`, `CTA Banner`, `Categories`, `Why Choose Us`, `Latest Arrivals`, `Services`, `Testimonials`, `Blog`).
- **Dynamic Content & Copy Configuration**: Provide input fields for hero taglines, headings, bullets, CTA banner text, video URLs, background/promo images, and section titles/subtitles across 9 form tabs.
- **Dynamic Section Rendering & Default Protection**: Update `resources/views/home.blade.php` to conditionally render sections based on visibility settings, and update 10 section Blade partials (`resources/views/sections/*.blade.php`) to use `setting('key', 'Default Template Copy')` fallbacks so unconfigured settings automatically fall back to original template copy without layout breakage.

## Capabilities

### New Capabilities
- `homepage-content-settings`: Dynamic Filament Admin settings management and Blade rendering for homepage sections, titles, media, and visibility toggles with default fallback protection.

### Modified Capabilities
- None.

## Impact

- **Filament Admin Panel**: Adds `Website Content > Homepage Settings` page class (`App\Filament\Pages\ManageHomepageSettings`) and Blade view (`resources/views/filament/pages/manage-homepage-settings.blade.php`).
- **Database**: Stores key-value configuration items in the existing `settings` database table.
- **Blade Views**: Updates `resources/views/home.blade.php` and section views in `resources/views/sections/`.
