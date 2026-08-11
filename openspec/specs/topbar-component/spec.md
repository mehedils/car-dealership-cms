## ADDED Requirements

### Requirement: Topbar Blade Component Rendering
The system SHALL provide a class-backed Blade component `<x-topbar />` (`App\View\Components\Topbar`) that encapsulates contact links, announcement ticker rendering, conditional social icons, and auto-rotation JavaScript.

#### Scenario: Rendering topbar component in page layout
- **WHEN** `<x-topbar />` is included in a Blade template
- **THEN** topbar contact info, announcement ticker, and social media links are rendered correctly

#### Scenario: Rendering transparent topbar variant
- **WHEN** `<x-topbar :transparent="true" />` is rendered in header hero view
- **THEN** the topbar includes the `bg-transparent` CSS class
