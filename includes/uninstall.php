<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package Milun_Woo_Search
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete custom search posts safely.
$search_posts = get_posts(
	array(
		'post_type'      => 'sfp_search_post',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'fields'         => 'ids',
	)
);

foreach ( $search_posts as $post_id ) {
	wp_delete_post( $post_id, true );
}