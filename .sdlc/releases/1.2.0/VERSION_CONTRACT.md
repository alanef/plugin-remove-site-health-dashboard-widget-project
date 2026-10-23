# Version Contract: 1.2.0

**Date:** 2026-10-23

## Canonical Source
Plugin header `Version:` in remove-site-heath-from-dashboard/remove-site-heath-from-dashboard.php, and
`Stable tag:` in readme.txt. Written and read back by `scripts/release/bump-version.sh`. CI fails when they disagree.

## Expected State After Deploy
- master has every version location at `1.2.0` and `= 1.2.0 =` at the top of changelog.txt
- Git tag `1.2.0` (this repo's tag style, no `v`) is on master's HEAD. release.yml builds the zip and deploys to wp.org SVN (`Type: free`)
- After the wp.org release confirmation, wordpress.org/plugins/remove-site-health-from-dashboard reports 1.2.0
- The zip bundles alanef/free_plugin_lib 1.3.3 and uninstall.php

## Required Deploy Command
```
/tk-deploy live
```
Note: the repo has both `1.1.2` (38d0e83, the real release) and a stray `v1.1.2` (48d8d7b, older). deploy-live's
PREV can pick either. The real range is `1.1.2..HEAD`.

## Post-Deploy Verification
See `.claude/commands/deploy-live.md`: SVN tag check, wp.org release confirmation, YouTrack.
