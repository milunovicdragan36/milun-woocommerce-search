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
  
     

add_shortcode( "woo_search_post", [$this,"add_search_box_2"],10,2);
             

add_filter( 'wp_nav_menu_items', [$this,'miluse_render_subtitle' ],10,2);


 // ✅ Add this (prints icon color on ALL pages, including /shop/)
        add_action( 'wp_enqueue_scripts', [ $this, 'mmsdd_enqueue_search_icon_style' ] );
   
add_action('woocommerce_before_shop_loop', [$this,'milun_render_search_form'], 5);

}
function milun_render_search_form() {

  
  $posts = get_posts(['post_type' =>"sfp_search_post"]);
                        
                        
foreach ($posts as $post) {
           
            $custom = get_post_meta( esc_attr($post->ID) );
            $search_form_before_loop = ( isset( $custom['search_form_before_loop'][0] ) ) ? $custom['search_form_before_loop'][0] : false;

             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
 ?>
  <style type="text/css">
#open-search-flyout-before-loop_full_width{
      color:<?php echo esc_attr($color); ?>!important;

}

                
               .search_before_loop_full_width{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-before_loop_full_width-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-before_loop_full_width-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-before_loop_full_width{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                    
               
            .background_color_of_load_more_button_before_title_full_width{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }
.closeFilePanel_full_width{
    color:<?php echo esc_attr($color); ?>!important;

}
          
               </style>
 <style type="text/css">

   .my_wrapper,
   .child_before_loop{

background-color: white;

border-left-width: 3px !important;

    
    border-width: 3px;
border-color:<?php echo esc_attr($color); ?>!important;
border-style: solid;
}
                
               .search_before-loop{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-before-loop-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-before-loop-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-before-loop{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                    
               
            .background_color_of_load_more_button_before_loop{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }
.closeFilePanel{
    color:<?php echo esc_attr($color); ?>!important;

}
          
               </style>
 <?php
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
 $popup = '
        <div class="pop_up_before_loop milun-popup-center">
            <div class="notification-container">

             
                    <div class="search_before_loop" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-before-loop" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
                    </div>

        <div class="wrapper-data-container-before-loop-data-posts">
<div class="data-categories-container-before-loop"></div>
<div class="data-container-before-loop"></div>
<div class="data-posts-inc-before-loop"></div>

<div class="data-before-loop-posts-btn"></div>
<div class="no-data-before-loop"></div>
                      
                    </div>

            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';

    // Append popup + icon to the existing menu items
    echo $popup; 
}else if (
    $search_form_before_loop == '1' &&
    $search_categories_woo == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1' &&
    $pop_up_form != '1'
) {
 $before_loop_full_width = '
    <div class="before_loop_full_width">
        <div class="notification-container_before_loop_full_width">
            <div class="search_before_loop_full_width" style="background-color:transparent;">

                <span class="dashicons dashicons-no-alt closeFilePanel_full_width"
                      id="close-search-flyout-before-loop_full_width"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>

                <input type="text"
                       class="search-term-before_loop_full_width"
                       style="border: 1px solid #000000;"
                       placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
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

    <span class="dashicons dashicons-search"
              id="open-before-loop_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
          role="button"
          tabindex="0"></span>
';
    // Append popup + icon to the existing menu items
  echo $before_loop_full_width; 
}
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
      <label><input type="checkbox" id="search_categories" name="search_categories"  <?php checked(esc_attr($sanitized_checkbox_category_count_2), 1 ); ?>/><?php esc_html_e("Search Categories and Tags","milun-search"); ?></label>
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
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             $color = $color_of_background;
 ?>
 <style type="text/css">
#open-search-flyout-before-title_full_width{
      color:<?php echo esc_attr($color); ?>!important;

}

                
               .search_before_title_full_width{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-before_title_full_width-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-before_title_full_width-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-before_title_full_width{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                    
               
            .background_color_of_load_more_button_before_title_full_width{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }
.closeFilePanel_full_width{
    color:<?php echo esc_attr($color); ?>!important;

}
          
               </style>
 <?php
}
   $posts = get_posts(['post_type' =>"sfp_search_post"]);
                             
                       
foreach ($posts as $post) {
  
 if ( function_exists('is_shop') && is_shop() ) {
    $search_post_id = wc_get_page_id('shop');
    ?>
<input type='hidden' id="search_post_id" value="<?php echo $search_post_id; ?>" >

<?php 
}
                  $locations = get_theme_mod( 'nav_menu_locations' );

                  echo '<input type="hidden" id="numberofpostswoo" value="'.esc_attr(get_post_meta($post->ID, 'numberofpostswoo', true)).'" >';

                     foreach ($locations as $key =>$value){
       print_r($key);              

      $search_categories_woo = esc_attr(get_post_meta( $post->ID,"search_categories_woo",true));
               
       $full_width_form = esc_attr(get_post_meta( $post->ID,"full_width_form",true));
        $standard_form = esc_attr(get_post_meta( $post->ID,"standard_form",true));
              $pop_up_form = esc_attr(get_post_meta( $post->ID,"pop_up_form",true));
 
       $searchposts_in_title_after =esc_attr(get_post_meta( $post->ID,"searchposts_in_title_after_".$key,true));

        $searchposts_in_title_before =esc_attr(get_post_meta( $post->ID,"searchposts_in_title_before_".$key,true));
       
  // return "search_categories =". $search_categories ." searchposts_in_title_after =". $searchposts_in_title_after ." standard_form =". $standard_form ." full_width_form =". $full_width_form;        

   require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';
  // target multiple possible menu locations
 

    if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1'
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
     // Single menu location array
  // ONLY modify primary menu

    // ALWAYS return items (for ALL menus)
    
            // Add the search icon HTML to the menu
//$header_like_locations = ['primary', 'header', 'main-header'];

if (
    !empty($menu_args->theme_location) &&
    in_array($menu_args->theme_location, [$key], true)
) {                  return $before_title_full_width . $items;

    }

   
    /*
$before_title_full_width = '
    <div class="before_title_full_width">
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
                       placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
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

    <span class="dashicons dashicons-search"
          id="open-search-flyout-before-title_full_width"
          aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
          role="button"
          tabindex="0"></span>
';

return $before_title_full_width . $items;
*/

}

   if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_after == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1'
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

}
    // target multiple possible menu locations

    if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form == '1'&&
    $pop_up_form != '1'
) {

if ($args->theme_location !== 'primary') {
    return $items;
}

    $popup = '
        <div id="for-searching-5"></div>

        <div class="pop_up_menu">
            <div class="notification-container">

             
                    <div class="search_menu" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-menu-full-width" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
                    </div>

        <div class="wrapper-data-container-menu-data-posts">
<div class="data-categories-container-menu"></div>
<div class="data-container-menu"></div>
<div class="data-posts-inc-menu"></div>

<div class="data-menu-posts-btn"></div>
<div class="no-data-menu"></div>
                      
                    </div>

            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';

    // Append popup + icon to the existing menu items
    return $popup 
                      .'<p id="wrapper_of_my_menu">'.$items.'</p>';
}
  if (
    $search_categories_woo == '1' &&
    $searchposts_in_title_before == '1' &&
    $standard_form != '1' &&
    $full_width_form != '1' &&
    $pop_up_form == '1'
) {

if ($args->theme_location !== 'primary') {
    return $items;
}

    $popup = '
        <div id="for-searching-5"></div>

        <div class="pop_up_menu milun-popup-center">
            <div class="notification-container dismiss">

             
                    <div class="search_menu" style="background-color:transparent;">

                      <span class="dashicons dashicons-no-alt closeFilePanel"
                      id="close-search-flyout-before-title"
                      aria-label="Close Search"
                      role="button"
                      tabindex="0"></span>
                        <input type="text"
                               class="search-term-menu" style="border: 1px solid #000000;"
                               placeholder="' . esc_attr__( 'Search...', 'milun-search' ) . '" />
                    </div>

        <div class="wrapper-data-container-menu-data-posts">
<div class="data-categories-container-menu"></div>
<div class="data-container-menu"></div>
<div class="data-posts-inc-menu"></div>

<div class="data-menu-posts-btn"></div>
<div class="no-data-menu"></div>
                      
                    </div>

            </div>
        </div>

        <span class="dashicons dashicons-search"
              id="open-search-flyout-before-title"
              aria-label="' . esc_attr__( 'Search', 'milun-search' ) . '"
              role="button"
              tabindex="0"></span>
    ';

    // Append popup + icon to the existing menu items
    return $popup 
                      .'<p id="wrapper_of_my_menu">'.$items.'</p>';
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
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';
             $background_color_of_load_more_button_menu = ( isset( $custom['background_color_of_load_more_button_menu'][0] ) ) ? $custom['background_color_of_load_more_button_menu'][0] : '#fff';   
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
              $color_for_load_more_text = ( isset( $custom['color_for_load_more_text'][0] ) ) ? $custom['color_for_load_more_text'][0] : '#FFA500';
            
 //            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/style.php';
          
             $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
             

                                
                    //if($searchposts_in_title=="1"){
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
            

          
}
       }        }}
     

 
function add_search_box_2( $items, $args ) {
 
ob_start();


           $posts = get_posts(['post_type' =>"sfp_search_post"]);
                              
                       
foreach ($posts as $post) {

    $search_by_woo_title = esc_attr(get_post_meta( $post->ID,"search_by_woo_title", true));
   $search_by_excerpt = esc_attr(get_post_meta( $post->ID,"search_by_excerpt", true));
   $search_by_content = esc_attr(get_post_meta( $post->ID,"search_by_content", true));
   $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
  
     $searchposts_in_title_woo = esc_attr(get_post_meta( $post->ID,"searchposts_in_title_woo", true));
   ?>
<input type='hidden' id="search_post_id" value="<?php echo esc_attr($post->ID); ?>">
<input type='hidden' id="search_by_woo_title" value="<?php echo esc_attr($search_by_woo_title); ?>" >
<input type='hidden' id="search_by_excerpt" value="<?php echo esc_attr($search_by_excerpt); ?>" >
<input type='hidden' id="search_by_content" value="<?php echo esc_attr($search_by_content); ?>" >
<input type='hidden' id="search_categories" value="<?php echo esc_attr($search_categories); ?>" >


<?php
}

           $posts = get_posts(['post_type' =>"sfp_search_post"]);
                        
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
}
   ?>
  
                
              <style type="text/css">
                /*
               #open-search-flyout,
    #open-search-flyout::before  {
        color: white !important;
                        font-size: 135px;

      }
            /*   
                .dashicons-search {  color:<?php echo $color_of_background; ?> ; 
                     font-size: 35px;
                }*/
              
              </style>
             <?php
// Default arguments
$args = array(
    'status'            => array( 'draft', 'pending', 'private', 'publish' ),
    'type'              => array_merge( array_keys( wc_get_product_types() ) ),
    'parent'            => null,
    'sku'               => '',
    'category'          => array(),
    'tag'               => array(),
    'limit'             => get_option( 'posts_per_page' ),  // -1 for unlimited
    'offset'            => null,
    'page'              => 1,
    'include'           => array(),
    'exclude'           => array(),
    'orderby'           => 'date',
    'order'             => 'DESC',
    'return'            => 'objects',
    'paginate'          => false,
    'shipping_class'    => array(),
);

// Array of product objects
$products = wc_get_products( $args );

// Loop through list of products
foreach( $products as $product ) {

    // Collect product variables
    $product_id   = $product->get_id();
    $product_name = $product->get_name();

    // Output product ID and name
    echo 'Product ID: ' . $product_id . ' is "' . $product_name . '"<br>';

    // Do whatever...

}
/*
// Loop through list of products
foreach( $products as $product ) {

    // Collect product variables
    $product_id[]   = $product->ID;

}
print_r($product_id);
  //$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_id() ), 'single-post-thumbnail' );
   // print_r($image);                                    
     /* if($post_type == "miluse_search_post" || $post_type == "attachment"  || $post_type == "page"|| $post_type == "posts"){
//        return;
      }else{
//if ( ! empty ( $post_types ) ) { // If there are any custom public post types.


      
    register_rest_field( array($post_type),
        'fimg_url',
        array(
            'get_callback'    =>[$this,'miluse_get_rest_featured_image'],
            'update_callback' => null,
            'schema'          => null,
        )
    );

}
   */
    return '<input type="text" class="search-term-shortcode"  placeholder="'.__("Search...","milun-search") .'"/></div>
      <div class="show_result">
<div class="my_wrapper">
<span class="dashicons dashicons-search"></span>
 <div class="child">

<div class="search_shortcode">

<div class="wrapper-data-container-shortcode-data-posts">
<div class="data-container-shortcode data-container-2 hid"></div><div class="data-container-shortcode-2"></div><div class="data-shortcode-posts-btn"></div><div class="data-posts-inc"></div><div class="no-data-shortcode"></div>
</div>

</div>
</div></div>
    '.      
  @$nav. ob_get_clean();

  


}


public function miluse_get_rest_featured_image( $object, $field_name, $request) {
    if( @$object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}
function search_box_function( $nav, $args ) {
global $wpdb;


  /*
    $attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name != '' ORDER BY attribute_name ASC;" );
    set_transient( 'wc_attribute_taxonomies', $attribute_taxonomies );

    $attribute_taxonomies = array_filter( $attribute_taxonomies  ) ;

   

$attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();

if ($attribute_taxonomies) :
    foreach ($attribute_taxonomies as $tax) :
        if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0');
   
 endif;

    endforeach;




      foreach ($taxonomy_terms as $value) {

foreach($value as $val){

echo $val->taxonomy;
};




foreach($value as $val){

echo $val->slug;
};

}

endif;


*/




 $posts = get_posts(['post_type'=>'search_post']);
//$po_id='';
global $wpdb;

$po_id = $wpdb->get_results("SELECT post_id FROM wp_postmeta WHERE meta_key ='search_post_id_title' AND meta_value !=''");
$meta_value = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofposts' AND meta_value !=''");


if($po_id!=[]){
?>
<input type='hidden' 
id="search_post_id_title" value="<?php echo $po_id[0]->post_id ?>">

<input type='hidden' 
id="numberofposts" value="<?php echo $meta_value[0]->meta_value ?>">
<?php  
 $search_categories = esc_attr(get_post_meta( $po_id[0]->post_id,"search_categories", true));

 $posts = get_posts(['post_type'=>'search_post']);

global $wpdb;
//foreach ($posts as $post) {
  


 

           $custom = get_post_meta( esc_attr($po_id[0]->post_id) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             
            ?>
  
                
              <style type="text/css">
                .hid{
                  display: none;
                }
                .data-posts,
                .data-container,
                .data-categories-container{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container div a,   
                .data-container div a{
                  color:<?php echo $color_of_background; ?> !important;
                }
              </style>
             <?php

        $menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='formMenus' AND meta_value !=''");




               // $searchposts_in_title =get_post_meta($po_id[0]->post_id,'searchposts_in_title',true);                  

                 //var_dump($searchposts_in_title);

    if( $args->theme_location == $menu[0]->meta_value){
      $nav = '<li class="menu-header-search"><input type="text" class="search-term" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                     // if($search_categories=="1"){
                       $return = '<div class="data-categories-container hid"></div>';
                       //}
                        $return .= '<div class="data-container data-container-2 hid"></div><div class="data-posts"></div><br><div class="data-button"></div>';

                     
                      return $nav.'<br>'.$return;
                     
    
 }
}
}



function qode_adding_a_search_form_to_the_mobile_menu($item_1,$args) {

           $posts = get_posts(['post_type' =>"search_post"]);
                        
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
            ?>

        

             
<?php

}

?>

           
                <div class="searching-results">

                   <ul class="searching-form">
                    
                     <li>
                      <?php


 
              $posts = get_posts(['post_type' =>"search_post"]);
                        
foreach ($posts as $post) {
             $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));

                $searchposts_in_title =get_post_meta($post->ID,'searchposts_in_title',true);                  
                    if($searchposts_in_title=="1"){
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
             ?>
                
              <style type="text/css">
                .hid{
                  display: none;
                }
                .data-container,
                .data-categories-container{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container div a,   
                .data-container div a{
                  color:<?php echo $color_of_text; ?> !important;
                }
              </style>

             <?php
          
                       $item_1 .= '<li class="qode-mobile-header-search"><input type="text" class="search-term" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                      if($search_categories=="1"){
                       $item_1 .= '<div class="data-categories-container hid"></div>';
                       }
                        $item_1 .= '<div class="data-container hid"></div>';

                     
                      return $item_1;
                      }
                     if($searchposts_in_title!="1"){
                      
                      return $item_1;
                      } 
                    }
                       ?>
                    </li>
                  
 
                   </ul> 
                  
                  </div>

              <?php
  
  

 

}



function render_subtitle_search_post($item_1,$args) {

           $posts = get_posts(['post_type' =>"search_post"]);
                        
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
            ?>

        

              <style type="text/css">
                .hid{
                  display: none;
                }
                .data-container,
                .data-categories-container{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container div a,   
                .data-container div a{
                  color:<?php echo $color_of_text; ?> !important;
                }
              </style>
<?php

}

?>

           
                <div class="searching-results">

                   <ul class="searching-form">
                    
                     <li>
                      <?php

 
              $posts = get_posts(['post_type' =>"search_post"]);
                              
foreach ($posts as $post) {

             $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories_woo", true));

                $searchposts_in_title =get_post_meta($post->ID,'searchposts_in_title_woo',true);                  
                    if($searchposts_in_title=="1"){
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
          
                       $item_1 .= '<li class="qode-mobile-header-search"><input type="text" class="search-term-woo" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                      if($search_categories=="1"){
                       $item_1 .= '<div class="data-categories-container hid"></div>';
                       }
                        $item_1 .= '<div class="data-container hid"></div>';

                     
                      return $item_1;
                      }
                     if($searchposts_in_title!="1"){
                      
                      return $item_1;
                      } 
                    }
                       ?>
                    </li>
                  
 
                   </ul> 
                  
                  </div>

              <?php

}


function render_subtitle($items,$args) {
  global $wpdb;
     $menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='WooFormMenus' AND meta_value !=''");

print_r($menu);


               // $searchposts_in_title =get_post_meta($po_id[0]->post_id,'searchposts_in_title',true);                  

                 //var_dump($searchposts_in_title);

    if( $args->theme_location == @$menu[0]->meta_value){
      $nav = '<li class="menu-header-search"><input type="text" class="search-term" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                     // if($search_categories=="1"){
                       $return = '<div class="data-categories-container hid"></div>';
                       //}
                        $return .= '<div class="data-container data-container-2 hid"></div><div class="data-posts"></div><br><div class="data-button"></div>';

                     
                      return $items.$nav;
                    }else{
                      return $items;
                    }
           $posts = get_posts(['post_type' =>"woo_search_post"]);
                      
foreach ($posts as $post) {
            $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
            ?>

        

              <style type="text/css">
                .hid{
                  display: none;
                }
                .data-container,
                .data-categories-container{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container div a,   
                .data-container div a{
                  color:<?php echo $color_of_text; ?> !important;
                }
              </style>
<?php

}

?>

           
                <div class="searching-results">

                   <ul class="searching-form">
                    
                     <li>
                      <?php

 
              $posts = get_posts(['post_type' =>"woo_search_post"]);
                              
foreach ($posts as $post) {

             $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories_woo", true));

                $searchposts_in_title =get_post_meta($post->ID,'searchposts_in_title_woo',true);                  
                    //if($searchposts_in_title=="1"){
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';

          
             global $wpdb;
     $menu = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='WooFormMenus' AND meta_value !=''");




               // $searchposts_in_title =get_post_meta($po_id[0]->post_id,'searchposts_in_title',true);                  

                 //var_dump($searchposts_in_title);

    if( $args->theme_location == @$menu[0]->meta_value){
      $nav = '<li class="menu-header-search"><input type="text" class="search-term" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                     // if($search_categories=="1"){
                       $return = '<div class="data-categories-container hid"></div>';
                       //}
                        $return .= '<div class="data-container data-container-2 hid"></div><div class="data-posts"></div><br><div class="data-button"></div>';

                     
                      return $items.$nav;
     }   
          /*
                       $item_1 .= '<li class="qode-mobile-header-search"><input type="text" class="search-term-woo" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/></li><br>';
                        
                     // if($search_categories=="1"){
                       $item_1 .= '<div class="data-categories-container hid"></div>';
                       //}
                        $item_1 .= '<div class="data-container hid"></div>';

                     
            */         // return $item_1;
                    //  }
                     
                    }
                       ?>
                    </li>
                  
 
                   </ul> 
                  
                  </div>

              <?php

}

    function dmsfp_register_custom_shortcode($atts, $content=null){
                 
        $search_categories=""; 
      
   extract(shortcode_atts( array('id' => ''), $atts));
  
  $return = $content;
  if($content)
    $return = '<br>';


$search_post_id = esc_attr(get_post_meta( $atts['id'],"search_post", $atts['id']));

$numberofposts = esc_attr(get_post_meta( $atts['id'],"numberofposts", $atts['id']));

?>
<input type='hidden' id="search_post_id" value="<?php echo $search_post_id; ?>" >
<input type='hidden' id="numberofposts" value="<?php echo $numberofposts; ?>" >

<?php 



$search_categories = esc_attr(get_post_meta( $atts['id'],"search_categories", true));
         $return ='<input type="text" class="search-term-shortcode" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/>';

 if($search_categories=="1"){

                       $return .= '<div class="data-categories-container-shortcode hid"></div>';
                       }

                      $custom = get_post_meta( esc_attr($atts['id']) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
               ?>
              <style type="text/css">
                 .hid{
                  display: none;
                }
                 .data-container-shortcode,
                .data-categories-container-shortcode{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container-shortcode div a,   
                .data-container-shortcode div a{
                  color:<?php echo $color_of_text; ?> !important;
                }
              </style>


            <?php

       
                


                                                 $return .= '<div class="data-container-shortcode hid"></div>';
                                              
                                             
                                            return $return;                                      
}
    function woo_register_custom_shortcode(){
       $posts = get_posts(['post_type' =>"woo_search_post"]);
//$po_id='';
global $wpdb;

$po_id = $wpdb->get_results("SELECT post_id FROM wp_postmeta WHERE meta_key ='search_post_id_woo' AND meta_value !=''");
$meta_value = $wpdb->get_results("SELECT meta_value FROM wp_postmeta WHERE meta_key ='numberofposts' AND meta_value !=''");

?>
<input type='hidden' 
id="search_post_id_woo" value="<?php echo $po_id[0]->post_id ?>">


<?php                  
        $search_categories=""; 
         
  //     $posts = get_posts(['post_type' =>"woo_search_post"]);
                        
foreach ($posts as $post) {
 $search_categories = esc_attr(get_post_meta( $post->ID,"search_categories", true));
 
                      $custom = get_post_meta( esc_attr($post->ID) );
             $color_of_background = ( isset( $custom['color_of_background'][0] ) ) ? $custom['color_of_background'][0] : '#fff';  
             $color_of_text = ( isset( $custom['color_of_text'][0] ) ) ? $custom['color_of_text'][0] : '#000';
               ?>
              <style type="text/css">
                 .hid{
                  display: none;
                }
                 .data-container-shortcode,
                .data-categories-container-shortcode{
                    background-color:<?php echo $color_of_background; ?>;
                }
                .data-categories-container-shortcode div a,   
                .data-container-shortcode div a{
                  color:<?php echo $color_of_text; ?> !important;
                }
              </style>


            <?php
               
      }



                      $form = '<input type="text" class="search-term-shortcode-woo" style="max-width: 150px"  placeholder="'.__("Search...","text-domain") .'"/>';
                        
                      if($search_categories=="1"){
                       $form .= '<div class="data-categories-container-shortcode hid"></div>';
                       }
                        $form .= '<div class="data-container-shortcode hid"></div>';

                     
                      return $form;

                    


              
                   
            
     echo  $categories_search_form;           

$attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();

if ($attribute_taxonomies) :
    foreach ($attribute_taxonomies as $tax) :
        if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0');
   
         endif;

    endforeach;
   
   
 $terms_search_form ='<select class="selectedTerms">';
 


$terms_search_form .= '<option value="">'.__("Select Term","searching-for-posts").'</option>';
 


   foreach ($posts as $post) {

      foreach ($taxonomy_terms as $value) {


$searchterms = get_post_meta( $post->ID, "name_term_id_".$value[0]->term_id , true  );            
        
                 
                            if($searchterms=="0"){
   
                              
                            }else{
                       $terms_search_form .='<option value="'.$value[0]->term_id.'">'.$value[0]->name.'</option>';
                         }
}}
                    
     
                          $terms_search_form .='</select>';

 
echo $terms_search_form;
endif;

}}

endif;