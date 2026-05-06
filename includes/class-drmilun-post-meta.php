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
  /*  
    add_action("init",[$this,"sfp_register_and_save_meta_boxes"]);


      

    add_action( "rest_api_init", [$this,'namespace_register_search_post_types'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_post_types_half_sentence'] );
      add_action( "rest_api_init", [$this,'namespace_register_search_post_types_two_words'] );

add_action( "rest_api_init", [$this,'namespace_register_search_post_meta_data'] );
*/
add_action( "rest_api_init", [$this,'search_products'] );
add_action( "rest_api_init", [$this,'search_products_empty'] );
add_action( "rest_api_init", [$this,'search_products_half'] );
add_action( "rest_api_init", [$this,'search_products_two_words'] );
add_action( "rest_api_init", [$this,'search_products_two_words_and_half'] );

add_action( "rest_api_init", [$this,'search_products_three_words'] );
/*
//add_action( "rest_api_init", [$this,'search_products_by_author'] );
add_action( 'rest_api_init', [$this,'search_type_products']);
   // add_action( 'rest_api_init', [$this,'search_ratings']);
 add_action( 'rest_api_init', [$this,'search_empty_ratings']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_half_sentence']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_two_words']);
*/
 /*FOR WOO CATEGORIES FRONT END*/
      add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_zero'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_and_half'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_two_words'] );
    add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_double_two_words'] );

     add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_two_words_and_half'] );
          add_action( "rest_api_init", [$this,'namespace_register_search_woo_categories_three_words'] );
     add_action( "rest_api_init", [$this,'namespace_register_search_empty_woo_categories'] );

/*
    add_action( 'rest_api_init', [$this,'namespace_register_search_route']);
    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route']);
    
    add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_half_sentence']);


add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_around']);
add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_under']);

        add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_rat']);
*/



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
   add_meta_box( 'prfx_meta_form_woo', __( 'Woo Search Form', 'milun-woo-search' ), [$this,'dmsfp_woo_add_meta_callback_form'], 'sfp_search_post', 'normal', 'default'
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



/*
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
/*
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
*/













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
       'description' => esc_html__( 'The search term.', 'milun-woo-search' ),
       'type'        => 'string',
   ];
   $sen['se'] = [
       'description' => esc_html__( 'The search term.', 'milun-woo-search' ),
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
////////start AI////////////
function namespace_ajax_search_post_titles_of_products_no_words( $request ) {

	global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_titles = $wpdb->get_results(
    $wpdb->prepare(
        "
        SELECT *
        FROM {$wpdb->posts}
        WHERE post_status = %s
        AND post_type IN (%s, %s)
        AND post_type NOT IN (%s, %s, %s, %s, %s, %s, %s, %s)
        ",
        'publish',
        'product',
        'product_variation',
        'search_post',
        'woo_search_post',
        'revision',
        'is_search_form',
        'wp_template',
        'nav_menu_item',
        'wp_navigation',
        'wp_global_styles'
    )
);
return $post_titles;
/*
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_title_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_type
			WHERE $wpdb->posts.post_status = %s
			AND $wpdb->postmeta.meta_value = %s",
			'publish',
			'hidetitleproduct'
		)
	);

	if ( ! empty( $post_title_empty ) ) {

		$result = array_values(
			array_udiff(
				$post_titles,
				$post_title_empty,
				function ( $a, $b ) {
					return strcmp( $a->post_title, $b->post_title );
				}
			)
		);
		return $result;
	} else {
		return $post_titles;
	}*/
}

function namespace_ajax_search_empty_post_titles_of_products_no_words( $request ) {

global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_title_empty = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT {$wpdb->postmeta}.meta_value
		FROM {$wpdb->postmeta}
		WHERE {$wpdb->postmeta}.meta_key LIKE %s",
		'%' . $wpdb->esc_like( 'hidetitleproduct' ) . '%'
	)
);

return $post_title_empty;
}

function namespace_ajax_search_post_titles_of_products( $request ) {
global $wpdb;
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_titles = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->posts}
		WHERE post_title LIKE %s
		AND post_status = %s
		AND post_type IN ( %s, %s )
		",
		$post_slug_like,
		'publish',
		'product',
		'product_variation'
	)
);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_title_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_title
			WHERE $wpdb->posts.post_status = %s
			AND $wpdb->postmeta.meta_value = %s",
			'publish',
			'hidetitleproduct'
		)
	);

	if ( ! empty( $post_title_empty ) ) {

		$result = array_values(
			array_udiff(
				$post_titles,
				$post_title_empty,
				function ( $a, $b ) {
					return strcmp( $a->post_title, $b->post_title );
				}
			)
		);
		return $result;
	} else {
		return $post_titles;
	}
}

function namespace_ajax_search_empty_post_titles_of_products( $request ) {

$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_title_empty = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT {$wpdb->postmeta}.meta_value
		FROM {$wpdb->postmeta}
		WHERE {$wpdb->postmeta}.meta_key LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s",
		'%' . $wpdb->esc_like( 'hidetitleproduct' ) . '%',
		'%' . $wpdb->esc_like( $post_slug ) . '%'
	)
);

return $post_title_empty;
}

function namespace_ajax_search_post_titles_of_products_two_words( $request ) {

$post_slug = isset( $request['s'] ) ? sanitize_text_field( wp_unslash( $request['s'] ) ) : '';
$post_slug_second_word = isset( $request['se'] ) ? sanitize_text_field( wp_unslash( $request['se'] ) ) : '';

global $wpdb;

$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
$post_slug_second_like = '%' . $wpdb->esc_like( $post_slug_second_word ) . '%';

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_titles = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->posts}
		WHERE post_title LIKE %s
		AND post_title LIKE %s
		AND post_status = %s
		AND post_type IN ( %s, %s )
		",
		$post_slug_like,
		$post_slug_second_like,
		'publish',
		'product',
		'product_variation'
	)
);

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_title_empty = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_title
		WHERE $wpdb->posts.post_status = %s
		AND $wpdb->postmeta.meta_value = %s",
		'publish',
		'hidetitleproduct'
	)
);

if ( ! empty( $post_title_empty ) ) {

	$result = array_values(
		array_udiff(
			$post_titles,
			$post_title_empty,
			function ( $a, $b ) {
				return strcmp( $a->post_title, $b->post_title );
			}
		)
	);

	return $result;

} else {

	return $post_titles;

}
}

function namespace_ajax_search_empty_post_titles_of_products_two_words( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
$post_slug_second_word = isset( $request['se'] ) ? (string) $request['se'] : '';

global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_title_empty = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT {$wpdb->postmeta}.meta_value
		FROM {$wpdb->postmeta}
		WHERE {$wpdb->postmeta}.meta_key LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s",
		'%' . $wpdb->esc_like( 'hidetitleproduct' ) . '%',
		'%' . $wpdb->esc_like( $post_slug ) . '%',
		'%' . $wpdb->esc_like( $post_slug_second_word ) . '%'
	)
);

return $post_title_empty;
}

function namespace_ajax_search_post_titles_of_products_three_words( $request ) {

	$post_slug             = isset( $request['s'] ) ? sanitize_text_field( wp_unslash( $request['s'] ) ) : '';
$post_slug_second_word = isset( $request['se'] ) ? sanitize_text_field( wp_unslash( $request['se'] ) ) : '';
$post_slug_third_word  = isset( $request['ses'] ) ? sanitize_text_field( wp_unslash( $request['ses'] ) ) : '';

global $wpdb;

$post_slug_like        = '%' . $wpdb->esc_like( $post_slug ) . '%';
$post_slug_second_like = '%' . $wpdb->esc_like( $post_slug_second_word ) . '%';
$post_slug_third_like  = '%' . $wpdb->esc_like( $post_slug_third_word ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_titles = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->posts}
		WHERE post_status = %s
		AND post_type IN ( %s, %s )
		AND post_title LIKE %s
		AND post_title LIKE %s
		AND post_title LIKE %s
		",
		'publish',
		'product',
		'product_variation',
		$post_slug_like,
		$post_slug_second_like,
		$post_slug_third_like
	)
);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_title_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_title
			WHERE $wpdb->posts.post_status = %s
			AND $wpdb->postmeta.meta_value = %s",
			'publish',
			'hidetitleproduct'
		)
	);

	if ( ! empty( $post_title_empty ) ) {

		$result = array_values(
			array_udiff(
				$post_titles,
				$post_title_empty,
				function ( $a, $b ) {
					return strcmp( $a->post_title, $b->post_title );
				}
			)
		);
		return $result;
	} else {
		return $post_titles;
	}
}

function namespace_ajax_search_empty_post_titles_of_products_three_words( $request ) {
$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
$post_slug_second_word = isset( $request['se'] ) ? (string) $request['se'] : '';
$post_slug_third_word = isset( $request['ses'] ) ? (string) $request['ses'] : '';

global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$post_title_empty = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT {$wpdb->postmeta}.meta_value
		FROM {$wpdb->postmeta}
		WHERE {$wpdb->postmeta}.meta_key LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s
		AND {$wpdb->postmeta}.meta_value LIKE %s",
		'%' . $wpdb->esc_like( 'hidetitleproduct' ) . '%',
		'%' . $wpdb->esc_like( $post_slug ) . '%',
		'%' . $wpdb->esc_like( $post_slug_second_word ) . '%',
		'%' . $wpdb->esc_like( $post_slug_third_word ) . '%'
	)
);

return $post_title_empty;
}



function namespace_ajax_search_post_types( $request ) {

	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_types = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			WHERE $wpdb->posts.post_status = %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type != %s
			AND $wpdb->posts.post_type LIKE %s",
			'publish',
			'product',
			'search_post',
			'woo_search_post',
			'page',
			'product_variation',
			'revision',
			'is_search_form',
			'wp_template',
			'nav_menu_item',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_type_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_type
			WHERE $wpdb->posts.post_type LIKE %s
			AND $wpdb->postmeta.meta_value = %s",
			$post_slug_like,
			'post_hide'
		)
	);

	if ( ! empty( $post_type_empty ) ) {
		$result = array_values(
			array_udiff(
				$post_types,
				$post_type_empty,
				function ( $a, $b ) {
					return strcmp( $a->post_type, $b->post_type );
				}
			)
		);
		return $result;
	} else {
		return $post_types;
	}
}

function namespace_ajax_search_empty_post_types( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_type_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.post_type
			WHERE $wpdb->posts.post_status = %s
			AND $wpdb->posts.post_type LIKE %s
			AND $wpdb->postmeta.meta_value = %s",
			'publish',
			$post_slug_like,
			'post_hide'
		)
	);

	return $post_type_empty;
}

function namespace_ajax_search_meta_data_of_post_types( $request ) {

	global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$meta_data = $wpdb->get_results(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID
		WHERE $wpdb->posts.post_type != 'product'
		AND $wpdb->posts.post_type != 'product_variation'
		AND $wpdb->posts.post_type != 'search_post'
		AND $wpdb->posts.post_type != 'attachment'
		AND $wpdb->posts.post_type != 'search_post'
		AND $wpdb->posts.post_type != 'woo_search_post'
		AND $wpdb->posts.post_type != 'page'
		AND $wpdb->posts.post_type != 'nav_menu_item'
		AND $wpdb->posts.post_type != 'is_search_form'
		AND $wpdb->posts.post_type != 'wp_template'
		AND $wpdb->postmeta.meta_key NOT LIKE 'name_term_%'
		AND $wpdb->postmeta.meta_key != 'search_categories'
		AND $wpdb->postmeta.meta_key != '_wp_desired_post_slug'
		AND $wpdb->postmeta.meta_key != '_wp_trash_meta_time'
		AND $wpdb->postmeta.meta_key != '_wp_trash_meta_status'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'color_of_text'
		AND $wpdb->postmeta.meta_key != 'text_color_of_categories'
		AND $wpdb->postmeta.meta_key != 'color_of_background'
		AND $wpdb->postmeta.meta_key != 'color_of_the_load_more_btn'
		AND $wpdb->postmeta.meta_key != 'page'
		AND $wpdb->postmeta.meta_key != 'product'
		AND $wpdb->postmeta.meta_key != 'search_post'
		AND $wpdb->postmeta.meta_key != 'woo_search_post'
		AND $wpdb->postmeta.meta_key != '_edit_lock'
		AND $wpdb->postmeta.meta_key != 'search_post_id_title'
		AND $wpdb->postmeta.meta_value != '1'
		AND $wpdb->postmeta.meta_value != ''
		AND $wpdb->postmeta.meta_value != '0'"
	);

	$temp       = array_unique( array_column( $meta_data, 'post_title' ) );
	$unique_arr = array_intersect_key( $meta_data, $temp );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_meta_data_empty = $wpdb->get_results(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_value = $wpdb->posts.post_title
		WHERE $wpdb->postmeta.meta_key LIKE '%_meta'
		AND $wpdb->postmeta.meta_key NOT LIKE 'name_term_%'
		AND $wpdb->postmeta.meta_key != 'search_categories'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'color_of_text'
		AND $wpdb->postmeta.meta_key != 'text_color_of_categories'
		AND $wpdb->postmeta.meta_key != 'color_of_background'
		AND $wpdb->postmeta.meta_key != 'background_color_of_load_more_button'
		AND $wpdb->postmeta.meta_key != 'page'
		AND $wpdb->postmeta.meta_key != 'product'
		AND $wpdb->postmeta.meta_key != 'search_post'
		AND $wpdb->postmeta.meta_key != 'woo_search_post'
		AND $wpdb->postmeta.meta_key != '_edit_lock'
		AND $wpdb->postmeta.meta_key != 'search_post_id_title'
		AND $wpdb->postmeta.meta_value != '1'
		AND $wpdb->postmeta.meta_value != ''
		AND $wpdb->postmeta.meta_value != '0'"
	);

	if ( ! empty( $post_meta_data_empty ) ) {
		$result = array_values(
			array_udiff(
				$unique_arr,
				$post_meta_data_empty,
				function ( $a, $b ) {
					return strcmp( $a->post_title, $b->post_title );
				}
			)
		);
		return $result;
	} else {
		return array_values( $unique_arr );
	}
}

function namespace_ajax_search_meta_data_empty_of_post_types( $request ) {
	global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_meta_data = $wpdb->get_results(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_value = $wpdb->posts.post_title
		WHERE $wpdb->postmeta.meta_key LIKE '%_meta'
		AND $wpdb->postmeta.meta_key NOT LIKE 'name_term_%'
		AND $wpdb->postmeta.meta_key != 'search_categories'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
		AND $wpdb->postmeta.meta_key != 'color_of_text'
		AND $wpdb->postmeta.meta_key != 'text_color_of_categories'
		AND $wpdb->postmeta.meta_key != 'color_of_background'
		AND $wpdb->postmeta.meta_key != 'background_color_of_load_more_button'
		AND $wpdb->postmeta.meta_key != 'page'
		AND $wpdb->postmeta.meta_key != 'product'
		AND $wpdb->postmeta.meta_key != 'search_post'
		AND $wpdb->postmeta.meta_key != 'woo_search_post'
		AND $wpdb->postmeta.meta_key != '_edit_lock'
		AND $wpdb->postmeta.meta_key != 'search_post_id_title'
		AND $wpdb->postmeta.meta_value != '1'
		AND $wpdb->postmeta.meta_value != ''
		AND $wpdb->postmeta.meta_value != '0'"
	);

	return $post_meta_data;
}

function namespace_ajax_search_woo_terms( $request ) {
	global $wpdb;

	$terms_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$term       = isset( $request['term'] ) ? (string) $request['term'] : '';

	$taxonomy        = 'pa_' . $term;
	$terms_slug_like = '%' . $wpdb->esc_like( $terms_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$pageposts_1 = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
			WHERE IFNULL($wpdb->postmeta.meta_value, '') = ''
			AND $wpdb->term_taxonomy.taxonomy = %s
			AND $wpdb->terms.name LIKE %s",
			$taxonomy,
			$terms_slug_like
		)
	);

	return $pageposts_1;
}

function namespace_ajax_search_woo_terms_empty( $request ) {
	global $wpdb;

	$terms_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$term       = isset( $request['term'] ) ? (string) $request['term'] : '';

	$taxonomy        = 'pa_' . $term;
	$terms_slug_like = '%' . $wpdb->esc_like( $terms_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$pageposts_1 = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->term_taxonomy.taxonomy = %s
			AND $wpdb->terms.name LIKE %s",
			'33',
			$taxonomy,
			$terms_slug_like
		)
	);

	return $pageposts_1;
}

function namespace_ajax_search_sku( $request ) {
	global $wpdb;

	$sku_with_first_character = array();

	$sku_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$sku_slug_like       = '%' . $wpdb->esc_like( $sku_slug ) . '%';
	$sku_slug_first_like = $wpdb->esc_like( $sku_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$sku = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value NOT LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'_sku',
			'%kuhide',
			$sku_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$sku_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value NOT LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'_sku',
			'%kuhide',
			$sku_slug_first_like
		)
	);

	if ( ! empty( $sku_first_character ) ) {
		$sku_with_first_character = $sku_first_character;
	} else {
		$sku_with_first_character = $sku;
	}

	$sku_empty_with_first_character = array();
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'%kuhide',
			$sku_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'%kuhide',
			$sku_slug_first_like
		)
	);

	if ( ! empty( $sku_empty_first_character ) ) {
		$sku_empty_with_first_character = $sku_empty_first_character;
	} else {
		$sku_empty_with_first_character = $sku_empty;
	}

	if ( ! empty( $sku_empty_with_first_character ) ) {
		$result = array_values(
			array_udiff(
				$sku_with_first_character,
				$sku_empty_with_first_character,
				function ( $a, $b ) {
					return strcmp( $a->meta_value . 'skuhide', $b->meta_value );
				}
			)
		);
		return $result;
	} else {
		return $sku_with_first_character;
	}
}

function namespace_ajax_search_sku_empty( $request ) {
	global $wpdb;

	$sku_with_first_character = array();

	$sku_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$sku_slug_like       = '%' . $wpdb->esc_like( $sku_slug ) . '%';
	$sku_slug_first_like = $wpdb->esc_like( $sku_slug ) . '%';

	$sku_empty_with_first_character = array();
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$sku_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'%kuhide',
			$sku_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			'%kuhide',
			$sku_slug_first_like
		)
	);

	if ( ! empty( $sku_empty_first_character ) ) {
		$sku_empty_with_first_character = $sku_empty_first_character;
	} else {
		$sku_empty_with_first_character = $sku_empty;
	}

	return $sku_empty_with_first_character;
}

function namespace_ajax_search_user( $request ) {
	global $wpdb;

	$user_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$user_with_first_character = array();

	$user_slug_like       = '%' . $wpdb->esc_like( $user_slug ) . '%';
	$user_slug_first_like = $wpdb->esc_like( $user_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id
			WHERE $wpdb->users.user_login LIKE %s",
			$user_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$user_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id
			WHERE $wpdb->users.user_login LIKE %s",
			$user_slug_first_like
		)
	);

	if ( ! empty( $user_first_character ) ) {
		$user_with_first_character = $user_first_character;
	} else {
		$user_with_first_character = $user;
	}

	$user_empty_with_first_character = array();
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_like,
			'%hide_user'
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_first_like,
			'%hide_user'
		)
	);

	if ( ! empty( $user_empty_first_character ) ) {
		$user_empty_with_first_character = $user_empty_first_character;
	} else {
		$user_empty_with_first_character = $user_empty;
	}

//return $user_empty_with_first_character;
//return $totalArray;
if ( ! empty( $user_empty_with_first_character ) ) {
	/*$result = array_values(array_udiff($user_with_first_character, $user_empty_with_first_character, function ($a, $b) {
		return strcmp($a->user_login,$b->user_login);
	}));*/
	return array();
} else {
	return $user_with_first_character;
}

}

function namespace_ajax_search_user_empty( $request ) {

	global $wpdb;

	$user_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$user_empty_with_first_character = array();

	$user_slug_like       = '%' . $wpdb->esc_like( $user_slug ) . '%';
	$user_slug_first_like = $wpdb->esc_like( $user_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_like,
			'%hide_user'
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_first_like,
			'%hide_user'
		)
	);

	if ( ! empty( $user_empty_first_character ) ) {
		$user_empty_with_first_character = $user_empty_first_character;
	} else {
		$user_empty_with_first_character = $user_empty;
	}

	return $user_empty_with_first_character;
}

function namespace_ajax_search_woo_user( $request ) {
	global $wpdb;

	$user_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$user_with_first_character = array();

	$user_slug_like       = '%' . $wpdb->esc_like( $user_slug ) . '%';
	$user_slug_first_like = $wpdb->esc_like( $user_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT *
			FROM $wpdb->users
			LEFT JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id
			WHERE $wpdb->users.user_login LIKE %s",
			$user_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT *
			FROM $wpdb->users
			LEFT JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id
			WHERE $wpdb->users.user_login LIKE %s",
			$user_slug_first_like
		)
	);

	if ( ! empty( $user_first_character ) ) {
		$user_with_first_character = $user_first_character;
	} else {
		$user_with_first_character = $user;
	}

	$user_empty_with_first_character = array();
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$users = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_like,
			'%hide_woo_user'
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$user_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_first_like,
			'%hide_woo_user'
		)
	);

	if ( ! empty( $user_empty_first_character ) ) {
		$user_empty_with_first_character = $user_empty_first_character;
	} else {
		$user_empty_with_first_character = $user_empty;
	}

	//return $user_empty_with_first_character;
	//return $totalArray;
	if ( ! empty( $user_empty_with_first_character ) ) {
		/*$result = array_values(array_udiff($user_with_first_character, $user_empty_with_first_character, function ($a, $b) {
			return strcmp($a->user_login,$b->user_login);
		}));*/
		return array();
	} else {
		return $user_with_first_character;
	}
}

function namespace_ajax_search_woo_user_empty( $request ) {

	global $wpdb;

	$user_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$user_empty_with_first_character = array();

	$user_slug_like       = '%' . $wpdb->esc_like( $user_slug ) . '%';
	$user_slug_first_like = $wpdb->esc_like( $user_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_like,
			'%hide_woo_user'
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$user_empty_first_character = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->users
			LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_login = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$user_slug_first_like,
			'%hide_woo_user'
		)
	);

	if ( ! empty( $user_empty_first_character ) ) {
		$user_empty_with_first_character = $user_empty_first_character;
	} else {
		$user_empty_with_first_character = $user_empty;
	}

	return $user_empty_with_first_character;
}

function namespace_ajax_search_type_of_product( $request ) {
	global $wpdb;

	$type_of_product_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$type_of_product_slug_like = '%' . $wpdb->esc_like( $type_of_product_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$type_of_product = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.slug = $wpdb->postmeta.meta_key
			WHERE $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND IFNULL($wpdb->postmeta.meta_value, '') = ''
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND IFNULL($wpdb->postmeta.meta_value, '') = ''
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND IFNULL($wpdb->postmeta.meta_value, '') = ''
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND IFNULL($wpdb->postmeta.meta_value, '') = ''",
			$type_of_product_slug_like,
			'simple',
			$type_of_product_slug_like,
			'grouped',
			$type_of_product_slug_like,
			'variable',
			$type_of_product_slug_like,
			'external'
		),
		ARRAY_A
	);

	return $type_of_product;
}

function namespace_ajax_search_empty_type_of_product( $request ) {

	global $wpdb;

	$empty_type_of_product_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$empty_type_of_product_slug_like = '%' . $wpdb->esc_like( $empty_type_of_product_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$empty_type_of_product = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.slug = $wpdb->postmeta.meta_key
			WHERE $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$empty_type_of_product_slug_like,
			'simple',
			'%oo_type_prod52%',
			$empty_type_of_product_slug_like,
			'grouped',
			'%oo_type_prod52%',
			$empty_type_of_product_slug_like,
			'variable',
			'%oo_type_prod52%',
			$empty_type_of_product_slug_like,
			'external',
			'%oo_type_prod52%'
		),
		ARRAY_A
	);

	return $empty_type_of_product;
}

function namespace_ajax_search_visibility_of_product( $request ) {
global $wpdb;

$visibility_of_product_slug      = isset( $request['s'] ) ? sanitize_text_field( wp_unslash( $request['s'] ) ) : '';
$visibility_of_product_slug_like = '%' . $wpdb->esc_like( $visibility_of_product_slug ) . '%';

$allowed_slugs = array(
	'outofstock',
	'rated-1',
	'rated-2',
	'rated-3',
	'rated-4',
	'rated-5',
);

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$files = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT DISTINCT t.slug
		FROM {$wpdb->posts} p
		LEFT JOIN {$wpdb->term_relationships} tr
			ON p.ID = tr.object_id
		LEFT JOIN {$wpdb->term_taxonomy} tt
			ON tr.term_taxonomy_id = tt.term_taxonomy_id
		LEFT JOIN {$wpdb->terms} t
			ON tt.term_id = t.term_id
		WHERE tt.taxonomy = %s
		AND t.slug LIKE %s
		ORDER BY t.slug ASC
		",
		'product_visibility',
		$visibility_of_product_slug_like
	)
);

$result = array_map(
	function ( $x ) {
		return $x->slug;
	},
	$files
);

$res = array_unique( $result );

$matched_slugs = array();

foreach ( $res as $va ) {
	if ( in_array( $va, $allowed_slugs, true ) ) {
		$matched_slugs[] = $va;
	}
}

if ( empty( $matched_slugs ) ) {
	return array();
}

$placeholders = implode( ',', array_fill( 0, count( $matched_slugs ), '%s' ) );

// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$visibility_of_product = $wpdb->get_results(
	$wpdb->prepare(
		"
		SELECT *
		FROM {$wpdb->terms}
		WHERE slug IN ($placeholders)
		",
		$matched_slugs
	),
	ARRAY_A
);

return $visibility_of_product;
}

function namespace_ajax_search_empty_visibility_of_product( $request ) {

	global $wpdb;

	$empty_visibility_of_product_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$empty_visibility_of_product_slug_like = '%' . $wpdb->esc_like( $empty_visibility_of_product_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$empty_visibility_of_product = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.slug = $wpdb->postmeta.meta_key
			WHERE $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			|| $wpdb->terms.slug LIKE %s AND $wpdb->terms.slug = %s
			AND $wpdb->postmeta.meta_value LIKE %s",
			$empty_visibility_of_product_slug_like,
			'rated-1',
			'%oo_ratings51%',
			$empty_visibility_of_product_slug_like,
			'rated-2',
			'%oo_ratings51%',
			$empty_visibility_of_product_slug_like,
			'rated-3',
			'%oo_ratings51%',
			$empty_visibility_of_product_slug_like,
			'rated-4',
			'%oo_ratings51%',
			$empty_visibility_of_product_slug_like,
			'rated-5',
			'%oo_ratings51%',
			$empty_visibility_of_product_slug_like,
			'outofstock',
			'%oo_ratings51%'
		),
		ARRAY_A
	);

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


/*
function namespace_ajax_search_products( $request) {


$premium_file = include("woo_querys.php");
return $premium_file;  



}
*/
public function namespace_ajax_search_products( $request ) {


	require_once plugin_dir_path( __FILE__ ) . 'woo_querys.php';


	return milun_get_woo_search_results( $request );
}
function namespace_ajax_search_products_empty( $request) {


require_once plugin_dir_path( __FILE__ ) . 'woo_querys_empty.php';


	return milun_get_woo_search_results_empty( $request );



}



function namespace_ajax_search_products_two_words( $request) {


require_once plugin_dir_path( __FILE__ ) . 'woo_querys_two_words.php';


	return milun_get_woo_search_results_two_words( $request );





}


function namespace_ajax_search_products_three_words( $request) {



require_once plugin_dir_path( __FILE__ ) . 'woo_querys_three_words.php';


	return milun_get_woo_search_results_three_words( $request );



}


function namespace_ajax_search_products_with_ratings( $request) {
 

$post_slug =$request['s']; 


$premium_file = include("woo_querys.php");
//return $premium_file;   

}



function namespace_ajax_search_products_with_ratings_half_sentence( $request) {
 
$post_slug =$request['s']; 


$premium_file = include("woo_querys.php");
//return $premium_file;   

}


function namespace_ajax_search_products_with_ratings_two_words( $request) {
 
$post_slug =$request['s']; 

$premium_file = include("woo_querys_two_words.php");
//return $premium_file;   

}

function namespace_ajax_search_empty_ratings( $request ) {
	$terms_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	global $wpdb;

	$terms_slug_like = '%' . $wpdb->esc_like( $terms_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.slug = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_value = %s
			AND $wpdb->terms.slug LIKE %s",
			'woo_ratings51',
			$terms_slug_like
		)
	);

	if ( ! empty( $totalArray ) ) {
		$result = array_map(
			function( $x ) {
				return $x->slug;
			},
			$totalArray
		);

		$res = array_unique( $result );

		return $res;
	}
}

/*
function namespace_ajax_search_woo_products_2( $request) {
  $terms_slug = $request['s'];

global $wpdb;
       $files =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
                LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.ID


         WHERE  $wpdb->posts.post_title LIKE '%$terms_slug%'
    "));

 $totalArray =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
                LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->posts.ID


         WHERE  $wpdb->postmeta.meta_value = 'woo_pro_33' AND $wpdb->posts.post_title LIKE '%$terms_slug%'
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
function namespace_ajax_search_2_woo( $request ) {
	$terms_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$files = $wpdb->get_results(
		"SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
		LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_id
		LEFT JOIN $wpdb->terms ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
		LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->terms.term_id"
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->terms ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->terms.term_id
			WHERE $wpdb->postmeta.meta_value = %s",
			'33'
		)
	);
	//return $totalArray;

	$files_record_20 = array();
	$post_title      = array();

	foreach ( $totalArray as $key => $value ) {
		if ( ! in_array( $value->post_title, $post_title, true ) ) {
			$post_title[]            = $value->post_title;
			$files_record_20[ $key ] = $value;
		}
	}

	return array_values( $files_record_20 );

	if ( ! empty( $totalArray ) ) {
		$result_19 = array_values(
			array_udiff(
				$files,
				$totalArray,
				function( $a, $b ) {
					return strcmp( $a->post_title, $b->post_title );
				}
			)
		);

		$result_20 = array_map(
			function( $x ) {
				return $x;
			},
			$result_19
		);

		$files_record_20 = array();
		$post_title      = array();

		foreach ( $result_20 as $key => $value ) {
			if ( ! in_array( $value->post_title, $post_title, true ) ) {
				$post_title[]            = $value->post_title;
				$files_record_20[ $key ] = $value;
			}
		}

		return array_values( $files_record_20 );

	} else {
		$result_20 = array_map(
			function( $x ) {
				return $x;
			},
			$result_19
		);

		$files_record_20 = array();
		$post_title      = array();

		foreach ( $files as $key => $value ) {
			if ( ! in_array( $value->post_title, $post_title, true ) ) {
				$post_title[]            = $value->post_title;
				$files_record_20[ $key ] = $value;
			}
		}

		return array_values( $files_record_20 );
	}
}

function namespace_ajax_search_2_woo_half_sentence( $request ) {






	//return $premium_file;

}
/*
function namespace_ajax_search_2_woo_sentence( $request) {
 $post_slug =$request['s'];
   $sentence =$request['se'];

 //$price =$request['id'];


    global $wpdb;
  $products = $wpdb->get_results( "SELECT * FROM $wpdb->posts
    LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID =$wpdb->postmeta.post_id



   WHERE $wpdb->posts.post_type = 'product' AND $wpdb->posts.post_title LIKE '%$post_slug%' AND $wpdb->posts.post_title LIKE '%$sentence%'" );

$variation = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE $wpdb->posts.post_type = 'product' AND (($wpdb->posts.post_status = 'publish')) GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date" );

return $products;

  }
*/
function namespace_ajax_search_2_woo_price( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$pr_num    = isset( $request['pr'] ) ? (string) $request['pr'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$products = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value = %s - '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s
			GROUP BY $wpdb->posts.ID
			ORDER BY $wpdb->posts.post_date",
			'_regular_price',
			$pr_num,
			'product',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$products_2 = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s $wpdb->postmeta.meta_value = %s - '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s
			GROUP BY $wpdb->posts.ID
			ORDER BY $wpdb->posts.post_date",
			'_sale_price',
			$pr_num,
			'product',
			$post_slug_like
		)
	);

	$result = array_merge( $products, $products_2 );

	return $result;

	//   return $sale_products;
}

function namespace_ajax_search_2_woo_price_around( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$pr_num    = isset( $request['pr'] ) ? (string) $request['pr'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$regular_price = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value >= %s - %s
			AND $wpdb->postmeta.meta_value <= %s + %s
			AND $wpdb->posts.post_title LIKE %s",
			'_regular_price',
			$pr_num,
			$pr_num,
			$pr_num,
			$pr_num,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sale_price = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value >= %s - %s
			AND $wpdb->postmeta.meta_value <= %s + %s
			AND $wpdb->posts.post_title LIKE %s",
			'_sale_price',
			$pr_num,
			$pr_num,
			$pr_num,
			$pr_num,
			$post_slug_like
		)
	);

	// Variable product only
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$variation_price_regular = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->posts.post_type = %s
			AND $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value >= %s - %s
			AND $wpdb->postmeta.meta_value <= %s + %s
			AND $wpdb->posts.post_title LIKE %s",
			'product_variation',
			'_regular_price',
			$pr_num,
			$pr_num,
			$pr_num,
			$pr_num,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$variation_price_sale = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->posts.post_type = %s
			AND $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value >= %s - %s
			AND $wpdb->postmeta.meta_value <= %s + %s
			AND $wpdb->posts.post_title LIKE %s",
			'product_variation',
			'_sale_price',
			$pr_num,
			$pr_num,
			$pr_num,
			$pr_num,
			$post_slug_like
		)
	);
	// Variable product only
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
			LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug = $wpdb->postmeta.meta_key)
			WHERE
			$wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-1'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-2'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-3'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-4'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-5'
			|| $wpdb->posts.post_type = 'product' AND $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'outofstock'",
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray_users = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->users.user_login
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->posts.post_title LIKE %s",
			'%user',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON
			$wpdb->postmeta.post_id = $wpdb->posts.ID || $wpdb->postmeta.meta_key = $wpdb->posts.post_name
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->posts.post_title LIKE %s",
			'%kuhide',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$type = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
			LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug = $wpdb->postmeta.meta_key)
			WHERE
			$wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'simple'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'grouped'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'variable'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'external'",
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$first_meta_data = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->terms ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->terms.term_id || $wpdb->postmeta.meta_key = $wpdb->term_taxonomy.taxonomy
			WHERE $wpdb->postmeta.meta_value = %s || $wpdb->postmeta.meta_value = %s",
			'visibilty_term70',
			'33'
		)
	);

	$premium_file = include 'querys_with_around_and_under_price.php';
	return $premium_file;
}

function namespace_ajax_search_2_woo_price_under( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$pr_num    = isset( $request['pr'] ) ? (string) $request['pr'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$regular_price = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value < %s + '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s",
			'_regular_price',
			$pr_num,
			'product',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$variation_price_regular = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value < %s + '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s",
			'_regular_price',
			$pr_num,
			'product_variation',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$variation_price_sale = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value < %s + '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s",
			'_sale_price',
			$pr_num,
			'product_variation',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sale_price = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value < %s + '0'
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s",
			'_sale_price',
			$pr_num,
			'product',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$totalArray = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
			LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug = $wpdb->postmeta.meta_key)
			WHERE
			$wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-1'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-2'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-3'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-4'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'rated-5'
			|| $wpdb->posts.post_type = 'product' AND $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'outofstock'",
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray_users = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->users.user_login
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->posts.post_title LIKE %s",
			'%user',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$sku = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON
			$wpdb->postmeta.post_id = $wpdb->posts.ID || $wpdb->postmeta.meta_key = $wpdb->posts.post_name
			WHERE $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->posts.post_title LIKE %s",
			'%kuhide',
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$type = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
			LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug = $wpdb->postmeta.meta_key)
			WHERE
			$wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'simple'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'grouped'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'variable'
			|| $wpdb->posts.post_title LIKE %s AND $wpdb->postmeta.meta_key = 'external'",
			$post_slug_like,
			$post_slug_like,
			$post_slug_like,
			$post_slug_like
		)
	);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$first_meta_data = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->terms ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_key = $wpdb->terms.term_id || $wpdb->postmeta.meta_key = $wpdb->term_taxonomy.taxonomy
			WHERE $wpdb->postmeta.meta_value = %s || $wpdb->postmeta.meta_value = %s",
			'visibilty_term70',
			'33'
		)
	);

	$premium_file = include 'querys_with_around_and_under_price.php';
	return $premium_file;
}

function namespace_ajax_search_2_woo_rat( $request ) {
	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$rati      = isset( $request['id'] ) ? (string) $request['id'] : '';

	global $wpdb;

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$products_2 = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = %s
			AND $wpdb->postmeta.meta_value = %s
			AND $wpdb->posts.post_type = %s
			AND $wpdb->posts.post_title LIKE %s",
			'_wc_average_rating',
			$rati,
			'product',
			$post_slug_like
		)
	);

	return $products_2;
}

function return_post_meta_data( $request ) {
	global $wpdb;

	$post_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	$post_slug_like = '%' . $wpdb->esc_like( $post_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$post_meta_data = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_value = $wpdb->posts.post_title
			WHERE $wpdb->posts.post_title LIKE %s
			AND $wpdb->postmeta.meta_key LIKE %s
			AND $wpdb->postmeta.meta_key NOT LIKE %s
			AND $wpdb->postmeta.meta_key != 'search_categories'
			AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
			AND $wpdb->postmeta.meta_key != 'searchposts_in_title'
			AND $wpdb->postmeta.meta_key != 'color_of_text'
			AND $wpdb->postmeta.meta_key != 'text_color_of_categories'
			AND $wpdb->postmeta.meta_key != 'color_of_background'
			AND $wpdb->postmeta.meta_key != 'background_color_of_load_more_button'
			AND $wpdb->postmeta.meta_key != 'page'
			AND $wpdb->postmeta.meta_key != 'product'
			AND $wpdb->postmeta.meta_key != 'search_post'
			AND $wpdb->postmeta.meta_key != 'woo_search_post'
			AND $wpdb->postmeta.meta_key != '_edit_lock'
			AND $wpdb->postmeta.meta_key != 'search_post_id_title'
			AND $wpdb->postmeta.meta_value != '1'
			AND $wpdb->postmeta.meta_value != ''
			AND $wpdb->postmeta.meta_value != '0'",
			$post_slug_like,
			'%_meta',
			'name_term_%'
		)
	);

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

  function namespace_ajax_search_3( $request ) {
	$args = array(
		'public'            => true,
		'show_in_nav_menus' => true,
		//'_builtin' => false
	);

	$output   = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	$post_types = get_post_types( $args, $output, $operator );
	$taxonomies = get_taxonomies( $args, $output, $operator );

	$terms_cat = get_terms(
		array(
			'taxonomy'   => $taxonomies,
			'hide_empty' => true,
		)
	);

	global $wpdb;

	$category_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$category_like = '%' . $wpdb->esc_like( $category_slug ) . '%';

	$posts = get_posts( array( 'post_type' => 'search_post' ) );

	foreach ( $posts as $post ) {
		$search_categories = esc_attr( get_post_meta( $post->ID, 'search_categories', true ) );
		if ( $search_categories == '1' ) {
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$pageposts_1 = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM $wpdb->terms
					LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
					LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
					WHERE IFNULL($wpdb->postmeta.meta_value, '') = ''
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy NOT LIKE %s
					AND $wpdb->terms.name LIKE %s
					|| $wpdb->postmeta.meta_value != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy != %s
					AND $wpdb->term_taxonomy.taxonomy NOT LIKE %s
					AND $wpdb->terms.name LIKE %s",
					'wp_theme',
					'product_cat',
					'nav_menu',
					'product_type',
					'product_visibility',
					'pa%',
					$category_like,
					'11',
					'wp_theme',
					'product_cat',
					'nav_menu',
					'product_type',
					'product_visibility',
					'pa%',
					$category_like
				)
			);

			return $pageposts_1;
		}
	}
}

/***FOR WOO CATEGORIES **/
function namespace_searching_woo_categories( $request ) {

	global $wpdb;

	$woo_category_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$woo_categories = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT DISTINCT t.*, tt.count
			FROM {$wpdb->terms} AS t
			INNER JOIN {$wpdb->term_taxonomy} AS tt
				ON t.term_id = tt.term_id
			LEFT JOIN {$wpdb->postmeta} AS pm
				ON pm.meta_key = t.term_id
			WHERE tt.taxonomy = %s
			AND t.name LIKE %s
			AND pm.meta_value IS NULL
			AND t.name != %s",
			'product_cat',
			'%' . $wpdb->esc_like( $woo_category_slug ) . '%',
			'Uncategorized'
		)
	);

	return $woo_categories;
}

function namespace_searching_empty_woo_categories( $request ) {
	global $wpdb;

	$woo_category_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$woo_category_like = '%' . $wpdb->esc_like( $woo_category_slug ) . '%';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$empty_woo_categories = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->terms
			LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
			WHERE $wpdb->term_taxonomy.taxonomy = %s
			AND $wpdb->postmeta.meta_value LIKE %s
			AND $wpdb->terms.name LIKE %s",
			'product_cat',
			'%oo_cat_33%',
			$woo_category_like
		)
	);

	return $empty_woo_categories;
}

function namespace_ajax_search_woo_woo_terms_2( $request ) {
	$id            = isset( $request['id'] ) ? (string) $request['id'] : '';
	$category_slug = isset( $request['s'] ) ? (string) $request['s'] : '';

	global $wpdb;

	$category_like = '%' . $wpdb->esc_like( $category_slug ) . '%';

	$search_categories_woo = esc_attr( get_post_meta( $id, 'search_categories_woo', true ) );
	if ( $search_categories_woo == '1' ) {
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$files = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->terms
				LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
				LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
				WHERE $wpdb->term_taxonomy.taxonomy = %s
				AND $wpdb->terms.slug LIKE %s",
				'product_cat',
				$category_like
			)
		);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$totalArray = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->terms
				LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
				LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
				WHERE $wpdb->postmeta.meta_value = %s
				AND $wpdb->term_taxonomy.taxonomy = %s
				AND $wpdb->postmeta.post_id = %s",
				'woo_cat_33',
				'product_cat',
				$id
			)
		);

		if ( ! empty( $totalArray ) ) {
			$result = array_values(
				array_udiff(
					$files,
					$totalArray,
					function ( $a, $b ) {
						return strcmp( $a->name, $b->name );
					}
				)
			);
			return $result;
		} else {
			return $files;
		}
	}
}

function namespace_ajax_search_woo_terms_3( $request ) {

	global $wpdb;

	$terms_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$term       = isset( $request['term'] ) ? (string) $request['term'] : '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$pageposts_3 = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT *
			FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_taxonomy_id = $wpdb->terms.term_id)
			LEFT JOIN $wpdb->postmeta ON $wpdb->terms.slug = $wpdb->postmeta.meta_key
			WHERE $wpdb->postmeta.meta_key = %s",
			'color'
		)
	);

	return $pageposts_3;
}

function namespace_ajax_search_3_empty_woo( $request ) {
	$args = array(
		'public'            => true,
		'show_in_nav_menus' => true,
		//'_builtin' => false
	);

	$output   = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	//$post_types = get_post_types( $args, $output, $operator );
	$taxonomies = get_taxonomies( $args, $output, $operator );

	$product_cat = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
		)
	);

	global $wpdb;

	$category_slug = isset( $request['s'] ) ? (string) $request['s'] : '';
	$category_like = '%' . $wpdb->esc_like( $category_slug ) . '%';

	foreach ( $product_cat as $term ) {

		//var_dump($term);
		$double_woo_term_id = get_post_meta( get_the_ID(), $term->term_id, get_the_ID() );
		// if($double_woo_term_id!=get_the_ID()){
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$pageposts_1 = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->terms
				LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
				LEFT JOIN $wpdb->postmeta ON $wpdb->terms.term_id = $wpdb->postmeta.meta_key
				LEFT JOIN $wpdb->posts ON $wpdb->postmeta.meta_value = $wpdb->posts.ID
				WHERE $wpdb->term_taxonomy.taxonomy != %s
				AND IFNULL($wpdb->postmeta.meta_value, '') = ''
				AND $wpdb->term_taxonomy.taxonomy = %s
				AND $wpdb->term_taxonomy.taxonomy != %s
				AND $wpdb->term_taxonomy.taxonomy != %s
				AND $wpdb->term_taxonomy.taxonomy != %s
				AND $wpdb->term_taxonomy.taxonomy NOT LIKE %s
				AND $wpdb->terms.name LIKE %s",
				'nav_menu',
				'product_cat',
				'category',
				'product_type',
				'product_visibility',
				'pa%',
				$category_like
			)
		);
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
public function dmsfp_prefix_sanitize_input( $input, $expected_value = 'yes' ) {
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
		'posts'      => __( 'Search Posts', 'milun-woo-search' ),
		'categories' => __( 'Search Categories', 'milun-woo-search' ),
	);
}

////// WOO POST META//////////////

public function dmsfp_woo_add_meta_callback_form( $post ) {
if ( class_exists( 'WooCommerce' ) ) {
 	wp_nonce_field( 'milun_save_woo_settings', 'prfx_nonce_woo' );

		$prfx_stored_meta = get_post_meta( esc_attr( $post->ID ) );
		?>
<p>
		<?php
		global $wpdb;

		$locations = get_theme_mod( 'nav_menu_locations' );
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery
		//$menu = $wpdb->get_results("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key ='searchposts_in_title' AND meta_value !=''");
		if ( $locations ) {
			foreach ( $locations as $key => $value ) {

				$searchposts_in_title_after        = esc_attr( get_post_meta( get_the_ID(), 'searchposts_in_title_after_' . $key, true ) );
				$sanitized_checkbox_menu_after     = $searchposts_in_title_after == 1 ? $this->dmsfp_prefix_sanitize_input( $searchposts_in_title_after, 1 ) : '';

				$searchposts_in_title_before       = esc_attr( get_post_meta( get_the_ID(), 'searchposts_in_title_before_' . $key, true ) );
				$sanitized_checkbox_menu_before    = $searchposts_in_title_before == 1 ? $this->dmsfp_prefix_sanitize_input( $searchposts_in_title_before, 1 ) : '';
				?>
<p>
	<label style="font-size:15px;"><input type="checkbox" class="cb searchposts_in_title_after_<?php echo esc_attr( $key ); ?>" onchange="cbChange(this)" name="searchposts_in_title_after_<?php echo esc_attr( $key ); ?>" value="1" <?php checked( esc_attr( $sanitized_checkbox_menu_after ), 1 ); ?>/><?php
	/* translators: Display search form in menu. */
	esc_html_e( 'Display search form after menu ', 'milun-woo-search' );
	echo esc_attr( $key );

	?></label>
</p>
				<?php
				if ( $searchposts_in_title_after == 1 ) {
					?>
<p style="margin-left: 10px;">
	<label style="font-size:15px;"><input type="checkbox" class="cb remove_searchposts_in_title_after_<?php echo esc_attr( $key ); ?>" onchange="cbChange(this)" /><?php
	esc_html_e( 'Remove search form after menu ', 'milun-woo-search' );
	echo esc_attr( $key );
	?></label>
</p>
					<?php
				}
				?>

<p>
	<label style="font-size:15px;"><input type="checkbox" class="cb searchposts_in_title_before" onchange="cbChange(this)" name="searchposts_in_title_before_<?php echo esc_attr( $key ); ?>" value="1" <?php checked( esc_attr( $sanitized_checkbox_menu_before ), 1 ); ?>/><?php
	/* translators: Display search form in menu. */
	esc_html_e( 'Display search form before menu ', 'milun-woo-search' );
	echo esc_attr( $key );

	?></label>
</p>
				<?php

				if ( $searchposts_in_title_before == 1 ) {
					?>
<p style="margin-left: 10px;">
	<label style="font-size:15px;"><input type="checkbox" class="cb remove_searchposts_in_title_before_<?php echo esc_attr( $key ); ?>" onchange="cbChange(this)" /><?php
	esc_html_e( 'Remove search form before menu ', 'milun-woo-search' );
	echo esc_attr( $key );
	?></label>
</p>
					<?php
				}
			}
			//  print_r($new_key[0]); $menu = $wpdb->get_results("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key ='formMenus' AND meta_value !=''");
		}
		?>

<?php
		$nav_menus = wp_get_nav_menus();

		$chosen_menu = '';
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$menu = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value != %s",
				'formMenusValue',
				''
			)
		);

		?>
<br>
		<?php

		$chosen_menu = isset( $menu[0]->meta_value ) ? $menu[0]->meta_value : '';

		foreach ( $nav_menus as $nav_menu ) :
			if ( isset( $menu[0]->meta_value ) && $nav_menu->term_id == $menu[0]->meta_value ) {
				?><p class="WooSelectedPodMenu"><?php esc_html_e( 'Search form is going appear to appear in this menu:', 'milun-woo-search' ); ?>
	<?php echo esc_html( $nav_menu->name ); ?>
				<?php
			}
		endforeach;
		?>

</p>
<?php

		$search_form_before_loop                   = esc_attr( get_post_meta( get_the_ID(), 'search_form_before_loop', true ) );
		$sanitized_checkbox_search_form_before_loop = $search_form_before_loop == 1 ? $this->dmsfp_prefix_sanitize_input( $search_form_before_loop, 1 ) : '';

		?>

<p>
	<label style="font-size:15px;"><input type="checkbox" value="1" name="search_form_before_loop" <?php checked( esc_attr( $sanitized_checkbox_search_form_before_loop ), 1 ); ?>><?php esc_html_e( 'Display search form before loop', 'milun-woo-search' ); ?></label>
</p>
<h4><?php esc_html_e( 'Choose how to display the search form:', 'milun-woo-search' ); ?></h4>

		<?php

		$full_width_form                    = esc_attr( get_post_meta( get_the_ID(), 'full_width_form', true ) );
		$sanitized_checkbox_full_width_form = $full_width_form == 1 ? $this->dmsfp_prefix_sanitize_input( $full_width_form, 1 ) : '';

		$pop_up_form                    = esc_attr( get_post_meta( get_the_ID(), 'pop_up_form', true ) );
		$sanitized_checkbox_pop_up_form = $pop_up_form == 1 ? $this->dmsfp_prefix_sanitize_input( $pop_up_form, 1 ) : '';

		?>

<p>
	<label style="font-size:15px;"><input class="form-for-display" onchange="shape_of_form(this)" type="checkbox" name="full_width_form" value="1" <?php checked( esc_attr( $sanitized_checkbox_full_width_form ), 1 ); ?>><?php esc_html_e( 'Full width form', 'milun-woo-search' ); ?></label>
</p>
<p>
	<label style="font-size:15px;"><input class="form-for-display" onchange="shape_of_form(this)" type="checkbox" name="pop_up_form" value="1" <?php checked( esc_attr( $sanitized_checkbox_pop_up_form ), 1 ); ?>><?php esc_html_e( 'Pop up form', 'milun-woo-search' ); ?></label>
</p>
<?php

		$search_by_woo_title                 = esc_attr( get_post_meta( get_the_ID(), 'search_by_woo_title', true ) );
		$sanitized_checkbox_search_by_woo_title = $search_by_woo_title == 1 ? $this->dmsfp_prefix_sanitize_input( $search_by_woo_title, 1 ) : '';

		$search_by_woo_content               = esc_attr( get_post_meta( get_the_ID(), 'search_by_woo_content', true ) );
		$sanitized_checkbox_search_by_woo_content = $search_by_woo_content == 1 ? $this->dmsfp_prefix_sanitize_input( $search_by_woo_content, 1 ) : '';
		?>
<h4><?php esc_html_e( 'Choose how you want to search:', 'milun-woo-search' ); ?></h4>

<p>
	<label style="font-size:15px;"><input class="cb" onchange="cbChange(this)" type="checkbox" id="search_by_woo_title" name="search_by_woo_title" value="1" <?php checked( esc_attr( $sanitized_checkbox_search_by_woo_title ), 1 ); ?>><?php esc_html_e( 'Search by title', 'milun-woo-search' ); ?></label>
</p>

<p>
	<label><input class="cb" onchange="cbChange(this)" type="checkbox" id="search_by_woo_content" name="search_by_woo_content" value="1" <?php checked( esc_attr( $sanitized_checkbox_search_by_woo_content ), 1 ); ?>><?php esc_html_e( 'Search by content', 'milun-woo-search' ); ?></label>
</p>

<p>
		<?php $id = get_the_ID(); ?>

		<?php
		$search_post_id_woo = esc_attr( get_post_meta( get_the_ID(), 'search_post_id_woo', true ) );
		?>
<input type="hidden" id="search_post_id_woo" name="search_post_id_woo" value="<?php echo esc_attr( $search_post_id_woo ); ?>">
		<?php
		$numberofpostswoo = esc_attr( get_post_meta( get_the_ID(), 'numberofpostswoo', true ) );
		?>

<p>
	<label for="numberofpostswoo"><?php esc_html_e( 'Select number of products (between 1 and 15) to show: ', 'milun-woo-search' ); ?></label>
	<input type="number" id="numberofpostswoo" name="numberofpostswoo"
		value="<?php echo esc_attr( $numberofpostswoo ); ?>"
		min="1" max="15">
</p>
<br>
		<?php
		global $wpdb;
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery
		//$meta_value_word = $wpdb->get_results("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key ='numberofwordsinposts' AND meta_value !=''");
		$numberofwordsinposts = esc_attr( get_post_meta( get_the_ID(), 'numberofwordsinposts', true ) );

		?>
<p>
	<label style="font-size:15px;"><input type="number" id="numberofwordsinposts" name="numberofwordsinposts" min="7" max="30" value="<?php echo esc_attr( $numberofwordsinposts ); ?>"
><?php esc_html_e( 'Number of words to show in posts', 'milun-woo-search' ); ?></label>
</p>

		<?php

		$custom = get_post_meta( esc_attr( $post->ID ) );

		$color_of_background = isset( $custom['color_of_background'][0] ) ? $custom['color_of_background'][0] : '#fff';
		?>
<label for="color_of_background"><?php esc_html_e( 'Color for background of posts: ', 'milun-woo-search' ); ?></label>

<input id="color_of_background" class="background_color_of_article" type="text" name="color_of_background" value="<?php echo esc_attr( $color_of_background ); ?>"/>
<br>
<br>

<?php
		$search_categories_woo              = esc_attr( get_post_meta( get_the_ID(), 'search_categories_woo', true ) );
		$sanitized_checkbox_category_count_2 = $search_categories_woo == 1 ? $this->dmsfp_prefix_sanitize_input( $search_categories_woo, 1 ) : '';
		?>
<p>
	<label><input type="checkbox" id="search_categories_woo" name="search_categories_woo" value="1" <?php checked( esc_attr( $sanitized_checkbox_category_count_2 ), 1 ); ?>/><?php esc_html_e( 'Check to search categories', 'milun-woo-search' ); ?></label>
</p>
<h4><?php esc_html_e( 'Click on category you want to exclude', 'milun-woo-search' ); ?></h4>
<input type="text" class="search-woo_categories" placeholder="Search categories"/>
<div class="admin-container">

<?php
		$product_cat = get_terms(
			array(
				'taxonomy'   => 'product_cat',
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
			'public'            => true,
			'show_in_nav_menus' => true,
		);

		$output   = 'names';
		$operator = 'and';

		$taxonomies = get_taxonomies( $args, $output, $operator );

		$terms_cat = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => true,
			)
		);

		global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$categories_2 = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->terms
				LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
				WHERE $wpdb->term_taxonomy.taxonomy = %s
				AND $wpdb->term_taxonomy.count > %d",
				'product_cat',
				0
			)
		);

		foreach ( $categories_2 as $category ) {
			$double_woo_term_id = get_post_meta( get_the_ID(), $category->term_id, 'woo_cat_33' );
			if ( $category->name != '' && $category->slug != 'uncategorized' ) {
				?>

	<div class='woo_categories'>
		<div <?php echo $double_woo_term_id == 'woo_cat_33' ? "style='background-color:pink; color:white;'" : "style='background-color:white; color:grey;'"; ?>
onclick='myWooCategoryFunction(<?php echo esc_attr( $category->term_id ); ?>);'><?php echo esc_html( $category->name . ' ( ' . $category->count . ' )' ); ?></div>
	</div>

				<?php
			}
		}
		?>
	<div class="woo_category"></div>
	<div class="woo_category_empty"></div>
	<div class="no_woo_categories"></div>
</div>
<?php

		$datepicker_1 = isset( $custom[ 'datepicker_1' . get_the_ID() ][0] ) ? $custom[ 'datepicker_1' . get_the_ID() ][0] : '';
		$datepicker_2 = isset( $custom[ 'datepicker_2' . get_the_ID() ][0] ) ? $custom[ 'datepicker_2' . get_the_ID() ][0] : '';
		?>
<h4><?php esc_html_e( 'Date range of posts.', 'milun-woo-search' ); ?></h4>
<p style="font-size: 15px;"><?php esc_html_e( 'Start Date: ', 'milun-woo-search' ); ?> <input type="text" name='datepicker_1' id="datepicker_1" value="<?php echo esc_attr( $datepicker_1 ); ?>"></p>
<p style="font-size: 15px;"><?php esc_html_e( 'End Date: ', 'milun-woo-search' ); ?> <input type="text" name='datepicker_2' id="datepicker_2" value="<?php echo esc_attr( $datepicker_2 ); ?>"></p>

<?php

		$show_products_with_and_without_password = esc_attr( get_post_meta( get_the_ID(), 'show_products_with_and_without_password', 1 ) );
		$sanitized_checkbox_category_count_5 = $show_products_with_and_without_password == 1 ? $this->dmsfp_prefix_sanitize_input( $show_products_with_and_without_password, 1 ) : '';

		?>

<p>
	<label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_with_and_without_password" name="show_products_with_and_without_password" value="1" <?php checked( esc_attr( $sanitized_checkbox_category_count_5 ), 1 ); ?>><?php esc_html_e( 'Show products with and without passwords', 'milun-woo-search' ); ?></label>
</p>

<?php

		$show_products_without_password = esc_attr( get_post_meta( get_the_ID(), 'show_products_without_password', 1 ) );
		$sanitized_checkbox_category_count_6 = $show_products_without_password == 1 ? $this->dmsfp_prefix_sanitize_input( $show_products_without_password, 1 ) : '';

		?>

<p>
	<label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_without_password" name="show_products_without_password" value="1" <?php checked( esc_attr( $sanitized_checkbox_category_count_6 ), 1 ); ?>><?php esc_html_e( 'Show products without passwords', 'milun-woo-search' ); ?></label>
</p>

<?php
		$show_products_with_password = esc_attr( get_post_meta( get_the_ID(), 'show_products_with_password', true ) );
		$sanitized_checkbox_category_count_7 = $show_products_with_password == 1 ? $this->dmsfp_prefix_sanitize_input( $show_products_with_password, 1 ) : '';

		?>

<p>
	<label style="font-size:15px;"><input class="woo_password" onchange="woo_cbPassword(this)" type="checkbox" id="show_products_with_password" name="show_products_with_password" value="1" <?php checked( esc_attr( $sanitized_checkbox_category_count_7 ), 1 ); ?>><?php esc_html_e( 'Show products with passwords', 'milun-woo-search' ); ?></label>
</p>

<?php
/*
		global $wpdb;

		$attributes = wc_get_attribute_taxonomies();
		foreach ( $attributes as $attribute ) {
			$attribute->attribute_terms = get_terms(
				array(
					'taxonomy'   => 'pa_' . $attribute->attribute_name,
					'hide_empty' => false,
				)
			);
		}

		foreach ( wc_get_attribute_taxonomies() as $value ) {

			$visibility = trim( $value->attribute_name, 'pa_' );

			?>

	<div id='parent-element'>

		<h4><?php esc_html_e( 'Click on term you want to exclude', 'milun-woo-search' ); ?></h4>

		<input type="text" id="term-<?php echo esc_attr( $value->attribute_name ); ?>" class="term" placeholder="Search <?php echo esc_attr( $value->attribute_name ); ?>"/>
		<input type='hidden' id="myterm-<?php echo esc_attr( $value->attribute_name ); ?>" value='<?php echo esc_attr( $value->attribute_name ); ?>'/>
	</div>

			<?php

			$posts = get_posts(
				array(
					'post_type' => 'product_variation',
				)
			);

			foreach ( $value as $val ) {

				$results = $val;
				//$results =array_merge($value,$posts);
				if ( is_string( $results ) || is_int( $results ) ) {

				} else {

					global $wpdb;

					foreach ( $results as $result ) {
						$double_term_woo_name = get_post_meta( get_the_ID(), $result->slug, 'woo_term' );

						?>

	<div class='terms-<?php echo esc_attr( $value->attribute_name ); ?>'>
		<div <?php echo $double_term_woo_name == 'woo_term' ? "style='background-color:pink; color:grey;'" : "style='background-color:white; color:grey;'"; ?>onclick='myWooFunctionName(<?php echo esc_attr( $result->term_id ) . ', ' . '"' . esc_attr( $result->slug ) . '"' . ', ' . '  "' . esc_attr( $value->attribute_name ) . '"'; ?>); '><?php echo esc_html( $result->name ); ?></div>
	</div>
						<?php

					}
				}
			}
			?>

	<div class='results-<?php echo esc_attr( $value->attribute_name ); ?>'>
		<div class='no_terms'></div>

	</div>
			<?php
		}
			*/
		?>

<h4><?php esc_html_e( 'Click on term you want to exclude', 'milun-woo-search' ); ?></h4>
<input type="text" class="search-visibility_of_product" placeholder="Search ratings"/>
<div class="admin-container">

<?php
		global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$files = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM
				$wpdb->posts
				LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
				LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
				LEFT JOIN $wpdb->terms ON (
					$wpdb->term_taxonomy.term_id = $wpdb->terms.term_id
				)
				WHERE $wpdb->term_taxonomy.taxonomy = %s
				ORDER BY $wpdb->terms.slug",
				'product_visibility'
			)
		);

		$result = array_map(
			function ( $x ) {
				return $x->slug;
			},
			$files
		);

		$res = array_unique( $result );

		foreach ( $res as $va ) {

			if ( $va == '' ) {
				esc_html_e( 'There is no ratings yet', 'milun-woo-search' );
			} else {

				$double_woo_rated = get_post_meta( get_the_ID(), $va, 'woo_ratings51' );
				if ( $va == 'outofstock' || $va == 'rated-1' || $va == 'rated-2' || $va == 'rated-3' || $va == 'rated-4' || $va == 'rated-5' ) {
					?>
<div class="visibility_of_products">
	<div <?php echo $double_woo_rated == 'woo_ratings51' ? "style='background-color:pink; color:white;'" : "style='background-color:white; color:black;'"; ?>
		onclick='myWooRatingsFunction(<?php echo esc_attr( '"' . $va . '"' ); ?>)'><?php echo esc_html( $va ); ?></div>
</div>
					<?php
				}
			}
			?>
	<div class="visibility_of_product"></div>
	<div class="visibility_of_product_empty"></div>
	<div class="no_visibility_of_products"></div>

			<?php
		}

		global $wpdb;
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$users = $wpdb->get_results(
			"SELECT * FROM $wpdb->users LEFT JOIN $wpdb->usermeta
			ON $wpdb->usermeta.user_id = $wpdb->users.ID"
		);

		?>
</div>

<form>
	<div>
		<h4><?php esc_html_e( 'Click on author you want to exclude', 'milun-woo-search' ); ?></h4>

		<input
			type="text"
			class="search-woo_users"
			placeholder="<?php echo esc_attr__( 'Search users', 'milun-woo-search' ); ?>"
		/>

		<div class="terms-container" contenteditable="true">
			<?php foreach ( $users as $term ) : ?>
				<?php if ( 'nickname' === $term->meta_key ) : ?>

					<?php
					$double_woo_user = get_post_meta(
						get_the_ID(),
						$term->meta_value,
						true
					);

					$is_hidden = ( $double_woo_user === $term->meta_value . 'hide_woo_user' );

					$style = $is_hidden
						? 'background-color:pink; color:white;'
						: 'background-color:white; color:black;';
					?>

					<div class="admin-container">
						<div class="woo_users">
							<div
								id="exampleFormControlSelect2"
								style="<?php echo esc_attr( $style ); ?>"
								onclick="myWooUserFunction('<?php echo esc_js( $term->meta_value ); ?>');"
							>
								<?php echo esc_html( preg_replace( '/hide_woo_user$/', '', $term->meta_value ) ); ?>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

			<div class="woo_user"></div>
			<div class="woo_user_empty"></div>
			<div class="no_woo_users"></div>
		</div>
	</div>
</form>

<?php
		global $wpdb;
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$rows = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT meta_value FROM $wpdb->postmeta
				LEFT JOIN $wpdb->posts ON ($wpdb->postmeta.post_id = $wpdb->posts.ID)
				WHERE meta_key = %s",
				'_sku'
			)
		);
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
   <h4><?php esc_html_e("Click on sku of product you want to exclude",'milun-woo-search') ?></h4>
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
 <div class="no_skus"></div>  
</div>
     
    </div>  
  </div>
  
</form>

<?php
 global $wpdb;
 // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$title = $wpdb->get_results(
	"
	SELECT *
	FROM {$wpdb->posts}
	WHERE post_status = 'publish'
	AND post_type IN ('product', 'product_variation')
	"
);

?>
<form>
  <div>
   <h4><?php esc_html_e("Click on the title of the product you want to exclude.",'milun-woo-search') ?></h4>
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
$title_database =$wpdb->get_results( $wpdb->prepare("SELECT meta_value from $wpdb->postmeta 

         
         WHERE $wpdb->postmeta.meta_key='$sk' AND $wpdb->postmeta.meta_value ='hidetitleproduct' 
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
esc_html_e('WooCommerce is not Active.', 'milun-woo-search');
}
}
/**
 * Saves the custom meta input
 */
function sfp_save_woo_meta_boxes( $post_id ) {
 
if (
	! isset( $_POST['prfx_nonce_woo'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['prfx_nonce_woo'] ) ),
		'milun_save_woo_settings'
	)
) {
	return;
}

global $wpdb;
   $posts = get_posts(['post_type'=>'sfp_search_post']);


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->get_results("DELETE pm
  FROM $wpdb->posts p
 INNER 
  JOIN $wpdb->postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'search_post_id_title' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->get_results("DELETE pm
  FROM $wpdb->posts p
 INNER 
  JOIN $wpdb->postmeta pm
    ON pm.post_id = p.ID
 WHERE pm.meta_key = 'formMenus' 
   AND pm.meta_value != ''");


}


foreach ($posts as $post) {
  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->get_results("DELETE pm
  FROM $wpdb->posts p
 INNER 
  JOIN $wpdb->postmeta pm
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

if ( ! empty( $locations ) ) {
	foreach ( $locations as $key => $value ) {

		$after_key         = 'searchposts_in_title_after_' . $key;
		$before_key        = 'searchposts_in_title_before_' . $key;
		$remove_after_key  = 'remove_searchposts_in_title_after_' . $key;
		$remove_before_key = 'remove_searchposts_in_title_before_' . $key;

		if ( isset( $_POST[ $after_key ] ) ) {
			update_post_meta( $post_id, $after_key, 1 );
		} else {
			update_post_meta( $post_id, $after_key, false );
		}

		if ( isset( $_POST[ $remove_after_key ] ) ) {
			update_post_meta( $post_id, $after_key, false );
		}

		if ( isset( $_POST[ $before_key ] ) ) {
			update_post_meta( $post_id, $before_key, 1 );
		} else {
			update_post_meta( $post_id, $before_key, false );
		}

		if ( isset( $_POST[ $remove_before_key ] ) ) {
			update_post_meta( $post_id, $before_key, false );
		}
	}
}



global $wpdb;

/* =========================
   MENU LOCATIONS
========================= */
$locations = get_theme_mod( 'nav_menu_locations' );

if ( ! empty( $locations ) ) {

	$new_key   = array_keys( $locations );
	$new_value = array_values( $locations );

	if ( isset( $_POST['WooFormMenus'] ) ) {

		$menu_value = sanitize_text_field( wp_unslash( $_POST['WooFormMenus'] ) );

		foreach ( $new_key as $index => $key ) {
			if ( isset( $new_key[$index] ) && $menu_value === $key ) {

				update_post_meta( $post_id, 'WooFormMenus', $key );
				update_post_meta( $post_id, 'WooFormMenusValue', $new_value[$index] );
				break;
			}
		}
	} else {
		update_post_meta( $post_id, 'WooFormMenus', false );
		delete_post_meta( $post_id, 'WooFormMenusValue' );
	}
}

/* =========================
   BASIC META
========================= */

add_post_meta( $post_id, 'search_post_id_woo', $post_id );

update_post_meta(
	$post_id,
	'search_form_before_loop',
	isset( $_POST['search_form_before_loop'] ) ? 1 : 0
);

update_post_meta(
	$post_id,
	'search_categories_woo',
	isset( $_POST['search_categories_woo'] ) ? 1 : 0
);

/* =========================
   NUMERIC FIELDS
========================= */

update_post_meta(
	$post_id,
	'numberofpostswoo',
	isset( $_POST['numberofpostswoo'] ) ? absint( $_POST['numberofpostswoo'] ) : 8
);

update_post_meta(
	$post_id,
	'numberofwordsinposts',
	isset( $_POST['numberofwordsinposts'] ) ? absint( $_POST['numberofwordsinposts'] ) : 7
);

/* =========================
   WOOCOMMERCE ATTRIBUTES
========================= */

if ( class_exists( 'WooCommerce' ) ) {
	$attribute_taxonomies = wc_get_attribute_taxonomies();

	if ( $attribute_taxonomies ) {

		foreach ( $attribute_taxonomies as $tax ) {

			$taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );

			if ( taxonomy_exists( $taxonomy_name ) ) {

				$terms = get_terms( array(
					'taxonomy'   => $taxonomy_name,
					'orderby'    => 'name',
					'hide_empty' => 0,
				) );

				foreach ( $terms as $term ) {

					$key_id   = "name_term_id_" . $term->term_id;
					$key_val  = "name_term_value_" . $term->taxonomy;

					update_post_meta(
						$post_id,
						$key_id,
						isset( $_POST[ $key_id ] ) ? 1 : 0
					);

					update_post_meta(
						$post_id,
						$key_val,
						isset( $_POST[ $key_val ] )
							? sanitize_text_field( wp_unslash( $_POST[ $key_val ] ) )
							: 0
					);
				}
			}
		}
	}
}

/* =========================
   COLOR
========================= */

$color_of_background = isset( $_POST['color_of_background'] )
	? sanitize_hex_color( wp_unslash( $_POST['color_of_background'] ) )
	: '#fff';

update_post_meta( $post_id, 'color_of_background', $color_of_background );

/* =========================
   DATE FIELDS
========================= */

if ( isset( $_POST['datepicker_1'] ) ) {
	update_post_meta(
		$post_id,
		'datepicker_1' . esc_attr( $post_id ),
		sanitize_text_field( wp_unslash( $_POST['datepicker_1'] ) )
	);
}

if ( isset( $_POST['datepicker_2'] ) ) {
	update_post_meta(
		$post_id,
		'datepicker_2' . esc_attr( $post_id ),
		sanitize_text_field( wp_unslash( $_POST['datepicker_2'] ) )
	);
}

/* =========================
   FORM TYPE
========================= */

if ( isset( $_POST['full_width_form'] ) ) {

	delete_post_meta( $post_id, 'pop_up_form' );
	update_post_meta( $post_id, 'full_width_form', 1 );

} elseif ( isset( $_POST['pop_up_form'] ) ) {

	delete_post_meta( $post_id, 'full_width_form' );
	update_post_meta( $post_id, 'pop_up_form', 1 );

} else {
	update_post_meta( $post_id, 'pop_up_form', 1 );
}

/* =========================
   SEARCH OPTIONS
========================= */
if ( isset( $_POST['search_by_woo_title'] ) ) {

	delete_post_meta( $post_id, 'search_by_woo_content' );
	update_post_meta( $post_id, 'search_by_woo_title', 1 );

} elseif ( isset( $_POST['search_by_woo_content'] ) ) {

	delete_post_meta( $post_id, 'search_by_woo_title' );
	update_post_meta( $post_id, 'search_by_woo_content', 1 );

} else {
	update_post_meta( $post_id, 'search_by_woo_title', 1 );
}


/* =========================
   PASSWORD FILTERS
========================= */
if ( isset( $_POST['show_products_with_and_without_password'] ) ) {
update_post_meta( $post_id, 'show_products_with_and_without_password', 1 );
delete_post_meta( $post_id, 'show_products_without_password' );
delete_post_meta( $post_id, 'show_products_with_password' );

}
if ( isset( $_POST['show_products_without_password'] ) ) {
update_post_meta(
	$post_id,
	'show_products_without_password',
	isset( $_POST['show_products_without_password'] ) ? 1 : 0
);
delete_post_meta( $post_id, 'show_products_with_and_without_password' );
delete_post_meta( $post_id, 'show_products_with_password' );
}

if ( isset( $_POST['show_products_with_password'] ) ) {
update_post_meta(
	$post_id,
	'show_products_with_password',
	isset( $_POST['show_products_with_password'] ) ? 1 : 0
);
delete_post_meta( $post_id, 'show_products_with_and_without_password' );
delete_post_meta( $post_id, 'show_products_without_password' );
}
}

 
}
endif;