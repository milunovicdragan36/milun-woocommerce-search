<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function milun_get_woo_search_results( $request ) {

global $wpdb;
$post_slug = isset( $request['s'] ) ? sanitize_text_field( wp_unslash( $request['s'] ) ) : '';
$post_id   = isset( $request['id'] ) ? absint( $request['id'] ) : 0;

$custom = get_post_meta( $post_id );

$datepicker_1 = isset( $custom[ 'datepicker_1' . $post_id ][0] )
	? sanitize_text_field( $custom[ 'datepicker_1' . $post_id ][0] )
	: '';

$datepicker_2 = isset( $custom[ 'datepicker_2' . $post_id ][0] )
	? sanitize_text_field( $custom[ 'datepicker_2' . $post_id ][0] )
	: '';

$show_products_with_and_without_password = sanitize_text_field(
	get_post_meta( $post_id, 'show_products_with_and_without_password', true )
);

$show_products_with_password = sanitize_text_field(
	get_post_meta( $post_id, 'show_products_with_password', true )
);

$show_products_without_password = sanitize_text_field(
	get_post_meta( $post_id, 'show_products_without_password', true )
);

$search_by_woo_title = sanitize_text_field(
	get_post_meta( $post_id, 'search_by_woo_title', true )
);

$search_by_woo_content = sanitize_text_field(
	get_post_meta( $post_id, 'search_by_woo_content', true )
);

$search_attachment_and_images = sanitize_text_field(
	get_post_meta( $post_id, 'search_attachment_and_images', true )
);

$files        = array();
$files_record = array();


///////****search by woo title ******/////////

if (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_title LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_title LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_title LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_title LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_title LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_title LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_title LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_title LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_title LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);
} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_title LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_title LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);

} elseif (
	$search_by_woo_title == "1" &&
	$search_by_woo_content != "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_title LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);
}

/////////////////the end of woo title search//////////////////////

///////****search by woo content ******/////////

elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_content LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_content LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_content LIKE %s
			AND post_date > %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_content LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_content LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_2 != '' &&
	empty( $datepicker_1 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_content LIKE %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_content LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_content LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	$datepicker_1 != '' &&
	$datepicker_2 != '' &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_content LIKE %s
			AND post_date > %s
			AND post_date < %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%',
			$datepicker_1,
			$datepicker_2
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password == "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_content LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password == "1" &&
	$show_products_without_password != "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password != ''
			AND post_content LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);

} elseif (
	$search_by_woo_title != "1" &&
	$search_by_woo_content == "1" &&
	empty( $datepicker_1 ) &&
	empty( $datepicker_2 ) &&
	$show_products_with_and_without_password != "1" &&
	$show_products_with_password != "1" &&
	$show_products_without_password == "1"
) {
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$files_record = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->posts}
			WHERE post_password = ''
			AND post_content LIKE %s
			AND post_status = 'publish'
			AND post_type != 'sfp_search_post'
			AND (post_type = 'product' OR post_type = 'product_variation')",
			'%' . $wpdb->esc_like( $post_slug ) . '%'
		)
	);
}
/////////////////the end of woo content search//////////////////////
// for featured images and price

foreach ( $files_record as $row ) {

	$product = wc_get_product( $row->ID );

if ( $product ) {

	$price = $product->get_price();

	// fallback for variations or empty price
	if ( $price === '' ) {
		$parent_id = wp_get_post_parent_id( $row->ID );

		if ( $parent_id ) {
			$parent = wc_get_product( $parent_id );
			$price  = $parent ? $parent->get_price() : '';
		}
	}

	// 🔥 FINAL fallback (important)
	if ( $price === '' ) {
		$price = get_post_meta( $row->ID, '_price', true );
	}

	$row->price = $price;

} else {
	$row->price = '';
}

	// -------- THUMB --------
	$thumb_id = get_post_thumbnail_id( $row->ID );

	// fallback for variations
	if ( ! $thumb_id ) {
		$parent_id = wp_get_post_parent_id( $row->ID );

		if ( $parent_id ) {
			$thumb_id = get_post_thumbnail_id( $parent_id );
		}
	}

	$row->thumb = $thumb_id
		? wp_get_attachment_image_url( $thumb_id, 'woocommerce_thumbnail' )
		: '';
}

// ratings
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$ratings = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
		LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
		LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug = $wpdb->postmeta.meta_key)
		WHERE
			$wpdb->posts.post_type IN (%s, %s)
			AND $wpdb->postmeta.meta_value = %s
			OR $wpdb->postmeta.meta_value = %s
			AND $wpdb->posts.post_title LIKE %s
			AND $wpdb->posts.post_type IN (%s, %s)",
		'product',
		'product_variation',
		'woo_ratings51',
		'outofstock',
		'%' . $wpdb->esc_like( $post_slug ) . '%',
		'product',
		'product_variation'
	)
);

$like_meta_value = '%' . $wpdb->esc_like( 'kuhide' ) . '%';

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->posts}
		LEFT JOIN {$wpdb->postmeta}
			ON INSTR({$wpdb->postmeta}.meta_value, {$wpdb->posts}.post_name) > 0
		WHERE {$wpdb->postmeta}.meta_key = %s
			AND {$wpdb->postmeta}.meta_value LIKE %s
			AND {$wpdb->posts}.post_status = %s
			AND {$wpdb->posts}.post_type IN ( %s, %s )
		",
		'_sku',
		$like_meta_value,
		'publish',
		'product',
		'product_variation'
	)
);

global $wpdb;

// 1) Find attribute term taxonomies (pa_%).
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$terms = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT t.term_id, t.name, t.slug, tt.term_taxonomy_id, tt.taxonomy
		FROM {$wpdb->terms} t
		INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_id = t.term_id
		WHERE tt.taxonomy LIKE %s
		LIMIT %d
		",
		$wpdb->esc_like( 'pa_' ) . '%',
		50
	)
);

if ( empty( $terms ) ) {
	return array();
}

$taxonomies = array();

foreach ( $terms as $term ) {
	if ( ! empty( $term->taxonomy ) ) {
		$taxonomies[] = sanitize_key( $term->taxonomy );
	}
}

$taxonomies = array_values( array_unique( array_filter( $taxonomies ) ) );

if ( empty( $taxonomies ) ) {
	return array();
}

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$terms_products = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT DISTINCT p.*
		FROM {$wpdb->posts} p
		INNER JOIN {$wpdb->term_relationships} tr
			ON tr.object_id = p.ID
		INNER JOIN {$wpdb->term_taxonomy} tt
			ON tt.term_taxonomy_id = tr.term_taxonomy_id
		INNER JOIN {$wpdb->terms} t
			ON t.term_id = tt.term_id
		INNER JOIN {$wpdb->postmeta} pm
			ON pm.meta_key = t.slug
			AND pm.meta_value = %s
		WHERE p.post_type = %s
			AND p.post_status = %s
			AND tt.taxonomy LIKE %s
		ORDER BY p.post_title ASC
		LIMIT %d
		",
		'woo_term',
		'product',
		'publish',
		$wpdb->esc_like( 'pa_' ) . '%',
		200
	)
);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$products_titles = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM {$wpdb->posts}
		LEFT JOIN {$wpdb->postmeta} ON {$wpdb->postmeta}.meta_value = {$wpdb->posts}.post_title
		WHERE meta_key LIKE %s
			AND {$wpdb->posts}.post_status = %s
			AND {$wpdb->posts}.post_type IN (%s, %s)",
		'%hidetitleproduct',
		'publish',
		'product',
		'product_variation'
	)
);

// users posts
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$users = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM {$wpdb->posts}
		LEFT JOIN {$wpdb->users} ON {$wpdb->posts}.post_author = {$wpdb->users}.ID
		LEFT JOIN {$wpdb->postmeta} ON {$wpdb->users}.user_nicename = {$wpdb->postmeta}.meta_key
		WHERE meta_value LIKE %s
			AND {$wpdb->posts}.post_status = %s
			AND {$wpdb->posts}.post_type IN (%s, %s)",
		'%hide_woo_user',
		'publish',
		'product',
		'product_variation'
	)
);

$ratings          = is_array($ratings) ? $ratings : [];
$sku              = is_array($sku) ? $sku : [];
$products_titles  = is_array($products_titles) ? $products_titles : [];
$users            = is_array($users) ? $users : [];
$terms_products   = is_array($terms_products) ? $terms_products : [];

if(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
return array_values($files_record);
}
if(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total);
}
if(count($terms_products)==0 && !empty($ratings) && count($sku)==0 && count($products_titles)==0 && count($users)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total);
}

elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}



elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total);
}


elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}

$result_5 = array_values(array_udiff($files_record,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}







elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && count($users)==0 &&count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total);
}
elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}












elseif(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && !empty($users)&& count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total);
}
elseif(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}






elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}

elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}


elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}

elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);
}







elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);
}







elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}





elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

return array_values($files_record_total_3);

}



elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}





elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}



elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}







elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}






elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && !empty($users)&& !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}





elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}

elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_4,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_5 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_5[$key] = $value;
   }

}
return array_values($files_record_total_5);

}
}
?>
