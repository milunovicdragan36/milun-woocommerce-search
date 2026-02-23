<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 */

	function miluse_get_rest_featured_image( $object, $field_name, $request ) {
    if( @$object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}