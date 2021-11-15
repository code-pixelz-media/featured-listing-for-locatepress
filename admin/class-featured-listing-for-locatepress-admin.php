<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wplocatepress.com/
 * @since      1.0.0
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/admin
 * @author     Codepixelzmedia <anil@codepixelzmedia.com.np>
 */
class Featured_Listing_For_Locatepress_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */


	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Featured_Listing_For_Locatepress_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Featured_Listing_For_Locatepress_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/featured-listing-for-locatepress-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Featured_Listing_For_Locatepress_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Featured_Listing_For_Locatepress_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/featured-listing-for-locatepress-admin.js', array( 'jquery' ), $this->version, false );

	}




	public function locatepress_is_activated() {
		if ( is_plugin_active( 'locatepress/locatepress.php' ) ) {

			return true;
		} else {

			return false;
		}
	}

	public function features_listing_for_locatepress_meta() {

		if ( $this->locatepress_is_activated() ) {

		}
	}

	/**
	 * Add new columns to the post table
	 *
	 * @param Array $columns - Current columns on the list post
	 */
	public function featured_listing_for_locatepress_cols( $columns ) {
		$columns['featured-listing'] = __( 'Featured', 'featured-listing-for-locatepress' );
		return $columns;
	}


	public function featured_listing_for_locatepress_cols_data( $column, $post_id ) {

		switch ( $column ) {
			case 'featured-listing':
				$col_meta = get_post_meta( $post_id, 'featured-listing-checkbox', true );
				if ( '1' == esc_html( $col_meta ) ) :
					echo '<i class="fas fa-check"></i>';
				else :
					echo '<i class="fas fa-times"></i>';
				endif;
				break;

		}
	}

	public function featured_listing_for_locatepress_notices() {
		ob_start(); ?>
			<div class="error">
				<p><strong><?php _e( 'Error', 'featured-listing-for-locatepress' ); ?></strong></p>
			</div>
		<?php
		echo ob_get_clean();
	}
}
