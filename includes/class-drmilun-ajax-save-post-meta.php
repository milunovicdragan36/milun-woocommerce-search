<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Ajax_Save_Post_Meta') ) :

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MMSDD_Drmilun_Ajax_Save_Post_Meta
 * @subpackage MMSDD_Drmilun_Ajax_Save_Post_Meta/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */

class MMSDD_Drmilun_Ajax_Save_Post_Meta{


  
public function __construct(){
    
    add_action( 'wp_ajax_select_term_id', [$this,'select_term_id' ]);
    add_action( 'wp_ajax_nopriv_select_term_id', [$this,'select_term_id' ]);

   // add_action( 'wp_ajax_form_menus', [$this,'form_menus' ]);
   // add_action( 'wp_ajax_nopriv_form_menus', [$this,'form_menus' ]);

//     add_action( 'wp_ajax_select_woo_term_id', [$this,'select_woo_term_id' ]);
//    add_action( 'wp_ajax_nopriv_select_woo_term_id', [$this,'select_woo_term_id' ]);
         add_action( 'wp_ajax_select_woo_product', [$this,'select_woo_product' ]);
    add_action( 'wp_ajax_nopriv_select_woo_product', [$this,'select_woo_product' ]);


  add_action( 'wp_ajax_select_visibility_post', [$this,'select_visibility_post' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_post', [$this,'select_visibility_post' ]);
    add_action( 'wp_ajax_select_visibility_meta', [$this,'select_visibility_meta' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_meta', [$this,'select_visibility_meta' ]);

         add_action( 'wp_ajax_select_woo_category', [$this,'select_woo_category' ]);
    add_action( 'wp_ajax_nopriv_select_woo_category', [$this,'select_woo_category' ]);

         add_action( 'wp_ajax_select_woo_term_name', [$this,'select_woo_term_name' ]);
    add_action( 'wp_ajax_nopriv_select_woo_term_name', [$this,'select_woo_term_name' ]);


      add_action( 'wp_ajax_select_woo_ratings', [$this,'select_woo_ratings' ]);
    add_action( 'wp_ajax_nopriv_select_woo_ratings', [$this,'select_woo_ratings' ]);
      add_action( 'wp_ajax_select_woo_type_prod', [$this,'select_woo_type_prod' ]);
    add_action( 'wp_ajax_nopriv_select_woo_type_prod', [$this,'select_woo_type_prod' ]);


      
 
     add_action( 'wp_ajax_select_visibility_user', [$this,'select_visibility_user' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_user', [$this,'select_visibility_user' ]);

     add_action( 'wp_ajax_select_visibility_woo_user', [$this,'select_visibility_woo_user' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_woo_user', [$this,'select_visibility_woo_user' ]);


     add_action( 'wp_ajax_select_visibility_sku', [$this,'select_visibility_sku' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_sku', [$this,'select_visibility_sku' ]);
     add_action( 'wp_ajax_select_visibility_title', [$this,'select_visibility_title' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_title', [$this,'select_visibility_title' ]);

add_action( 'wp_ajax_select_visibility_title_of_product', [$this,'select_visibility_title_of_product' ]);
    add_action( 'wp_ajax_nopriv_select_visibility_title_of_product', [$this,'select_visibility_title_of_product' ]);

}

/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_title_of_product() { 
      
 $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 $meta_sk =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST["visibility_title_of_product"]);
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_title = esc_attr(get_post_meta(get_the_ID(),$meta_sk.'hidetitleproduct',$meta_sk)); 
        if($double_title == $meta_sk){
 delete_post_meta(get_the_ID(), $meta_sk.'hidetitleproduct',$meta_sk);


         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $meta_sk.'hidetitleproduct',$meta_sk);
        
}
   endwhile;

    die();
}
/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_post() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_sku = get_post_meta(get_the_ID(), $_POST["visibility_post"],'post_hide'); 
        if($double_sku == 'post_hide' || $double_sku == '0'){
 delete_post_meta(get_the_ID(), $_POST["visibility_post"],'post_hide');
 delete_post_meta(get_the_ID(), $_POST["visibility_post"],'0');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["visibility_post"],'post_hide');
        
}
   endwhile;

    die();
}

/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_meta() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_sku = get_post_meta(get_the_ID(), $_POST["visibility_meta"].'_meta',$_POST["visibility_meta"]); 
        if($double_sku == $_POST["visibility_meta"]){
 delete_post_meta(get_the_ID(), $_POST["visibility_meta"].'_meta',$_POST["visibility_meta"]);

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["visibility_meta"].'_meta',$_POST["visibility_meta"]);
        
}
  
  





 
 
     endwhile;

    die();
}

/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_sku() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_sku = get_post_meta(get_the_ID(), "_sku",$_POST["visibility_sku"].'skuhide');
  
        if($double_sku ==  $_POST["visibility_sku"].'skuhide'){
 delete_post_meta(get_the_ID(), "_sku",$_POST["visibility_sku"].'skuhide');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), '_sku',$_POST["visibility_sku"].'skuhide');
              
        
}


  
  





 
 
     endwhile;

    die();
}
/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_title() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_sku = get_post_meta(get_the_ID(), $_POST["visibility_title"],$_POST["visibility_title"].'hidetitle');
  
        if($double_sku ==  $_POST["visibility_title"].'hidetitle'){
 delete_post_meta(get_the_ID(), $_POST["visibility_title"],$_POST["visibility_title"].'hidetitle');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["visibility_title"],$_POST["visibility_title"].'hidetitle');
              
        
}


  
  





 
 
     endwhile;

    die();
}
/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_user() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
     
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["visibility_user"],$_POST["visibility_user"]."hide_user"); 
        if($double_term_woo_id == $_POST["visibility_user"]."hide_user"){
 delete_post_meta(get_the_ID(), $_POST["visibility_user"],$_POST["visibility_user"]."hide_user");

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["visibility_user"],$_POST["visibility_user"]."hide_user");
        
}


  
  





 
 
     endwhile;

    die();
}



/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_visibility_woo_user() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
     
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["visibility_woo_user"],$_POST["visibility_woo_user"]."hide_woo_user"); 
        if($double_term_woo_id == $_POST["visibility_woo_user"]."hide_woo_user"){
 delete_post_meta(get_the_ID(), $_POST["visibility_woo_user"],$_POST["visibility_woo_user"]."hide_woo_user");

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["visibility_woo_user"],$_POST["visibility_woo_user"]."hide_woo_user");
        
}


  
  





 
 
     endwhile;

    die();
}


    

/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_woo_type_prod() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_type_prod"],'woo_type_prod52'); 
        if($double_term_woo_id == 'woo_type_prod52'){
 delete_post_meta(get_the_ID(), $_POST["woo_type_prod"],'woo_type_prod52');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["woo_type_prod"],'woo_type_prod52');
        
}


  
  





 
 
     endwhile;

    die();
}





/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_woo_ratings() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_ratings"],'woo_ratings51'); 
        if($double_term_woo_id == 'woo_ratings51'){
 delete_post_meta(get_the_ID(), $_POST["woo_ratings"],'woo_ratings51');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["woo_ratings"],'woo_ratings51');
        
}


  
  





 
 
     endwhile;

    die();
}



 

/**
*  select_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    

public function select_term_id() { 






   /*     global $wpdb;
  $wpdb->insert('wp_postmeta', array(
    'meta_id' => 'NULL',
    'post_id' => 259,
    'meta_key' => $_POST["term_id"],
    'meta_value' => $_POST["term_id"], // ... and so on
));
   */
    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
 
   $double_term_id = get_post_meta(get_the_ID(), $_POST["term_id"],'11'); 
        if($double_term_id == '11'){
 delete_post_meta(get_the_ID(), $_POST["term_id"],'11');

         }
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           else{
              add_post_meta(get_the_ID(), $_POST["term_id"],'11');
           }
           
        

  
      
     endwhile;

    die();
   }


/**
*  select_woo_term_id
*
*  This function will change a form of selection that is going to appear 
*  as the searching criteria on front end of website
*
*  @param $post_type (string)
*  @return  (string)
*/
    
public function select_woo_product() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_product_id"],'woo_cat_33'); 
        if($double_term_woo_id == 'woo_pro_33'){
 delete_post_meta(get_the_ID(), $_POST["woo_product_id"],'woo_pro_33');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["woo_product_id"],'woo_pro_33');
        
}


  
  





 
 
     endwhile;

    die();
}


public function select_woo_category() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_category_id"],'woo_cat_33'); 
        if($double_term_woo_id == 'woo_cat_33'){
 delete_post_meta(get_the_ID(), $_POST["woo_category_id"],'woo_cat_33');

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["woo_category_id"],'woo_cat_33');
        
}
/*
global $wpdb;

$wp_postmeta_55 = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->postmeta WHERE meta_value = '".$_POST["woo_term_name"]."'", ARRAY_A ));

$result = array_map(function($x){
    return $x->post_id;
}, $wp_postmeta_55);

$new_a = array_unique($result);

foreach ($new_a as $value) {

  
  


    $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_term_id"],'33'); 
        if($double_term_woo_id == '33'){

 delete_post_meta($value,   "attribute_pa_".$_POST["woo_term_variation"]."",$_POST["woo_term_name"].'55'); 

}
 if($double_term_woo_id != '33'){




add_post_meta($value,   "attribute_pa_".$_POST["woo_term_variation"]."",$_POST["woo_term_name"].'55'); 
}
*/

 //}   

  
  





 
 
     endwhile;

    die();
}

    




public function select_woo_term_name() { 
      

    $args = array(
          'order'           => 'ASC',
          'post_type'       => 'sfp_search_post'
        
        );
 
  
    $the_query = new \WP_Query( $args );
    // The Loop
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
   $double_term_woo_name = get_post_meta(get_the_ID(), $_POST["woo_term_name"]."","woo_term"); 
        if($double_term_woo_name == "woo_term"){
 delete_post_meta(get_the_ID(), $_POST["woo_term_name"],"woo_term");

         }else{
        /* Update post meta in terms of checking what 
           kind of form is selected  */
           
              add_post_meta(get_the_ID(), $_POST["woo_term_name"],"woo_term");
        
}
/*
global $wpdb;

$wp_postmeta_55 = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->postmeta WHERE meta_value = '".$_POST["woo_term_name"]."'", ARRAY_A ));

$result = array_map(function($x){
    return $x->post_id;
}, $wp_postmeta_55);

$new_a = array_unique($result);

foreach ($new_a as $value) {

  
  


    $double_term_woo_id = get_post_meta(get_the_ID(), $_POST["woo_term_id"],'33'); 
        if($double_term_woo_id == '33'){

 delete_post_meta($value,   "attribute_pa_".$_POST["woo_term_variation"]."",$_POST["woo_term_name"]); 

}
 if($double_term_woo_id != '33'){




add_post_meta($value,   "attribute_pa_".$_POST["woo_term_variation"]."",$_POST["woo_term_name"]); 
}


 //}   

  
  }

*/



 
 
     endwhile;

    die();
}

    
    
}

endif;


