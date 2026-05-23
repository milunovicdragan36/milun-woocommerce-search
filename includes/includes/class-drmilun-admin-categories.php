<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Categories') ) :
class MMSDD_Drmilun_Categories {

//if(is_admin()) {
	public function __construct() {

add_action( "rest_api_init", [$this,'sfp_search_woo_categories'] );
add_action( "rest_api_init", [$this,'sfp_search_empty_woo_categories'] );
add_action( "rest_api_init", [$this,'sfp_search_front_woo_categories'] );

/**
 * Define the arguments our endpoint receives.
 */
}


function sfp_search_front_woo_categories() {
    register_rest_route('namespacewoo/v11', '/searching/(?P<s>[a-zA-Z0-9-]+)/
      ', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_front_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_args()]
    ]);
}

function sfp_search_front_empty_woo_categories() {
    register_rest_route('namespacewoo/v11', '/searching_empty_woo_categories/(?P<s>[a-zA-Z0-9-]+)/
      ', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_empty_front_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_get_search_args() {
    $args = [];
    $args['s'] = [
       //'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string'
   ];
  
   return $args;
}

function namespace_searching_front_woo_categories($request){
 
global $wpdb;

$woo_category_slug = isset( $request['s'] )
	? sanitize_text_field( wp_unslash( $request['s'] ) )
	: '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$woo_categories = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->terms}
		LEFT JOIN {$wpdb->term_taxonomy}
			ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
		LEFT JOIN {$wpdb->postmeta}
			ON {$wpdb->terms}.term_id = {$wpdb->postmeta}.meta_key
		WHERE {$wpdb->term_taxonomy}.taxonomy = %s
			AND {$wpdb->postmeta}.meta_value NOT LIKE %s
			AND {$wpdb->terms}.name LIKE %s
		",
		'product_cat',
		'%' . $wpdb->esc_like( 'oo_cat_33' ) . '%',
		'%' . $wpdb->esc_like( $woo_category_slug ) . '%'
	)
);

return $woo_categories;


}


function sfp_search_woo_categories(){
  register_rest_route('namespacewoo/v11', '/searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_cat()]
    ]);
}
function sfp_search_empty_woo_categories(){
  register_rest_route('namespacewoo/v11', '/empty_searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_empty_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_cat()]
    ]);
}


function namespace_get_search_cat() {
    $args = [];
    $args['s'] = [
      // 'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
  
   return $args;
}

function namespace_searching_woo_categories( $request ) {

	global $wpdb;

	$woo_category_slug = isset( $request['s'] )
		? sanitize_text_field( wp_unslash( $request['s'] ) )
		: '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$woo_categories = $wpdb->get_results(
		$wpdb->prepare(
			"
			SELECT *
			FROM {$wpdb->terms}
			LEFT JOIN {$wpdb->term_taxonomy}
				ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
			LEFT JOIN {$wpdb->postmeta}
				ON {$wpdb->terms}.term_id = {$wpdb->postmeta}.meta_key
			WHERE {$wpdb->terms}.slug != %s
				AND {$wpdb->term_taxonomy}.taxonomy = %s
				AND IFNULL({$wpdb->postmeta}.meta_value, '') = ''
				AND {$wpdb->terms}.name LIKE %s
			",
			'uncategorized',
			'product_cat',
			'%' . $wpdb->esc_like( $woo_category_slug ) . '%'
		)
	);

	return $woo_categories;
}

function namespace_searching_empty_woo_categories( $request ) {

	global $wpdb;

	$woo_category_slug = isset( $request['s'] )
		? sanitize_text_field( wp_unslash( $request['s'] ) )
		: '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$empty_woo_categories = $wpdb->get_results(
		$wpdb->prepare(
			"
			SELECT *
			FROM {$wpdb->terms}
			LEFT JOIN {$wpdb->term_taxonomy}
				ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
			LEFT JOIN {$wpdb->postmeta}
				ON {$wpdb->terms}.term_id = {$wpdb->postmeta}.meta_key
			WHERE {$wpdb->terms}.slug != %s
				AND {$wpdb->term_taxonomy}.taxonomy = %s
				AND {$wpdb->postmeta}.meta_value LIKE %s
				AND {$wpdb->terms}.name LIKE %s
			",
			'uncategorized',
			'product_cat',
			'%' . $wpdb->esc_like( 'oo_cat_33' ) . '%',
			'%' . $wpdb->esc_like( $woo_category_slug ) . '%'
		)
	);

	return $empty_woo_categories;
}
}

endif;