<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('MMSDD_Drmilun') ) :
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 * 
 *
 *
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    MMSDD_Drmilun
 * @subpackage MMSDD_Drmilun/includes
 * @author     Dragan Milunovic <drmilun9@gmail.com>
 */
class MMSDD_Drmilun {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      DMSFP_Searching_for_Posts_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $DMSFP_Searching_for_Posts    The string used to uniquely identify this plugin.
	 */
	protected $dmsfp_searching_for_posts;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'MMSDD_Searching_for_Posts_VERSION' ) ) {
			$this->version = MMSDD_Searching_for_Posts_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->dmsfp_milun_search = 'milun-search';

		$this->dmsfp_load_dependencies();
		$this->dmsfp_set_locale();
		$this->dmsfp_define_admin_hooks();
		$this->dmsfp_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - MMSDD_Drmilun_Loader. Orchestrates the hooks of the plugin.
	 * - MMSDD_Drmilun_i18n. Defines internationalization functionality.
	 * - MMSDD_Drmilun_Admin. Defines all hooks for the admin area.
	 * - MMSDD_Drmilun_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function dmsfp_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-i18n.php';
        

        /**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-shortcode.php'; 

         
		 /**
		 * The class responsible for defining internationalization functionality
		 * onew_form_for_searchingf the plugin.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-post-meta.php'; 

		 /**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-ajax-save-post-meta.php'; 

		/**
		 * The class responsible for creating custom post type that is going to use
		 *  as a search form of the plugin.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-search-post.php'; 
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-widget.php'; 
		
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-public.php';
		
       require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-drmilun-admin-categories.php';
	
		$this->loader = new MMSDD_Drmilun_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the DMSFP_Searching_for_Posts_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function dmsfp_set_locale() {

		$plugin_i18n = new MMSDD_Drmilun_i18n();

		$this->loader->dmsfp_add_action( 'plugins_loaded', $plugin_i18n, 'dmsfp_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function dmsfp_define_admin_hooks() {
        

	   $plugin_admin = new MMSDD_Drmilun_Admin( $this->dmsfp_get_searching_for_posts(), $this->get_version() );

       $plugin_woo_search_post = new MMSDD_Drmilun_Search_Post($this->dmsfp_get_searching_for_posts(), $this->get_version());
       /*
       $plugin_search_post = new MMSDD_Drmilun_Search_Post($this->dmsfp_get_searching_for_posts(), $this->get_version());
*/
       $plugin_meta = new MMSDD_Drmilun_Meta($this->dmsfp_get_searching_for_posts(), $this->get_version());


        new MMSDD_Drmilun_Ajax_Save_Post_Meta($this->dmsfp_get_searching_for_posts(), $this->get_version());

       new  MMSDD_Drmilun_Categories(); 
      

       new MMSDD_Drmilun_Shortcode($this->dmsfp_get_searching_for_posts(), $this->get_version());

	   $this->loader->dmsfp_add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

	   $this->loader->dmsfp_add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        
//       $this->loader->dmsfp_add_action( 'admin_menu', $plugin_search_post, 'bobcares_plugin_top_menu' ); 

//     $this->loader->dmsfp_add_action( 'init', $plugin_woo_search_post, 'woo_new_form_for_searching' ); 

	  
	   $this->loader->dmsfp_add_action( 'init', $plugin_meta, 'sfp_register_and_save_meta_boxes' ); 
        
	   $this->loader->dmsfp_add_filter( 'manage_search_post_posts_columns',$plugin_woo_search_post, 'smashing_search_post_columns' ); 

       $this->loader->dmsfp_add_action( 'manage_search_post_posts_custom_column', $plugin_woo_search_post, 'custom_search_post_column',10,2 ); 

         $this->loader->dmsfp_add_filter( 'manage_woo_search_post_posts_columns',$plugin_woo_search_post, 'smashing_woo_search_post_columns' ); 

       $this->loader->dmsfp_add_action( 'manage_woo_search_post_posts_custom_column', $plugin_woo_search_post, 'custom_woo_search_post_column',10,2 ); 

       
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function dmsfp_define_public_hooks() {

		$plugin_public = new MMSDD_Drmilun_Public
		($this->dmsfp_get_searching_for_posts(), $this->get_version());

		
		$this->loader->dmsfp_add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->dmsfp_add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function dmsfp_run() {
		$this->loader->dmsfp_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function dmsfp_get_searching_for_Posts() {
		return $this->dmsfp_searching_for_posts;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    DMSFP_Searching_for_Posts_Loader    Orchestrates the hooks of the plugin.
	 */
	public function dmsfp_get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

endif;