<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Search_Post_Meta') ) :
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MMSDD_Drmilun_Meta
 * @subpackage MMSDD_Drmilun_Meta/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */

class MMSDD_Drmilun_Meta{


/**
 * Adds a meta box to the post editing screen
*/
public function __construct(){
    
    add_action("init",[$this,"sfp_register_and_save_meta_boxes"]);


      

    add_action( "rest_api_init", [$this,'namespace_register_search_post_types'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_post_types_half_sentence'] );
      add_action( "rest_api_init", [$this,'namespace_register_search_post_types_two_words'] );

add_action( "rest_api_init", [$this,'namespace_register_search_post_meta_data'] );

add_action( "rest_api_init", [$this,'search_products'] );
add_action( "rest_api_init", [$this,'search_products_empty'] );
add_action( "rest_api_init", [$this,'search_products_half'] );
add_action( "rest_api_init", [$this,'search_products_two_words'] );
add_action( "rest_api_init", [$this,'search_products_two_words_and_half'] );

add_action( "rest_api_init", [$this,'search_products_three_words'] );
//add_action( "rest_api_init", [$this,'search_products_by_author'] );
add_action( 'rest_api_init', [$this,'search_type_products']);
   // add_action( 'rest_api_init', [$this,'search_ratings']);
 add_action( 'rest_api_init', [$this,'search_empty_ratings']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_half_sentence']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_two_words']);

 /*FOR WOO CATEGORIES FRONT END*/
      add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_zero'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_and_half'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_two_words'] );
    add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_double_two_words'] );

     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_two_words_and_half'] );
          add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_three_words'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_empty_woo_categories'] );


    add_action( 'rest_api_init', [$this,'namespace_register_search_route']);
// add_action( 'rest_api_init', [$this,'namespace_register_woo_search_products']);
    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route']);
    
    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_half_sentence']);


add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_around']);
add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_under']);

        add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_rat']);




////*backend*////////////

    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_terms']);
        add_action( 'rest_api_init', [$this,'namespace_register_woo_search_terms_2']);
              add_action( 'rest_api_init', [$this,'namespace_register_woo_woo_search_terms_2']);
          


    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_terms_empty']);
 

 /*****sku*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_sku_search']);
add_action( 'rest_api_init', [$this,'namespace_register_sku_empty_search']);

/*****user*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_user_search']);
add_action( 'rest_api_init', [$this,'namespace_register_user_empty_search']);
/*****post types*////
 add_action( 'rest_api_init', [$this,'namespace_register_admin_search_post_types']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_empty_post_types']);
/*****meta data of post types*////
 add_action( 'rest_api_init', [$this,'namespace_register_admin_meta_data_of_post_types']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_meta_data_empty_of_post_types']);
/*****woo user*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_woo_user_search']);
add_action( 'rest_api_init', [$this,'namespace_register_woo_user_empty_search']);

/*****type of product*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_type_of_product_search']);
add_action( 'rest_api_init', [$this,'namespace_register_type_of_product_empty_search']);

/*****visibility of product*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_visibility_of_product_search']);
add_action( 'rest_api_init', [$this,'namespace_register_visibility_of_product_empty_search']);

/*****post titles of products*////
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_post_titles_of_products_no_words']);

add_action( 'rest_api_init', [$this,'namespace_register_admin_search_post_titles_of_products']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_post_titles_of_products_two_words']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_post_titles_of_products_three_words']);

add_action( 'rest_api_init', [$this,'namespace_register_admin_search_empty_post_titles_of_products_no_words']);
 
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_empty_post_titles_of_products']);

add_action( 'rest_api_init', [$this,'namespace_register_admin_search_empty_post_titles_of_products_two_words']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_search_empty_post_titles_of_products_three_words']);


}


public function sfp_register_and_save_meta_boxes(){
    add_action( 'save_post', [$this,'sfp_save_woo_meta_boxes'] );

   add_action( 'add_meta_boxes', [$this,'sfp_add_meta_boxes'] );
}



public function sfp_add_meta_boxes() {
  

    // meta boxes for adding different criteria for searching
   add_meta_box( 'prfx_meta_form_woo', __( 'Woo Search Form', 'milun-search' ), [$this,'dmsfp_woo_add_meta_callback_form'], 'sfp_search_post', 'normal', 'default'
 );

 
   
}
function namespace_register_search_woo_categories_zero() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories//(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args(), // <-- no extra []
        ]
    );
}
function namespace_register_search_woo_categories() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args(), // <-- no extra []
        ]
    );
}

function namespace_register_search_woo_categories_and_half() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args(), // <-- no extra []
        ]
    );
}

function namespace_register_search_woo_categories_two_words() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args_two_words(), // <-- no extra []
        ]
    );
} 
function namespace_register_search_woo_categories_double_two_words() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args_two_words(), // <-- no extra []
        ]
    );
} 
function namespace_register_search_woo_categories_two_words_and_half() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)%20(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args(), // <-- no extra []
        ]
    );
}
function namespace_register_search_woo_categories_three_words() {
      register_rest_route(
        'namespacewoo/v12',
        '/searching_woo_categories/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20(?P<ses>[a-zA-Z0-9-]+)/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args_sentence_three_words(), // <-- no extra []
        ]
    );
}



function namespace_register_search_empty_woo_categories() {
       register_rest_route(
        'namespacewoo/v12',
        '/searching_empty_woo_categories/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)',
        [
            'methods'             => WP_REST_Server::READABLE, // GET
            'callback'            => [ $this, 'namespace_searching_empty_woo_categories' ],
            'permission_callback' => '__return_true',
            'args'                => $this->namespace_get_search_args(), // <-- no extra []
        ]
    );
}


 function namespace_register_admin_search_post_titles_of_products_no_words(){
   register_rest_route('namespace/v11', '/search_post_titles_of_products//', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_titles_of_products_no_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


 function namespace_register_admin_search_post_titles_of_products(){
   register_rest_route('namespace/v11', '/search_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_titles_of_products'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

 function namespace_register_admin_search_post_titles_of_products_two_words(){
   register_rest_route('namespace/v11', '/search_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_titles_of_products_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}
 function namespace_register_admin_search_post_titles_of_products_three_words(){
   register_rest_route('namespace/v11', '/search_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20(?P<ses>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_titles_of_products_three_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence_three_words()]
    ]);
}

 function namespace_register_admin_search_empty_post_titles_of_products_no_words(){
   register_rest_route('namespace/v11', '/search_empty_post_titles_of_products//', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_titles_of_products_no_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


 function namespace_register_admin_search_empty_post_titles_of_products(){
   register_rest_route('namespace/v11', '/search_empty_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_titles_of_products'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

 function namespace_register_admin_search_empty_post_titles_of_products_two_words(){
   register_rest_route('namespace/v11', '/search_empty_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_titles_of_products_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}

 function namespace_register_admin_search_empty_post_titles_of_products_three_words(){
   register_rest_route('namespace/v11', '/search_empty_post_titles_of_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20(?P<ses>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_titles_of_products_three_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence_three_words()]
    ]);
}




 function namespace_register_admin_search_post_types(){
   register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

 function namespace_register_admin_search_empty_post_types(){
   register_rest_route('namespace/v11', '/search_empty_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


 function namespace_register_admin_meta_data_of_post_types(){
   register_rest_route('namespace/v11', '/search_meta_data_of_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_meta_data_of_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

 function namespace_register_admin_meta_data_empty_of_post_types(){
   register_rest_route('namespace/v11', '/search_meta_data_empty_of_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_meta_data_empty_of_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function search_type_products(){
   register_rest_route('namespacewoo/v2', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_type_products'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


/*
function search_products_by_sku(){
   register_rest_route('namespacewoo/v1', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_by_sku'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
*/

function search_products(){
   register_rest_route('namespacewoo/v11', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

function search_products_empty(){
   register_rest_route('namespacewoo/v11', '/search_products//(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_empty'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

function search_products_half(){
   register_rest_route('namespacewoo/v11', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function search_products_two_words(){
   register_rest_route('namespacewoo/v11', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}

function search_products_two_words_and_half(){
   register_rest_route('namespacewoo/v11', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}

function search_products_three_words(){
   register_rest_route('namespacewoo/v11', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20(?P<ses>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_three_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence_three_words()]
    ]);
}




/*
function namespace_register_woo_search_route_price() {
   register_rest_route('namespacewoo/v2', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<pr>\d+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_woo_price'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
 
}*/
function namespace_register_woo_search_route_price_around() {
      register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20around%20(?P<pr>\d+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_woo_price_around'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
function namespace_register_woo_search_route_price_under() {
      register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20under%20(?P<pr>\d+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_woo_price_under'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}














/*
function search_ratings(){
   register_rest_route('namespacewoo/v20', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_ratings'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}*/
function search_products_with_ratings(){
   register_rest_route('namespacewoo_ratings/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_with_ratings'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
function search_products_with_ratings_half_sentence(){
   register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_with_ratings_half_sentence'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
function search_products_with_ratings_two_words(){
   register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_products_with_ratings_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}
function search_empty_ratings(){
   register_rest_route('namespacewoo/v1', '/search_empty_rate/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_ratings'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
function namespace_register_search_post_types() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
    
}
function namespace_register_search_post_meta_data() {
    register_rest_route('namespace/v11', '/search_post_meta_data/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_meta_data'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
    
}
function namespace_register_search_post_types_two_words() {
    register_rest_route('namespace/v11', '/search_post_types_two_words/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
    
}
function namespace_register_search_post_types_half_sentence() {
    register_rest_route('namespace/v11', '/search_post_types_half_sentence/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

/*
function namespace_register_search_post_types_two_words() {
    register_rest_route('namespacewoo/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence()]
    ]);
}
*/









function namespace_register_search_route() {
    register_rest_route('namespace/v1', '/search/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
    
}
function namespace_register_woo_search_route_half_sentence() {
    register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_half_sentence'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}



function namespace_register_woo_search_terms(){
     register_rest_route('namespacewoo/v10', '/terms/(?P<term>[a-zA-Z0-9-]+)/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_terms'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_register_woo_search_terms_2(){
     register_rest_route('namespacewoo/v40', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_terms_3'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_register_woo_search_terms_empty(){
     register_rest_route('namespacewoo/v10', '/term_empty/(?P<term>[a-zA-Z0-9-]+)/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_terms_empty'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}





function namespace_register_woo_woo_search_terms_2(){
     register_rest_route('namespacewoo/v35', '/search_categories/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_woo_terms_2'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}






/*
function namespace_register_woo_search_products() {
    register_rest_route('namespacewoo/v2', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_products_2'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}*/
function namespace_register_woo_search_route() {
    register_rest_route('namespacewoo/v50', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_woo'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_register_woo_search_route_rat() {
    register_rest_route('namespacewoo/v2', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_woo_rat'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function search_empty_woo_categories() {
    register_rest_route('namespacecatwoo/v1', '/search_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'permission_callback' => '__return_true',
        'callback' => [$this,'namespace_ajax_search_3_empty_woo']
    ]);
}






function namespace_register_sku_search(){
     register_rest_route('namespacewoo/v10', '/sku/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_sku'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function namespace_register_sku_empty_search(){
     register_rest_route('namespacewoo/v10', '/sku_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_sku_empty'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

function namespace_register_user_search(){
     register_rest_route('namespace/v10', '/user/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_user'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function namespace_register_user_empty_search(){
     register_rest_route('namespace/v10', '/user_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_user_empty'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}
function namespace_register_woo_user_search(){
     register_rest_route('namespacewoo/v10', '/woo_user/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_user'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function namespace_register_woo_user_empty_search(){
     register_rest_route('namespacewoo/v10', '/woo_user_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_user_empty'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

function namespace_register_type_of_product_search(){
     register_rest_route('namespacewoo/v10', '/type_of_product/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_type_of_product'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function namespace_register_type_of_product_empty_search(){
     register_rest_route('namespacewoo/v10', '/type_of_product_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_type_of_product'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_register_visibility_of_product_search(){
     register_rest_route('namespacewoo/v10', '/visibility_of_product/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_visibility_of_product'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}




function namespace_register_visibility_of_product_empty_search(){
     register_rest_route('namespacewoo/v10', '/visibility_of_product_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_visibility_of_product'],
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

/**
 * Define the arguments our endpoint receives.
 */
function namespace_get_search_args_two_words() {
    $args = [];
    $sen = [];
    $args['s'] = [
       'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   $sen['se'] = [
       'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   return array([$args,$sen]);
}
function namespace_get_search_args_sentence_three_words() {
    $args = [];
    $sen = [];
    $sens = [];
    $args['s'] = [
       //'description' => _e( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   $sen['se'] = [
      // 'description' => _e( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   $sens['ses'] = [
      // 'description' => _e( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   return array([$args,$sen,$sens]);
}

function namespace_ajax_search_post_titles_of_products_no_words($request){



global $wpdb;


$post_titles = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
   


    WHERE wp_posts.post_status ='publish' AND wp_posts.post_type = 'product' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'   || wp_posts.post_type = 'product_variation'  AND wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'"));

 $post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_type 
         WHERE wp_posts.post_status ='publish' AND  wp_postmeta.meta_value = 'hidetitleproduct'" 
         
    ));



 if (!empty($post_title_empty)) {

$result = array_values(array_udiff($post_titles, $post_title_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}


else{
  return $post_titles;
}


}

function namespace_ajax_search_empty_post_titles_of_products_no_words($request){
   



global $wpdb;
$post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT wp_postmeta.meta_key from wp_postmeta
 
          WHERE   wp_postmeta.meta_value ='hidetitleproduct'"));
return $post_title_empty;


}


function namespace_ajax_search_post_titles_of_products($request){

  $post_slug = $request['s'];


global $wpdb;


$post_titles = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
   


    WHERE wp_posts.post_title LIKE %s AND wp_posts.post_status ='publish' AND wp_posts.post_type = 'product' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'   || wp_posts.post_type = 'product_variation'  AND wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles' AND
     wp_posts.post_title LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug) . '%'));

 $post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_title 
         WHERE wp_posts.post_status ='publish' AND  wp_postmeta.meta_value = 'hidetitleproduct'" 
         
    ));


 if (!empty($post_title_empty)) {

$result = array_values(array_udiff($post_titles, $post_title_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}


else{
  return $post_titles;
}


}

function namespace_ajax_search_empty_post_titles_of_products($request){
    $post_slug = $request['s'];



global $wpdb;
$post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT wp_postmeta.meta_key from wp_postmeta
 
          WHERE   wp_postmeta.meta_value ='hidetitleproduct'  AND wp_postmeta.meta_key LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%'));
return $post_title_empty;


}

function namespace_ajax_search_post_titles_of_products_two_words($request){

  $post_slug = $request['s'];
$post_slug_second_word =$request['se'];


global $wpdb;


$post_titles = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
   


    WHERE wp_posts.post_title LIKE %s AND wp_posts.post_title LIKE %s AND wp_posts.post_status ='publish' AND wp_posts.post_type = 'product' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'   || wp_posts.post_type = 'product_variation'  AND wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles' AND
     wp_posts.post_title LIKE %s AND
     wp_posts.post_title LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%','%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%'));

 $post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_title 
         WHERE wp_posts.post_status ='publish' AND  wp_postmeta.meta_value = 'hidetitleproduct'" 
         
    ));

 if (!empty($post_title_empty)) {

$result = array_values(array_udiff($post_titles, $post_title_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}


else{
  return $post_titles;
}


}
function namespace_ajax_search_empty_post_titles_of_products_two_words($request){
    $post_slug = $request['s'];
$post_slug_second_word =$request['se'];


global $wpdb;
$post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT wp_postmeta.meta_key from wp_postmeta
 
          WHERE   wp_postmeta.meta_value ='hidetitleproduct'  AND wp_postmeta.meta_key LIKE %s AND wp_postmeta.meta_key LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%'));
return $post_title_empty;


}

function namespace_ajax_search_post_titles_of_products_three_words($request){

$post_slug =$request['s'];
$post_slug_second_word =$request['se'];
$post_slug_third_word =$request['ses'];


global $wpdb;


$post_titles = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
   


    WHERE wp_posts.post_title LIKE %s AND wp_posts.post_title LIKE %s AND wp_posts.post_title LIKE %s AND wp_posts.post_status ='publish' AND wp_posts.post_type = 'product' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'   || wp_posts.post_type = 'product_variation'  AND wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles' AND wp_posts.post_title LIKE %s AND wp_posts.post_title LIKE %s AND wp_posts.post_title LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%','%' . $wpdb->esc_like($post_slug_third_word) . '%','%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%','%' . $wpdb->esc_like($post_slug_third_word) . '%'));

  $post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_title 
         WHERE wp_posts.post_status ='publish' AND  wp_postmeta.meta_value = 'hidetitleproduct'" 
         
    ));



 if (!empty($post_title_empty)) {

$result = array_values(array_udiff($post_titles, $post_title_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}


else{
  return $post_titles;
}


}
function namespace_ajax_search_empty_post_titles_of_products_three_words($request){
$post_slug =$request['s'];
$post_slug_second_word =$request['se'];
$post_slug_third_word =$request['ses'];


global $wpdb;
$post_title_empty =$wpdb->get_results( $wpdb->prepare("SELECT wp_postmeta.meta_key from wp_postmeta
 
          WHERE   wp_postmeta.meta_value ='hidetitleproduct' AND 
    wp_postmeta.meta_key LIKE %s AND
     wp_postmeta.meta_key LIKE %s AND
    wp_postmeta.meta_key LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%','%' . $wpdb->esc_like($post_slug_second_word) . '%','%' . $wpdb->esc_like($post_slug_third_word) . '%'));
return $post_title_empty;


}








function namespace_ajax_search_post_types($request){

  $post_slug = $request['s'];


global $wpdb;


$post_types = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
   


    WHERE wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND  wp_posts.post_type != 'page' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND
     wp_posts.post_type LIKE '%$post_slug%'"));

 $post_type_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_type 
         WHERE  wp_posts.post_type LIKE '%$post_slug%' AND wp_postmeta.meta_value = 'post_hide'
         
    "));
 if (!empty($post_type_empty)) {
$result = array_values(array_udiff($post_types, $post_type_empty, function ($a, $b) {
    return strcmp($a->post_type,$b->post_type);
}));
return $result;
}else{
  return $post_types;
}


}

function namespace_ajax_search_empty_post_types($request){
    $post_slug = $request['s'];


global $wpdb;
  $post_type_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_type 
         WHERE wp_posts.post_status ='publish' AND wp_posts.post_type LIKE '%$post_slug%' AND wp_postmeta.meta_value = 'post_hide'
         
    "));

  return $post_type_empty;
}


function namespace_ajax_search_meta_data_of_post_types($request){

  global $wpdb;  

   
 
 $meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.post_id =wp_posts.ID
          WHERE wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'attachment' AND
          wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page' AND wp_posts.post_type != 'nav_menu_item' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND 
         
         wp_postmeta.meta_key NOT LIKE 'name_term_%' AND wp_postmeta.meta_key!='search_categories' 
         AND wp_postmeta.meta_key!='_wp_desired_post_slug'
                   AND wp_postmeta.meta_key!='_wp_trash_meta_time'
AND wp_postmeta.meta_key!='_wp_trash_meta_status'
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        
        AND wp_postmeta.meta_key!='text_color_of_categories'

        AND wp_postmeta.meta_key!='color_of_background'
        AND wp_postmeta.meta_key!='color_of_the_load_more_btn'
        AND wp_postmeta.meta_key!='page'
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    "));

 

$temp = array_unique(array_column($meta_data, 'post_title'));
$unique_arr = array_intersect_key($meta_data, $temp);

 $post_meta_data_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_value =wp_posts.post_title
          WHERE wp_postmeta.meta_key LIKE '%_meta' AND
         wp_postmeta.meta_key NOT LIKE 'name_term_%' AND wp_postmeta.meta_key!='search_categories' 
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        
        AND wp_postmeta.meta_key!='text_color_of_categories'

        AND wp_postmeta.meta_key!='color_of_background'
        AND wp_postmeta.meta_key!='background_color_of_load_more_button'
        AND wp_postmeta.meta_key!='page'
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    "));


  if (!empty($post_meta_data_empty)) {
$result = array_values(array_udiff($unique_arr, $post_meta_data_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}else{
  return array_values($unique_arr);;
}

}

function namespace_ajax_search_meta_data_empty_of_post_types($request){
    global $wpdb;
 $post_meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_value =wp_posts.post_title
          WHERE wp_postmeta.meta_key LIKE '%_meta' AND
         wp_postmeta.meta_key NOT LIKE 'name_term_%' AND wp_postmeta.meta_key!='search_categories' 
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        AND wp_postmeta.meta_key!='text_color_of_categories'
        AND wp_postmeta.meta_key!='color_of_background'
        AND wp_postmeta.meta_key!='background_color_of_load_more_button'
        AND wp_postmeta.meta_key!='page'
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    "));
 return $post_meta_data;
}

 function namespace_ajax_search_woo_terms($request){ 
 global $wpdb;
 
             # code...
 $terms_slug =$request['s'];                        
 $term       =$request['term'];                        

   
       $pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
 LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key
     /* LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.ID */

         WHERE ifnull(wp_postmeta.meta_value, '') = '' AND wp_term_taxonomy.taxonomy = 'pa_$term' AND wp_terms.name LIKE '%$terms_slug%'
    "));
        return $pageposts_1;

}
 function namespace_ajax_search_woo_terms_empty($request){ 
 global $wpdb;
 
             # code...
 $terms_slug =$request['s'];                        
 $term       =$request['term'];                        

   
       $pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
 LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key
     /* LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.ID */

         WHERE  wp_postmeta.meta_value LIKE '33' AND wp_term_taxonomy.taxonomy = 'pa_$term' AND wp_terms.name LIKE '%$terms_slug%'
    "));
        return $pageposts_1;

 
}




 function namespace_ajax_search_sku($request){ 
 global $wpdb;
 $sku_with_first_character=[];
             # code...
 $sku_slug =$request['s'];
 $sku =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
         WHERE wp_postmeta.meta_key =  '_sku'AND wp_postmeta.meta_value NOT LIKE '%kuhide'AND wp_postmeta.meta_value LIKE '%$sku_slug%'"));

     $sku_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
    WHERE wp_postmeta.meta_key =  '_sku' AND wp_postmeta.meta_value NOT LIKE '%kuhide'AND wp_postmeta.meta_value LIKE '$sku_slug%' 
    "));
  if (!empty($sku_first_character)) {

$sku_with_first_character= $sku_first_character;

}else{
  $sku_with_first_character= $sku;

}

$sku_empty_with_first_character=[];

  $sku_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
     
         WHERE  wp_postmeta.meta_key LIKE '%kuhide' AND wp_postmeta.meta_value LIKE '%$sku_slug%'
    "));
  $sku_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
     
         WHERE  wp_postmeta.meta_key LIKE '%kuhide' AND wp_postmeta.meta_value LIKE '$sku_slug%'
    "));
  if (!empty($sku_empty_first_character)) {

$sku_empty_with_first_character= $sku_empty_first_character;
}else{
 $sku_empty_with_first_character= $sku_empty;
 
}


if (!empty($sku_empty_with_first_character)) {
$result = array_values(array_udiff($sku_with_first_character, $sku_empty_with_first_character, function ($a, $b) {
    return strcmp($a->meta_value.'skuhide',$b->meta_value);
}));
return $result;
}else{
  return $sku_with_first_character;
}

}

 function namespace_ajax_search_sku_empty($request){
 global $wpdb;
 $sku_with_first_character=[];
             # code...
 $sku_slug =$request['s']; 
$sku_empty_with_first_character=[];

  $sku_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
     
         WHERE  wp_postmeta.meta_value LIKE '%kuhide' AND wp_postmeta.meta_value LIKE '%$sku_slug%'
    "));
  $sku_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_postmeta
     
         WHERE  wp_postmeta.meta_value LIKE '%kuhide' AND wp_postmeta.meta_value LIKE '$sku_slug%'
    "));
  if (!empty($sku_empty_first_character)) {

$sku_empty_with_first_character= $sku_empty_first_character;
}else{
 $sku_empty_with_first_character= $sku_empty;
 
}
return $sku_empty_with_first_character;
}



 function namespace_ajax_search_user($request){ 
 global $wpdb;
$user_slug =$request['s'];                        
$user_with_first_character=[];

     $user =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id

WHERE  wp_users.user_login LIKE '%$user_slug%'

         
    "));
 // return $user;                    

    $user_first_character =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id

WHERE 
      wp_users.user_login LIKE '$user_slug%'
    "));
  if (!empty($user_first_character)) {
$user_with_first_character = $user_first_character;
}else{
$user_with_first_character =  $user;
 
}



  $user_empty_with_first_character = [];

       $user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  '%$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_user'
         
    "));


           $user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  '$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_user' 
    "));

  if (!empty($user_empty_first_character)) {
$user_empty_with_first_character = $user_empty_first_character;
}else{
$user_empty_with_first_character =  $user_empty;
 
}
//return $user_empty_with_first_character;  
//return $totalArray;
if (!empty($user_empty_with_first_character)) {
/*$result = array_values(array_udiff($user_with_first_character, $user_empty_with_first_character, function ($a, $b) {
    return strcmp($a->user_login,$b->user_login);
}));*/
return [];
}else{
  return $user_with_first_character;
}

}
 function namespace_ajax_search_user_empty($request){ 
  
 global $wpdb;
 
             # code...
 $user_slug =$request['s'];                        

  $user_empty_with_first_character = [];

       $user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  '%$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_user'
         
    "));


           $user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  '$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_user' 
    "));

  if (!empty($user_empty_first_character)) {
$user_empty_with_first_character = $user_empty_first_character;
}else{
$user_empty_with_first_character =  $user_empty;
 
}
return $user_empty_with_first_character;

}


 function namespace_ajax_search_woo_user($request){ 
 global $wpdb;
$user_slug =$request['s'];                        
$user_with_first_character=[];

     $user =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id

WHERE  wp_users.user_login LIKE '%$user_slug%'

         
    "));
 // return $user;                    

    $user_first_character =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id

WHERE 
      wp_users.user_login LIKE '$user_slug%'
    "));
  if (!empty($user_first_character)) {
$user_with_first_character = $user_first_character;
}else{
$user_with_first_character =  $user;
 
}



  $user_empty_with_first_character = [];

       $user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  '%$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_woo_user'
         
    "));


           $user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  '$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_woo_user' 
    "));

  if (!empty($user_empty_first_character)) {
$user_empty_with_first_character = $user_empty_first_character;
}else{
$user_empty_with_first_character =  $user_empty;
 
}
//return $user_empty_with_first_character;  
//return $totalArray;
if (!empty($user_empty_with_first_character)) {
/*$result = array_values(array_udiff($user_with_first_character, $user_empty_with_first_character, function ($a, $b) {
    return strcmp($a->user_login,$b->user_login);
}));*/
return [];
}else{
  return $user_with_first_character;
}

}
 function namespace_ajax_search_woo_user_empty($request){ 
  
 global $wpdb;
 
             # code...
 $user_slug =$request['s'];                        

  $user_empty_with_first_character = [];

       $user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  '%$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_woo_user'
         
    "));


           $user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  '$user_slug%' AND wp_postmeta.meta_value LIKE '%hide_woo_user' 
    "));

  if (!empty($user_empty_first_character)) {
$user_empty_with_first_character = $user_empty_first_character;
}else{
$user_empty_with_first_character =  $user_empty;
 
}
return $user_empty_with_first_character;

}

 function namespace_ajax_search_type_of_product($request){
global $wpdb;  
$type_of_product_slug =$request['s']; 


$type_of_product = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->terms 
     LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key 
     
   WHERE  wp_terms.slug LIKE '%$type_of_product_slug%' AND wp_terms.slug = 'simple' 
     AND ifnull(wp_postmeta.meta_value, '') = ''

   || wp_terms.slug LIKE '%$type_of_product_slug%' AND wp_terms.slug = 'grouped'
   AND ifnull(wp_postmeta.meta_value, '') = ''
   || wp_terms.slug LIKE '%$type_of_product_slug%' AND wp_terms.slug = 'variable'
    AND ifnull(wp_postmeta.meta_value, '') = ''

   || wp_terms.slug LIKE '%$type_of_product_slug%' AND wp_terms.slug = 'external'
   AND ifnull(wp_postmeta.meta_value, '') = ''
  

  ", ARRAY_A ));


return $type_of_product;


}
 function namespace_ajax_search_empty_type_of_product($request){ 
  
global $wpdb;  
$empty_type_of_product_slug =$request['s'];                        

$empty_type_of_product = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->terms 
     LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key 
     
   WHERE  wp_terms.slug LIKE '%$empty_type_of_product_slug%' AND wp_terms.slug = 'simple' 
     AND wp_postmeta.meta_value LIKE '%oo_type_prod52%'

   || wp_terms.slug LIKE '%$empty_type_of_product_slug%' AND wp_terms.slug = 'grouped'
   AND wp_postmeta.meta_value LIKE '%oo_type_prod52%'
   || wp_terms.slug LIKE '%$empty_type_of_product_slug%' AND wp_terms.slug = 'variable'
   AND wp_postmeta.meta_value LIKE '%oo_type_prod52%'

   || wp_terms.slug LIKE '%$empty_type_of_product_slug%' AND wp_terms.slug = 'external'
   AND wp_postmeta.meta_value LIKE '%oo_type_prod52%'
  

  ", ARRAY_A ));
return $empty_type_of_product;
}



 function namespace_ajax_search_visibility_of_product($request){
global $wpdb;  
$visibility_of_product_slug =$request['s']; 


$visibility_of_product = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->terms 
     LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key 
     
   WHERE  wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'rated-1' 
     AND ifnull(wp_postmeta.meta_value, '') = ''

   || wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'rated-2'
   AND ifnull(wp_postmeta.meta_value, '') = ''
   || wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'rated-3'
    AND ifnull(wp_postmeta.meta_value, '') = ''

   || wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'rated-4'
   AND ifnull(wp_postmeta.meta_value, '') = ''
  
|| wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'rated-5'
   AND ifnull(wp_postmeta.meta_value, '') = ''
   || wp_terms.slug LIKE '%$visibility_of_product_slug%' AND wp_terms.slug = 'outofstock'
   AND ifnull(wp_postmeta.meta_value, '') = ''
  ", ARRAY_A ));


return $visibility_of_product;


}
 function namespace_ajax_search_empty_visibility_of_product($request){ 
  
global $wpdb;  
$empty_visibility_of_product_slug =$request['s'];                        

$empty_visibility_of_product = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->terms 
     LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key 
     
   WHERE  wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'rated-1' 
     AND wp_postmeta.meta_value LIKE '%oo_ratings51%'

   || wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'rated-2'
   AND wp_postmeta.meta_value LIKE '%oo_ratings51%'
   || wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'rated-3'
   AND wp_postmeta.meta_value LIKE '%oo_ratings51%'

   || wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'rated-4'
   AND wp_postmeta.meta_value LIKE '%oo_ratings51%'
    || wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'rated-5'
   AND wp_postmeta.meta_value LIKE '%oo_ratings51%'

   || wp_terms.slug LIKE '%$empty_visibility_of_product_slug%' AND wp_terms.slug = 'outofstock'
   AND wp_postmeta.meta_value LIKE '%oo_ratings51%'

  ", ARRAY_A ));
return $empty_visibility_of_product;
}
function miluse_thumb_for_product_or_variation( $post_id, $size = 'woocommerce_thumbnail' ) {
    $post_id = (int) $post_id;

    // 1) try this post (product OR variation)
    $thumb_id = get_post_thumbnail_id( $post_id );

    // 2) if variation has no image, fallback to parent product
    if ( ! $thumb_id && get_post_type( $post_id ) === 'product_variation' ) {
        $parent_id = (int) wp_get_post_parent_id( $post_id );
        if ( $parent_id ) {
            $thumb_id = get_post_thumbnail_id( $parent_id );
        }
    }

    // 3) return URL if exists
    if ( $thumb_id ) {
        $url = wp_get_attachment_image_url( $thumb_id, $size );
        if ( $url ) return $url;
    }

    // 4) placeholder fallback
    return function_exists('wc_placeholder_img_src')
        ? wc_placeholder_img_src( $size )
        : '';
}



function namespace_ajax_search_products( $request) {


$premium_file = include("woo_querys.php");
return $premium_file;  



}

function namespace_ajax_search_products_empty( $request) {


$premium_file = include("woo_querys_empty.php");
return $premium_file;  



}



function namespace_ajax_search_products_two_words( $request) {



$premium_file = include("woo_querys_two_words.php");
return $premium_file;  



}


function namespace_ajax_search_products_three_words( $request) {



$premium_file = include("woo_querys_three_words.php");
return $premium_file;  



}


function namespace_ajax_search_products_with_ratings( $request) {
 

$post_slug =$request['s']; 


$premium_file = include("woo_querys.php");
return $premium_file;   

}



function namespace_ajax_search_products_with_ratings_half_sentence( $request) {
 
$post_slug =$request['s']; 


$premium_file = include("woo_querys.php");
return $premium_file;   

}


function namespace_ajax_search_products_with_ratings_two_words( $request) {
 
$post_slug =$request['s']; 

$premium_file = include("woo_querys_two_words.php");
return $premium_file;   

}

function namespace_ajax_search_empty_ratings( $request) {
  $terms_slug = $request['s'];

global $wpdb;



 
 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
       LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key


         WHERE wp_postmeta.meta_value = 'woo_ratings51' AND wp_terms.slug LIKE '%$terms_slug%'
    "));



if (!empty($totalArray)) {

$result = array_map(function($x){
    return $x->slug;
}, $totalArray);

$res = array_unique($result);

return $res;
  
}
}
/*
function namespace_ajax_search_woo_products_2( $request) {
  $terms_slug = $request['s'];

global $wpdb;  
       $files =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
                LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.ID 
      

         WHERE  wp_posts.post_title LIKE '%$terms_slug%'
    "));

 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
                LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.ID 
       

         WHERE  wp_postmeta.meta_value = 'woo_pro_33' AND wp_posts.post_title LIKE '%$terms_slug%'
    "));


if (!empty($totalArray)) {
$result = array_values(array_udiff($files, $totalArray, function ($a, $b) {
    return strcmp($a->post_id,$b->post_id);
}));
return $result;
}else{
  return $files;
}

}*/
function namespace_ajax_search_2_woo( $request) {
  $terms_slug = $request['s'];

global $wpdb;  
       $files =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
LEFT JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
  LEFT JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_id
       LEFT JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id

      LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_terms.term_id

    "));


   

 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
LEFT JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
  LEFT JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_id
       LEFT JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id

      LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_terms.term_id
WHERE wp_postmeta.meta_value = '33'
    "));
//return $totalArray;





$files_record_20 = array();
$post_title = array();
foreach($totalArray as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 


if (!empty($totalArray)) {
  $result_19 = array_values(array_udiff($files,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 

}else{
  $result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($files as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}
return array_values($files_record_20); 

}




  }
function namespace_ajax_search_2_woo_half_sentence( $request) {
  $post_slug = $request['s'];

global $wpdb;


$files = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author || wp_users.ID !=  wp_posts.post_author

       LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
    LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
    LEFT JOIN wp_terms ON (
    wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug LIKE 'rated%' 
    ||wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug = 'outofstock' 

    ||wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug='external' 
    ||wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug='grouped' || wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug='variable' 
    || wp_term_taxonomy.term_id = wp_terms.term_id AND wp_terms.slug='simple' ) 
        LEFT JOIN wp_postmeta ON wp_postmeta.post_id =  wp_posts.ID


    WHERE  wp_posts.post_type = 'product'  AND
     wp_posts.post_title LIKE '%$post_slug%' ||wp_posts.post_type = 'product_variation'  AND
     wp_posts.post_title LIKE '%$post_slug%'/* AND wp_posts.post_title LIKE '%$post_slug%' AND wp_posts.post_type = 'product' AND wp_postmeta.meta_key !='page' AND wp_postmeta.meta_key !='post' AND wp_postmeta.meta_key !='search_post' AND wp_postmeta.meta_key !='search_categories'  AND wp_postmeta.meta_key !='product'AND wp_postmeta.meta_key !='woo_search_post'AND wp_postmeta.meta_key !='children'AND wp_postmeta.meta_key !='_sku'AND wp_postmeta.meta_key !='_children'AND wp_postmeta.meta_key !='_regular_price'AND wp_postmeta.meta_key !='total_sales'AND wp_postmeta.meta_key !='_tax_status'AND wp_postmeta.meta_key !='_tax_class'   AND wp_postmeta.meta_key !='_manage_stock'   AND wp_postmeta.meta_key !='_backorders'   AND wp_postmeta.meta_key !='_sold_individually'   AND wp_postmeta.meta_key !='_upsell_ids'   AND wp_postmeta.meta_key !='_crosssell_ids'                         
         AND wp_postmeta.meta_key !='_virtual'   AND wp_postmeta.meta_key !='_downloadable'   AND wp_postmeta.meta_key !='_download_limit'   AND wp_postmeta.meta_key !='_download_expiry'   AND wp_postmeta.meta_key !='_thumbnail_id'
  
 AND wp_postmeta.meta_key !='_stock' AND wp_postmeta.meta_key !='_product_image_gallery' AND wp_postmeta.meta_key !='_stock_status' AND wp_postmeta.meta_key !='_wc_average_rating'  AND wp_postmeta.meta_key !='_wc_review_count'AND wp_postmeta.meta_key !='_product_version'AND wp_postmeta.meta_key !='_price'AND wp_postmeta.meta_key !='_edit_lock'AND wp_postmeta.meta_key !='_product_attributes'AND wp_postmeta.meta_key !='_edit_last'AND wp_postmeta.meta_key !='formMenus'AND wp_postmeta.meta_key !='search_post_id_title'AND wp_postmeta.meta_key !='show_products_with_and_without_password'   AND wp_postmeta.meta_key !='show_products_without_password'   AND wp_postmeta.meta_key !='show_products_with_password'   AND wp_postmeta.meta_key !='datepicker_174'   AND wp_postmeta.meta_key !='datepicker_274'   AND wp_postmeta.meta_key !='searchposts_in_title_woo'                         
         AND wp_postmeta.meta_key !='search_categories_woo'   AND wp_postmeta.meta_key !='name_term_id_23'   AND wp_postmeta.meta_key !='name_term_value_pa_color'   AND wp_postmeta.meta_key !='name_term_id_34'   AND wp_postmeta.meta_key !='name_term_value_pa_size'


  AND wp_postmeta.meta_key !='movie'  AND wp_postmeta.meta_key !='34'AND wp_postmeta.meta_key !='24'AND wp_postmeta.meta_key !='attribute_pa_color'AND wp_postmeta.meta_key !='datepicker_171'AND wp_postmeta.meta_key !='datepicker_271'AND wp_postmeta.meta_key !='name_term_id_36'AND wp_postmeta.meta_key !='name_term_value_pa_muzika'
 */
   ", ARRAY_A ));

$data_premium_file = include("data_for_woo_querys.php");


$premium_file = include("woo_querys.php");
return $premium_file;  

  }
/*
function namespace_ajax_search_2_woo_sentence( $request) {
 $post_slug =$request['s'];
   $sentence =$request['se'];
                      
 //$price =$request['id'];
 

    global $wpdb;
  $products = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%' AND wp_posts.post_title LIKE '%$sentence%'" );

$variation = $wpdb->get_results( "SELECT * FROM wp_posts WHERE wp_posts.post_type = 'product' AND ((wp_posts.post_status = 'publish')) GROUP BY wp_posts.ID ORDER BY wp_posts.post_date" );

return $products;

  }
*/
function namespace_ajax_search_2_woo_price( $request) {
 $post_slug =$request['s'];
 $pr_num =$request['pr'];                        


    global $wpdb;

   $products = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_postmeta.meta_key ='_regular_price' AND wp_postmeta.meta_value = '$pr_num'-'0' AND wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%' GROUP BY wp_posts.ID ORDER BY wp_posts.post_date" );
 
 
   $products_2 = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE  wp_postmeta.meta_key ='_sale_price' wp_postmeta.meta_value = '$pr_num'-'0'  AND wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%' GROUP BY wp_posts.ID ORDER BY wp_posts.post_date" );

     $result = array_merge($products,$products_2);
   
     return $result;
    
   
           //   return $sale_products;

    
  }
function namespace_ajax_search_2_woo_price_around( $request) {
 $post_slug =$request['s'];
 $pr_num =$request['pr'];                        


    global $wpdb;

   $regular_price = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE  wp_postmeta.meta_key ='_regular_price' AND wp_postmeta.meta_value >= '$pr_num'-'$pr_num' AND wp_postmeta.meta_value <= '$pr_num'+'$pr_num' AND  wp_posts.post_title LIKE '%$post_slug%'" );
 
 
   $sale_price = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 


   WHERE wp_postmeta.meta_key ='_sale_price' AND wp_postmeta.meta_value >= '$pr_num'-'$pr_num' AND wp_postmeta.meta_value <= '$pr_num'+'$pr_num' AND  wp_posts.post_title LIKE '%$post_slug%'" );
   // Variable product only
      $variation_price_regular = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 


   WHERE wp_posts.post_type = 'product_variation' AND wp_postmeta.meta_key ='_regular_price' AND wp_postmeta.meta_value >= '$pr_num'-'$pr_num' AND wp_postmeta.meta_value <= '$pr_num'+'$pr_num' AND  wp_posts.post_title LIKE '%$post_slug%'" );

        $variation_price_sale = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 


   WHERE wp_posts.post_type = 'product_variation' AND wp_postmeta.meta_key ='_sale_price' AND wp_postmeta.meta_value >= '$pr_num'-'$pr_num' AND wp_postmeta.meta_value <= '$pr_num'+'$pr_num' AND  wp_posts.post_title LIKE '%$post_slug%'" );
   // Variable product only





 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author

        LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
    LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
    LEFT JOIN wp_terms ON (wp_term_taxonomy.term_id = wp_terms.term_id) 
    LEFT JOIN wp_postmeta ON (wp_terms.slug= wp_postmeta.meta_key)
     
   

 
    WHERE  
     wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-1' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-2' ||  wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-3' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-4' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-5' ||
     wp_posts.post_type = 'product'  AND wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'outofstock' 
     
    "));
 
 $totalArray_users =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author
    LEFT JOIN wp_postmeta ON wp_postmeta.meta_key =  wp_users.user_login




         WHERE  wp_postmeta.meta_value  LIKE '%user' AND wp_posts.post_title LIKE '%$post_slug%'
    "));


$sku =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts 
    LEFT JOIN wp_postmeta ON  
    wp_postmeta.post_id = wp_posts.ID ||wp_postmeta.meta_key=wp_posts.post_name
    WHERE wp_postmeta.meta_value LIKE '%kuhide' AND
 wp_posts.post_title LIKE '%$post_slug%'
"));
     
 $type =$wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_posts
  
     LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
    LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
    LEFT JOIN wp_terms ON (wp_term_taxonomy.term_id = wp_terms.term_id) 
    LEFT JOIN wp_postmeta ON (wp_terms.slug= wp_postmeta.meta_key)

 
    WHERE  
    wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'simple' ||
     
     wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'grouped'||
      wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'variable'||
      wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'external' 
      
    "));


  $first_meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
LEFT JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
  LEFT JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_id 

       LEFT JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id

      LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_terms.term_id || wp_postmeta.meta_key = wp_term_taxonomy.taxonomy  

      WHERE  wp_postmeta.meta_value  = 'visibilty_term70' ||wp_postmeta.meta_value  = '33'    
    "));



        $premium_file = include("querys_with_around_and_under_price.php");
return $premium_file; 

    
  }
function namespace_ajax_search_2_woo_price_under( $request) {
 $post_slug =$request['s'];
 $pr_num =$request['pr'];                        


    global $wpdb;

   $regular_price = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_postmeta.meta_key ='_regular_price' AND wp_postmeta.meta_value < '$pr_num'+'0' AND wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%'" );
  $variation_price_regular = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_postmeta.meta_key ='_regular_price' AND wp_postmeta.meta_value < '$pr_num'+'0' AND wp_posts.post_type = 'product_variation' AND wp_posts.post_title LIKE '%$post_slug%'" );

   $variation_price_sale = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_postmeta.meta_key ='_sale_price' AND wp_postmeta.meta_value < '$pr_num'+'0' AND wp_posts.post_type = 'product_variation' AND wp_posts.post_title LIKE '%$post_slug%'" );

   $sale_price = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE wp_postmeta.meta_key ='_sale_price' AND wp_postmeta.meta_value < '$pr_num'+'0' AND wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%'" );

 


 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author

        LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
    LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
    LEFT JOIN wp_terms ON (wp_term_taxonomy.term_id = wp_terms.term_id) 
    LEFT JOIN wp_postmeta ON (wp_terms.slug= wp_postmeta.meta_key)
     
   

 
    WHERE  
     wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-1' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-2' ||  wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-3' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-4' || wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'rated-5' ||
     wp_posts.post_type = 'product'  AND wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'outofstock' 
     
    "));
 
 $totalArray_users =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author
    LEFT JOIN wp_postmeta ON wp_postmeta.meta_key =  wp_users.user_login




         WHERE  wp_postmeta.meta_value  LIKE '%user' AND wp_posts.post_title LIKE '%$post_slug%'
    "));


$sku =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts 
    LEFT JOIN wp_postmeta ON  
    wp_postmeta.post_id = wp_posts.ID ||wp_postmeta.meta_key=wp_posts.post_name
    WHERE wp_postmeta.meta_value LIKE '%kuhide' AND
 wp_posts.post_title LIKE '%$post_slug%'
"));
     
 $type =$wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_posts
  
     LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
    LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
    LEFT JOIN wp_terms ON (wp_term_taxonomy.term_id = wp_terms.term_id) 
    LEFT JOIN wp_postmeta ON (wp_terms.slug= wp_postmeta.meta_key)

 
    WHERE  
    wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'simple' ||
     
     wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'grouped'||
      wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'variable'||
      wp_posts.post_title  LIKE '%$post_slug%'AND wp_postmeta.meta_key= 'external' 
      
    "));


  $first_meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
LEFT JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
  LEFT JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_id 

       LEFT JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id

      LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_terms.term_id || wp_postmeta.meta_key = wp_term_taxonomy.taxonomy  

      WHERE  wp_postmeta.meta_value  = 'visibilty_term70' ||wp_postmeta.meta_value  = '33'    
    "));



        $premium_file = include("querys_with_around_and_under_price.php");
return $premium_file; 

    
   
  }

function namespace_ajax_search_2_woo_rat( $request) {
 $post_slug =$request['s'];                        
 $rati =$request['id'];
global $wpdb;
  $products_2 = $wpdb->get_results( "SELECT * FROM wp_posts 
    LEFT JOIN wp_postmeta ON wp_posts.ID =wp_postmeta.post_id 



   WHERE  wp_postmeta.meta_key = '_wc_average_rating' AND wp_postmeta.meta_value =$rati AND wp_posts.post_type = 'product' AND wp_posts.post_title LIKE '%$post_slug%'" );

return $products_2;
} 
 function return_post_meta_data($request){
    global $wpdb;
  $post_slug =$request['s']; 

  
  $post_meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_value =wp_posts.post_title
          WHERE wp_posts.post_title LIKE '%$post_slug%' AND wp_postmeta.meta_key LIKE '%_meta' AND
         wp_postmeta.meta_key NOT LIKE 'name_term_%' AND wp_postmeta.meta_key!='search_categories' 
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        AND wp_postmeta.meta_key!='text_color_of_categories'

        
        AND wp_postmeta.meta_key!='color_of_background'
        AND wp_postmeta.meta_key!='background_color_of_load_more_button'
        AND wp_postmeta.meta_key!='page'
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    ")); 
return $post_meta_data; 



//$premium_file = include("querys_search_post.php");
//return $premium_file;  
 

  }


 function return_post_types($request){

  $post_slug =$request['s']; 



$premium_file = include("querys_search_post.php");
return $premium_file;  
 

  }

 function return_post_types_two_words($request){




$premium_file = include("post_types_two_words.php");
return $premium_file;  
 

  }
  
 function namespace_ajax_search_3($request){ 
    $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

              $post_types = get_post_types( $args, $output, $operator );
              $taxonomies = get_taxonomies( $args, $output, $operator );



    


          $terms_cat = get_terms(
                      array(
                          'taxonomy' =>$taxonomies,
                          'hide_empty' => true,
                         

                  ));
     
  
           

 global $wpdb;            

                # code...
 $category_slug =$request['s']; 
       

           $posts = get_posts(['post_type' =>"search_post"]);
                    
foreach ($posts as $post) {
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
if($search_categories=="1"){                       
 //foreach ($terms_cat as $term) {
                    


        //var_dump($term);
    //  $double_term_id = get_post_meta($id, $term->term_id,$term->term_id); 
      //var_dump($double_term_id);
      //if($term->term_id!=$double_term_id){
     
            $pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
   LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key
   WHERE  ifnull(wp_postmeta.meta_value, '') = '' AND wp_term_taxonomy.taxonomy !='wp_theme' AND wp_term_taxonomy.taxonomy !='product_cat' AND wp_term_taxonomy.taxonomy !='nav_menu' AND wp_term_taxonomy.taxonomy !='product_type' AND wp_term_taxonomy.taxonomy !='product_visibility' AND wp_term_taxonomy.taxonomy NOT LIKE 'pa%' AND wp_terms.name LIKE '%$category_slug%'|| wp_postmeta.meta_value!='11' AND wp_term_taxonomy.taxonomy !='wp_theme' AND wp_term_taxonomy.taxonomy !='product_cat' AND wp_term_taxonomy.taxonomy !='nav_menu' AND wp_term_taxonomy.taxonomy !='product_type' AND wp_term_taxonomy.taxonomy !='product_visibility' AND wp_term_taxonomy.taxonomy NOT LIKE 'pa%' AND wp_terms.name LIKE '%$category_slug%'
    "));
       /*
    $pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
   

   WHERE  wp_terms.term_id IN ('7','2') AND wp_terms.name LIKE '%$category_slug%'
    ")); */  

  //    } 
   // } 
return $pageposts_1;
}
}
}   
/***FOR WOO CATEGORIES **/ 
function namespace_searching_woo_categories($request){
    
    global $wpdb;

 $woo_category_slug       =$request['s']; 

  
    $woo_categories = $wpdb->get_results(
    $wpdb->prepare(
        "
       SELECT DISTINCT t.*, tt.count
        FROM {$wpdb->terms} AS t
        INNER JOIN {$wpdb->term_taxonomy} AS tt
            ON t.term_id = tt.term_id
        LEFT JOIN {$wpdb->postmeta} AS pm
            ON pm.meta_key = t.term_id
        WHERE tt.taxonomy = %s
          AND t.name LIKE %s
          AND pm.meta_value IS NULL
          AND t.name != 'Uncategorized'
        ",
        'product_cat',
        '%' . $wpdb->esc_like( $woo_category_slug ) . '%'
    )
);
       
return  $woo_categories;
}

function namespace_searching_empty_woo_categories($request){
    global $wpdb;

 $woo_category_slug       =$request['s']; 

  
       $empty_woo_categories =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
  LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_term_taxonomy.taxonomy ='product_cat' AND wp_postmeta.meta_value LIKE '%oo_cat_33%' AND wp_terms.name LIKE '%$woo_category_slug%' 
    "));
       
return  $empty_woo_categories;
}



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

    
 
 



   

} 

 function namespace_ajax_search_woo_terms_3($request){ 




           

global $wpdb;

$terms_slug = $request['s'];
$term = $request['term'];
   
 $pageposts_3 =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_posts
LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
LEFT JOIN wp_terms ON (wp_term_taxonomy.term_taxonomy_id = wp_terms.term_id)
      LEFT JOIN wp_postmeta ON wp_terms.slug = wp_postmeta.meta_key


         WHERE wp_postmeta.meta_key = 'color'/* AND wp_postmeta.meta_value='visibilty_term60' AND wp_posts.post_title LIKE '%$terms_slug%' || wp_postmeta.meta_value='33' AND wp_posts.post_title LIKE '%$terms_slug%'*/
    "));

return $pageposts_3;






 
 

   




} 


  
 function namespace_ajax_search_3_empty_woo($request){ 
    $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

             // $post_types = get_post_types( $args, $output, $operator );
              $taxonomies = get_taxonomies( $args, $output, $operator );



    


          $product_cat = get_terms(
                      array(
                          'taxonomy' =>'product_cat',
                          'hide_empty' => true,
                         

                  ));
     
        
    
      

     

 global $wpdb;            

                # code...
 $category_slug =$request['s'];                        
 foreach ($product_cat as $term) {
      
        //var_dump($term);
      $double_woo_term_id = get_post_meta(get_the_ID(), $term->term_id,get_the_ID()); 
   // if($double_woo_term_id!=get_the_ID()){
       $pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key
         LEFT JOIN wp_posts ON wp_postmeta.meta_value = wp_posts.ID 

         WHERE wp_term_taxonomy.taxonomy !='nav_menu' AND  ifnull(wp_postmeta.meta_value, '') = '' AND wp_term_taxonomy.taxonomy ='product_cat' AND wp_term_taxonomy.taxonomy !='category' AND wp_term_taxonomy.taxonomy !='product_type' AND wp_term_taxonomy.taxonomy !='product_visibility' AND wp_term_taxonomy.taxonomy NOT LIKE 'pa%' AND wp_terms.name LIKE '%$category_slug%'
    "));
   // }




return $pageposts_1;



}            
       
   

  //    } 
    


}   

   
 

  
      
/**
*  prefix_sanitize_input
*
*  Checking if expected value is "yes", if it is then
*  show that searching criteria at the front end
*
*  @type  prefix_sanitize_input
*  @date  28/04/2020
*  @since 5.4.0
*
*/
  

public function dmsfp_prefix_sanitize_input( $input, $expected_value="yes" ) {
    if ( $expected_value == $input ) {
        return $expected_value;
    } else {
        return '';
    }
}


/** 
*  get_searching_criteria
*
*  if check in posts then searching will be by posts etc. 
*
*  @type  get_searching_criteria
*  @date  28/04/2020
*  @since 5.4.0
*
*/
 
public function dmsfp_get_searching_criteria() { 
    return array(

            'posts'   => __( 'Search Posts', 'searching-for-posts' ),
            'categories'    => __( 'Search Categories', 'searching-for-posts' )
        );
}

////// WOO POST META//////////////


public function dmsfp_woo_add_meta_callback_form( $post ) {
  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       wp_nonce_field( basename( __FILE__ ), 'prfx_nonce_woo' );
   
    $prfx_stored_meta = get_post_meta( esc_attr($post->ID) );
 ?>   
<p>
  <?php  
global $wpdb;



                  $locations = get_theme_mod( 'nav_menu_locations' );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
//$menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='searchposts_in_title' AND meta_value !=''");
if($locations){
 foreach ($locations as $key =>$value){


       $searchposts_in_title_after =esc_attr(get_post_meta( get_the_ID(),"searchposts_in_title_after_".$key,true));
   $sanitized_checkbox_menu_after = $searchposts_in_title_after ==1? $this->dmsfp_prefix_sanitize_input($searchposts_in_title_after, 1): ''; 

      $searchposts_in_title_before =esc_attr(get_post_meta( get_the_ID(),"searchposts_in_title_before_".$key,true));
   $sanitized_checkbox_menu_before = $searchposts_in_title_before ==1? $this->dmsfp_prefix_sanitize_input($searchposts_in_title_before, 1): ''; 
?>
 <p>
      <label style="font-size:15px;"><input type="checkbox" class="cb searchposts_in_title_after_<?php echo esc_attr($key); ?>" onchange="cbChange(this)"  name="searchposts_in_title_after_<?php echo esc_attr($key); ?>" value="1"  <?php checked(esc_attr($sanitized_checkbox_menu_after), 1 ); ?>/><?php 
    /* translators: Display search form in menu. */
 esc_html_e("Display search form after menu ", 'milun-search'); echo esc_attr($key);

  ?></label>
 </p>
 <?php
 if($searchposts_in_title_after==1){
    ?>
<p style="margin-left: 10px;">
      <label style="font-size:15px;"><input type="checkbox" class="cb remove_searchposts_in_title_after_<?php echo esc_attr($key); ?>" onchange="cbChange(this)" /><?php esc_html_e("Remove search form after menu ","milun-search"); 
     echo esc_attr($key);
  ?></label>
 </p>
    <?php
}
?>
   
   <p>
      <label style="font-size:15px;"><input type="checkbox" class="cb searchposts_in_title_before" onchange="cbChange(this)"  name="searchposts_in_title_before_<?php echo esc_attr($key); ?>" value="1"  <?php checked(esc_attr($sanitized_checkbox_menu_before), 1 ); ?>/><?php 
    /* translators: Display search form in menu. */
 esc_html_e("Display search form before menu ", 'milun-search'); echo esc_attr($key);

  ?></label>
 </p>
  <?php

if($searchposts_in_title_before==1 ){
    ?>
<p style="margin-left: 10px;">
      <label style="font-size:15px;"><input type="checkbox" class="cb remove_searchposts_in_title_before_<?php echo esc_attr($key); ?>" onchange="cbChange(this)" /><?php esc_html_e("Remove search form before menu ","milun-search"); 
     echo esc_attr($key);
  ?></label>
 </p>
    <?php
}
 } 
     //  print_r($new_key[0]); $menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='formMenus' AND meta_value !=''");
 }              
?>






<?php 
$nav_menus      = wp_get_nav_menus();

 


        $chosen_menu = '';    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='formMenusValue' AND meta_value !=''");

?>
<br>
                    <?php
                   


     $chosen_menu = @$menu[0]->meta_value;
       

   foreach ($nav_menus as $nav_menu) :
if($nav_menu->term_id==@$menu[0]->meta_value){
 ?><p class="WooSelectedPodMenu"><?php esc_html_e( 'Search form is going appear to appear in this menu:','milun-search' ); ?>
   <?php esc_attr($nav_menu->name); ?> 
    <?php
         }   endforeach;
?>
         


</p>
<?php



  $search_form_before_loop = esc_attr(get_post_meta( get_the_ID(),"search_form_before_loop", true));


$sanitized_checkbox_search_form_before_loop= $search_form_before_loop==1? $this->dmsfp_prefix_sanitize_input($search_form_before_loop, 1): ''; 

             
 ?>
   
<p>
      <label style="font-size:15px;"><input type="checkbox" value="1" name="search_form_before_loop" <?php checked(esc_attr($sanitized_checkbox_search_form_before_loop), 1 ); ?>><?php esc_html_e("Display search form before loop","milun-search"); ?></label>
 </p>
 <?php
        //Display how many of posts is in a current category
   $search_categories_woo = esc_attr(get_post_meta( get_the_ID(),"search_categories_woo", true));


   $sanitized_checkbox_category_count_2 = $search_categories_woo ==1? $this->dmsfp_prefix_sanitize_input($search_categories_woo, 1): '';
    ?>
    <p>
      <label><input type="checkbox" id="search_categories_woo" name="search_categories_woo" value="1"  <?php checked(esc_attr($sanitized_checkbox_category_count_2), 1 ); ?>/><?php _e("Check to search categories","searching-for-posts"); ?></label>
 </p>
 <h4><?php _e("Click on category you want to exclude",'milun-search') ?></h4>
  <input type="text" class="search-woo_categories" placeholder="Search categories"/>
                       <div class="admin-container">        

 <?php
 /*
           $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

              $taxonomies = get_taxonomies( $args, $output, $operator );

*/


          $product_cat = get_terms(
                      array(
                          'taxonomy' =>'product_cat',
                          'hide_empty' => true,
                      )
                  ); 
     

?>



<br>
<p>
    <div id='milunsearch_hide_show'></div>


</p>
 

<?php

    $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

             // $post_types = get_post_types( $args, $output, $operator );
              $taxonomies = get_taxonomies( $args, $output, $operator );



    


          $terms_cat = get_terms(
                      array(
                          'taxonomy' =>'product_cat',
                          'hide_empty' => true,
                         

                  ));
     
        
    
      

     

 global $wpdb;            


       $categories_2 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id

         WHERE wp_term_taxonomy.taxonomy ='product_cat' AND wp_term_taxonomy.count > 0
    "));
       foreach ($categories_2 as $category) {
          $double_woo_term_id = get_post_meta(get_the_ID(), $category->term_id,'woo_cat_33'); 
if($category->name!="" && $category->slug!="uncategorized"){
            ?>

      <div class='woo_categories'>                           
        <div <?php echo $double_woo_term_id =='woo_cat_33' ? "style='background-color:pink; color:white;'":"'style='background-color:white; color:grey;'"; ?>
 onclick='myWooCategoryFunction(<?php  echo $category->term_id ?>);'><?php echo $category->name." ( ".$category->count ." )"; ?></div>
      </div>

<?php   
  }
}?>          
    <div class="woo_category"></div> 
    <div class="woo_category_empty"></div> 
</div>
<?php
 $standard_form = esc_attr(get_post_meta( get_the_ID(),"standard_form", true));


   $sanitized_checkbox_standard_form = $standard_form ==1? $this->dmsfp_prefix_sanitize_input($standard_form, 1): ''; 

   $full_width_form = esc_attr(get_post_meta( get_the_ID(),"full_width_form", true));


   $sanitized_checkbox_full_width_form = $full_width_form ==1? $this->dmsfp_prefix_sanitize_input($full_width_form, 1): '';
   
    $pop_up_form = esc_attr(get_post_meta( get_the_ID(),"pop_up_form", true));


   $sanitized_checkbox_pop_up_form = $pop_up_form ==1? $this->dmsfp_prefix_sanitize_input($pop_up_form, 1): '';
 
   ?>
<p>
      <label style="font-size:15px;"><input class="form" onchange="shape_of_form(this)" type="checkbox" value="1" name="standard_form" <?php checked(esc_attr($sanitized_checkbox_standard_form), 1 ); ?>><?php esc_html_e("Standard form","milun-search"); ?></label>
 </p>
 <p>
      <label style="font-size:15px;"><input class="form" onchange="shape_of_form(this)" type="checkbox" name="full_width_form" value="1"  <?php checked(esc_attr($sanitized_checkbox_full_width_form), 1 ); ?>><?php esc_html_e("Full width form","milun-search"); ?></label>
 </p>
 <p>
      <label style="font-size:15px;"><input class="form" onchange="shape_of_form(this)" type="checkbox" name="pop_up_form" value="1"  <?php checked(esc_attr($sanitized_checkbox_pop_up_form), 1 ); ?>><?php esc_html_e("Pop up form","milun-search"); ?></label>
 </p>
<?php

 //Display how many of posts is in a current category

   $search_by_woo_title = esc_attr(get_post_meta( get_the_ID(),"search_by_woo_title", true));


   $sanitized_checkbox_search_by_woo_title = $search_by_woo_title ==1? $this->dmsfp_prefix_sanitize_input($search_by_woo_title, 1): ''; 

   $search_by_woo_content = esc_attr(get_post_meta( get_the_ID(),"search_by_woo_content", true));


   $sanitized_checkbox_search_by_woo_content = $search_by_woo_content ==1? $this->dmsfp_prefix_sanitize_input($search_by_woo_content, 1): '';      
?>
   <h3><?php _e("Check option you want to search by",'milun-search') ?></h3>


<p>
      <label style="font-size:15px;"><input class="cb" onchange="cbChange(this)" type="checkbox" id="search_by_woo_title" name="search_by_woo_title" value="1"  <?php checked(esc_attr($sanitized_checkbox_search_by_woo_title), 1 ); ?>><?php esc_html_e("Search by title","milun-search"); ?></label>
 </p>
   

 
</p>

<p>
      <label><input class="cb" onchange="cbChange(this)" type="checkbox" id="search_by_woo_content" name="search_by_woo_content" value="1"  <?php checked(esc_attr($sanitized_checkbox_search_by_woo_content), 1 ); ?>><?php _e("Search by content","searching-for-posts"); ?></label>
 </p>
 <?php
 //Display how many of posts is in a current category
   $search_woo_attachment_and_images = esc_attr(get_post_meta( get_the_ID(),"search_woo_attachment_and_images", true));


   $sanitized_checkbox_search_woo_attachment_and_images = $search_woo_attachment_and_images ==1? $this->dmsfp_prefix_sanitize_input($search_woo_attachment_and_images, 1): ''; 
?>
<p>
      <label><input type="checkbox" id="search_woo_attachment_and_images" name="search_woo_attachment_and_images" value="1"  <?php checked(esc_attr($sanitized_checkbox_search_woo_attachment_and_images), 1 ); ?>><?php _e("Search by attachment and images","searching-for-posts"); ?></label>
 </p>
   

 
   
<p>
  <?php  

  $id =get_the_ID();?>


<?php
 //Number of posts that will be showing during searching
      $search_post_id_woo =  esc_attr(get_post_meta( get_the_ID(), 'search_post_id_woo', true ));
     
?>
<input  type="hidden" id="search_post_id_woo" name="search_post_id_woo" value="<?php echo $search_post_id_woo; ?>"> 
<?php
 //Number of posts that will be showing during searching
      $numberofpostswoo =  esc_attr(get_post_meta( get_the_ID(), 'numberofpostswoo', true ));
     
?>

 <p>
      <label for="numberofpostswoo"><?php _e('Select number of products (between 1 and 15) to show: ','milun-search'); ?></label>
      <input type="number" id="numberofpostswoo" name="numberofpostswoo" 
            value="<?php echo esc_attr(@$numberofpostswoo); ?>" 
           min="1" max="15">
</p>
 <br>
 <?php
   global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
//$meta_value_word = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofwordsinposts' AND meta_value !=''");
$numberofwordsinposts =  esc_attr(get_post_meta( get_the_ID(), 'numberofwordsinposts', true ));

?>
<p>
      <label style="font-size:15px;"><input type="number" id="numberofwordsinposts" name="numberofwordsinposts" min="7" max="30" value="<?php echo esc_attr(@$numberofwordsinposts); ?>" 
><?php esc_html_e("Number of words to show in posts","milun-search"); ?></label>
 </p>            

  <?php 
  

      $custom = get_post_meta( esc_attr($post->ID) );



    $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';
?>
  <label for="color_of_background"><?php _e('Color for background of posts: ','searching-for-posts'); ?></label>

          <input id="color_of_background" class="background_color_of_article" type="text" name="color_of_background" value="<?php esc_attr_e( $color_of_background ); ?>"/>
  <br>
  <br>
 

<?php


   

   
$datepicker_1 = ( isset( $custom['datepicker_1'.get_the_ID()][0] ) ) ? $custom['datepicker_1'.get_the_ID()][0] : '';
$datepicker_2 = ( isset( $custom['datepicker_2'.get_the_ID()][0] ) ) ? $custom['datepicker_2'.get_the_ID()][0] : '';    
?> 
<h5><?php esc_html_e("Date range of posts.",'milun-search') ?></h5>
<p style="font-size: 15px;"><?php esc_html_e("Start Date: ",'milun-search'); ?> <input type="text" name='datepicker_1' id="datepicker_1" value="<?php echo esc_attr($datepicker_1); ?>"></p>
<p style="font-size: 15px;"><?php esc_html_e("End Date: ",'milun-search'); ?> <input type="text" name='datepicker_2' id="datepicker_2" value="<?php echo esc_attr($datepicker_2); ?>"></p>

<?php



    //Display how many of posts is in a current category
   $show_products_with_and_without_password = esc_attr(get_post_meta( get_the_ID(),"show_products_with_and_without_password", 1));


   $sanitized_checkbox_category_count_5 = $show_products_with_and_without_password ==1? $this->dmsfp_prefix_sanitize_input($show_products_with_and_without_password, 1): ''; 
 

 ?> 
</p>

<p>
      <label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_with_and_without_password" name="show_products_with_and_without_password" value="1"  <?php checked(esc_attr($sanitized_checkbox_category_count_5), 1 ); ?>><?php _e("Show products with and without passwords","searching-for-products"); ?></label>
 </p>
   


<?php

    //Display how many of posts is in a current category
   $show_products_without_password = esc_attr(get_post_meta( get_the_ID(),"show_products_without_password", 1));


   $sanitized_checkbox_category_count_6 = $show_products_without_password ==1? $this->dmsfp_prefix_sanitize_input($show_products_without_password, 1): ''; 
 

 ?> 
</p>

<p>
      <label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_without_password" name="show_products_without_password" value="1"  <?php checked(esc_attr($sanitized_checkbox_category_count_6), 1 ); ?>><?php _e("Show products without passwords","searching-for-products"); ?></label>
 </p>


<?php
    //Display how many of posts is in a current category
   $show_products_with_password = esc_attr(get_post_meta( get_the_ID(),"show_products_with_password", true));


   $sanitized_checkbox_category_count_7 = $show_products_with_password ==1? $this->dmsfp_prefix_sanitize_input($show_products_with_password, 1): ''; 
 

 ?> 
</p>

<p>
      <label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_with_password" name="show_products_with_password" value="1"  <?php checked(esc_attr($sanitized_checkbox_category_count_7), 1 ); ?>><?php _e("Show products with passwords","searching-for-products"); ?></label>
 </p>





    <?php

  
global $wpdb;














$attributes = wc_get_attribute_taxonomies();
foreach ($attributes as $attribute) {
    $attribute->attribute_terms = get_terms(array(
        'taxonomy' => 'pa_'.$attribute->attribute_name,
        'hide_empty' => false,
    ));
}

   
    foreach( wc_get_attribute_taxonomies() as $value){
 //foreach($value as $val){

$visibility = trim($value->attribute_name,"pa_");
//print_r($value->attribute_name); 
/*
 $terms =get_post_meta( get_the_ID(), 'name_term_id_'.$value[0]->term_id, true );

$terms_checkbox = $terms ==1? $this->dmsfp_prefix_sanitize_input($terms, 1): '';   

 
         ?>                     
        <input type="checkbox" name="name_term_id_<?php echo $value[0]->term_id; ?>" class="class_term_id_<?php echo $value[0]->term_id; ?>" value="1"  <?php checked(esc_attr($terms_checkbox),1 ); ?>>
       
<?php
 $terms =get_post_meta( get_the_ID(), 'name_term_value_'.$value->taxonomy, $value[0]->taxonomy );
//$terms_checkbox = $terms ==1? $this->dmsfp_prefix_sanitize_input($terms, 1): '';   

 
         ?>                     

        <input type="hidden" name="name_term_value_<?php echo $value->taxonomy; ?>" value="<?php echo $value[0]->taxonomy; ?>">
<?php
*/ 
//print_r($value->attribute_name);       
//$visibility = trim($value->taxonomy,"pa_");
  //   echo "Show ". trim($value->taxonomy,"pa_");  
  //Display how many of posts is in a current category
?>





  
  
    
    <div id='parent-element'>
     <input type="text" id="term-<?php echo $value->attribute_name; ?>"  class="term" placeholder="Search <?php echo $value->attribute_name; ?>"/>
    <input type='hidden' id="myterm-<?php echo $value->attribute_name; ?>" value='<?php echo $value->attribute_name; ?>'/>
    </div> 

  <?php



    $posts = get_posts(
       ['post_type'=>'product_variation']
       
    );

foreach($value as $val){




$results =$val;
//$results =array_merge($value,$posts);
if(is_string($results)|| is_int($results)){

}else{
    
    
global $wpdb;

foreach ($results as $result) {
  $double_term_woo_name = get_post_meta(get_the_ID(), $result->slug,'woo_term');

  

  ?>
  <div class='terms-<?php echo $value->attribute_name; ?>'>                              
  <div <?php echo $double_term_woo_name =="woo_term"? "style='background-color:pink; color:grey;'":"'style='background-color:white; color:grey;'"; ?>onclick='myWooFunctionName(<?php  echo $result->term_id.", ". '"'.$result->slug.'"'.", ".'  "'.$value->attribute_name.'"'; ?>); '><?php echo $result->name; ?></div>
</div>
<?php
           
}
                             

                   
        
}}
?>

     <div class='results-<?php echo $value->attribute_name; ?>'>
     
  </div>   
<?php
}
 ?>
 

 <h5><?php _e("Click on term you want to exclude",'milun-search') ?></h5>
     <input type="text" class="search-visibility_of_product" placeholder="Search ratings"/>
           <div class="admin-container">        
 
<?php             
global $wpdb;








$files = $wpdb->get_results($wpdb->prepare("SELECT * FROM

    wp_posts
         LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
         LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
        LEFT JOIN wp_terms ON (
                wp_term_taxonomy.term_id = wp_terms.term_id
       )
        WHERE /* wp_terms.slug LIKE 'rated-%' AND */ wp_term_taxonomy.taxonomy = 'product_visibility'
        ORDER BY wp_terms.slug"
));



$result = array_map(function($x){
    return $x->slug;
}, $files);

$res = array_unique($result);



  foreach($res as $va){

   if($va==''){
     echo 'There is no ratings yet';
   }else{

$double_woo_rated = get_post_meta(get_the_ID(), $va,'woo_ratings51');

   

    if($va=='outofstock'  ||$va=='rated-1' ||$va=='rated-2'||$va=='rated-3'||$va=='rated-4'||$va=='rated-5'){
   

  ?>
<div class="visibility_of_products">
  <div <?php echo $double_woo_rated =='woo_ratings51' ? "style='background-color:pink; color:grey;'":"'style='background-color:white; color:grey;'"; ?>
    onclick='myWooRatingsFunction(<?php  echo '"'.$va.'"'; ?>)'><?php echo $va; ?></div>
</div>
  <?php   
  }
}?>          
    <div class="visibility_of_product"></div> 
    <div class="visibility_of_product_empty"></div>  
    <?php
}
             

 global $wpdb;
$users =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users LEFT JOIN wp_usermeta
ON wp_usermeta.user_id=wp_users.ID

"));
     
?>
</div>

<form>
  <div>
   <h4><?php _e("Click on author you want to exclude",'milun-search') ?></h4>
     <input type="text" class="search-woo_users" placeholder="Search users"/>

<div class="terms-container" contenteditable="true">
   <?php foreach ($users as $term) {
 
 
  if($term->meta_key=='nickname'){
      
    // print_r($term->meta_value); 
   //   $double_user = get_post_meta(get_the_ID(), $term->meta_key,$term->meta_value); 
//print_r($double_user);
$double_woo_user = get_post_meta(get_the_ID(), $term->meta_value,$term->meta_value."%ide_woo_user"); 
//$new_str = preg_replace('/hide_user$/', '', $double_woo_user);

         ?>
                  <div class="admin-container">        

        <div class="woo_users">                  
        <div id='exampleFormControlSelect2' <?php echo $double_woo_user==$term->meta_value."hide_woo_user" ? "style='background-color:pink; color:grey;'":"'style='background-color:white; color:grey;'"; ?> onclick='myWooUserFunction(<?php echo '"'.$term->meta_value.'"'; ?>);'><?php echo preg_replace('/hide_woo_user$/', '', $term->meta_value); ?></div>
   </div>
<?php

        }
      }   
      ?>          
    <div class="woo_user"></div> 
    <div class="woo_user_empty"></div>    
   
</div>
  </div> 
     
    </div>  
  </div>
  
</form>
  

<?php
 global $wpdb;
$rows =$wpdb->get_results( $wpdb->prepare("SELECT meta_value from wp_postmeta 

         LEFT JOIN wp_posts ON (wp_postmeta.post_id = wp_posts.ID)

         WHERE  meta_key = '_sku' 

"));
// 1) Normalize DB rows → plain values
$values = array_map(
    static fn($r) => (string) $r->meta_value,
    $rows
);

// 2) Fast lookup table
$lookup = array_flip($values);

// 3) Final output structure
$out = [];

foreach ($values as $v) {

    // skuhide version wins
    if (strpos($v, 'skuhide') !== false) {
        $clean = str_replace('skuhide', '', $v);
        $out[$clean] = [
            'label'    => $clean,
            'raw'      => $v,
            'hidden'   => true,
        ];
        continue;
    }

    // plain version loses if skuhide exists
    if (isset($lookup[$v . 'skuhide'])) {
        continue;
    }

    // plain version wins
    $out[$v] = [
        'label'    => $v,
        'raw'      => $v,
        'hidden'   => false,
    ];
}

// Print final list (unique)

?>
<form>
  <div>
   <h4><?php _e("Click on sku of product you want to exclude",'milun-search') ?></h4>
   <input type="text" class="search-sku" placeholder="Search sku of product">
<div class="terms-container">
             <div class="admin-container">        


<div class="skus">
    <?php foreach ($out as $item): ?>
        <div
            id="exampleFormControlSelect2"
            style="background-color: <?php echo $item['hidden'] ? 'pink' : 'white'; ?>; color: grey;"
            onclick="hideSkuFunction('<?php echo esc_js($item['label']); ?>');"
        >
            <?php echo esc_html($item['label']); ?>
        </div>
    <?php endforeach; ?>
</div>
    <?php

        ?>
        <div class="sku_results"></div>
<div class="sku_results_empty"></div>  
 
</div>
     
    </div>  
  </div>
  
</form>

<?php
 global $wpdb;
$title =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts 

         
         WHERE wp_posts.post_status ='publish' AND wp_posts.post_type = 'product' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'   || wp_posts.post_type = 'product_variation'  AND wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post'AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND wp_posts.post_type !='wp_navigation'AND wp_posts.post_type !='wp_global_styles'

"));

?>
<form>
  <div>
   <h4><?php _e("Click on the title of the product you want to exclude.",'searching-for-posts') ?></h4>
   <input type="text" class="search-title_of_product" placeholder="Search the title of the product">
<div class="terms-container">
         <div class="admin-container">        

   <?php



$my_titles = [];
$result_2 = array_map(function($x){
    return $x->post_title;
}, $title);


$my_titles = array_unique(array_values($result_2));

    foreach ($my_titles as $key =>$sk) {


        
/*
 
   // $meta_sk = htmlSpecialChars(html_entity_decode($sk));
$title_database =$wpdb->get_results( $wpdb->prepare("SELECT meta_value from wp_postmeta 

         
         WHERE wp_postmeta.meta_key='$sk' AND wp_postmeta.meta_value ='hidetitleproduct' 
"));
*/
$meta_sk =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $sk);

//$meta_sk = $sk;


 $double_title = get_post_meta(get_the_ID(), $meta_sk.'hidetitleproduct',$meta_sk);



         ?>
<div class="titles_of_products" id="title_of_product">
  <div <?php echo $double_title ==$meta_sk ? "style='background-color:pink; color:white;'":"'style='background-color:white; color:grey;'"; ?>
 onclick='hideTitleProductFunction(<?php echo esc_attr( '"'.$meta_sk.'"'); ?>);'><?php echo esc_attr($meta_sk); 
     ?>
 </div>
</div>
<?php


       
      }             
        ?>
        <div class="title_of_product"></div>
<div class="title_of_product_empty"></div>
<div class="no_product_titles"></div>  

</div>
 
</div>
     
     
  </div>
  
</form> 
</div>
 

     
     
  </div>
  
</form>

<?php

} else {
echo 'WooCommerce is not Active.';
}
}
/**
 * Saves the custom meta input
 */
function sfp_save_woo_meta_boxes( $post_id ) {
 
    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }




global $wpdb;
   $posts = get_posts(['post_type'=>'sfp_search_post']);


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'search_post_id_title' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'formMenus' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'formMenusValue' 
   AND pm.meta_value != ''");


}

                  $locations = get_theme_mod( 'nav_menu_locations' );
if(!empty($locations)){
   $new_key = [];
$new_value = [];
 foreach ($locations as $key =>$value){
  $new_key[] = $key;
 $new_value[] = $value;
 }  

  
}

   global $wpdb;
 // if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){ 

                  $locations = get_theme_mod( 'nav_menu_locations' );
  if($locations){ 
 foreach ($locations as $key =>$value){


if(isset($_POST[ "searchposts_in_title_after_".$key ]) ) {
  
 update_post_meta( $post_id, 'searchposts_in_title_after_'.$key,1);




}else{
    update_post_meta( $post_id, 'searchposts_in_title_after_'.$key,false);
 
}

if(isset($_POST[ "remove_searchposts_in_title_after_".$key ]) ) {
  
 update_post_meta( $post_id, 'searchposts_in_title_after_'.$key,false);


}


if(isset($_POST[ "searchposts_in_title_before_".$key ]) ) {
  
update_post_meta( $post_id, 'searchposts_in_title_before_'.$key,1);


}else{
  update_post_meta( $post_id, 'searchposts_in_title_before_'.$key,false);  
} 
if(isset($_POST[ "remove_searchposts_in_title_before_".$key ]) ) {
  
 update_post_meta( $post_id, 'remove_searchposts_in_title_before_'.$key,false);


}                
}
}
//} 


 

/*
global $wpdb;
   $posts = get_posts(['post_type'=>'sfp_search_post']);


foreach ($posts as $post) {
  

$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'search_post_id_woo' 
   AND pm.meta_value != ''");


}
foreach ($posts as $post) {
echo '<input type="hidden" id="search_post_id" value="' . esc_attr( $post->ID ) . '">';
}

foreach ($posts as $post) {
  

$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'search_post_id_title' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  

$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'WooFormMenus' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  

$wpdb->get_results("DELETE pm
  FROM wp_posts p
 INNER 
  JOIN wp_postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'WooFormMenusValue' 
   AND pm.meta_value != ''");


}
*/




                  $locations = get_theme_mod( 'nav_menu_locations' );
if(!empty($locations)){
   $new_key = [];

$new_value = [];
 foreach ($locations as $key =>$value){
  $new_key[] = $key;
 $new_value[] = $value;
 }  
     // Checks for input and saves - save checked as yes and unchecked at no



// Checks for input and saves - save checked as yes and unchecked at no
if(isset($_POST[ 'WooFormMenus']) && sanitize_text_field($_POST[ 'WooFormMenus' ])  && $_POST[ 'WooFormMenus']==$new_key[0]) {
 
 
  
    update_post_meta( $post_id, 'WooFormMenus', $new_key[0]);
     add_post_meta( $post_id, 'WooFormMenusValue', $new_value[0]);
  }
 
// Checks for input and saves - save checked as yes and unchecked at no
else if(isset($_POST[ 'WooFormMenus']) && sanitize_text_field($_POST[ 'WooFormMenus' ])  && $_POST[ 'WooFormMenus']==$new_key[1]) {
  
   update_post_meta( $post_id, 'WooFormMenus', $new_key[1]);
     add_post_meta( $post_id, 'WooFormMenusValue', $new_value[1]);
  }
  else if(isset($_POST[ 'WooFormMenus']) && sanitize_text_field($_POST[ 'WooFormMenus' ])  && $_POST[ 'WooFormMenus']==$new_key[2]) {
   
   update_post_meta( $post_id, 'WooFormMenus', $new_key[2]);
     add_post_meta( $post_id, 'WooFormMenusValue', $new_value[2]);
  }
  else if(isset($_POST[ 'WooFormMenus']) && sanitize_text_field($_POST[ 'WooFormMenus' ])  && $_POST[ 'WooFormMenus']==$new_key[3]) {
   
   update_post_meta( $post_id, 'WooFormMenus', $new_key[3]);
     add_post_meta( $post_id, 'WooFormMenusValue', $new_value[3]);
  }
  else if(isset($_POST[ 'WooFormMenus']) && sanitize_text_field($_POST[ 'WooFormMenus' ])  && $_POST[ 'WooFormMenus']==$new_key[4]) {
     
   update_post_meta( $post_id, 'WooFormMenus', $new_key[4]);
     add_post_meta( $post_id, 'WooFormMenusValue', $new_value[4]);
  }
  else{
     
     update_post_meta( $post_id, 'WooFormMenus', false );
    delete_post_meta( $post_id, 'WooFormMenusValue', false );
  }



}





// Checks for input and saves - save checked as yes and unchecked at no

add_post_meta( $post_id, 'search_post_id_woo', $post_id);

 
// Checks for input and saves - save checked as yes and unchecked at no
if(isset($_POST[ 'search_form_before_loop' ]) && sanitize_text_field($_POST[ 'search_form_before_loop' ])  ) {
    update_post_meta( $post_id, 'search_form_before_loop', $_POST[ 'search_form_before_loop' ] );
} else {
    update_post_meta( $post_id, 'search_form_before_loop', false );
}   
// Checks for input and saves - save checked as yes and unchecked at no
if(isset($_POST[ 'search_categories_woo' ]) && sanitize_text_field($_POST[ 'search_categories_woo' ])  ) {
    update_post_meta( $post_id, 'search_categories_woo', $_POST[ 'search_categories_woo' ] );
} else {
    update_post_meta( $post_id, 'search_categories_woo', false );
}   

// Checks for input and saves - save checked as yes and unchecked at no
if(isset($_POST[ 'numberofpostswoo' ]) && sanitize_text_field($_POST[ 'numberofpostswoo' ])  ) {
    update_post_meta( $post_id, 'numberofpostswoo', $_POST[ 'numberofpostswoo' ] );
} else {
    add_post_meta( $post_id, 'numberofpostswoo', 8 );
}


if(isset($_POST[ 'numberofwordsinposts' ]) && sanitize_text_field($_POST[ 'numberofwordsinposts' ])  ) {
    update_post_meta( $post_id, 'numberofwordsinposts', $_POST[ 'numberofwordsinposts' ] );
} else {
    add_post_meta( $post_id, 'numberofwordsinposts', 7 );
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

$attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();

if ($attribute_taxonomies) :
    foreach ($attribute_taxonomies as $tax) :
        if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0');
   
 endif;

    endforeach;
      foreach ($taxonomy_terms as $value) {


if( @$_POST["name_term_id_".$value[0]->term_id]  ) {
    update_post_meta( $post_id, "name_term_id_".$value[0]->term_id , 1  );
} else {
    update_post_meta( $post_id, "name_term_id_".$value[0]->term_id , 0 );
} 
if( @$_POST["name_term_value_".$value[0]->taxonomy]  ) {
    update_post_meta( $post_id, "name_term_value_".$value[0]->taxonomy, $_POST["name_term_value_".$value[0]->taxonomy]  );
} else {
    update_post_meta( $post_id, "name_term_value_".$value[0]->taxonomy, 0 );
} 

}
endif;

}
    


       



        $color_of_background = (isset($_POST['color_of_background']) && $_POST['color_of_background']!='') ? $_POST['color_of_background'] : '#fff';
    update_post_meta($post_id, 'color_of_background', $color_of_background);


     // Checks for input and saves - save checked as yes and unchecked at no

//if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){

if(isset($_POST[ 'datepicker_1' ]) && sanitize_text_field(wp_unslash($_POST[ 'datepicker_1' ])  )) {
    update_post_meta( $post_id, 'datepicker_1'.esc_attr($post_id), sanitize_text_field(wp_unslash($_POST[ 'datepicker_1' ])));
} else {
    update_post_meta( $post_id,  'datepicker_1'.esc_attr($post_id), false );
}
/*
if(isset($_POST[ 'standard_form' ]))  // && sanitize_text_field(wp_unslash($_POST['search_by_woo_title']))) {
    {
    update_post_meta( $post_id, 'standard_form', 1);
    
  
}  else {
    update_post_meta( $post_id, 'standard_form', 1 );
}
*/
if(isset($_POST[ 'standard_form' ]) && sanitize_text_field(wp_unslash($_POST['standard_form']))) {
          delete_post_meta( $post_id, 'full_width_form' );
           delete_post_meta( $post_id, 'pop_up_form' );
           update_post_meta( $post_id, 'standard_form', 1);

} 
if(isset($_POST[ 'full_width_form' ]) && sanitize_text_field(wp_unslash($_POST['full_width_form']))) {
           delete_post_meta( $post_id, 'standard_form' );
           delete_post_meta( $post_id, 'pop_up_form' );
           update_post_meta( $post_id, 'full_width_form', 1);

} 
if(isset($_POST[ 'pop_up_form' ]) && sanitize_text_field(wp_unslash($_POST['pop_up_form']))) {
           delete_post_meta( $post_id, 'standard_form' );
           delete_post_meta( $post_id, 'full_width_form' );
           update_post_meta( $post_id, 'pop_up_form', 1);

} 


if(isset($_POST[ 'search_by_woo_title' ]))  // && sanitize_text_field(wp_unslash($_POST['search_by_woo_title']))) {
    {
    update_post_meta( $post_id, 'search_by_woo_title', 1);
    
  
}  else {
    update_post_meta( $post_id, 'search_by_woo_title', 1 );
}


//if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){
// Checks for input and saves - save checked as yes and unchecked at no
    update_post_meta( $post_id, 'show_products_with_and_without_password', 1 );/*
if(isset($_POST[ 'show_products_with_and_without_password' ]) && sanitize_text_field(wp_unslash($_POST['show_products_with_and_without_password'])) ) {

     //  delete_post_meta( $post_id, 'show_products_with_and_without_password' );

    update_post_meta( $post_id, 'show_products_with_and_without_password', 1);
} else {
    update_post_meta( $post_id, 'show_products_with_and_without_password', 1 );
}*/
//}


//if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){

if(isset($_POST[ 'show_products_without_password' ]) && sanitize_text_field(wp_unslash($_POST['show_products_without_password'])) ) {


           delete_post_meta( $post_id, 'show_products_with_and_without_password' );
           
           update_post_meta( $post_id, 'show_products_without_password', 1);

} else {
    update_post_meta( $post_id, 'show_products_without_password', false );
}  
//}


//if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){
if(isset($_POST[ 'show_products_with_password' ])  && sanitize_text_field(wp_unslash($_POST['show_products_with_password']))) {

     delete_post_meta( $post_id, 'show_products_with_and_without_password' );


    update_post_meta( $post_id, 'show_products_with_password', 1);
} else {
    update_post_meta( $post_id, 'show_products_with_password', false );
}
 //}    


if(isset($_POST[ 'search_by_woo_content' ])  ) {


           delete_post_meta( $post_id, 'search_by_woo_title' );
           
           update_post_meta( $post_id, 'search_by_woo_content', 1);

} else {
    update_post_meta( $post_id, 'search_by_woo_content', false );
}  


//if( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'prfx_nonce' ])), basename( __FILE__ ) ) ){
 // Checks for input and saves - save checked as yes and unchecked at no
if(isset($_POST[ 'datepicker_2' ]) && sanitize_text_field(wp_unslash($_POST[ 'datepicker_2' ]) ) ) {
    update_post_meta( $post_id, 'datepicker_2'.esc_attr($post_id), sanitize_text_field(wp_unslash($_POST[ 'datepicker_2' ])));
} else {
    update_post_meta( $post_id,  'datepicker_2'.esc_attr($post_id),false);
}  
//} 


 }

 
}
endif;