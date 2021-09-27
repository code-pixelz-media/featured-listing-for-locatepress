<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wplocatepress.com/
 * @since             1.0.0
 * @package           Featured_Listing_For_Locatepress
 *
 * @wordpress-plugin
 * Plugin Name:       Featured Listing For Locatepress
 * Plugin URI:        http://wplocatepress.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Codepixelzmedia
 * Author URI:        http://wplocatepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       featured-listing-for-locatepress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FEATURED_LISTING_FOR_LOCATEPRESS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-featured-listing-for-locatepress-activator.php
 */
function activate_featured_listing_for_locatepress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-featured-listing-for-locatepress-activator.php';
	Featured_Listing_For_Locatepress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-featured-listing-for-locatepress-deactivator.php
 */
function deactivate_featured_listing_for_locatepress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-featured-listing-for-locatepress-deactivator.php';
	Featured_Listing_For_Locatepress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_featured_listing_for_locatepress' );
register_deactivation_hook( __FILE__, 'deactivate_featured_listing_for_locatepress' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-featured-listing-for-locatepress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_featured_listing_for_locatepress() {

	$plugin = new Featured_Listing_For_Locatepress();
	$plugin->run();

}
run_featured_listing_for_locatepress();



function check_locatepress_plugin(){
    if(!in_array('locatepress/locatepress.php', apply_filters('active_plugins', get_option('active_plugins')))){ 

        add_action('admin_notices', 'featured_listing_for_locatepress_deactivate_notice');
        //Deactivate our plugin
        deactivate_plugins(plugin_basename(__FILE__));

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
    
}

add_action('admin_init', 'check_locatepress_plugin');

/**
 * Display an error message when parent plugin is missing
 */
function featured_listing_for_locatepress_deactivate_notice(){
    ob_start(); ?>
        <div class="error">
            <p><strong><?php _e('Locatepress Plugin Is Required','featured-listing-for-locatepress'); ?></strong></p>
        </div>
        <?php
    echo ob_get_clean();
}