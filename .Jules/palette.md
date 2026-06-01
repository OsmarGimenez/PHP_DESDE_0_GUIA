## 2026-06-01 - Enhanced Pagination Accessibility
**Learning:** Pagination components often lack clear labeling for screen readers and need explicitly defined `aria-label` attributes for context, especially in repetitive navigation elements across modules.
**Action:** Always add semantic `aria-label` properties to `<nav>` elements acting as pagination and ensure disabled states use `aria-hidden='true'` to avoid cluttering screen reader announcements. Additionally, explicit `:focus-visible` rings should be provided since standard hover effects don't apply to keyboard users.
