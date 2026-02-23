<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Search_Post') ) :

/**
 * Class that contains the custom post type that is responsible for
 * making a search form on front end
 *
 *
 * @package    MMSDD_Drmilun_Shortcode
 * @subpackage MMSDD_Drmilun_Shortcode/admin
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Drmilun_Search_Post{
  public function __construct(){
 /**
   * Creates a custom post type by default by activation of a 
   * plugin that will be using as * a search form on front end
   * for using for searching of posts
   *
   */

add_action( 'init', [$this,'sfp_new_form_for_searching'] );
add_action( 'admin_menu',[$this,'sfp_register_add_new_search_menu'], 20 );
add_filter( 'map_meta_cap', [$this,'sfp_block_creating_new_search_forms'], 10, 4 );

//add_filter( 'manage_sfp_search_post_posts_columns', [$this,'sfp_smashing_search_post_columns'] );
//add_action( 'manage_sfp_search_post_posts_custom_column' ,[$this, 'sfp_custom_sfp_search_post_column'], 10, 2 );

 }
function sfp_block_creating_new_search_forms( $caps, $cap, $user_id, $args ) {

    // Block creating new items for this CPT only
    if ( 'create_sfp_searches' === $cap ) {
        return array( 'do_not_allow' );
    }

    return $caps;
}

 function sfp_register_add_new_search_menu() {

      add_menu_page(
        __( 'Search Woo', 'milun-search' ),
        __( 'Search Woo', 'milun-search' ),
        'edit_pages',
        'sfp-search-ai',                 // IMPORTANT: custom slug (not post-new.php)
        [$this, 'sfp_render_search_router'],   // callback that redirects
        'dashicons-search',
        5
    );
}


/**
 * Menu router:
 * - Opens the same CPT post every time (keeps saved meta)
 * - Creates it once if it doesn't exist
 */
function sfp_render_search_router() {

    if ( ! current_user_can( 'edit_pages' ) ) {
        wp_die( esc_html__( 'You do not have permission to access this page.', 'milun-search' ) );
    }

    $post_type = 'sfp_search_post';

    // 1) Try to find an existing post to edit (choose your rule: latest, specific title, etc.)
    $existing = get_posts( [
        'post_type'      => $post_type,
        'post_status'    => [ 'publish', 'draft', 'pending', 'private' ],
        'posts_per_page' => 1,
        'orderby'        => 'ID',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ] );

    $post_id = ! empty( $existing ) ? (int) $existing[0] : 0;

    // 2) If none exists, create one
    if ( ! $post_id ) {
        $post_id = wp_insert_post( [
            'post_type'   => $post_type,
            'post_status' => 'publish', // or 'draft' if you prefer
            'post_title'  => __( 'Search Form', 'milun-search' ),
        ], true );

        if ( is_wp_error( $post_id ) || ! $post_id ) {
            wp_die( esc_html__( 'Could not create the Search Form post.', 'milun-search' ) );
        }
    }

    // 3) Redirect to edit the same post every time
    $edit_url = admin_url( 'post.php?post=' . $post_id . '&action=edit' );
    wp_safe_redirect( $edit_url );
    exit;
}


 function sfp_smashing_search_post_columns($columns) {
     $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Title', 'milun-search' ),
      'shortcode' => __( 'Shortcode', 'milun-search' ),
      'date'      => __('Date','milun-search')
     );
  
  
  return $columns;
} 


 


  //custom columns of search form ( custom search post ) in admin area

function sfp_custom_sfp_search_post_column( $column,$post_id ) {
    switch ( $column ) {

        case 'shortcode' :
           
               echo "[sfp_search_post]";
            break;

      

    }
}

// Register Custom Post Type as a custom search form
function sfp_new_form_for_searching() {

    $labels = array(
        'name'                  => _x( 'Searches', 'Search General Name', 'milun-search' ),
        'singular_name'         => _x( 'Search', 'Search Singular Name', 'milun-search' ),
        'menu_name'             => __( 'Search Form', 'milun-search' ),
        'name_admin_bar'        => __( 'Search', 'milun-search' ),
        'archives'              => __( 'Search Archives', 'milun-search' ),
        'attributes'            => __( 'Search Attributes', 'milun-search' ),
        'parent_item_colon'     => __( 'Parent Search:', 'milun-search' ),
        'all_items'             => __( 'All Searches', 'milun-search' ),
        'add_new_item'          => __( 'Add New Search Form', 'milun-search' ),
        'add_new'               => __( 'Add New', 'milun-search' ),
        'new_item'              => __( 'New Search', 'milun-search' ),
        'edit_item'             => __( 'Edit Search', 'milun-search' ),
        'update_item'           => __( 'Update Search', 'milun-search' ),
        'view_item'             => __( 'View Search', 'milun-search' ),
        'view_items'            => __( 'View Searches', 'milun-search' ),
        'search_items'          => __( 'Search Search', 'milun-search' ),
        'not_found'             => __( 'Not found', 'milun-search' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'milun-search' ),
        'featured_image'        => __( 'Featured Image', 'milun-search' ),
        'set_featured_image'    => __( 'Set featured image', 'milun-search' ),
        'remove_featured_image' => __( 'Remove featured image', 'milun-search' ),
        'use_featured_image'    => __( 'Use as featured image', 'milun-search' ),
        'insert_into_item'      => __( 'Insert into search', 'milun-search' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Search', 'milun-search' ),
        'items_list'            => __( 'Searches list', 'milun-search' ),
        'items_list_navigation' => __( 'Searches list navigation', 'milun-search' ),
        'filter_items_list'     => __( 'Filter Searches list', 'milun-search' ),
    );

    $args = array(
        'label'                 => __( 'Search', 'milun-search' ),
        'description'           => __( 'Search Description', 'milun-search' ),
        'labels'                => $labels,

        // CORE BEHAVIOR
        'public'                => true,
        'show_ui'               => true,

        // 🔴 HIDE FROM ADMIN MENU
        'show_in_menu'          => false,

        // REST / UI
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'show_in_rest'          => false,

        // STRUCTURE
        'supports'              => false,
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,

        // CAPABILITIES
        'capability_type'       => 'page',
        'map_meta_cap'    => true,

    // ✅ Disable "Add New" everywhere for this CPT
    'capabilities'    => array(
        'create_posts' => 'do_not_allow',
    )
    );

    register_post_type( 'sfp_search_post', $args );
}

}


endif;