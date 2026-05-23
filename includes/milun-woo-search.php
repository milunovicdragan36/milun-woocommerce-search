<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 * 
 *  
 * @package           MMSDD_Milun_Search
 *
 * @wordpress-plugin
 * Plugin Name:       Milun Search for WooCommerce
 * Plugin URI:        https://www.templatemonster.com
 * Description:       This is the plugin for searching categories and products by different serching criteria without refreshing a page.
 * Version:           1.0.0
 * Author:            Dragan Milunovic
 * Author URI:        https://www.templatemonster.com/authors/milunovicdragan36/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       milun-woo-search
 * Domain Path:       /languages
 */
 


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



//require  'templates/my_custom_template.html';
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MMSDD_Drmilun_VERSION', '1.0.1' );
   
    /**
     * Hooks into initialization actions and filters.
     */
   /**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-milun-woo-search-activator.php
 */
if ( ! function_exists( 'milun_woo_search_activate' ) ) {

	function milun_woo_search_activate() {
		require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun-activator.php';
		MMSDD_Milun_Search_Activator::activate();
	}
}

if ( ! function_exists( 'milun_woo_search_deactivate' ) ) {

	function milun_woo_search_deactivate() {
		require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun-deactivator.php';
		MMSDD_Drmilun_Deactivator::deactivate();
	}
}

register_activation_hook( __FILE__, 'milun_woo_search_activate' );
register_deactivation_hook( __FILE__, 'milun_woo_search_deactivate' );

require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun.php';

if ( ! function_exists( 'milun_woo_search_run' ) ) {

	function milun_woo_search_run() {
		$plugin = new MMSDD_Drmilun();
		$plugin->dmsfp_run();
	}
}

milun_woo_search_run();
add_action( 'rest_api_init', function () {
	global $wp_rest_server;

	foreach ( $wp_rest_server->get_routes() as $route => $handlers ) {
		preg_match_all( '/\(\?P<([^>]+)>/', $route, $matches );

		if ( empty( $matches[1] ) ) {
			continue;
		}

		if ( count( $matches[1] ) !== count( array_unique( $matches[1] ) ) ) {
			error_log( 'BAD REST ROUTE FOUND: ' . $route );
		}
	}
}, 9999 );
/*
add_action( 'rest_api_init', 'register_rest_images' );



function register_rest_images(){
$args = array(
   'public'   => true,
   '_builtin' => false,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_1 = get_post_types( $args, $output, $operator );


$args = array(
   'public'   => true,
   '_builtin' => true,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_2 = get_post_types( $args, $output, $operator );




$post_types_3 = array_merge($post_types_1,$post_types_2);

foreach ( $post_types_3  as $post_type ) {

      if( $post_type == "product"|| $post_type == "product_variation"){
//        return;
      
//if ( ! empty ( $post_types ) ) { // If there are any custom public post types.


      
    register_rest_field( array($post_type),
        'fimg_url',
        array(
            'get_callback'    =>'miluse_get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );

}
}
}



 function miluse_get_rest_featured_image( $object, $field_name, $request) {
    if( @$object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}*/