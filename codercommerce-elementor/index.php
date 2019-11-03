<?php
/**
 * Plugin Name: Coder Commerce Elementor
 * Description: Custom Elementor Extension for Coder Commerce Theme.
 * Plugin URI:  https://codermsiit.com/
 * Version:     1.0.0
 * Author:      Sabirul Islam
 * Author URI:  https://codermsiit.com/
 * Text Domain: codercommerce-elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Coder_Commerce_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '5.6';
	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {

		load_plugin_textdomain( 'codercommerce-elementor' );

	}

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
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'codercommerce-elementor' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'codercommerce-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'codercommerce-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'codercommerce-elementor' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'codercommerce-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'codercommerce-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'codercommerce-elementor' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'codercommerce-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'codercommerce-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/slider.php' );
		require_once( __DIR__ . '/widgets/content-block.php' );
		require_once( __DIR__ . '/widgets/products.php' );
		require_once( __DIR__ . '/widgets/product-section-title.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Codercommerce_Slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Codercommerce_ContentBlock_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Codercommerce_Products_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Codercommerce_PorductStitle_Widget() );

	}

	public function widget_styles() {
		wp_enqueue_style( 'codercommerce-slider', plugins_url( 'widgets/css/slider.css', __FILE__ ) );
		wp_enqueue_style( 'codercommerce-contentblock', plugins_url( 'widgets/css/content-block.css', __FILE__ ) );
		wp_enqueue_style( 'codercommerce-productstitle', plugins_url( 'widgets/css/product-section-title.css', __FILE__ ) );
	}

	

	// public function init_controls() {
	// 	require_once( __DIR__ . '/controls/test-control.php' );
	// 	\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );
	// }

}
Coder_Commerce_Extension::instance();

/**
 * Enqueue scripts and styles.
 */
function coder_ecommerce_plugn_scripts() {
	wp_enqueue_style( 'slick', plugins_url( 'assets/css/slick.css', __FILE__ ) );

	wp_enqueue_script( 'slick', plugins_url('assets/js/slick.min.js', __FILE__ ), array('jquery'), 'v.1.9.0', true );
}
add_action( 'wp_enqueue_scripts', 'coder_ecommerce_plugn_scripts' );