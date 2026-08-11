## Context

The default homepage hero background (`public/assets/imgs/hero/hero-1/banner.png`) has dimensions of `3838 × 1784 px` (~2.15:1 aspect ratio). Currently, Filament Admin (`Homepage Settings > Hero Section`) lacks a FileUpload input for the hero background.

## Goals / Non-Goals

**Goals:**
- Add `FileUpload::make('home_hero_bg_image')` in `ManageHomepageSettings.php` (Hero Section tab).
- Provide clear size guidance hints (`Optimal size: 3838×1784 px or 1920×892 px, ~2.15:1 Ratio`).
- Pass `--hero-bg-url` into `resources/views/sections/hero.blade.php` and update `public/assets/css/custom.css`.
- Retain fallback to `assets/imgs/hero/hero-1/banner.png` when unset.

**Non-Goals:**
- Image cropping or resizing engines on upload (out of scope).

## Decisions

1. **CSS Variable Override on `.bg-shape`**:
   - *Decision*: In `hero.blade.php`, render `<div class="bg-shape z-0" style="--hero-bg-url: url('{{ $heroBgUrl }}');"></div>` and in `custom.css` set `.block-banner-home1 .bg-shape::before { background-image: var(--hero-bg-url, url(../imgs/hero/hero-1/banner.png)) !important; }`.
   - *Rationale*: Allows clean CSS variable override without editing theme stylesheet `main.css`.

## Risks / Trade-offs

- None identified.
