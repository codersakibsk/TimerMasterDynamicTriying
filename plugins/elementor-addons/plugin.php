<?php
namespace ElementorAddons;

/**
 * Class ElementorAddonsMain
 *
 * Main Plugin class
 * @since 1.2.0
 */
class ElementorAddonsMain {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_style
	 *
	 * Load main style files.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function widget_styles() {
	    //css style
		wp_register_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) );
		wp_enqueue_style( 'owl-carousel' );
	    
		
	}
	public function widget_scripts() {
		
		
		wp_enqueue_script( 'main-elementor-frontend', plugins_url( '/assets/js/main.js', __FILE__ ) );
		
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include__addon_files() {
		require_once( __DIR__ . '/widgets/class-blog-grid.php' );
		require_once( __DIR__ . '/widgets/class-team.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include  Addon Files
		$this->include__addon_files();
		
		// Register  Blog Grid Addon
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\BlogGrid() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\TeamMember() );
		
		
		
	}
    public function add_elementor_widget_categories( $elements_manager ) {

    	$elements_manager->add_category(
    		'custom-addons',
    		[
    			'title' => __( 'Custom Addons', 'elementor-addons' ),
    			'icon' => 'fa fa-plug',
    		]
    	);
    
    }
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget style
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		// Register widget style
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		
		//Register Widget Category
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories'] );
		
	}
}

// Instantiate Plugin Class
ElementorAddonsMain::instance();

