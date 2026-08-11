## Why

Currently, the topbar section (contact info, dynamic announcement ticker, social media links, and auto-rotation JavaScript) is 100% duplicated across `resources/views/partials/header.blade.php` and `resources/views/partials/header-hero.blade.php`. Refactoring the topbar into a dedicated Laravel Blade Component (`<x-topbar />` / `App\View\Components\Topbar`) will eliminate duplicate code, encapsulate settings decoding logic in PHP, and provide a clean single source of truth.

## What Changes

- Create a Blade Component class `App\View\Components\Topbar` that automatically fetches and decodes the `topbar_announcements` setting.
- Create a Blade view `resources/views/components/topbar.blade.php` to encapsulate topbar HTML, styles, and auto-rotation script.
- Replace duplicate topbar blocks in `resources/views/partials/header.blade.php` and `resources/views/partials/header-hero.blade.php` with `<x-topbar />`.
- Support optional background styling via component props (e.g. `<x-topbar :transparent="true" />`).

## Capabilities

### New Capabilities
- `topbar-component`: Encapsulate topbar rendering, contact links, announcement ticker, and social media icon visibility into a reusable Blade component.

### Modified Capabilities
- `topbar-announcements`: Update layout invocation to use the Blade component architecture.

## Impact

- `app/View/Components/Topbar.php` [NEW]
- `resources/views/components/topbar.blade.php` [NEW]
- `resources/views/partials/header.blade.php` [MODIFY]
- `resources/views/partials/header-hero.blade.php` [MODIFY]
