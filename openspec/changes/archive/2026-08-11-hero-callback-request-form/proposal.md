## Why

For car dealerships, converting home page hero visitors into direct sales leads (via callback and test drive requests) yields significantly higher conversion rates than standard inventory search dropdowns. Converting the hero search section into a horizontal callback request / test drive form with a searchable vehicle selector makes lead capturing fast, accessible, and intuitive.

## What Changes

- Replace the generic inventory filter bar in `resources/views/sections/search.blade.php` with a horizontal Callback / Test Drive Request Form.
- Implement a searchable dropdown for vehicle selection allowing users to type and filter car models in real time.
- Connect the form directly to `InquiryController` (`POST /inquiries`) to store leads in the `inquiries` table with AJAX/session feedback.

## Capabilities

### New Capabilities
<!-- None needed as new standalone capabilities -->

### Modified Capabilities
- `frontend-homepage`: Update the hero search section requirement to specify a horizontal lead inquiry / test drive form with searchable vehicle dropdown instead of a generic search filter form.

## Impact

- `resources/views/sections/search.blade.php`: Transformed into a horizontal request callback / test drive lead form.
- `resources/views/home.blade.php`: Displays updated hero search/inquiry section.
- `app/Http/Controllers/HomeController.php`: Pass available cars list to `sections.search` view.
- `app/Http/Controllers/InquiryController.php`: Handles lead submissions from the hero section.
