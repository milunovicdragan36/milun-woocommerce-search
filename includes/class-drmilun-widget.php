<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Widget') ) :
 

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



class MMSDD_Drmilun_Widget extends \WP_Widget {

  /**
   * Sets up a new Search widget instance.
   *
   * @since 2.8.0
   */
  public function __construct() {
    $widget_ops = array(
      'classname'                   => 'widget_for_search',
      'description'                 => __( 'A search form for your site.' ),
      'customize_selective_refresh' => true,
      'show_instance_in_rest'       => true,
    );
    parent::__construct( 'searching', _x( 'Milun Search Widget', 'My Search widget' ), $widget_ops);
           add_action( "rest_api_init", [$this,'dmsfp_search_categories'] );
//add_action( 'rest_api_init', [$this,'create_api_posts_meta_field'] );
add_action("rest_api_init", [$this,'featured_image']);

add_action( "rest_api_init", [$this,'namespace_register_search_post_types'] );
 add_action( "rest_api_init", [$this,'namespace_register_search_post_types_half_sentence'] );
      add_action( "rest_api_init", [$this,'namespace_register_search_post_types_two_words'] );
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
$meta_value = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofposts' AND meta_value !=''");

    $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
?>
  <label style="display: none;">

          <input id="color_of_text"  class="text_color_of_article"  name="color_of_text" type='hidden' value="<?php esc_attr_e( $color_of_text ); ?>"/>
          </label>
  <br>
<p>
      <label style="display: none;"><input type="hidden" id="numberofposts"  name="numberofposts" min="1" max="15" value="<?php echo @$meta_value[0]->meta_value ? @$meta_value[0]->meta_value :1;  ?>"></label>
 </p>
 <?php
  global $wpdb;
$meta_value_word = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofwordsinposts' AND meta_value !=''");
?>
 <p>
      <label style="display: none;"><input type="hidden" id="numberofwordsinposts" name="numberofwordsinposts" min="15" max="150" value="<?php echo @$meta_value_word[0]->meta_value ? @$meta_value_word[0]->meta_value :1;  ?>"></label>
 </p>
  <br>

<?php 
 $args = array(
   'public'   => true,
    'show_in_nav_menus' => true
   //'_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'
$posts=[];
$post_types = get_post_types( $args, $output, $operator );

foreach ( $post_types  as $post_type ) {

      if($post_type == "search_post" || $post_type == "woo_search_post" || $post_type == "product" || $post_type == "page"|| $post_type == "product_variation"){
//        return;
      }else{

 ?>
     <input type="hidden" id="post_type_featured_image_<?php echo $post_type; ?>" value="<?php echo $post_type; ?>">
            <?php
       }}     

           $posts = get_posts(['post_type' =>"search_post"]);
                        
foreach ($posts as $post) {
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';
             $background_color_of_load_more_button = ( isset( $custom['background_color_of_load_more_button'][0] ) ) ? $custom['background_color_of_load_more_button'][0] : '#fff';   
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
              $color_for_load_more_text = ( isset( $custom['color_for_load_more_text'][0] ) ) ? $custom['color_for_load_more_text'][0] : '#000';
            ?>
              <style type="text/css">
                .hid_widget{
                 /*display: none;*/
               }
                .wrapper-data-container-widget-data-posts{
                   background-color:<?php echo $color_of_background; ?> !important;
                }
                /*.data-container-widget,*/
                .data-categories-container-widget{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .background_color_of_load_more_button{
                    background-color:<?php echo $background_color_of_load_more_button; ?>;
                }
             
                
                .color_for_load_more_text{
                  color:<?php echo $color_for_load_more_text; ?> !important;
                }
              </style>


            <?php  
               
          $title = apply_filters( 'widget_title', $instance['title'] );
   $search_post_id = esc_attr(get_post_meta( $instance['title'],"search_post", $instance['title']));


?>
<input type='hidden' id="search_post_id" value="<?php echo $post->ID; ?>" >
<?php
}

  $form = '<input type="text" class="search-term-widget" style="max-width: 150px"  placeholder="'.__("Search...","milun-search") .'"/><br>';
                      if($search_categories=="1"){
                       $form .= '<div class="data-categories-container-widget hid_widget"></div>';
                       }
                        $form .= '<div class="data-container-widget hid_widget"></div>';


    echo @$args['before_widget'];
    if ( $title ) {
      echo @$args['before_title'] . $title . '<br>'.$form. @$args['after_title'];
    }

    

    echo @$args['after_widget'];
  

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

function namespace_register_search_post_types() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types',10,3],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
    
}
function namespace_register_search_post_types_half_sentence() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_half'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
}


function namespace_register_search_post_types_two_words() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)%20(?P<se>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types_two_words'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args_two_words()]
    ]);
}

function dmsfp_search_categories() {
    register_rest_route('namespace/v11', '/searching/(?P<s>[a-zA-Z0-9-]+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'namespace_ajax_search_3'],
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



function namespace_searching_woo_categories($request){
 
  global $wpdb;
 $woo_category_slug       =$request['s']; 

  
       $woo_categories =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_terms
  LEFT JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
  LEFT JOIN wp_postmeta ON wp_terms.term_id = wp_postmeta.meta_key

         WHERE wp_term_taxonomy.taxonomy ='product_cat' AND wp_postmeta.meta_value NOT LIKE '%oo_cat_33%' AND wp_terms.name LIKE '%$woo_category_slug%' 
    "));
       
return  $woo_categories;


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
             if($post_type=="search_post" || $post_type=="woo_search_post" || $post_type=="page"){

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

function return_post_types($request){
  $post_slug =$request['s']; 
//$post_id =$request['id'];
 
 global $wpdb;
      

$search_post_file = include("querys_search_post.php");
return $search_post_file;  
 

  }  
function return_post_types_half($request){
  $post_slug =$request['s']; 
//$post_id =$request['id'];
 global $wpdb;
      

$search_post_file_2 = include("querys_search_post.php");
return $search_post_file_2;  
 

  }

 function return_post_types_two_words($request){

$post_slug =$request['s'];
$post_slug_se =$request['se'];



$search_post_file_3  = include("post_types_two_words.php");
return $search_post_file_3;  
 

  }  
  
}

add_action( 'widgets_init', function(){
register_widget('MMSDD_Drmilun_Widget' );

});

endif;