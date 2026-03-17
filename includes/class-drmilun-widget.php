<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MILUSE_Drmilun_Widget') ) :
 





class MILUSE_Drmilun_Widget extends \WP_Widget {

  /**
   * Sets up a new Search widget instance.
   *
   * @since 2.8.0
   */
  public function __construct() {
    $widget_ops = array(
      'classname'                   => 'widget_for_search',
      'description'                 => esc_html__( 'A search form for your site.', 'milun-search' ),
      'customize_selective_refresh' => true,
      'show_instance_in_rest'       => true,
    );
    parent::__construct( 'searching', esc_html__( 'Milun Woo Search', 'milun-search'), $widget_ops);
           add_action( "rest_api_init", [$this,'miluse_search_categories'] );
 ////*front end rest api routes*////////////
add_action( "rest_api_init", [$this,'miluse_search_categories'] );
add_action( "rest_api_init", [$this,'namespace_register_search_post_types_no_words_widget'] );
add_action( "rest_api_init", [$this,'namespace_register_search_post_types_widget'] );
add_action( "rest_api_init", [$this,'namespace_register_search_post_types_half_sentence_widget'] );
add_action( "rest_api_init", [$this,'namespace_register_search_post_types_two_words_widget'] );
add_action( "rest_api_init", [$this,'namespace_register_search_post_types_three_words_widget'] );
add_action( 'rest_api_init', [$this,'namespace_register_search_route']);
   
/*for front end categories*/ 



////*backend rest api routes*////////////


/*****user*//// 
 add_action( 'rest_api_init', [$this,'namespace_register_user_search']);
add_action( 'rest_api_init', [$this,'namespace_register_user_empty_search']);
 
/*****meta data of post types*////
 add_action( 'rest_api_init', [$this,'namespace_register_admin_meta_data_of_post_types']);
add_action( 'rest_api_init', [$this,'namespace_register_admin_meta_data_empty_of_post_types']);
add_action('rest_api_init', [$this,'register_rest_images' ]);





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
      global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$meta_value = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofposts' AND meta_value !=''");


?>
<p>
      <label><input type="number" id="numberofposts" name="numberofposts" min="1" max="15" style='display: none;' value="<?php echo esc_attr( @$meta_value[0]->meta_value ? @$meta_value[0]->meta_value :1);  ?>"></label>
 </p>
 <?php
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$meta_value_word = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofwordsinposts' AND meta_value !=''");
?>
<p>
      <label><input type="number" id="numberofwordsinposts" name="numberofwordsinposts" min="15" max="150" style='display: none;' value="<?php echo esc_attr( @$meta_value_word[0]->meta_value ? @$meta_value_word[0]->meta_value :15);  ?>"></label>
 </p>            

  <?php 
$args = array(
   'public'   => true,
   '_builtin' => false,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_1 = get_post_types( $args, $output, $operator );


$args = array(
   'public'   => true,
   '_builtin' => true,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_2 = get_post_types( $args, $output, $operator );




$post_types_3 = array_merge($post_types_1,$post_types_2);

foreach ( $post_types_3  as $post_type ) {

      if($post_type == "sfp_search_post" || $post_type == "attachment" ){
//        return;
      }else{
       
  ?>
  <input type="text" id="post_type_featured_image_widget_<?php echo esc_attr($post_type); ?>" value="<?php echo esc_attr($post_type); ?>" style='display: none;'>
   <?php 


}}


$posts = get_posts(['post_type' =>"sfp_search_post"]);
                        
                        
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
 ?>
 <style type="text/css">

   .my_wrapper,
   .child_widget{

background-color: white;

border-left-width: 3px !important;

    
    border-width: 3px;
border-color:<?php echo esc_attr($color); ?>!important;
border-style: solid;
}
                
               .search_widget{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-widget-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-widget-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-widget{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                    
               
            .background_color_of_load_more_button_widget{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }
.closeFilePanel{
    color:<?php echo esc_attr($color); ?>!important;

}
          
               </style>
 <?php
   
    $search_by_title = esc_attr(get_post_meta( $post->ID,"search_by_title", true));
   $search_by_content = esc_attr(get_post_meta( $post->ID,"search_by_content", true));
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
   $full_width_form = esc_attr(get_post_meta( $post->ID,"full_width_form",true));
        $standard_form = esc_attr(get_post_meta( $post->ID,"standard_form",true));
              $pop_up_form = esc_attr(get_post_meta( $post->ID,"pop_up_form",true));
 
   ?>
<input type='hidden' id="search_post_id" value="<?php echo esc_attr($post->ID); ?>">
<input type='hidden' id="search_by_title" value="<?php echo esc_attr($search_by_title); ?>" >
<input type='hidden' id="search_by_content" value="<?php echo esc_attr($search_by_content); ?>" >
<input type='hidden' id="search_categories" value="<?php echo esc_attr($search_categories); ?>" >

<?php

                      $custom = get_post_meta( esc_attr($post->ID) );
                                 

            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
      
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? esc_attr($custom['color_of_text'][0]) : '#000';
              $color_for_load_more_text = ( isset( $custom['color_for_load_more_text'][0] ) ) ? esc_attr($custom['color_for_load_more_text'][0]) : '#FFA500';
            
              
           require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';
           ?>
<input type='hidden' id="search_post_id" value="<?php echo esc_attr($post->ID); ?>">
<input type='hidden' id="search_by_title" value="<?php echo esc_attr($search_by_title); ?>" >
<input type='hidden' id="search_by_content" value="<?php echo esc_attr($search_by_content); ?>" >


            <?php  
               
          $title = apply_filters( 'widget_title', $instance['title'] );
   $search_post_id = esc_attr(get_post_meta( esc_attr($instance['title']),"miluse_search_post", esc_attr($instance['title'])));


?>


<?php
}
   $search_categories_woo = esc_attr(get_post_meta( @$post->ID,"search_categories_woo", true)); 
 
 $popup = '
        <div id="for-searching-4"></div>

        <div class="pop_up_for_widget">
            <div class="notification-container dismiss">

             
                    <div class="search_widget" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-widget" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
                    </div>

        <div class="wrapper-data-container-widget-data-posts">

<div class="data-container-widget"></div>
<div class="data-posts-inc-widget"></div>

<div class="data-widget-posts-btn"></div>
<div class="no-data-widget"></div>
                      
                    </div>

            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="pop_up_search_widget"
              aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';


$form = '';
    if (
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_front_page() || is_shop() || is_product_category() || is_product_tag()
) {
  
 $popup = '
        <div id="for-searching-5"></div>

        <div class="pop_up_widget milun-popup-center">
            <div class="notification-container dismiss">

             
                    <div class="search_widget" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                      
                          <input type="text"
                               class="search-term-widget" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
                       </div>

        <div class="wrapper-data-container-widget-data-posts">
<div class="data-categories-container-widget"></div>
<div class="data-container-widget"></div>
<div class="data-posts-inc-widget"></div>

<div class="data-widget-posts-btn"></div>
<div class="no-data-widget"></div>
                      
                    </div>

            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';

   

      echo esc_attr(@$args['before_widget']);
    //if ( @$title ) {
      echo esc_attr(@$args['before_title']) .'<div class="my_wrapper_widget">
                        <p><b>'.esc_attr(@$title).'</b></p>
                       
                      '.$popup
                      . esc_attr(@$args['after_title']);
   // }

    

    echo esc_attr(@$args['after_widget']); 
 
                      
 }
 else if(
 $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_front_page() || is_shop() || is_product_category() || is_product_tag()    ){              


                        echo esc_attr(@$args['before_widget']);
    //if ( @$title ) {
      echo esc_attr(@$args['before_title']) .'<div class="my_wrapper_widget">
                        <p><b>'.esc_attr(@$title).'</b></p>
                       
                      '.$popup
                      . esc_attr(@$args['after_title']);
   // }

    

    echo esc_attr(@$args['after_widget']);  
    
 }
              

                  


          

                       
  

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
      <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'milun-search' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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

function register_rest_images(){
    $args = array(
   'public'   => true,
   '_builtin' => false,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types = get_post_types( $args, $output, $operator );

//if ( ! empty ( $post_types ) ) { // If there are any custom public post types.

    foreach ( $post_types  as $post_type ) {
        if($post_type == "miluse_search_post" || $post_type == "woo_search_post" || $post_type == "product" || $post_type == "product_variation"){
//        return;
      }else{

        if($post_type=='posts'){
            $post_type="post";
        }
    register_rest_field( array($post_type),
        'fimg_url',
        array(
            'get_callback'    => 'miluse_get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );

}
}
}


function miluse_get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}
/*
 function namespace_register_admin_search_post_types(){
   register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}
*/
 function namespace_register_admin_search_empty_post_types(){
   register_rest_route('namespace/v11', '/search_empty_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_empty_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}


 function namespace_register_admin_meta_data_of_post_types(){
   register_rest_route('namespace/v11', '/search_meta_data_of_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_meta_data_of_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}

 function namespace_register_admin_meta_data_empty_of_post_types(){
   register_rest_route('namespace/v11', '/search_meta_data_empty_of_post_types/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_meta_data_empty_of_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}

function namespace_register_search_post_types_no_words_widget() {
    register_rest_route('namespace/v11', '/search_post_types//(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_no_words_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
    
}

function namespace_register_search_post_types_widget() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
    
}
function namespace_register_search_post_meta_data() {
    register_rest_route('namespace/v11', '/search_post_meta_data/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_meta_data'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
    
}
function namespace_register_search_post_types_two_words_widget() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_two_words_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence_widget()]
    ]);
    
}

function namespace_register_search_post_types_three_words_widget() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)%20(?P<ses>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_three_words_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_sentence_widget()]
    ]);
    
}
function namespace_register_search_post_types_half_sentence_widget() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_widget'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}









function namespace_register_search_route() {
    register_rest_route('namespace/v1', '/search/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_2'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
    
}




function miluse_search_categories() {
    register_rest_route('namespace/v1', '/searching/(?P<s>[a-zA-Z0-9-]+)/
      ', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_3'],
                 'permission_callback' => '__return_true',

        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}




function namespace_register_user_search(){
     register_rest_route('namespace/v10', '/user/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_user'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}




function namespace_register_user_empty_search(){
     register_rest_route('namespace/v10', '/user_empty/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_user_empty'],
         'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_widget()]
    ]);
}




function namespace_get_search_args_widget() {
    $args = [];
    $args['s'] = [
       //'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
  
   return $args;
}

/**
 * Define the arguments our endpoint receives.
 */
function namespace_get_search_args_sentence_widget() {
    $args = [];
    $sen = [];
    $args['s'] = [
       //'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   $sen['s'] = [
       //'description' => esc_html__( 'The search term.', 'namespace' ),
       'type'        => 'string',
   ];
   return array([$args,$sen]);
}


function namespace_ajax_search_post_types($request){

  $post_slug = $request['s'];


global $wpdb;

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$post_types = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->_posts
   


    WHERE wp_posts.post_status ='publish' AND wp_posts.post_type != 'product' AND wp_posts.post_type != 'miluse_search_post' AND wp_posts.post_type != 'woo_search_post'  AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'revision' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND wp_posts.post_type !='nav_menu_item' AND
     wp_posts.post_type LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%'));
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$post_type_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_type 
         WHERE wp_postmeta.meta_value = 'post_hide' AND  wp_posts.post_type AND wp_posts.post_type LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%'
         
    ));
 if (!empty($post_type_empty)) {
$result = array_values(array_udiff($post_types, $post_type_empty, function ($a, $b) {
    return strcmp($a->post_type,$b->post_type);
}));
return $result;
}else{
  return $post_types;
}
  wp_reset_postdata();


}

function namespace_ajax_search_empty_post_types($request){
    $post_slug = $request['s'];


global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$post_type_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_key = wp_posts.post_type 
         WHERE wp_posts.post_status ='publish' AND  wp_postmeta.meta_value = 'post_hide'AND  wp_posts.post_type LIKE %s",'%' . $wpdb->esc_like($post_slug) . '%'
         
    ));

  return $post_type_empty;

    wp_reset_postdata();

}


function namespace_ajax_search_meta_data_of_post_types($request){

  global $wpdb;  

   
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.post_id =wp_posts.ID
          WHERE wp_posts.post_type != 'product' AND wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'miluse_search_post' AND wp_posts.post_type != 'attachment' AND
          wp_posts.post_type != 'miluse_search_post' AND wp_posts.post_type != 'woo_search_post'  AND wp_posts.post_type != 'nav_menu_item' AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'wp_template' AND 
         
         wp_postmeta.meta_key NOT LIKE %s AND wp_postmeta.meta_key!='search_categories' 
         AND wp_postmeta.meta_key!='_wp_desired_post_slug'
                   AND wp_postmeta.meta_key!='_wp_trash_meta_time'
AND wp_postmeta.meta_key!='_wp_trash_meta_status'
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        
        AND wp_postmeta.meta_key!='text_color_of_categories'

        AND wp_postmeta.meta_key!='color_of_the_load_more_btn'
       
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='miluse_search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    ",$wpdb->esc_like('name_term_') . '%'));

 

$temp = array_unique(array_column($meta_data, 'post_title'));
$unique_arr = array_intersect_key($meta_data, $temp);
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$post_meta_data_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_value =wp_posts.post_title
          WHERE wp_postmeta.meta_key LIKE %s AND
         wp_postmeta.meta_key NOT LIKE %s AND wp_postmeta.meta_key!='search_categories' 
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        
        AND wp_postmeta.meta_key!='text_color_of_categories'

        AND wp_postmeta.meta_key!='background_color_of_load_more_button_widget'
       AND wp_postmeta.meta_key!='background_color_of_load_more_button_shortcode'
       AND wp_postmeta.meta_key!='background_color_of_load_more_button_menu'
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='miluse_search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
    ",'%'.$wpdb->esc_like('_meta'),$wpdb->esc_like('name_term_') . '%'));


  if (!empty($post_meta_data_empty)) {
$result = array_values(array_udiff($unique_arr, $post_meta_data_empty, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));
return $result;
}else{
  return array_values($unique_arr);;
}
  wp_reset_postdata();

}

function namespace_ajax_search_meta_data_empty_of_post_types($request){
    global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$post_meta_data =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
     LEFT JOIN wp_postmeta ON wp_postmeta.meta_value =wp_posts.post_title
          WHERE wp_postmeta.meta_key LIKE %s AND
         wp_postmeta.meta_key NOT LIKE %s AND wp_postmeta.meta_key!='search_categories' 
        AND wp_postmeta.meta_key!='searchposts_in_title'
                AND wp_postmeta.meta_key!='searchposts_in_title'
        AND wp_postmeta.meta_key!='color_of_text'
        AND wp_postmeta.meta_key!='text_color_of_categories'
          AND wp_postmeta.meta_key!='background_color_of_load_more_button_widget'
       AND wp_postmeta.meta_key!='background_color_of_load_more_button_shortcode'
       AND wp_postmeta.meta_key!='background_color_of_load_more_button_menu'
        
        AND wp_postmeta.meta_key!='product'
        AND wp_postmeta.meta_key!='miluse_search_post'
        AND wp_postmeta.meta_key!='woo_search_post'
        AND wp_postmeta.meta_key!='_edit_lock'
        AND wp_postmeta.meta_key!='search_post_id_title'
        AND wp_postmeta.meta_value!='1'
        AND wp_postmeta.meta_value!=''
AND wp_postmeta.meta_value!='0'
         
  ",'%'.$wpdb->esc_like('_meta'),$wpdb->esc_like('name_term_') . '%'));
 return $post_meta_data;
}


 function namespace_ajax_search_user($request){ 
 global $wpdb;
$user_slug =$request['s'];                        
$user_with_first_character=[];
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN $wpdb->usermeta ON wp_users.ID = $wpdb->usermeta.user_id

WHERE  wp_users.user_login LIKE %s",'%' . $wpdb->esc_like($user_slug) . '%' 

         
    ));
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user_first_character =$wpdb->get_results( $wpdb->prepare("SELECT *
FROM wp_users 
LEFT JOIN $wpdb->usermeta ON wp_users.ID = $wpdb->usermeta.user_id

WHERE 
      wp_users.user_login LIKE %s", $wpdb->esc_like($user_slug) . '%' 
    ));
  if (!empty($user_first_character)) {
$user_with_first_character = $user_first_character;
}else{
$user_with_first_character =  $user;
 
}



  $user_empty_with_first_character = [];

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  %s AND wp_postmeta.meta_value LIKE %s",'%' . $wpdb->esc_like($user_slug) . '%', '%'. $wpdb->esc_like('hide_user')     

         
    ));

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  %s AND wp_postmeta.meta_value LIKE %s",  $wpdb->esc_like($user_slug) . '%', '%'. $wpdb->esc_like('hide_user')    
    ));

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
  wp_reset_postdata();

}
 function namespace_ajax_search_user_empty($request){ 
  
 global $wpdb;
 
             # code...
 $user_slug =$request['s'];                        

  $user_empty_with_first_character = [];
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user_empty =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
         WHERE  
           wp_postmeta.meta_key LIKE  %s AND wp_postmeta.meta_value LIKE %s",'%' . $wpdb->esc_like($user_slug) . '%', '%'. $wpdb->esc_like('hide_user')  
         
    ));

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$user_empty_first_character =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_users
     LEFT JOIN wp_postmeta ON wp_users.user_login = wp_postmeta.meta_key 
    WHERE wp_postmeta.meta_key LIKE  %s AND wp_postmeta.meta_value LIKE %s",  $wpdb->esc_like($user_slug) . '%', '%'. $wpdb->esc_like('hide_user')   
    ));

  if (!empty($user_empty_first_character)) {
$user_empty_with_first_character = $user_empty_first_character;
}else{
$user_empty_with_first_character =  $user_empty;
 
}
return $user_empty_with_first_character;
  wp_reset_postdata();

}
 function return_post_types_no_words_widget($request){

  $post_slug =$request['s']; 



$premium_file = include("querys_search_post_no_words.php");
return $premium_file;  
  wp_reset_postdata();
 

  }


 function return_post_types_widget($request){

  $post_slug =$request['s']; 



$premium_file = include("querys_search_post.php");
return $premium_file;  
  wp_reset_postdata();
 

  }

 function return_post_types_two_words_widget($request){

$post_slug =$request['s']; 
$post_slug_second_word =$request['se'];

$premium_file = include("post_types_two_words.php");
return $premium_file;  
   wp_reset_postdata();


  }
  function return_post_types_three_words_widget($request){




$premium_file = include("post_types_three_words.php");
return $premium_file;  
   wp_reset_postdata();


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
       

           $posts = get_posts(['post_type' =>"miluse_search_post"]);
                    
foreach ($posts as $post) {
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
if($search_categories=="1"){                       
 //foreach ($terms_cat as $term) {
                    



// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
   LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id      LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key
   WHERE  ifnull(wp_postmeta.meta_value, '') = '' AND wp_term_taxonomy.taxonomy !='wp_theme' AND wp_term_taxonomy.taxonomy !='product_cat' AND wp_term_taxonomy.taxonomy !='nav_menu' AND wp_term_taxonomy.taxonomy !='product_type' AND wp_term_taxonomy.taxonomy !='product_visibility' AND wp_term_taxonomy.taxonomy NOT LIKE %s AND wp_terms.name LIKE %s || wp_postmeta.meta_value!='11' AND wp_term_taxonomy.taxonomy !='wp_theme' AND wp_term_taxonomy.taxonomy !='product_cat' AND wp_term_taxonomy.taxonomy !='nav_menu' AND wp_term_taxonomy.taxonomy !='product_type' AND wp_term_taxonomy.taxonomy !='product_visibility' AND wp_term_taxonomy.taxonomy NOT LIKE %s AND wp_terms.name LIKE %s", $wpdb->esc_like('pa') . '%','%' . $wpdb->esc_like($category_slug) . '%', $wpdb->esc_like('pa') . '%','%' . $wpdb->esc_like($category_slug) . '%'  
    ));
     
return $pageposts_1;
}
}
  wp_reset_postdata();

}



function featured_image() {
      $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

              $post_types = get_post_types( $args, $output, $operator );

              foreach ($post_types as $post_type) {
             if($post_type=="miluse_search_post" || $post_type=="woo_search_post"){

             }else{   
            
   register_rest_field( $post_type, 'featured_image', array(
        'get_callback'    => [$this,'return_featured_image'],
           'schema'          => null,
   ));
 }}
}

function return_featured_image($object, $field_name, $request){
  if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
 

  }

}

add_action( 'widgets_init', function(){
register_widget('MILUSE_Drmilun_Widget' );

});

endif;