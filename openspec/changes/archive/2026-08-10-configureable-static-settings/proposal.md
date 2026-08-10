## Why

The current Filament SettingResource allows administrators to freely create, edit, or delete arbitrary setting key strings, creating risks of broken templates, misspelled setting keys, or accidental deletion of critical configuration.

This change introduces a robust static key-value settings system where all setting keys are fixed in code/registry and seeded into the database, allowing administrators to configure values (including text, URLs, numbers, and visual color pickers) without altering the setting key structure.

## What Changes

- **Static Key Registry**: Predefine all setting keys (`site_name`, `site_slogan`, `contact_email`, `contact_phone`, `contact_address`, `google_map_embed`, `social_facebook`, `social_twitter`, `social_instagram`, `social_behance`, `primary_color`, `secondary_color`, `accent_color`, `button_text_color`, `footer_copyright`) with default fallbacks.
- **Filament Admin Settings Dashboard**: Convert SettingResource into a tabbed settings dashboard (`General`, `Contact Info`, `Social Media`, `Theme Colors`, `Footer`).
- **Value-Only Editing Constraints**: Disable key creation (`canCreate: false`), key deletion (`canDelete: false`), and key renaming. Admins can only edit values.
- **ColorPicker Integration**: Use Filament `ColorPicker` for `primary_color`, `secondary_color`, and `accent_color` keys.
- **Dynamic CSS Injection**: Inject custom CSS `:root` color variables dynamically into the `<head>` of `layouts/app.blade.php`.
- **Blade Template Binding**: Bind settings values to `header.blade.php`, `footer.blade.php`, and `contact.blade.php`.

## Capabilities

### New Capabilities
- `static-settings-management`: Predefined fixed key settings management system with dynamic CSS color injection and Blade template binding.

### Modified Capabilities
<!-- None -->

## Impact

- **Database**: Populates initial fixed setting keys in `settings` table via seeder/service.
- **Admin (Filament)**: Replaces generic setting CRUD with locked-down tabbed settings dashboard.
- **Frontend Views**: Updates layout header (`layouts/app.blade.php`), navbar (`header.blade.php`), footer (`footer.blade.php`), and contact view (`contact.blade.php`) to retrieve values via dynamic setting helpers.
