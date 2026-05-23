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
      'description'                 => esc_html__( 'A search form for your site.', 'milun-woo-search' ),
      'customize_selective_refresh' => true,
      'show_instance_in_rest'       => true,
    );
    parent::__construct( 'searching', esc_html__( 'Milun Search Woo', 'milun-woo-search'), $widget_ops);
           

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

 $posts = get_posts(['post_type' =>"sfp_search_post"]);
                        
                        
foreach ($posts as $post) {
      ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo  esc_attr($post->ID); ?>" >

<?php 

  $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
  
 if ( function_exists('is_shop') && is_shop() ) {
    $search_post_id = wc_get_page_id('shop');
    ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo esc_attr($search_post_id); ?>" >

<?php 
}  


}
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
<input type='hidden' id="search_post_id_woo" value="<?php echo esc_attr($post->ID); ?>">
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
<input type='hidden' id="search_post_id_woo" value="<?php echo esc_attr($post->ID); ?>">
<input type='hidden' id="search_by_title" value="<?php echo esc_attr($search_by_title); ?>" >
<input type='hidden' id="search_by_content" value="<?php echo esc_attr($search_by_content); ?>" >


            <?php  
               
          $title = apply_filters( 'widget_title', $instance['title'] );
   $search_post_id = esc_attr(get_post_meta( esc_attr($instance['title']),"miluse_search_post", esc_attr($instance['title'])));


?>


<?php
}
   $search_categories_woo = esc_attr(get_post_meta( @$post->ID,"search_categories_woo", true)); 
 
 $popup_form = '
      

        <div class="pop_up_popup milun-popup-center">
            <div class="notification-container dismiss">

             
                    <div class="search_popup" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-popup" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
                    </div>
<div class="wrapper-for-data-popup-posts-btn">
        <div class="wrapper-data-container-popup-data-posts">
<div class="data-categories-container-popup"></div>
<div class="data-container-popup"></div>
<div class="data-posts-inc-popup"></div>

<div class="no-data-popup"></div>
                  <div class="data-popup-posts-btn"></div>
    
                    </div>
                 </div>
            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';
$popup_form_without_categories = '
      

        <div class="pop_up_popup milun-popup-center">
            <div class="notification-container dismiss">

             
                    <div class="search_popup" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-popup" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
                    </div>
<div class="wrapper-for-data-popup-posts-btn">
        <div class="wrapper-data-container-popup-data-posts">
<div class="data-container-popup"></div>
<div class="data-posts-inc-popup"></div>

<div class="no-data-popup"></div>
                  <div class="data-popup-posts-btn"></div>
    
                    </div>
                 </div>
            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';    
$widget_full_width = '
    <div class="widget_full_width">
        <div class="notification-container_widget_full_width">
            <div class="search_widget_full_width" style="background-color:transparent;">

                <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                      id="close-search-flyout-widget_full_width"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>

                <input type="text"
                       class="search-term-widget_full_width"
                       placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
            </div>

            <div class="wrapper-data-container-widget_full_width-data-posts">
                <div class="data-categories-container-widget_full_width"></div>
                <div class="data-container-widget_full_width"></div>
                <div class="data-posts-inc-widget_full_width"></div>
                <div class="data-widget_full_width-posts-btn"></div>
                <div class="no-data-widget_full_width"></div>
            </div>
        </div>
    </div>

    <span class="dashicons dashicons-search"
              id="open-widget_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
          role="button"
          tabindex="0"></span>
';

$widget_full_width_without_categories = '
    <div class="widget_full_width">
        <div class="notification-container_widget_full_width">
            <div class="search_widget_full_width" style="background-color:transparent;">

                <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                      id="close-search-flyout-widget_full_width"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>

                <input type="text"
                       class="search-term-widget_full_width"
                       placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
            </div>

            <div class="wrapper-data-container-widget_full_width-data-posts">
                <div class="data-container-widget_full_width"></div>
                <div class="data-posts-inc-widget_full_width"></div>
                <div class="data-widget_full_width-posts-btn"></div>
                <div class="no-data-widget_full_width"></div>
            </div>
        </div>
    </div>

    <span class="dashicons dashicons-search"
              id="open-widget_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
          role="button"
          tabindex="0"></span>
';
$allowed_html = array(
	'div' => array(
		'class' => true,
		'style' => true,
	),
	'span' => array(
		'class'      => true,
		'id'         => true,
		'aria-label' => true,
		'role'       => true,
		'tabindex'   => true,
	),
	'input' => array(
		'type'        => true,
		'class'       => true,
		'style'       => true,
		'placeholder' => true,
	),
	'p' => array(),
	'b' => array(),
);


$form = '';
    if (
    $search_categories_woo == '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo == '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo == '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_category() || $search_categories_woo == '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {
  
 



echo wp_kses_post( $args['before_widget'] ?? '' );

echo wp_kses_post( $args['before_title'] ?? '' ) .
	'<div class="my_wrapper_widget">
		<p><b>' . esc_html( $title ?? '' ) . '</b></p>
		' . wp_kses( $popup_form, $allowed_html ) . '
	</div>' .
	wp_kses_post( $args['after_title'] ?? '' );

echo wp_kses_post( $args['after_widget'] ?? '' );
 
                      
 } else if (
    $search_categories_woo != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_category() || $search_categories_woo != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {
  
 



echo wp_kses_post( $args['before_widget'] ?? '' );

echo wp_kses_post( $args['before_title'] ?? '' ) .
	'<div class="my_wrapper_widget">
		<p><b>' . esc_html( $title ?? '' ) . '</b></p>
		' . wp_kses( $popup_form_without_categories, $allowed_html ) . '
	</div>' .
	wp_kses_post( $args['after_title'] ?? '' );

echo wp_kses_post( $args['after_widget'] ?? '' );
 
                      
 }else if(
  
 $search_categories_woo == '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' &&  is_shop() || $search_categories_woo == '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product() || $search_categories_woo == '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo == '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_tag()             
    ){


echo wp_kses_post( $args['before_widget'] ?? '' );

echo wp_kses_post( $args['before_title'] ?? '' );

echo '<div class="my_wrapper_widget">
	<p><b>' . esc_html( $title ?? '' ) . '</b></p>
	' . wp_kses( $widget_full_width, $allowed_html ) . '
</div>';

echo wp_kses_post( $args['after_title'] ?? '' );

echo wp_kses_post( $args['after_widget'] ?? '' );
    
 }else if(
  
 $search_categories_woo != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' &&  is_shop() || $search_categories_woo != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' &&  is_product() || $search_categories_woo != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' &&  is_product_category() || $search_categories_woo != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' &&  is_product_tag()             
    ){


echo wp_kses_post( $args['before_widget'] ?? '' );

echo wp_kses_post( $args['before_title'] ?? '' );

echo '<div class="my_wrapper_widget">
	<p><b>' . esc_html( $title ?? '' ) . '</b></p>
	' . wp_kses( $widget_full_width_without_categories, $allowed_html ) . '
</div>';

echo wp_kses_post( $args['after_title'] ?? '' );

echo wp_kses_post( $args['after_widget'] ?? '' );
    
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

    // Ensure $instance is always an array
    $instance = wp_parse_args( (array) $instance, array(
        'title' => '',
    ) );

    // Ensure title is a string
    $title = !empty($instance['title']) ? $instance['title'] : '';

    // Always escape IDs and names
    $field_id = esc_attr( $this->get_field_id('title') );
    $field_name = esc_attr( $this->get_field_name('title') );

    ?>
    <p>
        <label for="<?php echo $field_id; ?>">Title:</label>
        <input class="widefat" id="<?php echo $field_id; ?>"
               name="<?php echo $field_name; ?>" type="text"
               value="<?php echo esc_attr($title); ?>" />
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
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title'] ?? '');
    return $instance;
}





}

add_action( 'widgets_init', function(){
register_widget('MILUSE_Drmilun_Widget' );

});

endif;