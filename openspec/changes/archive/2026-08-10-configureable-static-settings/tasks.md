## 1. Helper & Database Seeder Setup

- [x] 1.1 Create global `setting($key, $default)` helper in `app/helpers.php` (or AppServiceProvider)
- [x] 1.2 Update `DatabaseSeeder.php` to seed all static setting keys (General, Contact, Socials, Colors, Footer) with defaults

## 2. Filament Admin Settings Interface

- [x] 2.1 Restructure Filament `SettingResource` (or create `ManageSettings` Filament Page) into a tabbed interface
- [x] 2.2 Disable key creation (`canCreate: false`), key deletion (`canDelete: false`), and make `key` field read-only
- [x] 2.3 Add `ColorPicker` form fields for theme color keys (`primary_color`, `secondary_color`, `accent_color`, `button_text_color`)

## 3. Dynamic CSS & Blade Template Binding

- [x] 3.1 Inject dynamic `:root` CSS variables in `<head>` of `resources/views/layouts/app.blade.php`
- [x] 3.2 Update `header.blade.php` to retrieve dynamic phone, email, and slogan settings
- [x] 3.3 Update `footer.blade.php` to retrieve dynamic address, social links, and copyright settings
- [x] 3.4 Update `contact.blade.php` to retrieve dynamic contact email, phone, address, and Google Map iframe settings

## 4. Verification

- [x] 4.1 Verify Filament settings page prevents key creation/deletion and allows value editing with ColorPickers
- [x] 4.2 Verify changing theme colors and site contact info instantly updates frontend rendering across Blade templates
