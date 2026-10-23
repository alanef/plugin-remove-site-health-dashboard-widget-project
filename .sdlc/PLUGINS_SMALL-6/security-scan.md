# Security Scan Report: PLUGINS_SMALL-6 (RSHFD)

**Date:** 2026-10-23
**Scanned by:** AI Assistant
**Files analyzed:** 4

## Commit Range Covered
rshfd `49582e4`, free_plugin_lib `84d3d1f..4f34052`. No out-of-range commits.

## Summary
Findings: 1 (1 info). **Recommendation:** PASS

## Findings
- **Info**, A05: Security Misconfiguration, `remove-site-heath-from-dashboard/uninstall.php`: New file. Guarded by WP_UNINSTALL_PLUGIN, so a direct request dies. It only deletes the library's own site option.

## Notes
RSHFD adds no request handling of its own. The library's AJAX handlers keep their capability and nonce checks. The 1.3.1 redirect hijack, which hit RSHFD's empty page, is fixed in 1.3.2+ and verified here over HTTP. The PHP minimum rises to 7.4, matching the library.

## Checklist Status
- [x] OWASP Top 10 reviewed
- [x] Secret exposure: none
- [x] Input validation: no new request input
- [x] Dependencies: shipped composer tree clean (DEPENDENCY_AUDIT.md)
- [x] Auth/authz: library capability and nonce checks unchanged; skip gains a capability check
- [x] Data protection: opt-in payload unchanged apart from the corrected plugin_id
