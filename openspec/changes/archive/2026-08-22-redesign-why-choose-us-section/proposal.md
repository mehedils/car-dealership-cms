## Why

The current "Why Choose Us" homepage section renders bare numbered circles with dummy Latin text on a blank white canvas, looking unstyled and unpolished. Redesigning this section into premium dealership trust cards with thematic automotive icons, hover animations, and realistic dealership value propositions elevates visual quality, credibility, and buyer confidence.

## What Changes

- **Visual Card Redesign (`resources/views/sections/why-us.blade.php`)**:
  - Transform plain numbered list items into modern, elevated dealership value cards (`background-card shadow-sm rounded-16 p-4 border text-center transition-all hover-lift`).
  - Introduce dynamic icon badges with soft brand-tinted backgrounds using Flaticon Uicons (`fi-rr-shield-check`, `fi-rr-badge-percent`, `fi-rr-car-alt`, `fi-rr-headset`, `fi-rr-award`, `fi-rr-handshake`).
  - Add smooth hover lift and border glow effects matching the dealership theme.
- **Realistic Dealership Seed Data (`DatabaseSeeder.php`)**:
  - Replace lorem ipsum dummy text with realistic dealership value propositions:
    1. **Certified Quality Inspection**: "Every vehicle undergoes a rigorous 150+ point inspection by certified mechanics."
    2. **Flexible Financing Options**: "Tailored auto loan and lease plans with competitive rates for every credit score."
    3. **Transparent Pricing & Trade-In**: "No hidden fees with instant, market-backed fair value for your current trade-in."
    4. **Comprehensive Warranty & Support**: "Enjoy peace of mind with dealership warranty coverage and 24/7 roadside assistance."
- **Admin Management (`WhyUsFeatureResource.php` / `ManageHomepageSettings.php`)**:
  - Ensure Filament admin allows managing feature titles, descriptions, and icon selection cleanly.

## Capabilities

### Modified Capabilities
- `frontend-homepage`: Updates "Why Choose Us" section specification to require structured dealership value cards with thematic icons and hover interactions instead of plain numbered placeholders.

## Impact

- `resources/views/sections/why-us.blade.php`: Modern card markup with icon badges and hover effects.
- `public/assets/css/custom.css`: Subtle hover-lift and theme-colored icon badge styles for `.card-why-dealership`.
- `database/seeders/DatabaseSeeder.php`: Updated default `WhyUsFeature` entries.
