<?php
/**
 * Plugin Name: CoderMSIIT Addons
 * Description: The plugin work only if installed Elementor page builder.
 * Version:     1.0.0
 * Author:      Sabirul Islam
 * Author URI:  https://codermsiit.com/
 * Text Domain: msiit-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Elementor Test Extension Class
 */
final class Msiit_Elementor_Dependency {

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
		load_plugin_textdomain( 'msiit-toolkit' );
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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'msiit-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'msiit-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'msiit-toolkit' ) . '</strong>'
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'msiit-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'msiit-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'msiit-toolkit' ) . '</strong>',
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'msiit-toolkit' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'msiit-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'msiit-toolkit' ) . '</strong>',
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
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Msiit_Slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Msiit_Services_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Msiit_Accordion_Widget() );

	}
}
Msiit_Elementor_Dependency::instance();

function msiit_toolkit_scripts() {

    wp_enqueue_style( 'msiit-toolkit', plugin_dir_url( __FILE__ ) . '/toolkit.css', array(), 'v.1.0.0' );
    
    wp_enqueue_script( 'toolkit', plugins_url('assets/js/tookit.js', __FILE__ ), array('jquery'), 'v.1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'msiit_toolkit_scripts' );
