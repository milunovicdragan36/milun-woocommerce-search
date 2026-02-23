<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Milun_Search_Activator') ) :
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package    MMSDD_Milun_Search
 * @subpackage MMSDD_Milun_Search/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Milun_Search_Activator {


	/**
	 * Declare searching form of custom post type search_post
	 * Flushes rewrite rules afterwards
	 */
	public static function activate() {


		flush_rewrite_rules();

	} 

}

endif;