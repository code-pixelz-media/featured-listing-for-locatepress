<?php

/**
 * Fired during plugin activation
 *
 * @link       http://wplocatepress.com/
 * @since      1.0.0
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/includes
 * @author     Codepixelzmedia <anil@codepixelzmedia.com.np>
 */
class Featured_Listing_For_Locatepress_Activator {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		add_option( 'Activated_Plugin', 'featured-listing-for-locatepress' );
		add_action( 'init', array( 'Featured_Listing_For_Locatepress_Activator', 'load_featured_listing_for_locatepress' ) );

	}


	public static function load_featured_listing_for_locatepress() {
		if ( ! in_array( 'locatepress/locatepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

					add_action( 'admin_notices', array( 'Featured_Listing_For_Locatepress_Activator', 'featured_listing_for_locatepress_notices' ) );

					//Deactivate our plugin
					deactivate_plugins( plugin_basename( __FILE__ ) );

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		}
	}


	public function featured_listing_for_locatepress_notices() {
		ob_start(); ?>
				<div class="error">
					<p><strong>Error</strong></p>
				</div>
		<?php
		echo ob_get_clean();
	}


	// public function features_listing_for_locatepress_meta(){

	// 	if($this->locatepress_is_activated()){

	// 	}
	// }

}
