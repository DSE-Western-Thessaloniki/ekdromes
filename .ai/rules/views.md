---
paths:
  - 'resources/views/**'
---

# Views

## Never put truncate/overflow-hidden on an element that contains an absolute dropdown
The navbar year menu (#school-year-menu in components/layouts/app.blade.php) was invisible although Alpine's x-show worked: the dropdown is absolutely positioned inside a `position: relative` span carrying Tailwind's `truncate` (= overflow: hidden), so it was clipped 100%. Keep `truncate` on an inner span wrapping only the icon+text, and leave the relative wrapper overflow-visible. When debugging 'dropdown won't show', measure with getComputedStyle + elementFromPoint before suspecting Alpine.
