## Context

The current Carento application features a static slogan in the header topbar (`header.blade.php` and `header-hero.blade.php`). Social icons in the header and footer (`footer.blade.php`) are rendered even when the links are set to `#` or empty in the backend.

Showroom administrators need the ability to add multiple announcement items (discounts, perks, promotional messages with custom CTAs) directly from the Filament admin settings page. Furthermore, unused social media accounts should be automatically hidden on the site frontend.

## Goals / Non-Goals

**Goals:**
- Add a Repeater schema to `ManageSettings.php` in Filament for managing dynamic topbar announcements.
- Render dynamic topbar announcement items on `header.blade.php` and `header-hero.blade.php` with a lightweight, accessible text carousel/fade animation.
- Update social icon rendering logic in `header.blade.php`, `header-hero.blade.php`, and `footer.blade.php` to conditionally display icons only when a valid, non-placeholder URL is specified.

**Non-Goals:**
- Creating a separate database table for announcements (using setting key `topbar_announcements` serialized JSON).
- Modifying social icon configuration schemas in Filament (reusing existing social fields).

## Decisions

### Decision 1: Use Filament Repeater for Announcement Storage
- **Choice:** Add `Forms\Components\Repeater::make('topbar_announcements')` inside `ManageSettings.php` to store announcement items (text, button_text, button_url) as JSON in the existing settings store.
- **Rationale:** Keeps configuration centralized inside existing site settings without adding new database migrations.

### Decision 2: Lightweight Ticker/Carousel for Blade
- **Choice:** Use inline CSS/JS transition or simple Swiper/Bootstrap cycle in Blade for topbar message rotation.
- **Rationale:** No external heavy JavaScript libraries needed; fallback to single item or default slogan when array is empty or has 1 item.

### Decision 3: Blade `@if` Check for Social Icons
- **Choice:** Evaluate `@if(setting('social_x') && setting('social_x') !== '#')` for each social platform (`social_facebook`, `social_twitter`, `social_instagram`, `social_behance`).
- **Rationale:** Ensures clean UI output without modifying existing Filament setting keys.

## Risks / Trade-offs

- **[Risk]** Invalid JSON string in `topbar_announcements` setting.
  - *Mitigation*: Safely decode setting value using `json_decode()` or array cast with fallback to empty array.
