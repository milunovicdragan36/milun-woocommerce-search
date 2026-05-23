<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Admin') ) :
/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    MMSDD_Drmilun_Admin
 * @subpackage MMSDD_Drmilun_Admin/includes
 */

class MMSDD_Drmilun_Admin {

   public function __construct() {
    }

    public function enqueue_styles() {

	// In your plugin admin enqueue
    wp_enqueue_style('wp-color-picker');

	// Attempt the "normal" path first
$admin_css_path = plugin_dir_path(__FILE__) . 'admin/css/admin-css.css';
$ui_css_path    = plugin_dir_path(__FILE__) . 'admin/css/jquery-ui.css';

// Use plugins_url to generate URLs
$admin_css_url = file_exists($admin_css_path)
    ? plugins_url('admin/css/admin-css.css', __FILE__)
    : plugins_url('../admin/css/admin-css.css', __FILE__);

$ui_css_url = file_exists($ui_css_path)
    ? plugins_url('admin/css/jquery-ui.css', __FILE__)
    : plugins_url('../admin/css/jquery-ui.css', __FILE__);

// Enqueue styles
wp_enqueue_style('admin-css', $admin_css_url, array(), '1.0');
wp_enqueue_style('ui-css', $ui_css_url, array(), '1.0');

}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
     wp_register_script( 'no-jumping', plugin_dir_url( __FILE__ ) . '../admin/js/no-jumping.js', array( 'jquery' ),'1.0', true );
    wp_enqueue_script( 'no-jumping');
    /*
     wp_register_script( 'ajax-script-public-woo', plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-woo.js', array("jquery-1.12.4",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
  
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in DMSFP_Searching_for_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The DMSFP_Searching_for_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	//moment is necessery for getting a date
    wp_enqueue_script( 'moment');

	wp_enqueue_script('wp-color-picker');


wp_enqueue_script( 'jquery-ui-datepicker' );	

 

  wp_enqueue_script( 'datepicker', plugin_dir_url( __FILE__ ) . '../admin/js/datepicker.js', array("jquery",'jquery-ui-datepicker'), '1.0', true );
	  // Localize the script with new data

 $translation_array_for_categories = array(
	    'search_results' => __( 'Search Results', 'milun-woo-search' ),
	    'not_found_data' =>  __( 'We could not find any categories for your search. You can give it another try with different criteria.', 'milun-woo-search' ),
	    'no_search_results' => __( 'We could not find any data for your search.', 'milun-woo-search' )
	 );

	 


 wp_enqueue_script( 'drmilun-admin-woo', plugin_dir_url( __FILE__ ) . '../admin/js/searching-for-categories.js', array("jquery"), '1.0', true );

  wp_localize_script( 'drmilun-admin-woo', 'liveSearchDataCategories',[$translation_array_for_categories,
            array( 'root_url' => get_rest_url())]); 
    // localize the script
  // wp_localize_script( 'drmilun-admin-woo', 'ajax_object',
    //        array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
/*
wp_enqueue_script(
	'drmilun-admin',
	plugin_dir_url( __FILE__ ) . '../admin/js/drmilun-admin.js',
	array( 'jquery' ),
	'1.0',
	false
);

wp_localize_script(
	'drmilun-admin',
	'ajax_object',
	array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'milun_visibility_nonce' ),
	)
);
*/

wp_enqueue_script(
	'drmilun-colors-admin',
	plugin_dir_url( __FILE__ ) . '../admin/js/drmilun-colors-admin.js',
	array( 'jquery' ),
	'1.0',
	false
);

wp_localize_script(
	'drmilun-colors-admin',
	'ajax_object',
	array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'milun_visibility_nonce' ),
	)
);

wp_enqueue_style( 'wp-color-picker');
wp_enqueue_script( 'wp-color-picker');

 
 
	}
  }

endif;
