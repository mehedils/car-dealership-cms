## 1. Admin Panel Settings

- [x] 1.1 Add Topbar Announcements Repeater tab/schema in `app/Filament/Pages/ManageSettings.php` with text, button_text, and button_url fields.
- [x] 1.2 Verify setting saving and retrieval logic in `ManageSettings.php`.

## 2. Frontend Topbar Announcements Display

- [x] 2.1 Update `resources/views/partials/header.blade.php` to render dynamic announcement ticker from setting with fallback to `site_slogan`.
- [x] 2.2 Update `resources/views/partials/header-hero.blade.php` to render dynamic announcement ticker from setting with fallback to `site_slogan`.
- [x] 2.3 Implement smooth CSS/JS rotation for multiple announcement items in header topbar.

## 3. Conditional Social Links Filtering

- [x] 3.1 Update `resources/views/partials/header.blade.php` to conditionally render social icons only when URL is present and not `#`.
- [x] 3.2 Update `resources/views/partials/header-hero.blade.php` to conditionally render social icons only when URL is present and not `#`.
- [x] 3.3 Update `resources/views/partials/footer.blade.php` to conditionally render social icons only when URL is present and not `#`.

## 4. Verification & Testing

- [x] 4.1 Test adding/updating topbar announcements in Filament Admin Panel.
- [x] 4.2 Test topbar display with 0, 1, and multiple announcements.
- [x] 4.3 Test hiding/showing social icons by toggling social link settings in admin panel.
