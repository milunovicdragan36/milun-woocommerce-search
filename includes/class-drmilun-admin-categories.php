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
 $woo_category_slug       =$request['s']; 

  
       $woo_categories =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
  LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_term_taxonomy.taxonomy ='product_cat' AND wp_postmeta.meta_value NOT LIKE '%oo_cat_33%' AND wp_terms.name LIKE '%$woo_category_slug%' 
    "));
       
return  $woo_categories;


}
/*

 function namespace_ajax_search_woo_woo_terms_2($request){ 
  $id = $request['id'];
   $category_slug = $request['s'];                    
global $wpdb;

$search_categories_woo = esc_attr(get_post_meta( $id,"search_categories_woo", true));
if($search_categories_woo=="1"){  
   $files =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_term_taxonomy.taxonomy ='product_cat' AND wp_terms.slug LIKE '%$category_slug%'
    "));

        $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE  wp_postmeta.meta_value = 'woo_cat_33' AND wp_term_taxonomy.taxonomy ='product_cat' AND wp_postmeta.post_id = '$id' 
    "));


if (!empty($totalArray)) {
$result = array_values(array_udiff($files, $totalArray, function ($a, $b) {
    return strcmp($a->name,$b->name);
}));
return $result;
}else{
  return $files;
}
}
*/


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


function namespace_searching_woo_categories($request){
 
  global $wpdb;
 $woo_category_slug       =$request['s']; 

  
       $woo_categories =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
  LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_terms.slug !='uncategorized' AND wp_term_taxonomy.taxonomy ='product_cat' AND ifnull(wp_postmeta.meta_value, '') = '' AND wp_terms.name LIKE '%$woo_category_slug%' 
    "));
       
return  $woo_categories;


}
function namespace_searching_empty_woo_categories($request){
    global $wpdb;

 $woo_category_slug       =$request['s']; 

  
       $empty_woo_categories =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
  LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_terms.slug !='uncategorized' AND wp_term_taxonomy.taxonomy ='product_cat' AND wp_postmeta.meta_value LIKE '%oo_cat_33%' AND wp_terms.name LIKE '%$woo_category_slug%' 
    "));
       
return  $empty_woo_categories;
}
}

endif;