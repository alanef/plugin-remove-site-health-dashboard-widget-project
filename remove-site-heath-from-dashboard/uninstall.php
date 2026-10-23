<?php
/**
 * Fired when the plugin is deleted.
 *
 * WordPress runs this file in preference to any registered uninstall hook. The plugin stores
 * no settings of its own; this removes the opt-in library's status option, which the library
 * no longer cleans up itself (since 1.3.0).
 *
 * @package remove-site-health-dashboard-widget
 */

// Exit if not called by WordPress during uninstall.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

\Fullworks_Free_Plugin_Lib\Main::plugin_uninstall( 'RSHFD-Free' );
