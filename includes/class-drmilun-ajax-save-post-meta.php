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
 * @author     Dragan Milunovic <milunovicdragan36@gmail.com>
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


 // add_action( 'wp_ajax_select_visibility_post', [$this,'select_visibility_post' ]);
 //   add_action( 'wp_ajax_nopriv_select_visibility_post', [$this,'select_visibility_post' ]);
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
	if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$meta_sk = isset( $_POST['visibility_title_of_product'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_title_of_product'] ) )
		: '';

	$the_query = new \WP_Query( $args );

	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_title = get_post_meta( get_the_ID(), $meta_sk . 'hidetitleproduct', true );

		if ( $double_title === $meta_sk ) {
			delete_post_meta( get_the_ID(), $meta_sk . 'hidetitleproduct', $meta_sk );
		} else {
			add_post_meta( get_the_ID(), $meta_sk . 'hidetitleproduct', $meta_sk );
		}

	endwhile;

	wp_die();
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
/*
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


			  add_post_meta(get_the_ID(), $_POST["visibility_post"],'post_hide');

}
   endwhile;

	die();
}
*/

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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'search_post',
	);

	$visibility_meta = isset( $_POST['visibility_meta'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_meta'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_sku = get_post_meta( get_the_ID(), $visibility_meta . '_meta', $visibility_meta );
		if ( $double_sku == $visibility_meta ) {
			delete_post_meta( get_the_ID(), $visibility_meta . '_meta', $visibility_meta );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $visibility_meta . '_meta', $visibility_meta );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$visibility_sku = isset( $_POST['visibility_sku'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_sku'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_sku = get_post_meta( get_the_ID(), '_sku', $visibility_sku . 'skuhide' );

		if ( $double_sku == $visibility_sku . 'skuhide' ) {
			delete_post_meta( get_the_ID(), '_sku', $visibility_sku . 'skuhide' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), '_sku', $visibility_sku . 'skuhide' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$visibility_title = isset( $_POST['visibility_title'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_title'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_sku = get_post_meta( get_the_ID(), $visibility_title, $visibility_title . 'hidetitle' );

		if ( $double_sku == $visibility_title . 'hidetitle' ) {
			delete_post_meta( get_the_ID(), $visibility_title, $visibility_title . 'hidetitle' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $visibility_title, $visibility_title . 'hidetitle' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'search_post',
	);

	$visibility_user = isset( $_POST['visibility_user'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_user'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $visibility_user, $visibility_user . 'hide_user' );
		if ( $double_term_woo_id == $visibility_user . 'hide_user' ) {
			delete_post_meta( get_the_ID(), $visibility_user, $visibility_user . 'hide_user' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $visibility_user, $visibility_user . 'hide_user' );
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
	if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$visibility_woo_user = isset( $_POST['visibility_woo_user'] )
		? sanitize_text_field( wp_unslash( $_POST['visibility_woo_user'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $visibility_woo_user, $visibility_woo_user . 'hide_woo_user' );
		if ( $double_term_woo_id == $visibility_woo_user . 'hide_woo_user' ) {
			delete_post_meta( get_the_ID(), $visibility_woo_user, $visibility_woo_user . 'hide_woo_user' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $visibility_woo_user, $visibility_woo_user . 'hide_woo_user' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$woo_type_prod = isset( $_POST['woo_type_prod'] )
		? sanitize_text_field( wp_unslash( $_POST['woo_type_prod'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $woo_type_prod, 'woo_type_prod52' );
		if ( $double_term_woo_id == 'woo_type_prod52' ) {
			delete_post_meta( get_the_ID(), $woo_type_prod, 'woo_type_prod52' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $woo_type_prod, 'woo_type_prod52' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$woo_ratings = isset( $_POST['woo_ratings'] )
		? sanitize_text_field( wp_unslash( $_POST['woo_ratings'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $woo_ratings, 'woo_ratings51' );
		if ( $double_term_woo_id == 'woo_ratings51' ) {
			delete_post_meta( get_the_ID(), $woo_ratings, 'woo_ratings51' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $woo_ratings, 'woo_ratings51' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	/*     global $wpdb;
	$wpdb->insert('wp_postmeta', array(
	  'meta_id' => 'NULL',
	  'post_id' => 259,
	  'meta_key' => $_POST["term_id"],
	  'meta_value' => $_POST["term_id"], // ... and so on
  ));
	*/

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'search_post',
	);

	$term_id = isset( $_POST['term_id'] )
		? sanitize_text_field( wp_unslash( $_POST['term_id'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_id = get_post_meta( get_the_ID(), $term_id, '11' );
		if ( $double_term_id == '11' ) {
			delete_post_meta( get_the_ID(), $term_id, '11' );
		}
		/* Update post meta in terms of checking what
		   kind of form is selected  */
		else {
			add_post_meta( get_the_ID(), $term_id, '11' );
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

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$woo_product_id = isset( $_POST['woo_product_id'] )
		? sanitize_text_field( wp_unslash( $_POST['woo_product_id'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $woo_product_id, 'woo_cat_33' );
		if ( $double_term_woo_id == 'woo_pro_33' ) {
			delete_post_meta( get_the_ID(), $woo_product_id, 'woo_pro_33' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $woo_product_id, 'woo_pro_33' );
		}
	endwhile;

	die();
}

public function select_woo_category() {

		if (
	! isset( $_POST['nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['nonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_send_json_error( 'Security check failed' );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$woo_category_id = isset( $_POST['woo_category_id'] )
		? sanitize_text_field( wp_unslash( $_POST['woo_category_id'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_id = get_post_meta( get_the_ID(), $woo_category_id, 'woo_cat_33' );
		if ( $double_term_woo_id == 'woo_cat_33' ) {
			delete_post_meta( get_the_ID(), $woo_category_id, 'woo_cat_33' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $woo_category_id, 'woo_cat_33' );
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

if (
	! isset( $_POST['_wpnonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ),
		'milun_visibility_nonce'
	)
) {
	wp_die( esc_html__( 'Security check failed', 'milun-woo-search' ) );
}

	$args = array(
		'order'     => 'ASC',
		'post_type' => 'sfp_search_post',
	);

	$woo_term_name = isset( $_POST['woo_term_name'] )
		? sanitize_text_field( wp_unslash( $_POST['woo_term_name'] ) )
		: '';

	$the_query = new \WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$double_term_woo_name = get_post_meta( get_the_ID(), $woo_term_name . '', 'woo_term' );
		if ( $double_term_woo_name == 'woo_term' ) {
			delete_post_meta( get_the_ID(), $woo_term_name, 'woo_term' );
		} else {
			/* Update post meta in terms of checking what
			   kind of form is selected  */
			add_post_meta( get_the_ID(), $woo_term_name, 'woo_term' );
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


