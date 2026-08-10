## Context

`public/assets/css/main.css` defines background icons for form inputs (`username.svg`, `email.svg`, `phone.svg`, `pass.svg`), custom checkboxes (`check.svg`, `checked.svg`), card rating badges (`star.svg`, `lightning.svg`), and spec labels (`location.svg`, `mile.svg`, `automatic.svg`, `fuel.svg`, `seat.svg`, `duration.svg`, `clock.svg`). Because standard `background-image: url(...)` with `.svg` files uses fixed stroke/fill colors, brand color changes do not cascade into CSS background icons.

## Goals / Non-Goals

**Goals:**
- Replace static SVG `background-image` rules in `main.css` with UIcons font classes or CSS `mask-image` rules that fill with `var(--bs-primary)`, `currentColor`, or `var(--bs-button-text)`.
- Replace legacy static background icon tags in Blade templates with native UIcons `<i class="fi fi-rr-*"></i>` elements.

**Non-Goals:**
- Multi-color brand logo illustrations (e.g. `logo-d.svg`, `logo-w.svg`) remain as SVG image assets.

## Decisions

- **Decision 1**: Convert checkbox `input:checked ~ .checkmark` to use `font-family: 'uicons-regular-rounded'` pseudo-element `::after` with content `"\f143"` (UIcons check glyph) styled using `var(--bs-button-text)`.
- **Decision 2**: Use CSS `mask-image` for background icon badges and form fields (e.g. `.username-icon`, `.email-icon`, `.pass-icon`, `.phone-icon`) with `background-color: var(--bs-neutral-500)` or `var(--bs-primary)`.
- **Decision 3**: Convert remaining Blade view background image containers to UIcons `<i>` font tags.

## Risks / Trade-offs

- [Risk] Browser support for CSS `mask-image`: Standard vendor prefixes `-webkit-mask-image` and `mask-image` are fully supported by all modern browsers (Chrome, Firefox, Safari, Edge).
