<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://wplocatepress.com/
 * @since      1.0.0
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/includes
 * @author     Codepixelzmedia <anil@codepixelzmedia.com.np>
 */
class Featured_Listing_For_Locatepress_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'featured-listing-for-locatepress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
