<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @package    MMSDD_Drmilun_Deactivator
 * @subpackage MMSDD_Drmilun_Deactivator/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Drmilun_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 */
	public static function deactivate() {
      flush_rewrite_rules();
	}

}
