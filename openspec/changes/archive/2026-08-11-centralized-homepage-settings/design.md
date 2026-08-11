## Context

Currently, the Carento single-dealer website has 11 modular homepage Blade partials (`resources/views/sections/*.blade.php`). While database key-value storage exists (`Setting` model and `setting($key, $default)` helper), homepage headings, promo copy, bullets, video links, and section toggles are hardcoded. Administrators lack a centralized Filament page to customize homepage content or show/hide specific sections.

## Goals / Non-Goals

**Goals:**
- Create a dedicated `Website Content` navigation group in Filament Admin.
- Build `ManageHomepageSettings` page (`app/Filament/Pages/ManageHomepageSettings.php`) with 9 organized tabs covering section visibility, copy, bullets, and media uploads.
- Store setting key-value pairs in the existing `settings` table without modifying database schema.
- Update `resources/views/home.blade.php` to conditionally render sections based on `setting('home_show_*', true)`.
- Update 10 homepage section Blade partials to use `setting('home_*', 'Default Copy')` so unconfigured settings automatically fall back to original template copy.

**Non-Goals:**
- Creating complex multi-layout page builders or drag-and-drop section reordering engines (out of scope).
- Modifying general site settings (Logos, Colors, Topbar) which remain in `Site Settings`.

## Decisions

1. **Dedicated Navigation Group vs Tab in Site Settings**:
   - *Decision*: Create `Website Content > Homepage Settings`.
   - *Rationale*: Editorial content management (copy, promo banners, section visibility) is logically distinct from core branding/theme settings. It provides room for future page content pages (`Header & Nav`, `Footer`, `About Page`).
   - *Alternative Considered*: Adding another tab into `ManageSettings.php`. Rejected because it would clutter `Site Settings` with dozens of additional form controls.

2. **Database Key-Value Model**:
   - *Decision*: Use existing `Setting::updateOrCreate(['key' => $key], ['value' => $value])`.
   - *Rationale*: Reuses the existing lightweight `settings` model and helper functions seamlessly.

3. **Fallback Default Guarantee**:
   - *Decision*: Pass exact original template copy as the second argument to `setting('key', 'Default Copy')`.
   - *Rationale*: If database values are missing or unset, Blade views immediately render original template copy with zero layout breakage or empty spaces.

## Risks / Trade-offs

- **[Risk] Media File Storage Paths**: Filament FileUpload stores images in `storage/app/public/settings`.
  - *Mitigation*: Ensure `asset('storage/' . $path)` fallback handling is included in Blade partials when custom images are uploaded, while retaining default public asset paths (`assets/imgs/...`).
- **[Risk] Missing Default Fallback**: Empty text inputs submitting `null`.
  - *Mitigation*: In Filament form schema, set sensible defaults or use `setting('key', 'Default Copy') ?: 'Default Copy'` in Blade so empty strings fall back gracefully.
