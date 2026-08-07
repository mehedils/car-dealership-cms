## Context

Managing slugs manually across resource forms is error-prone. Filament v3 provides reactive field updates using `.live(onBlur: true)` and `.afterStateUpdated()`.

## Goals / Non-Goals

**Goals:**
- Automatically compute and set the slug when the user leaves the title or name field (`onBlur: true`).
- Ensure the slug field remains fully editable.

**Non-Goals:**
- Automatic slug uniqueness checking (database unique constraint is sufficient).

## Decisions

- **Filament Reactive State:** We will use `->live(onBlur: true)` on the `name`/`title` component and call `$set('slug', Str::slug($state))` in `afterStateUpdated`. Using `onBlur: true` is preferred over real-time keystroke reactivity to avoid jarring typing feedback for the user while maintaining performance.

## Risks / Trade-offs

- **[Overwriting Custom Slugs]** → If an admin edits the name after customizing the slug, it will re-slugify. Mitigation: Standard behavior expected in Filament; `onBlur` minimizes unexpected overrides.
