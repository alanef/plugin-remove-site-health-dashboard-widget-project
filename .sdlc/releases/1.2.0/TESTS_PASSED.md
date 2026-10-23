# Tests Passed: 1.2.0

**Date:** 2026-10-23T08:04:43Z
**Commit:** c5a5ebcb6927a843dd68668b82f58400bf4ac47f
**Tracked changes at run time:** 0

| Gate | Result |
|---|---|
| composer install | pass |
| composer validate --strict | pass |
| composer run check | pass |
| version consistency | pass |
| build (composer run build) | pass |
| Plugin Check | not run locally (no plugin-check script); CI runs it on the built zip |
| PHPUnit (npm test) | pass |

PHPUnit summaries:

    OK (3 tests, 6 assertions)

Full output: tests.log (not committed).
