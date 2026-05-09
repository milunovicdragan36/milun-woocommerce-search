<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Shortcode') ) :
/**
 *
 * This class defines is responsible for appering of shortcode of custom post type (search post) that is appearing as form in front end that is made of different searching criteries 
 *
 * @package     MMSDD_Drmilun_Shortcode
 * @subpackage  MMSDD_Drmilun_Shortcode/includes
 * @author      Dragan <drmilun9@gmail.com>
 */
class MMSDD_Drmilun_Shortcode{
    
    public function __construct(){
  
     

add_shortcode( "woo_search_form", [$this, "add_search_box_2"] );             

add_filter( 'wp_nav_menu_items', [$this,'miluse_render_subtitle' ],10,2);


 // ✅ Add this (prints icon color on ALL pages, including /shop/)
        add_action( 'wp_enqueue_scripts', [ $this, 'mmsdd_enqueue_search_icon_style' ] );
   
add_action('woocommerce_before_shop_loop', [$this,'milun_render_search_form'], 5);

}
function milun_render_search_form() {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';

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
            $custom = get_post_meta( esc_attr($post->ID) );
            $search_form_before_loop = ( isset( $custom['search_form_before_loop'][0] ) ) ? $custom['search_form_before_loop'][0] : false;

             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
 
       require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';

   $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo",true));
               
       $full_width_form = esc_attr(get_post_meta( $post->ID,"full_width_form",true));
        $standard_form = esc_attr(get_post_meta( $post->ID,"standard_form",true));
              $pop_up_form = esc_attr(get_post_meta( $post->ID,"pop_up_form",true));
  if (
    $search_form_before_loop == '1' &&
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1'
) {
 

    // Append popup + icon to the existing menu items
    return $popup_form; 
}if (
    $search_form_before_loop == '1' &&
    $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1'
) {
 

    // Append popup + icon to the existing menu items
    return $popup_form_without_categories; 
}else if (
    $search_form_before_loop == '1' &&
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1'
) {
$before_loop_full_width = '
 <div class="before_loop_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-loop_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_before_loop_full_width">
        <div class="search_before_loop_full_width">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-loop_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_loop_full_width"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_loop_full_width-data-posts">
            <div class="data-categories-container-menu"></div>
            <div class="data-container-before_loop_full_width"></div>
            <div class="data-posts-inc-before_loop_full_width"></div>
            <div class="data-before_loop_full_width-posts-btn"></div>
            <div class="no-data-before_loop_full_width"></div>
        </div>
    </div>
</div>
';
    // Append popup + icon to the existing menu items
$allowed_html = array(
	'div'   => array(
		'class' => true,
		'id'    => true,
		'style' => true,
	),
	'span'  => array(
		'class'      => true,
		'id'         => true,
		'aria-label' => true,
		'role'       => true,
		'tabindex'   => true,
	),
	'input' => array(
		'type'        => true,
		'class'       => true,
		'id'          => true,
		'placeholder' => true,
		'value'       => true,
	),
);

echo wp_kses( $before_loop_full_width, $allowed_html );}
else if (
    $search_form_before_loop == '1' &&
    $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1'
) {
$before_loop_full_width_without_categories = '
 <div class="before_loop_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-loop_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_before_loop_full_width">
        <div class="search_before_loop_full_width">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-loop_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_loop_full_width"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_loop_full_width-data-posts">
            <div class="data-container-before_loop_full_width"></div>
            <div class="data-posts-inc-before_loop_full_width"></div>
            <div class="data-before_loop_full_width-posts-btn"></div>
            <div class="no-data-before_loop_full_width"></div>
        </div>
    </div>
</div>
';
    // Append popup + icon to the existing menu items
$allowed_html = array(
	'div'   => array(
		'class' => true,
		'id'    => true,
		'style' => true,
	),
	'span'  => array(
		'class'      => true,
		'id'         => true,
		'aria-label' => true,
		'role'       => true,
		'tabindex'   => true,
	),
	'input' => array(
		'type'        => true,
		'class'       => true,
		'id'          => true,
		'placeholder' => true,
		'value'       => true,
	),
);

echo wp_kses( $before_loop_full_width_without_categories, $allowed_html );}
}}

/**
     * Force color ONLY for <span id="open-search-flyout" class="dashicons dashicons-search"></span>
     */
    public function mmsdd_enqueue_search_icon_style() {

        // Ensure dashicons are loaded on frontend (Woo pages too)
        wp_enqueue_style( 'dashicons' );

        // Get your color from anywhere you want:
        // - option, theme mod, shortcode setting, etc.
        // Replace this with your real source if you have it.
        $color = get_option( 'color_for_load_more_text', '#ffffff' );
 $posts = get_posts(['post_type' =>"sfp_search_post"]);
                             
                       
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
        $css = '
            #open-search-flyout,
            #open-search-flyout::before {
                color: ' . esc_attr( $color ) . ' !important;
                font-size: 35px;
            }
            #open-search-flyout-before-title,
            #open-search-flyout-before-title::before {
                color: ' . esc_attr( $color ) . ' !important;
                font-size: 35px;
            }    
        ';

        // Attach inline CSS to dashicons stylesheet
        wp_add_inline_style( 'dashicons', $css );
}
    }



function miluse_render_subtitle($items,$menu_args) {
    
  $args_2 = array(
   'public'   => true,
   '_builtin' => false,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_1 = get_post_types( $args_2, $output, $operator );


$args_3 = array(
   'public'   => true,
   '_builtin' => true,
);

$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')

$post_types_2 = get_post_types( $args_3, $output, $operator );




$post_types_3 = array_merge($post_types_1,$post_types_2);

foreach ( $post_types_3  as $post_type ) {

      if($post_type == "miluse_search_post" || $post_type == "attachment" || $post_type == "product" ||  $post_type == "product_variation"){
//        return;
      }else{
       
  ?>
  <input type="text" id="post_type_featured_image_menu_<?php echo esc_attr($post_type); ?>" value="<?php echo esc_attr($post_type); ?>" style='display: none;'>
   <?php 


}}

   //Display how many of posts is in a current category
   $search_categories =esc_attr(get_post_meta( get_the_ID(),"search_categories", true));


   $sanitized_checkbox_category_count_2 = $search_categories ==1? $this->dmsfp_prefix_sanitize_input($search_categories, 1): ''; 
 




 ?> 
</p>

<p style="display: none;">
      <label><input type="checkbox" id="search_categories" name="search_categories"  <?php checked(esc_attr($sanitized_checkbox_category_count_2), 1 ); ?>/><?php esc_html_e("Search Categories and Tags","milun-woo-search"); ?></label>
 </p>


 <?php

   global $wpdb;
 
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$meta_value_word = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofwordsinposts' AND meta_value !=''");
?>
<p>
      <label><input type="hidden" id="numberofwordsinposts" name="numberofwordsinposts" min="7" max="40" value="<?php echo esc_attr( @$meta_value_word[0]->meta_value ? @$meta_value_word[0]->meta_value :7);  ?>"></label>
 </p>            <?php

// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$meta_value = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofposts' AND meta_value !=''");
   
  ?>
   <input type="hidden" id="numberofposts" name="numberofposts" min="3" max="15" value="<?php echo esc_attr( @$meta_value[0]->meta_value ? @$meta_value[0]->meta_value :3);  ?>">
<?php
                     

   $posts = get_posts(['post_type' =>"sfp_search_post"]);
                             
                       
foreach ($posts as $post) {
 ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo  esc_attr($post->ID); ?>" >

<?php 

  $custom = get_post_meta( esc_attr($post->ID) );
             $color = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             
     require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';
           
  
 if ( function_exists('is_shop') && is_shop() ) {
    $search_post_id = wc_get_page_id('shop');
    ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo esc_attr($search_post_id); ?>" >

<?php 
}
                  $locations = get_theme_mod( 'nav_menu_locations' );

                  echo '<input type="hidden" id="numberofpostswoo" value="'.esc_attr(get_post_meta($post->ID, 'numberofpostswoo', true)).'" >';

                     foreach ($locations as $key =>$value){

      $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo",true));
               
       $full_width_form = esc_attr(get_post_meta( $post->ID,"full_width_form",true));
        $standard_form = esc_attr(get_post_meta( $post->ID,"standard_form",true));
              $pop_up_form = esc_attr(get_post_meta( $post->ID,"pop_up_form",true));
 
       $searchposts_in_title_after =esc_attr(get_post_meta( $post->ID,"searchposts_in_title_after_".$key,true));

        $searchposts_in_title_before =esc_attr(get_post_meta( $post->ID,"searchposts_in_title_before_".$key,true));
       
  // return "search_categories =". $search_categories ." searchposts_in_title_after =". $searchposts_in_title_after ." standard_form =". $standard_form ." full_width_form =". $full_width_form;        

  // target multiple possible menu locations
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
    if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop()  || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {

$before_title_full_width = '
 <div class="before_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_full_width">
        <div class="search_before_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_title_full_width-data-posts">
            <div class="data-categories-container-menu"></div>
            <div class="data-container-before_title_full_width"></div>
            <div class="data-posts-inc-before_title_full_width"></div>
            <div class="data-before_title_full_width-posts-btn"></div>
            <div class="no-data-before_title_full_width"></div>
        </div>
    </div>
</div>
';

$before_title_full_width_without_categories = '
 <div class="before_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_full_width">
        <div class="search_before_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_title_full_width-data-posts">
            <div class="data-container-before_title_full_width"></div>
            <div class="data-posts-inc-before_title_full_width"></div>
            <div class="data-before_title_full_width-posts-btn"></div>
            <div class="no-data-before_title_full_width"></div>
        </div>
    </div>
</div>
';
if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) {                  return $before_title_full_width . $items;

    }


}else if (
    $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {



$before_title_full_width_without_categories = '
 <div class="before_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_full_width">
        <div class="search_before_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_title_full_width-data-posts">
            <div class="data-container-before_title_full_width"></div>
            <div class="data-posts-inc-before_title_full_width"></div>
            <div class="data-before_title_full_width-posts-btn"></div>
            <div class="no-data-before_title_full_width"></div>
        </div>
    </div>
</div>
';
if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) {                  return $before_title_full_width_without_categories . $items;

    }


}

  else if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {

$after_title_full_width = '
 <div class="after_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-after-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_after_title_full_width">
        <div class="search_after_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-after-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-after_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-after_title_full_width-data-posts">
            <div class="data-categories-container-menu"></div>
            <div class="data-container-after_title_full_width"></div>
            <div class="data-posts-inc-after_title_full_width"></div>
            <div class="data-after_title_full_width-posts-btn"></div>
            <div class="no-data-after_title_full_width"></div>
        </div>
    </div>
</div>
';


if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) {                  return $items. $after_title_full_width ;

    }

}else if (
    $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop() || $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {

$after_title_full_width_without_categories = '
 <div class="after_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-after-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_after_title_full_width">
        <div class="search_after_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-after-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-after_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-after_title_full_width-data-posts">
            <div class="data-container-after_title_full_width"></div>
            <div class="data-posts-inc-after_title_full_width"></div>
            <div class="data-after_title_full_width-posts-btn"></div>
            <div class="no-data-after_title_full_width"></div>
        </div>
    </div>
</div>
';


if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) {                  return $items. $after_title_full_width_without_categories ;

    }

}
    // target multiple possible menu locations

 else   if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {



   
$before_title_full_width = '
 <div class="before_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_full_width">
        <div class="search_before_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_title_full_width-data-posts">
            <div class="data-categories-container-menu"></div>
            <div class="data-container-before_title_full_width"></div>
            <div class="data-posts-inc-before_title_full_width"></div>
            <div class="data-before_title_full_width-posts-btn"></div>
            <div class="no-data-before_title_full_width"></div>
        </div>
    </div>
</div>
';
if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    return $before_title_full_width.$items;

    }
   
}else if (
    $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_shop() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1' && is_product_tag()
) {



   
$before_title_full_width_without_categories = '
 <div class="before_title_full_width">
    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="Search"
          role="button"
          tabindex="0"></span>

    <div class="notification-container_full_width">
        <div class="search_before_title_full_width" style="background-color:transparent;">
            <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                  id="close-search-flyout-before-title_full_width"
                  aria-label="Close Search"
                  role="button"
                  tabindex="0"></span>

            <input type="text"
                   class="search-term-before_title_full_width"
                   style="border: 1px solid #000000;"
                   placeholder="Search..." />
        </div>

        <div class="wrapper-data-container-before_title_full_width-data-posts">
            <div class="data-container-before_title_full_width"></div>
            <div class="data-posts-inc-before_title_full_width"></div>
            <div class="data-before_title_full_width-posts-btn"></div>
            <div class="no-data-before_title_full_width"></div>
        </div>
    </div>
</div>
';
if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    return $before_title_full_width_without_categories.$items;

    }
   
}
 else if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_category() || $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {

   
    if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    // Append popup + icon to the existing menu items
    return $popup_form
                     .$items;
}
}else if (
    $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_category() || $search_categories_woo != '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {

   
    if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    // Append popup + icon to the existing menu items
    return $popup_form_without_categories
                     .$items;
}
}

   if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_category() || $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {

    if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    // Append popup + icon to the existing menu items
    return 
                      $items.$popup_form;
}
}  else if (
    $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product() || $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' &&  is_product_category() || $search_categories_woo != '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_product_tag()
) {

    if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) { // Append popup + icon to the existing menu items
    // Append popup + icon to the existing menu items
    return 
                      $items.$popup_form_without_categories;
}
}



}  
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$menu =$wpdb->get_results($wpdb->prepare("SELECT meta_key,meta_value FROM wp_postmeta
    


    WHERE  wp_postmeta.meta_key LIKE %s AND wp_postmeta.meta_value='1'",$wpdb->esc_like('searchposts_in_title_') . '%' ));
//

    if(@$menu[0]->meta_key=="searchposts_in_title_".$key && $args_1->theme_location==$key|| @$menu[1]->meta_key=="searchposts_in_title_".$key && $args_1->theme_location==$key|| @$menu[2]->meta_key=="searchposts_in_title_".$key && $args_1->theme_location==$key|| @$menu[3]->meta_key=="searchposts_in_title_".$key && $args_1->theme_location==$key){

 
              $posts = get_posts(['post_type' =>"sfp_search_post"]);
                             
                       
foreach ($posts as $post) {
    $search_by_title = esc_attr(get_post_meta( $post->ID,"search_by_title", true));
   $search_by_excerpt = esc_attr(get_post_meta( $post->ID,"search_by_excerpt", true));
   $search_by_content = esc_attr(get_post_meta( $post->ID,"search_by_content", true));
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
   
   ?>
<input type='hidden' id="search_post_id" value="<?php echo esc_attr($post->ID); ?>">
<input type='hidden' id="search_by_title" value="<?php echo esc_attr($search_by_title); ?>" >
<input type='hidden' id="search_by_excerpt" value="<?php echo esc_attr($search_by_excerpt); ?>" >
<input type='hidden' id="search_by_content" value="<?php echo esc_attr($search_by_content); ?>" >
<?php

                      $custom = get_post_meta( esc_attr($post->ID) );
             $color = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';
            
 //            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';
          
             $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
             

                                
                    //if($searchposts_in_title=="1"){
                      $custom = get_post_meta( esc_attr($post->ID) );
            

          
}
       }        }}
     

 
 public function add_search_box_2( $atts ) {
    
ob_start();
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';

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

           $posts = get_posts(['post_type' =>"sfp_search_post"]);
                        
                        
foreach ($posts as $post) {
         ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo  esc_attr($post->ID); ?>" >

<?php 

  $custom = get_post_meta( esc_attr($post->ID) );
             $color = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
           
  
 if ( function_exists('is_shop') && is_shop() ) {
    $search_post_id = wc_get_page_id('shop');
    ?>
<input type='hidden' id="search_post_id_woo" value="<?php echo esc_attr($search_post_id); ?>" >

<?php 
}   
            $custom = get_post_meta( esc_attr($post->ID) );
            $search_form_before_loop = ( isset( $custom['search_form_before_loop'][0] ) ) ? $custom['search_form_before_loop'][0] : false;

             $color = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
           
 
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';

 
   $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo",true));
               
       $full_width_form = esc_attr(get_post_meta( $post->ID,"full_width_form",true));
        $standard_form = esc_attr(get_post_meta( $post->ID,"standard_form",true));
              $pop_up_form = esc_attr(get_post_meta( $post->ID,"pop_up_form",true));
  if (
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || is_product() || is_product_category() || is_product_tag()
) {


    // Append popup + icon to the existing menu items
    return $popup_form; 
}else if (
    $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' && is_shop() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' &&  is_product() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' &&  is_product_category() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1' &&  is_product_tag()
) {


    // Append popup + icon to the existing menu items
    return $popup_form_without_categories; 
}

else if (
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_shop() ||  $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product() ||  $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_category() ||  $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_tag()
) {
$shortcode_full_width  = '
  <div class="shortcode_full_width">
        <div class="notification-container_shortcode_full_width">
            <div class="search_shortcode_full_width" style="background-color:transparent;">

                <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                      id="close-search-flyout-shortcode_full_width"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>

                <input type="text"
                       class="search-term-shortcode_full_width"
                       placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
            </div>

            <div class="wrapper-data-container-shortcode_full_width-data-posts">
                <div class="data-categories-container-menu"></div>
                <div class="data-container-shortcode_full_width"></div>
                <div class="data-posts-inc-shortcode_full_width"></div>
                <div class="data-shortcode_full_width-posts-btn"></div>
                <div class="no-data-shortcode_full_width"></div>
            </div>
        </div>
    </div>

    <span class="dashicons dashicons-search"
              id="open-shortcode_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
          role="button"
          tabindex="0"></span>
';
    // Append popup + icon to the existing menu items
 return $shortcode_full_width;

}else if (
    $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_shop() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_category() || $search_categories_woo != '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1' && is_product_tag()
) {
$shortcode_full_width_without_categories  = '
  <div class="shortcode_full_width">
        <div class="notification-container_shortcode_full_width">
            <div class="search_shortcode_full_width" style="background-color:transparent;">

                <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                      id="close-search-flyout-shortcode_full_width"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>

                <input type="text"
                       class="search-term-shortcode_full_width"
                       placeholder="' . esc_attr__( 'Search...', 'milun-woo-search' ) . '" />
            </div>

            <div class="wrapper-data-container-shortcode_full_width-data-posts">
                <div class="data-container-shortcode_full_width"></div>
                <div class="data-posts-inc-shortcode_full_width"></div>
                <div class="data-shortcode_full_width-posts-btn"></div>
                <div class="no-data-shortcode_full_width"></div>
            </div>
        </div>
    </div>

    <span class="dashicons dashicons-search"
              id="open-shortcode_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-woo-search' ) . '"
          role="button"
          tabindex="0"></span>
';
    // Append popup + icon to the existing menu items
 return $shortcode_full_width_without_categories;

}

}
echo wp_kses_post( ob_get_clean() );

  


}


public function miluse_get_rest_featured_image( $object, $field_name, $request) {
    if( @$object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}


   

               

}

endif;