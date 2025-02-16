=== Remove Site Health From Dashboard ===
Contributors: Fullworks
Donate link: https://ko-fi.com/wpalan
Tags:  dashboard widget, site health, sitehealth
Tested up to: 6.7
Stable tag: 1.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Removes the Site Health from the Dashboard introduced in WP 5.4

== Description ==

If you manage multiple WordPress sites, you may find you get lots of calls about site health as this has been put right in front of your site owners eyes.
This is a good thing if it is your own site but no so good if you are getting calls from non technical clients.

So this plugin removes it.  Simple and as lightweight as any code snippet can be.

Additionally if you want to hide the Site Health from the tools menu, you can set

RSHFD_REMOVE_SITE_HEALTH_FROM_TOOLS  in wp-config.php to true

```
define('RSHFD_REMOVE_SITE_HEALTH_FROM_TOOLS', true);
```

== Installation ==

Install like any plugin

== Frequently Asked Questions ==

= Are there any options? =

No! It is light weight.  But you can set a constant in wp-config.php to remove the Site Health from the Tools menu.
```
define('RSHFD_REMOVE_SITE_HEALTH_FROM_TOOLS', true);
```


== Changelog ==
= 1.1 =
* Add opt in

= 1.0 =
* The first release



