<?php
/**
 *
 * @package    MMSDD_Milun_Search
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

// Delete custom posts (sfp_search_post).
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->query(
	$wpdb->prepare(
		"DELETE FROM {$wpdb->posts} WHERE post_type = %s",
		'sfp_search_post'
	)
);

// Clean orphaned postmeta.
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->query(
	"DELETE pm FROM {$wpdb->postmeta} pm
	 LEFT JOIN {$wpdb->posts} p ON pm.post_id = p.ID
	 WHERE p.ID IS NULL"
);

// Clean orphaned term relationships.
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->query(
	"DELETE tr FROM {$wpdb->term_relationships} tr
	 LEFT JOIN {$wpdb->posts} p ON tr.object_id = p.ID
	 WHERE p.ID IS NULL"
);

// Replace references in post content.
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->query(
	$wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(post_content, %s, %s)
		 WHERE post_content LIKE %s",
		'sfp_search_post',
		'Routes:',
		'%sfp_search_post%'
	)
);