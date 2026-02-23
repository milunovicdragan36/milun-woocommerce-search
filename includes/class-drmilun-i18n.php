<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MMSDD_Drmilun_i18n
 * @subpackage MMSDD_Drmilun_i18n/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Drmilun_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function dmsfp_load_plugin_textdomain() {

		load_plugin_textdomain(
			'milun-search',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
