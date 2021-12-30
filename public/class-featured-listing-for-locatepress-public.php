<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wplocatepress.com/
 * @since      1.0.0
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Featured_Listing_For_Locatepress
 * @subpackage Featured_Listing_For_Locatepress/public
 * @author     Codepixelzmedia <anil@codepixelzmedia.com.np>
 */
class Featured_Listing_For_Locatepress_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/featured-listing-for-locatepress-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/featured-listing-for-locatepress-public.js', array( 'jquery' ), $this->version, false );

	}


	public function featured_listing_for_locatepress_order( $query ) {

		// $query['meta_query'] = array(
				
		// 	    array(
		// 	        'key'     => 'featured-listing-checkbox',
		// 	        'value'   => array('1','0'),
		// 	        'compare' => 'IN'
		// 	    ),

		// );
		// echo '<pre>';
		// print_r($query);
		// die;
		$query['meta_key'] = 'featured-listing-checkbox';
		$query['orderby']  = 'meta_value_num';
		$query['order']    = 'DESC';

		return $query;
	}


}
