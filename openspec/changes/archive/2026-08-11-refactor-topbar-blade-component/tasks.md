## 1. Create Topbar Blade Component

- [x] 1.1 Create component class `App\View\Components\Topbar` handling settings decoding (`topbar_announcements`, contact phone/email, and social links).
- [x] 1.2 Create view `resources/views/components/topbar.blade.php` with topbar HTML, equal 3-column flex layout, and ticker rotation script.

## 2. Refactor Views & Verify

- [x] 2.1 Replace topbar HTML block in `resources/views/partials/header.blade.php` with `<x-topbar />`.
- [x] 2.2 Replace topbar HTML block in `resources/views/partials/header-hero.blade.php` with `<x-topbar :transparent="true" />`.
- [x] 2.3 Verify Blade syntax and check component rendering across desktop and mobile screen sizes.
