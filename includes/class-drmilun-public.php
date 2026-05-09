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
 * @author     Dragan Milunovic <milunovicdragan36@gmail.com>
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
		wp_enqueue_style( 'drmilun-public-popup', plugin_dir_url( __FILE__ ) . '../public/css/drmilun-public-popup.css', array(), '1.0', 'all' );        
 
        wp_enqueue_style( 'before-title-full-width', plugin_dir_url( __FILE__ ) . '../public/css/before-title-full-width.css', array(), '1.0', 'all' );
        
        wp_enqueue_style( 'after-title-full-width', plugin_dir_url( __FILE__ ) . '../public/css/after-title-full-width.css', array(), '1.0', 'all' );
  

        wp_enqueue_style( 'before-loop-full-width', plugin_dir_url( __FILE__ ) . '../public/css/before-loop-full-width.css', array(), '1.0', 'all' );
        
        wp_enqueue_style( 'widget-full-width', plugin_dir_url( __FILE__ ) . '../public/css/widget-full-width.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'shortcode-full-width', plugin_dir_url( __FILE__ ) . '../public/css/shortcode-full-width.css', array(), '1.0', 'all' );


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
    wp_enqueue_script( 'moment');
       


    	//necessery for rendering data in html template	

    wp_enqueue_style( 'dashicons' );      

   // wp_enqueue_script( 'jquery-1.12.4', plugin_dir_url( __FILE__ ) . '../public/js/jquery-1.12.4.js', array(), '1.0', true );
 
 wp_enqueue_script( 'jquery-ui-datepicker');

  wp_enqueue_script( 'datepicker', plugin_dir_url( __FILE__ ) . '../public/js/datepicker.js', array("jquery",'jquery-ui-datepicker','moment'), '1.0', true );
  
	  // Localize the script with new data
	  $translation_array_for_categories = array(
	    'search_results' => __( 'Search Results', 'milun-woo-search' ),
	    'not_found_data' =>  __( 'We could not find any categories for your search. You can give it another try with different criteria.', 'milun-woo-search' )
	 );
     wp_register_script(
    'pop-up-search-bar',
    plugin_dir_url( __FILE__ ) . '../public/js/pop_up_search_bar.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'pop-up-search-bar' );



/* full widt before title */
     wp_register_script(
    'before-title-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/before-title-full-width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'before-title-full-width' );


/* full width after title */
     wp_register_script(
    'after-title-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/after-title-full-width.js',
    array( 'jquery'),
    '1.0',
    true
);

wp_enqueue_script( 'after-title-full-width' );
/* full widt before main loop */
     wp_register_script(
    'before-loop-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/before-loop-full-width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'before-loop-full-width' );

/* full width in shortcode */
     wp_register_script(
    'shortcode-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/shortcode-full-width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'shortcode-full-width' );

/* full width in widget */
     wp_register_script(
    'widget-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/widget-full-width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'widget-full-width' );


/* full width shortcode */
     wp_register_script(
    'shortcode-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/shortcode-full-width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'shortcode-full-width' );

 	  // Localize the script with new data
$translation_array_for_categories = array(
    'search_results' => __( 'Search Results', 'milun-woo-search' ),
    'not_found_data' => __( 'We could not find any categories for your search. You can give it another try with different criteria.', 'milun-woo-search' ),
);

$translation_array_for_products = array(
    'search_results' => __( 'Search Results', 'milun-woo-search' ),
    'not_found_data' => __( 'We could not find any products for your search. You can give it another try with different criteria.', 'milun-woo-search' ),
    'read_more'      => __( 'Read more...', 'milun-woo-search' ),
    'site_url'        => home_url( '/' ),
);
  

 // Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'shortcode-full-width',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'shortcode-full-width',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'shortcode-full-width',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);


/* full width shortcode settings*/
     wp_register_script(
    'shortcode-full-width-settings',
    plugin_dir_url( __FILE__ ) . '../public/js/shortcode-full-width-settings.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'shortcode-full-width-settings' );

// For searching popup
wp_register_script(
    'popup-public',
    plugin_dir_url( __FILE__ ) . '../public/js/drmilun-public-popup.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'popup-public' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'popup-public',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'popup-public',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
	'popup-public',
	'MilunSearch',
	array(
		'root_url' => esc_url_raw( home_url( '/' ) ),
	)
);

// For full width search form before title 
wp_register_script(
    'main-full-width-before-title',
    plugin_dir_url( __FILE__ ) . '../public/js/main-full-width-before-title.js',
    array( 'jquery' ),
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

// For full width search form after title 
wp_register_script(
    'main-full-width-after-title',
    plugin_dir_url( __FILE__ ) . '../public/js/main-full-width-after-title.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'main-full-width-after-title' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'main-full-width-after-title',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'main-full-width-after-title',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'main-full-width-after-title',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);
// For full width search in widget
wp_register_script(
    'main-full-width-widget',
    plugin_dir_url( __FILE__ ) . '../public/js/main-full-width-widget.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'main-full-width-widget' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'main-full-width-widget',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'main-full-width-widget',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'main-full-width-widget',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);


// For full width search form before main loop 
wp_register_script(
    'main-full-width-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/main-full-width-before-loop.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'main-full-width-before-loop' );

// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'main-full-width-before-loop',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'main-full-width-before-loop',
    'liveSearchDataCategories',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'main-full-width-before-loop',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);
// For searching in popups
wp_register_script(
    'show-result-popup',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_popup.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-popup' );


// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-popup',
    'milunPopupData',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);


// For searching in widget
wp_register_script(
    'show-result-widget',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_in_widget.js',
    array( 'jquery' ),
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
    array( 'jquery'),
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
// Great for getting Rest Api data on the front end (Posts)
wp_localize_script(
    'show-result-before-title-full-width',
    'liveSearchDataPosts',
    array(
        'root_url' => esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_products,
    )
);

// Great for getting Rest Api data on the front end (Categories)
wp_localize_script(
    'show-result-before-title-full-width',
    'liveSearchDataCategories',
    array(
        'root_url' =>      esc_url_raw( get_rest_url() ),
        'i18n'     => $translation_array_for_categories,
    )
);

wp_localize_script(
    'main-full-width-before-loop',
    'MilunSearch',
    [
        'root_url' => home_url()
    ]
);

// For searching widget full width
wp_register_script(
    'show-result-widget-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_widget_full_width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-widget-full-width' );

// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-widget-full-width',
    'milunWidgetFullWidth',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);

// For searching shortcode full width
wp_register_script(
    'show-result-shortcode-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_shortcode_full_width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-shortcode-full-width' );

// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-shortcode-full-width',
    'milunShortcodeFullWidth',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);


// For searching before main loop full width
wp_register_script(
    'show-result-before-loop-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_before_loop_full_width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-before-loop-full-width' );
// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-before-loop-full-width',
    'milunBeforeLoopFullWidth',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);

// For searching in before loop
wp_register_script(
    'search-loop-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/search_loop_in_before_loop.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'search-loop-before-loop' );
// For searching in before loop
wp_register_script(
    'show-result-before-loop',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_before_loop.js',
    array( 'jquery' ),
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

 // Great for getting Rest Api data on the front end
   wp_localize_script( 'show-result-before-loop', 'liveSearchDataPosts',[$translation_array_for_products,
            array( 'root_url' => get_rest_url())]);

     wp_localize_script( 'show-result-before-loop', 'liveSearchDataCategories',[$translation_array_for_categories,
            array( 'root_url' => get_rest_url())]);


// For show result after title full width
wp_register_script(
    'show-result-after-title-full-width',
    plugin_dir_url( __FILE__ ) . '../public/js/show_result_after_title_full_width.js',
    array( 'jquery' ),
    '1.0',
    true
);

wp_enqueue_script( 'show-result-after-title-full-width' );


// Pass WooCommerce currency to JS
wp_localize_script(
    'show-result-after-title-full-width',
    'milunAfterTitleFullWidth',
    array(
        'currency_symbol' => get_woocommerce_currency_symbol(),
    )
);


 }

}

endif;