<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun_Public') ) :
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    MMSDD_Drmilun_Public
 * @subpackage MMSDD_Drmilun_Public/public
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Drmilun_Public {

	
	private $searching_for_posts;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
    /**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $DMSFP_Searching_for_Posts       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	
	public function __construct( $searching_for_posts, $version ) {

		$this->searching_for_posts = $searching_for_posts;
		$this->version = $version;

	}

	
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */

	 public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in DMSFP_Searching_for_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The DMSFP_Searching_for_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'drmilun-public-menu', plugin_dir_url( __FILE__ ) . '../public/css/drmilun-public-menu.css', array(), '1.0', 'all' );

        wp_enqueue_style( 'drmilun-public-widget', plugin_dir_url( __FILE__ ) . '../public/css/drmilun-public-widget.css', array(), '1.0', 'all' );
        
        wp_enqueue_style( 'drmilun-public-before-loop', plugin_dir_url( __FILE__ ) . '../public/css/drmilun-public-before-loop.css', array(), '1.0', 'all' );
 
        wp_enqueue_style( 'before-title-full-width', plugin_dir_url( __FILE__ ) . '../public/css/before-title-full-width.css', array(), '1.0', 'all' );

        
		wp_enqueue_style( 'drmilun-public', plugin_dir_url( __FILE__ ) . '../public/css/drmilun-public.css', array(), '1.0', 'all' );

		wp_enqueue_style("dashicons" );

	wp_enqueue_style( 'jquery-ui', plugin_dir_url( __FILE__ ) . '../public/css/jquery-ui.css', array(), '1.0', 'all' );

   } 
    /**
	 * Register the JavaScript for the public-facing side of the site.
	 */

	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in DMSFP_Searching_for_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The DMSFP_Searching_for_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
  		 */
    
       wp_enqueue_script( 'jquery');
	//moment is necessery for getting a date
       wp_register_script( 'moment', plugin_dir_url( __FILE__ ) . '../public/js/moment.js', array( 'jquery' ),'1.0', true );
    wp_enqueue_script( 'moment');
       


    	//necessery for rendering data in html template	

    wp_enqueue_style( 'dashicons' );      

   // wp_enqueue_script( 'jquery-1.12.4', plugin_dir_url( __FILE__ ) . '../public/js/jquery-1.12.4.js', array(), '1.0', true );
 
 wp_enqueue_script( '1.12.1_jquery-ui', plugin_dir_url( __FILE__ ) . '../public/js/1.12.1_jquery-ui.js', array("jquery"), '1.0', true );

  wp_enqueue_script( 'datepicker', plugin_dir_url( __FILE__ ) . '../public/js/datepicker.js', array("jquery",'1.12.1_jquery-ui','moment'), '1.0', true );
  
	  // Localize the script with new data
	  $translation_array_for_categories = array(
	    'search_results' => __( 'Search Results', 'searching-for-posts' ),
	    'not_found_data' =>  __( 'We could not find any categories for your search. You can give it another try with different criteria.', 'searching-for-posts' )
	 );
     wp_register_script(
    'pop-up-search-bar',
    plugin_dir_url( __FILE__ ) . '../public/js/pop_up_search_bar.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'pop-up-search-bar' );


/* pop up search bar for widget */
     wp_register_script(
    'pop-up-for-widget',
    plugin_dir_url( __FILE__ ) . '../public/js/pop_up_for_widget.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'pop-up-for-widget' );


/* pop up search bar before loop */
     wp_register_script(
    'pop-up-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/pop_up_before_loop.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'pop-up-before-loop' );


/* full widt before title */
     wp_register_script(
    'before-title-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/before-title-full-width.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'before-title-full-width' );
/*
	   $translation_array_for_posts = array(
	    'search_results' => __( 'Search Results', 'searching-for-posts' ),
	    'not_found_data' =>  __( 'We could not find any posts for your search. You can give it another try with different criteria.', 'searching-for-posts' ),
	    'read_more' => __( 'Read more...', 'searching-for-posts' )
	 ); 

   wp_register_script( 'ajax-script-public', plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public.js', array("jquery",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
   wp_enqueue_script( 'ajax-script-public' );

   // Great for getting Rest Api data on the front end
   wp_localize_script( 'ajax-script-public', 'liveSearchDataPosts',[$translation_array_for_posts,
            array( 'root_url' => get_rest_url())]);

     wp_localize_script( 'ajax-script-public', 'liveSearchDataCategories',[$translation_array_for_categories,
            array( 'root_url' => get_rest_url())]); 
          

   wp_localize_script('ajax-script-public', 'wourl', array( 'siteurl' => get_option('siteurl') ));              
   

    
     wp_register_script( 'ajax-script-public-woo', plugin_dir_url( __FILE__ ) . '../public/js/public-woo-shortcode.js', array("jquery",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
   wp_enqueue_script( 'public-woo-shortcode' );

   // Great for getting Rest Api data on the front end
   wp_localize_script( 'public-woo-shortcode', 'liveSearchDataPosts',[$translation_array_for_posts,
            array( 'root_url' => get_rest_url())]);

     wp_localize_script( 'public-woo-shortcode', 'liveSearchDataCategories',[$translation_array_for_categories,
            array( 'root_url' => get_rest_url())]); 
          

   wp_localize_script('public-woo-shortcode', 'woourl', array( 'siteurl' => get_option('siteurl') ));


*/
	  // Localize the script with new data
$translation_array_for_categories = array(
    'search_results' => __( 'Search Results', 'searching-for-posts' ),
    'not_found_data' => __( 'We could not find any categories for your search. You can give it another try with different criteria.', 'searching-for-posts' ),
);

$translation_array_for_products = array(
    'search_results' => __( 'Search Results', 'searching-for-posts' ),
    'not_found_data' => __( 'We could not find any products for your search. You can give it another try with different criteria.', 'searching-for-posts' ),
    'read_more'      => __( 'Read more...', 'searching-for-posts' ),
);

// For searching in menus
wp_register_script(
    'menu-public',
    plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-menu.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'menu-public' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'menu-public',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'menu-public',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'menu-public',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);

// For full width search form before title 
wp_register_script(
    'main-full-width-before-title',
    plugin_dir_url( __FILE__ ) . '../public/js/main-full-width-before-title.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'main-full-width-before-title' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'main-full-width-before-title',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'main-full-width-before-title',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'main-full-width-before-title',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);
// For searching in menus
wp_register_script(
    'show-result-public',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-public' );


// For searching in widget
wp_register_script(
    'show-result-widget',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_in_widget.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-widget' );


// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-widget',
    'milunWidgetData',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);

// For searching before title full width
wp_register_script(
    'show-result-before-title-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_before_title_full_width.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-before-title-full-width' );


// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-before-title-full-width',
    'milunBeforeTitleFullWidth',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);

// For searching in before loop
wp_register_script(
    'search-loop-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/search_loop_in_before_loop.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'search-loop-before-loop' );
// For searching in before loop
wp_register_script(
    'show-result-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_before_loop.js',
    array( 'jquery', '1.12.1_jquery-ui', 'datepicker' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-before-loop' );


// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-before-loop',
    'milunBeforeLoopData',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);



 wp_register_script( 'widget-public-woo', plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-widget.js', array("jquery",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
   wp_enqueue_script( 'widget-public-woo' );

 wp_register_script( 'shortcode-public-woo', plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-shortcode.js', array("jquery",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
   wp_enqueue_script( 'shortcode-public-woo' );



   // Great for getting Rest Api data on the front end
   wp_localize_script( 'shortcode-public-woo', 'liveSearchDataPosts',[$translation_array_for_products,
            array( 'root_url' => get_rest_url())]);

     wp_localize_script( 'shortcode-public-woo', 'liveSearchDataCategories',[$translation_array_for_categories,
            array( 'root_url' => get_rest_url())]);

 //search bar before loop           
 wp_register_script( 'before-loop-public-woo', plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-before-loop.js', array("jquery",'1.12.1_jquery-ui','datepicker' ),'1.0', true );
    
   wp_enqueue_script( 'before-loop-public-woo' );


   
   //for search loop in menu		
   //  wp_register_script( 'show-result-widget', plugin_dir_url( __FILE__ ) . '../public/js/show_result_in_widget.js', array("jquery" ),'1.0', true );
    
   //wp_enqueue_script( 'show-result-widget' );

 }

}

endif;