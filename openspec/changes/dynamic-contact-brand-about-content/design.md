## Context

Currently, `/contact`, `/about`, and the homepage Brands showcase have hardcoded content that prevents the client from fully personalizing their site. See `proposal.md` for motivation.

Existing models and schemas:
- `Location` model has `name` and `address`. The `/contact` route in `routes/web.php` returns `view('contact')` without passing `$locations`.
- `ManageHomepageSettings` manages homepage section toggles and titles across tabs (Hero, Featured, CTA, Categories, Why Choose Us, Latest Arrivals, Services, Blog), but currently lacks a tab for the Brands Showcase heading copy.
- `ManageSettings` manages global site branding, inventory page banner, topbar announcements, contact details, social links, theme colors, and footer copy, but currently lacks an About Page content tab.

## Goals / Non-Goals

**Goals:**
- Connect `Location` model to `/contact` route and render dynamic branch cards.
- Enhance `locations` table with optional `phone` and `email` columns (with fallbacks to global site contact info).
- Expose Brands showcase headings (`home_brands_title`, `home_brands_subtitle`, `home_brands_button_text`) in `ManageHomepageSettings`.
- Expose About Us page story and hero settings in `ManageSettings`.
- Ensure 100% backward compatibility: all existing views continue to render perfectly with default fallback values when settings are empty.

**Non-Goals:**
- Building a full drag-and-drop menu tree builder for the navbar (identified as Low Priority in audit).
- Modifying vehicle listing or filtering logic.

## Decisions

### 1. Extend `locations` table with optional `phone` and `email`
- **Choice**: Create a non-breaking migration adding nullable `phone` and `email` to `locations`, and add form inputs to `LocationResource`.
- **Rationale**: Dealership branches frequently have distinct telephone extensions or local sales email addresses. If left null, the view will fall back to `setting('contact_phone')` and `setting('contact_email')`.
- **Alternatives Considered**: Using only `address` and hardcoding global contact info on every card; rejected because multi-location dealerships need direct branch phone lines.

### 2. Contact Page Branch Iteration with Single Showroom Fallback
- **Choice**: In `resources/views/contact.blade.php`, loop over `$locations` if count > 0. If count == 0, render a single card using the global `site_name` and primary contact settings (`contact_address`, `contact_phone`, `contact_email`).
- **Rationale**: Guarantees the page always looks complete, even if a user hasn't set up location records yet, while immediately eliminating foreign placeholder cities (Tokyo, London, Paris).

### 3. Brands Showcase Headings in `ManageHomepageSettings`
- **Choice**: Add a dedicated **Brands Showcase** tab to `ManageHomepageSettings` containing `home_brands_title`, `home_brands_subtitle`, and `home_brands_button_text`.
- **Rationale**: Keeps all homepage copy settings centralized in the Home Editor where the admin already toggles section visibility.

### 4. About Us Page Settings in `ManageSettings`
- **Choice**: Add an **About Page** tab to `ManageSettings` for page hero and dealership story copy/images (`about_hero_title`, `about_hero_subtitle`, `about_hero_bg_image`, `about_story_badge`, `about_story_title`, `about_story_description`, `about_story_image`).
- **Rationale**: `ManageSettings` already hosts dedicated page tabs such as "Inventory Page". Grouping "About Page" here maintains consistency.

## Risks / Trade-offs

- **[Risk] Location records empty on existing databases** → **Mitigation**: Implemented an explicit fallback check: `@if(count($locations) > 0) ... @else <single primary showroom card> @endif`.
- **[Risk] Long story text breaking card alignment on `/about`** → **Mitigation**: Used responsive Bootstrap grid column widths (`col-lg-6`) and `nl2br(e(...))` to respect paragraphs cleanly.
