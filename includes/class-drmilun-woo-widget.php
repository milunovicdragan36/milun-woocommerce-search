<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Woo_Widget') ) :
 

/**
 * REST API: WP_REST_Widget_Types_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 5.8.0
 */

/**
 * Core class to access widget types via the REST API.
 *
 * @since 5.8.0
 *
 * @see WP_REST_Controller
 */



class MMSDD_Drmilun_Woo_Widget extends \WP_Widget {

  /**
   * Sets up a new Search widget instance.
   *
   * @since 2.8.0
   */
  public function __construct() {
    $widget_ops = array(
      'classname'                   => 'widget_for_woo_search',
      'description'                 => __( 'A search form for your site.' ),
      'customize_selective_refresh' => true,
      'show_instance_in_rest'       => true,
    );
    parent::__construct( 'woo_searching', _x( 'Milun Woo Search Widget', 'My Woo Search widget' ), $widget_ops );
        //add_action( 'rest_api_init', [$this,'namespace_register_search_route']);



 add_action( 'rest_api_init', [$this,'namespace_register_woo_woo_search_terms_2']);


add_action( 'rest_api_init', [$this,'search_products_with_ratings']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_half_sentence']);
 add_action( 'rest_api_init', [$this,'search_products_with_ratings_two_words']);







add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_around']);
add_action( 'rest_api_init', [$this,'namespace_register_woo_search_route_price_under']);

  }
  /**
   * Outputs the content for the current Search widget instance.
   *
   * @since 2.8.0
   *
   * @param array $args     Display arguments including 'before_title', 'after_title',
   *                        'before_widget', and 'after_widget'.
   * @param array $instance Settings for the current Search widget instance.
   */
  public function widget( $args, $instance ) {



           $posts = get_posts(['post_type' =>"woo_search_post"]);
  
foreach ($posts as $post) {
   $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo", true));
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             
            ?>
              <style type="text/css">
                .woo-hid_widget{
                /* display: none;*/
                }
                .woo-data-container-widget,
                .woo-data-categories-container-widget{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .woo-data-categories-container-widget div a,   
                .woo-data-container-widget div a{
                  color:<?php echo $color_of_background; ?> !important;
                }
              </style>


            <?php  
               
      


       $title = apply_filters( 'widget_title', $instance['title'] );
   $search_post_id = esc_attr(get_post_meta( $instance['title'],"woo_search_post", $instance['title']));


?>
<input type='hidden' id="search_post_widget_id_woo" value="<?php echo $post->ID; ?>" >
<?php
} 
   $form = '<input type="text" class="search-term-woo-widget" style="max-width: 150px"  placeholder="'.__("Search...","milun-search") .'"/><br>';
                      if($search_categories_woo=="1"){
                       $form .= '<div class="woo-data-categories-container-widget woo-hid_widget"></div>';
                       }
                        $form .= '<div class="woo-data-container-widget woo-hid_widget"></div>';


    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . '<br>'.$form. $args['after_title'];
    }

    

    echo $args['after_widget'];
  

  
}
  /**
   * Outputs the settings form for the Search widget.
   *
   * @since 2.8.0
   *
   * @param array $instance Current settings.
   */
  public function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title    = $instance['title'];
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }

  /**
   * Handles updating settings for the current Search widget instance.
   *
   * @since 2.8.0
   *
   * @param array $new_instance New settings for this instance as input by the user via
   *                            WP_Widget::form().
   * @param array $old_instance Old settings for this instance.
   * @return array Updated settings.
   */
  public function update( $new_instance, $old_instance ) {
    $instance          = $old_instance;
    $new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '' ) );
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    return $instance;
  }
/*
function namespace_register_search_route() {
    register_rest_route('namespace/v1', '/search/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}

function dmsfp_search_categories() {
    register_rest_route('namespace/v1', '/searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_3']
    ]);
}
*/


function namespace_register_woo_woo_search_terms_2(){
     register_rest_route('namespacewoo/v35', '/search_categories/(?P<s>[a-zA-Z0-9-]+)', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_woo_woo_terms_2'],
         'permission_callback' => '__return_true',
         
        'args' => [$this->namespace_get_search_args()]
        
    ]);
}


function search_products_with_ratings(){
   register_rest_route('namespacewoo/v35', '/search_products/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
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
        'args' => [$this->namespace_get_search_args_sentence()]
    ]);
}



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

/**
 * Define the arguments our endpoint receives.
 */
function namespace_get_search_args() {
    $args = [];
    $args['s'] = [
       'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
  
   return $args;
}

function dmsfp_search_woo_categories(){
  register_rest_route('namespacewoo/v11', '/searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_args()]
    ]);
}
function dmsfp_search_empty_woo_categories(){
  register_rest_route('namespacewoo/v11', '/empty_searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_searching_empty_woo_categories'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_args()]
    ]);
}

/**
 * Define the arguments our endpoint receives.
 */
function namespace_get_search_args_sentence() {
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



 function namespace_ajax_search_woo_woo_terms_2($request){ 
  $id = $request['id'];
   $category_slug = $request['s'];                    
global $wpdb;
$posts = get_posts(['post_type' =>"woo_search_post"]);
  
foreach ($posts as $post) {
   $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo", true));
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
}}



function namespace_ajax_search_products_with_ratings( $request) {
 



$premium_file = include("woo_querys.php");
return $premium_file;   

}



function namespace_ajax_search_products_with_ratings_half_sentence( $request) {
 


$premium_file = include("woo_querys.php");
return $premium_file;   

}


function namespace_ajax_search_products_with_ratings_two_words( $request) {
 

$premium_file = include("woo_querys_two_words.php");
return $premium_file;   

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




 } 
}
add_action( 'widgets_init', function(){
register_widget('MMSDD_Drmilun_Woo_Widget' );

});

endif;