## Why

Currently, the topbar announcement message in the header ("More than 800+ special collection cars in this summer") is static or bound to a single slogan setting. Additionally, social media icons in the header and footer render unconditionally even when their links are empty or set to `#`. Making the topbar announcements dynamic allows showroom managers to feature rotating promotions, discounts, and perks directly from the admin panel, while hiding unused social links ensures a clean, professional user experience.

## What Changes

- Add a dynamic **Topbar Announcements** Repeater configuration in the Filament Admin Panel (`ManageSettings.php`), allowing admins to manage multiple announcement messages with custom text, optional CTA button labels, and URLs.
- Update frontend header templates (`resources/views/partials/header.blade.php` and `resources/views/partials/header-hero.blade.php`) to render a smooth rotating announcement ticker when multiple messages are defined.
- Update topbar and footer templates (`header.blade.php`, `header-hero.blade.php`, and `footer.blade.php`) to conditionally hide social media icons if their URL setting is empty, null, or set to `#`.

## Capabilities

### New Capabilities
- `topbar-announcements`: Allows dynamic management and display of rotating announcement messages, perks, and promotional CTAs in the website header topbar.
- `conditional-social-links`: Hides social media icons in the topbar and footer when social URLs are not configured.

### Modified Capabilities

None.

## Impact

- **Admin Panel**: `app/Filament/Pages/ManageSettings.php` (adds Repeater field for topbar announcements).
- **Frontend Views**: `resources/views/partials/header.blade.php`, `resources/views/partials/header-hero.blade.php`, `resources/views/partials/footer.blade.php`.
- **Database/Settings**: New JSON setting key `topbar_announcements` stored in the `settings` table.
