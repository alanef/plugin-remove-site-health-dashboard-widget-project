# Remove Site Health From Dashboard

<!-- tooling:start (managed by wordpress-plugin-boilerplate/tooling - do not edit by hand) -->
## Development

This repository uses the standard Fullworks free-plugin tooling, documented in
[wordpress-plugin-boilerplate](https://github.com/alanef/wordpress-plugin-boilerplate/blob/main/CLAUDE.md).

[![Plugin Check](https://github.com/alanef/plugin-remove-site-health-dashboard-widget-project/actions/workflows/checks.yml/badge.svg)](https://github.com/alanef/plugin-remove-site-health-dashboard-widget-project/actions/workflows/checks.yml)

```
plugin-remove-site-health-dashboard-widget-project/                     # repository root: development tooling
├── .github/workflows/             # checks.yml on push/PR, release.yml on tag
├── tests/                         # PHPUnit suite, run inside wp-env
├── .wp-env.json                   # dev :8760, tests :8761
├── composer.json                  # dev dependencies and quality scripts
├── package.json                   # wp-env and test scripts
├── phpunit.xml.dist / run-tests.sh
└── remove-site-heath-from-dashboard/                # the plugin (shipped as-is via .distignore)
```

```bash
composer install && npm install        # dev tools
npm run start                          # http://localhost:8760  (admin / password)
composer run check                     # PHPCompatibility + security sniffs
npm test                               # PHPUnit in the wp-env tests container
composer run build                     # zipped/remove-site-heath-from-dashboard-free.zip
```

Releases: set the version in the plugin header and `readme.txt`, update `CHANGELOG.md`,
tag `vX.Y.Z` and push. CI builds the zip, creates the GitHub release and deploys to
WordPress.org.
<!-- tooling:end -->
