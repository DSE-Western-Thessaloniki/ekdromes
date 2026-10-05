---
paths:
  - 'tests/**'
---

# Tests

## Feature tests on excursion routes need both CAS middlewares off
Route tests must call `$this->withoutMiddleware([CASAuth::class, EnsureCasAccountHasAccess::class])` — disabling only CASAuth leaves EnsureCasAccountHasAccess calling uninitialized phpCAS, which exits and aborts the whole suite ("Premature end of PHP process"). `withoutMiddleware()` with no argument kills the `web` group too, so session data never arrives. Always `withSession(['school' => $school])`: `SchoolService::getActiveSchool()` throws (does not return null) without it. Excursion type keys are the Greek display titles (`'Σχολικός Περίπατος'`), never aliases like `peripatos`.
