<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MMSDD_Drmilun_i18n
 * @subpackage MMSDD_Drmilun_i18n/includes
 * @author     Dragan Milunovic <milunovicdragan36@gmail.com>
 */
class MMSDD_Drmilun_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 */
// phpcs:ignore WordPress.WP.I18n.LoadTextdomain
function milun_load_textdomain() {
	load_plugin_textdomain(
		'milun-woo-search',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}


}
