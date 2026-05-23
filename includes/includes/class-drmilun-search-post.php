<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MMSDD_Drmilun_Search_Post' ) ) :

/**
 * Class that contains the custom post type responsible for
 * making a search form on front end.
 *
 * @package    MMSDD_Milun_Search
 * @subpackage MMSDD_Milun_Search/admin
 * @author     Dragan Milunovic <milunovicdragan36@gmail.com>
 */
class MMSDD_Drmilun_Search_Post {

	public function __construct() {

		add_action( 'init', array( $this, 'sfp_new_form_for_searching' ) );
		add_action( 'admin_menu', array( $this, 'sfp_register_add_new_search_menu' ), 20 );
		add_filter( 'map_meta_cap', array( $this, 'sfp_block_creating_new_search_forms' ), 10, 4 );
	}

	public function sfp_block_creating_new_search_forms( $caps, $cap, $user_id, $args ) {

		// Block creating new items for this CPT only.
		if ( 'create_sfp_searches' === $cap ) {
			return array( 'do_not_allow' );
		}

		return $caps;
	}

	public function sfp_register_add_new_search_menu() {

		$hook = add_menu_page(
			__( 'Search Woo', 'milun-woo-search' ),
			__( 'Search Woo', 'milun-woo-search' ),
			'edit_pages',
			'sfp-search-ai',
			array( $this, 'sfp_empty_search_menu_page' ),
			'dashicons-search',
			58
		);

		add_action( 'load-' . $hook, array( $this, 'sfp_render_search_router' ) );
	}

	public function sfp_empty_search_menu_page() {
		// This page should never display because load-$hook redirects before output starts.
	}

	/**
	 * Menu router:
	 * - Opens the same CPT post every time.
	 * - Creates it once if it does not exist.
	 */
	public function sfp_render_search_router() {

		if ( ! current_user_can( 'edit_pages' ) ) {
			wp_die( esc_html__( 'You do not have permission to access this page.', 'milun-woo-search' ) );
		}

		$post_type = 'sfp_search_post';

		$existing = get_posts(
			array(
				'post_type'      => $post_type,
				'post_status'    => array( 'publish', 'draft', 'pending', 'private' ),
				'posts_per_page' => 1,
				'orderby'        => 'ID',
				'order'          => 'DESC',
				'fields'         => 'ids',
				'no_found_rows'  => true,
			)
		);

		$post_id = ! empty( $existing ) ? (int) $existing[0] : 0;

		if ( ! $post_id ) {
			$post_id = wp_insert_post(
				array(
					'post_type'   => $post_type,
					'post_status' => 'publish',
					'post_title'  => __( 'Search Form', 'milun-woo-search' ),
				),
				true
			);

			if ( is_wp_error( $post_id ) || ! $post_id ) {
				wp_die( esc_html__( 'Could not create the Search Form post.', 'milun-woo-search' ) );
			}
		}

		wp_safe_redirect( admin_url( 'post.php?post=' . $post_id . '&action=edit' ) );
		exit;
	}

	public function sfp_smashing_search_post_columns( $columns ) {

		$columns = array(
			'cb'        => isset( $columns['cb'] ) ? $columns['cb'] : '',
			'title'     => __( 'Title', 'milun-woo-search' ),
			'shortcode' => __( 'Shortcode', 'milun-woo-search' ),
			'date'      => __( 'Date', 'milun-woo-search' ),
		);

		return $columns;
	}

	public function sfp_custom_sfp_search_post_column( $column, $post_id ) {

		switch ( $column ) {
			case 'shortcode':
				echo esc_html( '[sfp_search_post]' );
				break;
		}
	}

	/**
	 * Register Custom Post Type as a custom search form.
	 */
	public function sfp_new_form_for_searching() {

		$labels = array(
			'name'                  => _x( 'Searches', 'Search General Name', 'milun-woo-search' ),
			'singular_name'         => _x( 'Search', 'Search Singular Name', 'milun-woo-search' ),
			'menu_name'             => __( 'Search Form', 'milun-woo-search' ),
			'name_admin_bar'        => __( 'Search', 'milun-woo-search' ),
			'archives'              => __( 'Search Archives', 'milun-woo-search' ),
			'attributes'            => __( 'Search Attributes', 'milun-woo-search' ),
			'parent_item_colon'     => __( 'Parent Search:', 'milun-woo-search' ),
			'all_items'             => __( 'All Searches', 'milun-woo-search' ),
			'add_new_item'          => __( 'Add New Search Form', 'milun-woo-search' ),
			'add_new'               => __( 'Add New', 'milun-woo-search' ),
			'new_item'              => __( 'New Search', 'milun-woo-search' ),
			'edit_item'             => __( 'Edit Search', 'milun-woo-search' ),
			'update_item'           => __( 'Update Search', 'milun-woo-search' ),
			'view_item'             => __( 'View Search', 'milun-woo-search' ),
			'view_items'            => __( 'View Searches', 'milun-woo-search' ),
			'search_items'          => __( 'Search Search', 'milun-woo-search' ),
			'not_found'             => __( 'Not found', 'milun-woo-search' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'milun-woo-search' ),
			'featured_image'        => __( 'Featured Image', 'milun-woo-search' ),
			'set_featured_image'    => __( 'Set featured image', 'milun-woo-search' ),
			'remove_featured_image' => __( 'Remove featured image', 'milun-woo-search' ),
			'use_featured_image'    => __( 'Use as featured image', 'milun-woo-search' ),
			'insert_into_item'      => __( 'Insert into search', 'milun-woo-search' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Search', 'milun-woo-search' ),
			'items_list'            => __( 'Searches list', 'milun-woo-search' ),
			'items_list_navigation' => __( 'Searches list navigation', 'milun-woo-search' ),
			'filter_items_list'     => __( 'Filter Searches list', 'milun-woo-search' ),
		);

		$args = array(
			'label'               => __( 'Search', 'milun-woo-search' ),
			'description'         => __( 'Search Description', 'milun-woo-search' ),
			'labels'              => $labels,

			// Core behavior.
			'public'              => true,
			'show_ui'             => true,

			// Hide CPT from normal admin menu.
			'show_in_menu'        => false,

			// REST / UI.
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'show_in_rest'        => false,

			// Structure.
			'supports'            => false,
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,

			// Capabilities.
			'capability_type'     => 'page',
			'map_meta_cap'        => true,
			'capabilities'        => array(
				'create_posts' => 'do_not_allow',
			),
		);

		register_post_type( 'sfp_search_post', $args );
	}
}

endif;