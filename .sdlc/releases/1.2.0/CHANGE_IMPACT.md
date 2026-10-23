# Change Impact Assessment: 1.2.0

## Risk Level: Low

### Factors Considered
- Number of issues: 3 (one tooling-only)
- Security-sensitive changes: 0 new surfaces. The library's AJAX handlers keep their checks; skip gains a capability check.
- API changes: no
- Database changes: no new keys. uninstall.php deletes `RSHFD-Free_form_rendered` on plugin deletion.
- Breaking changes: PHP minimum 5.6 -> 7.4

## Affected Areas
### Code Areas
- Bundled `alanef/free_plugin_lib` 1.0.1 -> 1.3.3: opt-in notice, dismiss, opt-in submission
- New `uninstall.php`
- Plugin header `Requires PHP: 7.4`
- The plugin's own dashboard/tools behaviour is unchanged

### Configuration
None.

### Dependencies
alanef/free_plugin_lib ^1.3.3 (excludes the bad 1.3.1, which redirected every admin request for this plugin).

## Behaviour users will notice
- The notice can be closed for good, and its link goes to the opt-in screen.
- Choosing "Allow & Continue" now subscribes.
- The library class is shared by every Fullworks free plugin on a site, and the copy that loads first wins.
  RSHFD sorts before SSFGM, SUE and SWEGTS, but after CSCF, FSS, LHF and MMT, so on sites with an older
  copy of one of those, the older behaviour persists until they update too.

## Rollback Plan
### Immediate Rollback
Release 1.1.2's tree as 1.2.1 (wp.org rollbacks ship as a new version).
### Database Rollback
N/A
### Configuration Rollback
N/A

## Monitoring
- wp.org support forum for RSHFD
- Opt-in subscriptions for product `rshfd` on the campaign server (should now be non-zero)
