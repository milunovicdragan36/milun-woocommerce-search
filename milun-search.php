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
 * Plugin Name:       Milun Woo Search
 * Plugin URI:        https://wordpress.org/plugins/milun-search/
 * Description:       This is the plugin for searching categories, posts and products by different serching criteria
 * Version:           1.0.0
 * Author:            Dragan Milunovic
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       milun-search
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
 * This action is documented in includes/class-searching-for-posts-activator.php
 */
if (!function_exists('dmsfp_activate_MMSDD_Milun_Search_Activator')){

  function dmsfp_activate_MMSDD_Milun_Search_Activator() {
	require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun-activator.php';
	MMSDD_Milun_Search_Activator::activate();
   }

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-searching-for-posts-deactivator.php
 */
if (!function_exists('dmsfp_deactivate_MMSDD_Drmilun_Deactivator')){

  function dmsfp_deactivate_MMSDD_Drmilun_Deactivator() {
	require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun-deactivator.php';
	MMSDD_Drmilun_Deactivator::deactivate();
   }
}

register_activation_hook( __FILE__, 'dmsfp_activate_MMSDD_Milun_Search_Activator' );
register_deactivation_hook( __FILE__, 'dmsfp_deactivate_MMSDD_Drmilun_Deactivator' );
    

require plugin_dir_path( __FILE__ ) . 'includes/class-drmilun.php';



if (!function_exists('dmsfp_run_MMSDD_Drmilun')){

	function dmsfp_run_MMSDD_Drmilun() {

		$plugin = new MMSDD_Drmilun();
		$plugin->dmsfp_run();

	}
	dmsfp_run_MMSDD_Drmilun();

}

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
}

