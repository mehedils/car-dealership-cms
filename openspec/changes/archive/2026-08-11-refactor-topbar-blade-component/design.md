## Context

Currently, the topbar section in `resources/views/partials/header.blade.php` and `resources/views/partials/header-hero.blade.php` contains ~65 lines of duplicated Blade markup, settings decoding logic, SVG path definitions, and script tags. Refactoring this into a class-backed Blade component `App\View\Components\Topbar` encapsulates settings decoding logic, standardizes topbar layout, and provides clean component tag usage (`<x-topbar />`).

## Goals / Non-Goals

**Goals:**
- Create `App\View\Components\Topbar` component class to handle setting decoding (`topbar_announcements`, `contact_phone`, `contact_email`, `social_*`).
- Create `resources/views/components/topbar.blade.php` view encapsulating topbar markup, ticker script, and social link conditionals.
- Support optional component attributes/props such as `:transparent="true"` or `extraClass="bg-transparent"`.
- Replace duplicated topbar code in `header.blade.php` and `header-hero.blade.php` with `<x-topbar />`.

**Non-Goals:**
- Modifying backend settings administration panel or Filament schemas.
- Changing topbar CSS styling or visual appearance.

## Decisions

### Decision 1: Class-backed Blade Component vs Simple Partial
- **Choice:** Class-backed Blade Component (`App\View\Components\Topbar`).
- **Rationale:** Moving JSON decoding logic (`setting('topbar_announcements')`) into `Topbar::render()` or constructor keeps Blade views 100% template-driven and free of `@php` logic blocks.
- **Alternatives Considered:** Simple `@include('partials.topbar')` (rejected because it leaves `@php` decoding blocks inside the template).

### Decision 2: Transparent Prop Support
- **Choice:** Accept `$transparent = false` prop on `<x-topbar :transparent="true" />`.
- **Rationale:** `header-hero.blade.php` requires `top-bar-2 top-bar-3 bg-transparent` while `header.blade.php` requires standard `top-bar-2 top-bar-3`. A boolean prop handles this cleanly.

## Risks / Trade-offs

- **[Risk]** Component class caching or Livewire re-rendering compatibility.
  - **Mitigation:** Rely on standard Laravel Blade Component lifecycle; fetch fresh settings during `render()`.
