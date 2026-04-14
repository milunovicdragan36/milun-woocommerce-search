<?php

 global $wpdb;
$custom = get_post_meta( esc_attr($request['id']) );
$datepicker_1 = ( isset( $custom['datepicker_1'.$request['id']][0] ) ) ? $custom['datepicker_1'.$request['id']][0] : '';
$datepicker_2 = ( isset( $custom['datepicker_2'.$request['id']][0] ) ) ? $custom['datepicker_2'.$request['id']][0] : '';  





 $show_products_with_and_without_password = esc_attr(get_post_meta( $request['id'],"show_products_with_and_without_password", true));

  $show_products_with_password = esc_attr(get_post_meta( $request['id'],"show_products_with_password", true));
  //Display how many of posts is in a current category
   $show_products_without_password = esc_attr(get_post_meta( $request['id'],"show_products_without_password", true));
   //Display how many of posts is in a current category
 //return  "show_products_with_and_without_password - ".$show_products_with_and_without_password. "show_products_with_password ".$show_products_with_password
 //."show_products_without_password ".$show_products_without_password;
 $search_by_woo_title = esc_attr(get_post_meta( $request['id'],"search_by_woo_title", true));

   //Display how many of posts is in a current category
   $search_by_woo_content = esc_attr(get_post_meta( $request['id'],"search_by_woo_content", true));
$search_attachment_and_images = esc_attr(get_post_meta( $request['id'],"search_attachment_and_images", true));
$files = [];
$files_record = [];

 

///////****search by woo title ******/////////

if($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
",$datepicker_1, $datepicker_1));

}
  

elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){
   
    // phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_password!=''  AND $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1, $datepicker_1));


}
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
   WHERE $wpdb->posts.post_password='' AND $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1, $datepicker_1));


}
///////datepicker 2 is not empty//////////
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_2, $datepicker_2));
}
  

elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){
   
    // phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_password!='' AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
",$datepicker_2, $datepicker_2));

}
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
   WHERE $wpdb->posts.post_password='' AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
",$datepicker_2,$datepicker_2));

}
///////datepicker 1 and datepicker 2 are not empty//////////
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_1!='' && $datepicker_2!='' && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
 $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));
}
  

elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" &&$datepicker_1!='' && $datepicker_2!='' && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password!='' AND  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));

}
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password='' AND  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));

}

///////datepicker 1 and datepicker 2 are empty//////////
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
  

elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password!='' AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
 
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
elseif($search_by_woo_title=="1" && $search_by_woo_content !="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password='' AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
 
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
/////////////////the end of woo title search//////////////////////

///////****search by woo content ******/////////

elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
",$datepicker_1,$datepicker_1));

}
  

elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){
   
    // phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_password!='' AND  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_1));


}
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_1!='' && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
   WHERE $wpdb->posts.post_password='' AND $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date > %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_1));


}
///////datepicker 2 is not empty//////////
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_2,$datepicker_2));
}
  

elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){
   
    // phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_password!='' AND  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_2,$datepicker_2));

}
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
   WHERE $wpdb->posts.post_password='' AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_2,$datepicker_2));

}
///////datepicker 1 and datepicker 2 are not empty//////////
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_1!='' && $datepicker_2!='' && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
 $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));
}
  

elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_1!='' && $datepicker_2!='' && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password!='' AND $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));

}
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && $datepicker_2!='' && empty($datepicker_1) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password='' AND $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
  $wpdb->posts.post_date > %s AND $wpdb->posts.post_date < %s AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
", $datepicker_1,$datepicker_2, $datepicker_1,$datepicker_2));

}

///////datepicker 1 and datepicker 2 are empty//////////
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password = "1" 
 && $show_products_with_password!="1" && $show_products_without_password !="1"
){
    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND 
  
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
  

elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password="1" && $show_products_without_password !="1"
){    
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password!='' AND
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password!='' AND 
 
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
elseif($search_by_woo_title!="1" && $search_by_woo_content =="1" && empty($datepicker_1) && empty($datepicker_2) && $show_products_with_and_without_password != "1" 
 && $show_products_with_password!="1" && $show_products_without_password ="1"
){
// phpcs:ignore WordPress.DB.DirectDatabaseQuery  
$files_record = $wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
 
    
   WHERE  $wpdb->posts.post_password='' AND 
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'  AND $wpdb->posts.post_type = 'product'
  ||  $wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_password='' AND 
 
   $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type != 'sfp_search_post'
   
"));
}
/////////////////the end of woo content search//////////////////////

// for featured images and price
foreach ( $files_record as $row ) {
   $row->thumb = $this->miluse_thumb_for_product_or_variation( $row->ID );
$row->price = wc_get_product( $row->ID )->get_price();

   }
//ratings
 $ratings =$wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->posts

        LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
    LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
    LEFT JOIN $wpdb->terms ON ($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id) 
    LEFT JOIN $wpdb->postmeta ON ($wpdb->terms.slug= $wpdb->postmeta.meta_key)
     
   

 
    WHERE  
       $wpdb->posts.post_type IN ('product', 'product_variation')  
     AND $wpdb->postmeta.meta_value = 'woo_ratings51' OR $wpdb->postmeta.meta_value = 'outofstock' AND  $wpdb->posts.post_title  LIKE '%$post_slug%' AND $wpdb->posts.post_type IN ('product', 'product_variation')  
    "));
$sku =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
      LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_value LIKE CONCAT('%', $wpdb->posts.post_name, '%')

    WHERE meta_key = '_sku' AND meta_value LIKE '%kuhide' AND $wpdb->posts.post_status = 'publish'   AND $wpdb->posts.post_type IN ('product', 'product_variation')
"));
 

global $wpdb;

// 1) Find attribute term taxonomies (pa_%)
$terms = $wpdb->get_results(
    $wpdb->prepare(
        "
        SELECT t.term_id, t.name, t.slug, tt.term_taxonomy_id, tt.taxonomy
        FROM {$wpdb->terms} t
        INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_id = t.term_id
        WHERE tt.taxonomy LIKE %s
        LIMIT 50
        ",
        'pa\_%'
    )
);

if ( empty( $terms ) ) {
    return [];
}

// collect term_taxonomy_ids
$tt_ids = array_map( static fn($r) => (int) $r->term_taxonomy_id, $terms );
$tt_ids = array_values( array_unique( $tt_ids ) );

$placeholders = implode(',', array_fill(0, count($tt_ids), '%d'));

// 2) Fetch products WITH woo_term marker
$sql = $wpdb->prepare(
    "
    SELECT DISTINCT p.*
    FROM {$wpdb->posts} p
    INNER JOIN {$wpdb->term_relationships} tr 
        ON tr.object_id = p.ID
    INNER JOIN {$wpdb->terms} t
        ON t.term_id = tr.term_taxonomy_id
        OR t.term_id = (
            SELECT term_id 
            FROM {$wpdb->term_taxonomy} 
            WHERE term_taxonomy_id = tr.term_taxonomy_id
        )
    INNER JOIN {$wpdb->postmeta} pm
        ON pm.meta_key = t.slug
       AND pm.meta_value = 'woo_term'
    WHERE p.post_type = 'product'
      AND p.post_status = 'publish'
      AND tr.term_taxonomy_id IN ($placeholders)
    ORDER BY p.post_title ASC
    LIMIT 200
    ",
    ...$tt_ids
);

$terms_products = $wpdb->get_results( $sql );

//product titles
 $products_titles =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts 
      LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.meta_value = $wpdb->posts.post_title

    WHERE  meta_key LIKE '%hidetitleproduct' AND $wpdb->posts.post_status = 'publish'   AND $wpdb->posts.post_type IN ('product', 'product_variation')
"));
//users posts
$users =$wpdb->get_results( $wpdb->prepare("SELECT * from $wpdb->posts
      LEFT JOIN $wpdb->users ON $wpdb->posts.post_author = $wpdb->users.ID
      LEFT JOIN $wpdb->postmeta ON $wpdb->users.user_nicename = $wpdb->postmeta.meta_key
    
    WHERE  meta_value LIKE '%hide_woo_user' AND $wpdb->posts.post_status = 'publish'   AND $wpdb->posts.post_type IN ('product', 'product_variation')


"));

$ratings          = is_array($ratings) ? $ratings : [];
$sku              = is_array($sku) ? $sku : [];
$products_titles  = is_array($products_titles) ? $products_titles : [];
$users            = is_array($users) ? $users : [];
$terms_products   = is_array($terms_products) ? $terms_products : [];

if(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
return array_values($files_record);
}
if(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$terms_products, function ($a, $b) {
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
return array_values($files_record_total);
}
if(count($terms_products)==0 && !empty($ratings) && count($sku)==0 && count($products_titles)==0 && count($users)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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
return array_values($files_record_total);
}

elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}



elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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
return array_values($files_record_total);
}


elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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

$result_5 = array_values(array_udiff($files_record,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}







elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && count($users)==0 &&count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
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
return array_values($files_record_total);
}
elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
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

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}












elseif(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && !empty($users)&& count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$users, function ($a, $b) {
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
return array_values($files_record_total);
}
elseif(count($ratings)==0 && count($sku)==0 && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$users, function ($a, $b) {
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

$result_5 = array_values(array_udiff($files_record_total,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);
}






elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}

elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}


elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}

elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);
}







elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}elseif(!empty($ratings) && count($sku)==0 && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);
}







elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}





elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && !empty($sku) && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

return array_values($files_record_total_3);

}



elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}
return array_values($files_record_total_2);

}
elseif(count($ratings)==0 && count($sku)==0 && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$products_titles, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_2,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}





elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && count($users)==0 && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && count($users)==0 && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}



elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && count($sku)==0 && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}







elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(!empty($ratings) && !empty($sku) && count($products_titles)==0 && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}


$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}






elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}
return array_values($files_record_total_3);

}
elseif(count($ratings)==0 && !empty($sku) && !empty($products_titles) && !empty($users)&& !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}





elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && !empty($users) && count($terms_products)==0){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}
return array_values($files_record_total_4);

}

elseif(!empty($ratings) && !empty($sku) && !empty($products_titles) && !empty($users) && !empty($terms_products)){
$result_5 = array_values(array_udiff($files_record,$ratings, function ($a, $b) {
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


$result_6 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_2 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_2[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_2,$products_titles, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_3 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_3[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_3,$users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_4 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_4[$key] = $value;
   }

}

$result_6 = array_values(array_udiff($files_record_total_4,$terms_products, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_6);

$files_record_total_5 = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total_5[$key] = $value;
   }

}
return array_values($files_record_total_5);

}
?>
