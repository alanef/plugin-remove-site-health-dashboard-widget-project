# Combined Verification Report: PLUGINS_SMALL-6 (RSHFD)

**Issue:** free_plugin_lib: setup notice can't be dismissed and never goes away (all free plugins)
**Date:** 2026-10-23
**Commit:** RSHFD 49582e4; free_plugin_lib v1.3.3 (4f34052)

| Review | Status |
|--------|--------|
| Commit Integrity | not-applicable (the issue claims no SHAs); change-set non-empty |
| Code Review | passed: the library was reviewed for SUE 1.7.10 (independent review, 1 critical fixed in 1.3.2). RSHFD's own diff: constraint, PHP minimum, uninstall.php |
| Acceptance Review | passed for RSHFD: see the table below |
| Browser-Test Gate | n-a: no layout change; notice HTML and requests checked over HTTP in wp-env |
| **Overall** | **APPROVED** |

## Library evidence (shared)
The full report is SUE's `.sdlc/PLUGINS_SMALL-6/verification.md` (alanef/stop-user-enumeration, eb7d425).
- 35 PHPUnit tests in free_plugin_lib v1.3.3.
- Each fix was mutation-checked.
- An independent review found the 1.3.1 redirect hijack, which was **specific to RSHFD's empty `$page`**. Fixed in 1.3.2 and reproduced over HTTP (1.3.1 returned 302 on the dashboard and heartbeat; 1.3.2 returns 200).

## RSHFD-specific checks (wp-env :8760, library loaded from RSHFD's own vendor, 1.3.3)
With `RSHFD-Free_form_rendered` = `rendering`:

| Check | Result |
|---|---|
| GET /wp-admin/ | 200, no redirect |
| POST admin-ajax heartbeat | 200, no redirect |
| GET RSHFD settings page | 200, no redirect (empty `$page`, by design) |
| Notice | `data-shortname="RSHFD-Free"`, links to `options-general.php?page=ffpl-opt-in-RSHFD-Free` |
| Dismiss AJAX | `{"success":true}`, `RSHFD-Free_notice_dismissed` = 1, notice gone on the next load |
| Skip | 302, status `optout` |

- `composer run check` is clean. PHPCompatibility 7.4 passes over the plugin plus `vendor/alanef/free_plugin_lib/src`.
- `npm test`: OK (3 tests).

## Acceptance (RSHFD)
| Item | Result |
|---|---|
| Dismiss persists | pass |
| Notice links to the opt-in screen, reworded | pass |
| Own shortname on multi-plugin sites | pass (library test; one plugin here) |
| No redirect hijack for empty page (1.3.1 regression) | pass |
| Existing stored choice honoured | pass (keys unchanged; library test) |
| Library option removed on delete (new uninstall.php) | pass: `wp plugin uninstall` removed `RSHFD-Free_form_rendered` |

## Commit Range Covered
| Repo | SHA | Subject |
|---|---|---|
| RSHFD | 49582e4 | Take free_plugin_lib 1.3.3, add uninstall, require PHP 7.4 (PLUGINS_SMALL-6, PLUGINS_SMALL-7) |
| free_plugin_lib | 84d3d1f..4f34052 | 1.3.1, 1.3.2, 1.3.3 |

No out-of-range commits.

---
Verified by: AI Assistant
Date: 2026-10-23
