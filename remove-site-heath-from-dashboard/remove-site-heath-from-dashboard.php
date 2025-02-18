<?php
/**
 *
 * Plugin Name:       Remove Site Health From Dashboard
 * Plugin URI:        https://fullworks.net/products/remove-site-heath-from-dashboard/
 * Description:       Remove the Site Heath widget from the Dashboard
 * Version:           1.1.2
 * Author:            Fullworks
 * Requires at least: 5.3
 * Requires PHP: 5.6
 * Author URI:        https://fullworks.net
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 *
 *
 * THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.
 * EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM “AS IS” WITHOUT WARRANTY OF ANY KIND,
 * EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.
 * THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.
 * SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
 *
 * IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING WILL ANY COPYRIGHT HOLDER,
 * OR ANY OTHER PARTY WHO MODIFIES AND/OR CONVEYS THE PROGRAM AS PERMITTED ABOVE,
 * BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
 * OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED
 * INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS),
 * EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
 *
 * @package remove-site-health-dashboard-widget
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
new \Fullworks_Free_Plugin_Lib\Main( 'remove-site-heath-from-dashboard/remove-site-heath-from-dashboard.php',
	admin_url( 'options-general.php?page=remove-site-health-settings' ),
	'RSHFD-Free',
	'',
	'Remove Site Heath From Dashboard' );
add_action(
/**
 *   Remove Site Health from the Dashboard
 */
	'wp_dashboard_setup',
	function () {
		global $wp_meta_boxes;
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
	}
);


add_action(
	'admin_menu',
	function () {
		if ( defined( 'RSHFD_REMOVE_SITE_HEALTH_FROM_TOOLS' ) && RSHFD_REMOVE_SITE_HEALTH_FROM_TOOLS ) {
			remove_submenu_page( 'tools.php', 'site-health.php' );
		}
	}
);

// Add a menu item to the WordPress admin menu
add_action( 'admin_menu', function () {
	add_options_page(
		'Remove Site Health Settings', // Page title
		'Remove Site Health',          // Menu title
		'manage_options',              // Capability
		'remove-site-health-settings', // Menu slug
		'rshfd_settings_page'          // Callback function
	);
} );

function rshfd_settings_page() {
	?>
    <div class="wrap">
        <h1>Remove Site Health Settings</h1>
		<?php
		do_action( 'ffpl_ad_display' );
		?>
    </div>
	<?php
}
