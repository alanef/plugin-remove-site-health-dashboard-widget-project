# Combined Verification Report: PLUGINS_SMALL-7 (RSHFD)

**Issue:** free_plugin_lib: "Allow & Continue" subscribes nobody in SSFGM, MMT, LHF and RSHFD (plugin_map gap)
**Date:** 2026-10-23
**Commit:** RSHFD 49582e4; free_plugin_lib 0885daf (fix) / 4f34052 (v1.3.3)

| Review | Status |
|--------|--------|
| Commit Integrity | not-applicable (no SHAs claimed in the description); 0885daf resolves on library main |
| Code Review | passed: a `-Free` shortname falls back to the map key without the suffix; skip now also requires manage_options |
| Acceptance Review | passed |
| Browser-Test Gate | not-applicable |
| **Overall** | **APPROVED** |

## Evidence
- **Library tests:** 4 data sets (SSFGM-Free, MMT-Free, LHF-Free, RSHFD-Free) assert the plugin_id sent. They fail on 1.3.2 and pass on 1.3.3.
- **Library controls:** an exact key (CSCF) and unknown names (with and without -Free) behave the same before and after the fix.
- **In RSHFD's wp-env:** the real `wp_ajax_ffpl_handle_optin` handler ran as admin, with `pre_http_request` short-circuiting every request (nothing reached the real webhook).
  - Response `{"success":true,…}`
  - Captured `plugin_id` = `rshfd`
  - Status `optin`
- **Decision (Alan, 2026-10-23):** no re-prompt. Users already stored as `optout` stay so. They can opt in from the "Opt In" plugin action link.

## Commit Range Covered
RSHFD 49582e4 (constraint ^1.3.3). Library 0885daf, 4f34052. No out-of-range commits.

---
Verified by: AI Assistant
Date: 2026-10-23
