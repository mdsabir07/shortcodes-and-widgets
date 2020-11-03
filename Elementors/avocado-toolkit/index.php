<?php
/**
 * Plugin Name: Avocado Toolkit
 * Description: This plugin use for avocado theme.
 * Version:     1.0.0
 * Author:      Sabirul Islam
 * Author URI:  https://codermsiit.com/
 * Text Domain: avocado-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Elementor Test Extension Class
 */
final class Avocado_Elementor_Dependency {

	/**
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 */
	public function i18n() {
		load_plugin_textdomain( 'avocado-toolkit' );
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
	}

	/**
	 * Admin notice
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'avocado-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'avocado-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'avocado-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'avocado-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'avocado-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'avocado-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'avocado-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'avocado-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'avocado-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 */
	public function init_widgets() {
		// Include Widget files
		require_once( __DIR__ . '/addons.php' );
		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_SectionT_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_Posts_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_Socials_Widget() );

		if ( class_exists( 'WooCommerce' ) ) {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_Categories_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_Pcarousel_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_ProductHovercard_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_ProductChoose_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_AjaxTab_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_SpacifiCat_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_StepCheckout_Widget() );
		}
	}
}
Avocado_Elementor_Dependency::instance();

function avocado_toolkit_scripts() {
	wp_enqueue_style( 'slick', plugin_dir_url( __FILE__ ) . 'assets/css/slick.css', array(), '20151215' );
    wp_enqueue_style( 'avacado-toolkit', plugin_dir_url( __FILE__ ) . '/toolkit.css', array(), '20151215' );
    
    wp_enqueue_script( 'slick', plugins_url('assets/js/slick.min.js', __FILE__ ), array('jquery'), 'v.1.9.0', true );
    wp_enqueue_script( 'toolkit', plugins_url('assets/js/tookit.js', __FILE__ ), array('jquery'), 'v.1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'avocado_toolkit_scripts' );


add_action('wp_ajax_my_ajax_action', 'my_ajax_function');
add_action('wp_ajax_nopriv_my_ajax_action', 'my_ajax_function');

function my_ajax_function() {
    
    if(wp_verify_nonce($_POST['nonce_get'], 'my_ajax_action')) {
        $q = new WP_Query( array(
            'post_type' => 'product',
            'posts_per_page' => 9, 
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $_POST['cat_id'],
                )
            ),
        ));


        $html = '<div class="row">';

        $thumb_id = get_woocommerce_term_meta( $_POST['cat_id'], 'thumbnail_id', true );
        $term_img = wp_get_attachment_image_url(  $thumb_id, 'large' );

        if(!empty($thumb_id)) {
            $html .= '<div class="col-lg-6">
                <div class="fc-featured-thumb" style="background-image:url('.$term_img.')"></div>
            </div>';
        }

        while($q->have_posts()) : $q->the_post();
            global $product;
            $html .= '<div class="col-lg-2">
                <a href="'.get_the_permalink().'" class="single-fc-product">
                    <div class="single-fc-product-bg" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'medium').')"></div>
                    <h4>'.get_the_title().'</h4>
                    <div class="hc-product-price category-product-price">'.$product->get_price_html().'</div>
                </a>
            </div>';
        endwhile; wp_reset_query();

        $html .= '</div>';

       
    } else {
        
        $html = '<div class="alert alert-danger">Error!</div>';
    }


    echo $html;

    die();
}