## Why

Currently, the Filament admin panel and its login screen use static fallback styling (such as hardcoded `Color::Amber` and default Filament branding text), whereas the frontend website dynamically adapts to theme brand colors (`primary_color`) and branding assets (`site_logo_dark`, `site_logo_light`, `site_favicon`) managed via Site Settings. Unifying the admin panel styling with the theme's configured primary color and brand logos creates a consistent, cohesive brand experience across the customer-facing frontend, the authentication screen, and the administrative dashboard.

## What Changes

- **Dynamic Admin Theme Color**: Connect the Filament Admin Panel Provider to dynamic hex shade generation using the theme's `primary_color` setting (with `#70f46d` default fallback), updating buttons, badges, navigation active states, and focus rings.
- **Admin Panel Brand Logo**: Configure Filament's sidebar to display the theme's dark/light mode logo (`site_logo_dark` and `site_logo_light`) and favicon with appropriate height scaling.
- **Login Screen Brand Logo**: Automatically display the brand logo and theme-colored action buttons on the Filament login screen.
- **Safe Fallbacks & Type Sanitization**: Ensure robust hex validation and fallback mechanisms when database settings are unseeded or when commands are executed in CLI/maintenance modes.

## Capabilities

### New Capabilities
- `admin-theme-branding`: Synchronizes Filament admin panel and login screen with dynamic site settings for primary color, light/dark logos, site name, and favicon.

### Modified Capabilities
<!-- None -->

## Impact

- **Affected Code**: `app/Providers/Filament/AdminPanelProvider.php`
- **Dependencies / Systems**: `App\Models\Setting`, `app/helpers.php` (`setting()`), `Filament\Support\Colors\Color`
- **User Interface**: Filament Admin Dashboard, Filament Admin Login Page, and responsive sidebar navigation.
