<?php

 
//$post_id =$request['id'];
 global $wpdb;
$post_slug =$request['s'];
$post_slug_second_word =$request['se'];
      
        //var_dump($term);
$custom = get_post_meta( esc_attr($request['id']) );
 
$datepicker_1 = ( isset( $custom['datepicker_1'.$request['id']][0] ) ) ? $custom['datepicker_1'.$request['id']][0] : '';
$datepicker_2 = ( isset( $custom['datepicker_2'.$request['id']][0] ) ) ? $custom['datepicker_2'.$request['id']][0] : '';  




 $show_posts_with_and_without_password = esc_attr(get_post_meta( $request['id'],"show_posts_with_and_without_password", true));

  $show_posts_with_password = esc_attr(get_post_meta( $request['id'],"show_posts_with_password", true));
   //Display how many of posts is in a current category
   $show_posts_without_password = esc_attr(get_post_meta( $request['id'],"show_posts_without_password", true));
   //Display how many of posts is in a current category
  $search_by_title = esc_attr(get_post_meta( $request['id'],"search_by_title", true));

  $search_by_excerpt = esc_attr(get_post_meta( $request['id'],"search_by_excerpt", true));
   //Display how many of posts is in a current category
   $search_by_content = esc_attr(get_post_meta( $request['id'],"search_by_content", true));

$pageposts_1 = [];

///////****search by title******/////////
if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_and_without_password = "1" 
 && $show_posts_with_password!="1" && $show_posts_without_password !="1"
 && $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"
){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id

  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name

  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_postmeta.meta_key = wp_options.option_name /* AND wp_options.option_value = 1*/ AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%' AND wp_posts.post_title LIKE '%$post_slug_second_word%'");
 

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1" && $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_with_and_without_password = "1"  && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND/* AND wp_options.option_value = 1*/ wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'");
}else






if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_password="1" && $show_posts_with_and_without_password != "1" && $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"
 ){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'");


}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_without_password != "1"  && $show_posts_with_password="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_3) && empty($datepicker_4) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'");
}else




if($datepicker_1!='' && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password!="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'");
  

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_without_password="1" && $show_posts_with_password!="1" && $show_posts_with_and_without_password != "1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!=''   && $show_posts_with_password!="1" && $show_posts_without_password ="1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND  wp_posts.post_password='' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2'/* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'
    "));
}


else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password != "1"&& $search_by_title = "1" 
 && $search_by_excerpt!="1" && $search_by_content !="1"){
$pageposts_1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password='' /*AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_title LIKE '%$post_slug%'AND wp_posts.post_title LIKE '%$post_slug_second_word%'", ARRAY_A ));;
}




///////****search by excerpt******/////////
if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_and_without_password = "1" 
 && $show_posts_with_password!="1" && $show_posts_without_password !="1"
 && $search_by_title != "1" 
 && $search_by_excerpt="1"
){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id

  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name

  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_postmeta.meta_key = wp_options.option_name /* AND wp_options.option_value = 1*/ AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'");
 

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1" && $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_with_and_without_password = "1"  && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND/* AND wp_options.option_value = 1*/ wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'");
}else






if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_password="1" && $show_posts_with_and_without_password != "1" && $search_by_title != "1" 
 && $search_by_excerpt="1"
 ){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'");


}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_without_password != "1"  && $show_posts_with_password="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_3) && empty($datepicker_4) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'");
}else




if($datepicker_1!='' && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password!="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'");
  

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_without_password="1" && $show_posts_with_password!="1" && $show_posts_with_and_without_password != "1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!=''   && $show_posts_with_password!="1" && $show_posts_without_password ="1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND  wp_posts.post_password='' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2'/* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'
    "));
}


else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password != "1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password='' /*AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_excerpt LIKE '%$post_slug%'AND wp_posts.post_excerpt LIKE '%$post_slug_second_word%'", ARRAY_A ));;
}

///////****search by content******/////////
if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_and_without_password = "1" 
 && $show_posts_with_password!="1" && $show_posts_without_password !="1"
 && $search_by_title != "1" 
 && $search_by_content="1"
){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id

  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name

  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_postmeta.meta_key = wp_options.option_name /* AND wp_options.option_value = 1*/ AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'");
 

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1" && $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_with_and_without_password = "1"  && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_with_and_without_password = "1" && $show_posts_with_password!="1" && $show_posts_without_password !="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND/* AND wp_options.option_value = 1*/ wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'");
}else






if($datepicker_1!='' && empty($datepicker_2) && $show_posts_with_password="1" && $show_posts_with_and_without_password != "1" && $search_by_title != "1" 
 && $search_by_content="1"
 ){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'");


}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!='' && $show_posts_without_password != "1"  && $show_posts_with_password="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' AND
   wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    "));
}else


if(empty($datepicker_3) && empty($datepicker_4) && $show_posts_with_password="1" && $show_posts_without_password!="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password!='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'");
}else




if($datepicker_1!='' && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password!="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'");
  

}else

if($datepicker_2!='' && empty($datepicker_1) && $show_posts_without_password="1" && $show_posts_with_password!="1" && $show_posts_with_and_without_password != "1"&& $search_by_title != "1" 
 && $search_by_excerpt="1"){
$pageposts_1 = $wpdb->get_results("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_date < '$datepicker_2' AND wp_posts.post_password='' /* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    ");

}else

if($datepicker_1!='' && $datepicker_2!=''   && $show_posts_with_password!="1" && $show_posts_without_password ="1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 =$wpdb->get_results( $wpdb->prepare("SELECT * from wp_posts
   LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
   WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND  wp_posts.post_password='' AND wp_posts.post_date > '$datepicker_1' AND wp_posts.post_date < '$datepicker_2'/* AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'
    "));
}


else


if(empty($datepicker_1) && empty($datepicker_2) && $show_posts_without_password="1" && $show_posts_with_password != "1"&& $search_by_title != "1" 
 && $search_by_content="1"){
$pageposts_1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts 
  LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
  LEFT JOIN wp_options ON  wp_postmeta.meta_key = wp_options.option_name
  WHERE wp_posts.post_type != 'product' AND  wp_posts.post_type != 'product_variation' AND wp_posts.post_type != 'search_post' AND wp_posts.post_type != 'woo_search_post' AND wp_posts.post_type != 'page'AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'attachment' AND wp_posts.post_type != 'nav_menu_item'AND wp_posts.post_type != 'is_search_form' AND wp_posts.post_type != 'revision' AND wp_posts.post_password='' /*AND wp_options.option_value = 1*/ AND wp_postmeta.meta_key = wp_options.option_name AND wp_posts.post_type = wp_options.option_name  AND wp_posts.post_content LIKE '%$post_slug%'AND wp_posts.post_content LIKE '%$post_slug_second_word%'", ARRAY_A ));;
}







 $totalArray_users =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
    LEFT JOIN wp_users ON wp_users.ID =  wp_posts.post_author
    LEFT JOIN wp_postmeta ON wp_postmeta.meta_key =  wp_users.user_login




         WHERE  wp_postmeta.meta_value LIKE '%user'
    "));


 $posts =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
    

  LEFT JOIN wp_postmeta ON wp_posts.post_type = wp_postmeta.meta_key 

     



         WHERE  wp_postmeta.meta_value LIKE '%ost_hide'
    ")); 
if (!empty($posts) && count($totalArray_users)==0) {
 $result_5 = array_values(array_udiff($pageposts_1,$posts, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}


return array_values($files_record); 


}else



 


if (count($posts)==0&&!empty($totalArray_users)) {
$result_5 = array_values(array_udiff($pageposts_1,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}


return array_values($files_record);




}


     
if (count($posts) ==0&& count($totalArray_users)==0) {


return $pageposts_1;




}else



if (!empty($posts) &&!empty($totalArray_users)) {
 



  $result_5 = array_values(array_udiff($pageposts_1,$posts, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}

