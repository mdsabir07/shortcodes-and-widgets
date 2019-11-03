<?php
/**
 * Skembedjis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skembedjis
 */

if ( ! function_exists( 'skembedjis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skembedjis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Skembedjis, use a find and replace
		 * to change 'skembedjis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skembedjis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in another location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'skembedjis' ),
		) );

		register_nav_menus( array(
			'menu-top' => esc_html__( 'Top', 'skembedjis' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'skembedjis_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'skembedjis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skembedjis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'skembedjis_content_width', 640 );
}
add_action( 'after_setup_theme', 'skembedjis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skembedjis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skembedjis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skembedjis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer top left widgets', 'skembedjis' ),
		'id'            => 'footer-tl',
		'description'   => esc_html__( 'Add footer widgets here.', 'skembedjis' ),
		'before_widget' => '<div id="%1$s" class="col widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer top right widgets', 'skembedjis' ),
		'id'            => 'footer-tr',
		'description'   => esc_html__( 'Add footer widgets here.', 'skembedjis' ),
		'before_widget' => '<div id="%1$s" class="col widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer bottom left widgets', 'skembedjis' ),
		'id'            => 'footer-bl',
		'description'   => esc_html__( 'Add footer bottom widgets here.', 'skembedjis' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social media widgets', 'skembedjis' ),
		'id'            => 'footer-br',
		'description'   => esc_html__( 'Add footer bottom widgets here.', 'skembedjis' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'skembedjis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skembedjis_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), 'v4.1.3', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), 'v4.7', 'all' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap' );
	wp_enqueue_style( 'skembedjis-default', get_template_directory_uri() . '/assets/css/default.css', array(), 'v1.0', 'all' );
	wp_enqueue_style( 'skembedjis-style', get_stylesheet_uri() );

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper-1.14.3.min.js', array('jquery'), 'v1.12.9', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 'v4.0', true );
	wp_enqueue_script( 'skembedjis-theme', get_theme_file_uri().'/assets/js/skembedjis-theme.js', array('jquery'), 'v1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skembedjis_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/skembedjis-woocommerce/woocommerce.php';
}

/**
 * Load Codestar Framework compatibility files.
 */
require get_template_directory() . '/inc/cs-framework/cs-framework.php';
require get_template_directory() . '/inc/metabox-and-options.php';

add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

function remove_pgz_theme_support() { 
remove_theme_support( 'wc-product-gallery-zoom' );
}

function meks_disable_srcset( $sources ) {
    return false;
}

add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );



// simple contact form
class WPSE_299521_Form {

    /**
     * Class constructor
     */
    public function __construct() {

        $this->define_hooks();
    }

    public function controller() {

        if( isset( $_POST['submit'] ) ) { // Submit button

            $full_name   = filter_input( INPUT_POST, 'full_name', FILTER_SANITIZE_STRING );
            $email       = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING | FILTER_SANITIZE_EMAIL );
            $color       = filter_input( INPUT_POST, 'color', FILTER_SANITIZE_STRING );
            $accessories = filter_input( INPUT_POST, 'accessories', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY );
            $comments    = filter_input( INPUT_POST, 'comments', FILTER_SANITIZE_STRING );

            // Send an email and redirect user to "Thank you" page.
        }
    }

    /**
     * Display form
     */
    public function display_form() {

        $full_name   = filter_input( INPUT_POST, 'full_name', FILTER_SANITIZE_STRING );
        $email       = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING | FILTER_SANITIZE_EMAIL );
        $color       = filter_input( INPUT_POST, 'color', FILTER_SANITIZE_STRING );
        $accessories = filter_input( INPUT_POST, 'accessories', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY );
        $comments    = filter_input( INPUT_POST, 'comments', FILTER_SANITIZE_STRING );

        // Default empty array
        $accessories = ( $accessories === null ) ? array() : $accessories;

        $output = '';

        $output .= '<form method="post">';
        $output .= '    <p>';
        $output .= '        ' . $this->display_text( 'full_name', 'Name', $full_name );
        $output .= '    </p>';
        $output .= '    <p>';
        $output .= '        ' . $this->display_text( 'email', 'Email', $email );
        $output .= '    </p>';
        $output .= '    <p>';
        $output .= '        ' . $this->display_radios( 'color', 'Color', $this->get_available_colors(), $color );
        $output .= '    </p>';
        $output .= '    <p>';
        $output .= '        ' . $this->display_checkboxes( 'accessories', 'Accessories', $this->get_available_accessories(), $accessories );
        $output .= '    </p>';
        $output .= '    <p>';
        $output .= '        ' . $this->display_textarea( 'comments', 'comments', $comments );
        $output .= '    </p>';
        $output .= '    <p>';
        $output .= '        <input type="submit" name="submit" value="Submit" />';
        $output .= '    </p>';
        $output .= '</form>';

        return $output;
    }

    /**
     * Display text field
     */
    private function display_text( $name, $label, $value = '' ) {

        $output = '';

        $output .= '<label>' . esc_html__( $label, 'wpse_299521' ) . '</label>';
        $output .= '<input type="text" name="' . esc_attr( $name ) . '" value="' . esc_attr( $value ) . '">';

        return $output;
    }

    /**
     * Display textarea field
     */
    private function display_textarea( $name, $label, $value = '' ) {

        $output = '';

        $output .= '<label> ' . esc_html__( $label, 'wpse_299521' ) . '</label>';
        $output .= '<textarea name="' . esc_attr( $name ) . '" >' . esc_html( $value ) . '</textarea>';

        return $output;
    }

    /**
     * Display radios field
     */
    private function display_radios( $name, $label, $options, $value = null ) {

        $output = '';

        $output .= '<label>' . esc_html__( $label, 'wpse_299521' ) . '</label>';

        foreach ( $options as $option_value => $option_label ):
            $output .= $this->display_radio( $name, $option_label, $option_value, $value );
        endforeach;

        return $output;
    }

    /**
     * Display single checkbox field
     */
    private function display_radio( $name, $label, $option_value, $value = null ) {

        $output = '';

        $checked = ( $option_value === $value ) ? ' checked' : '';

        $output .= '<label>';
        $output .= '    <input type="radio" name="' . esc_attr( $name ) . '" value="' . esc_attr( $option_value ) . '"' . esc_attr( $checked ) . '>';
        $output .= '    ' . esc_html__( $label, 'wpse_299521' );
        $output .= '</label>';

        return $output;
    }

    /**
     * Display checkboxes field
     */
    private function display_checkboxes( $name, $label, $options, $values = array() ) {

        $output = '';

        $name .= '[]';

        $output .= '<label>' . esc_html__( $label, 'wpse_299521' ) . '</label>';

        foreach ( $options as $option_value => $option_label ):
            $output .= $this->display_checkbox( $name, $option_label, $option_value, $values );
        endforeach;

        return $output;
    }

    /**
     * Display single checkbox field
     */
    private function display_checkbox( $name, $label, $available_value, $values = array() ) {

        $output = '';

        $checked = ( in_array($available_value, $values) ) ? ' checked' : '';

        $output .= '<label>';
        $output .= '    <input type="checkbox" name="' . esc_attr( $name ) . '" value="' . esc_attr( $available_value ) . '"' . esc_attr( $checked ) . '>';
        $output .= '    ' . esc_html__( $label, 'wpse_299521' );
        $output .= '</label>';

        return $output;
    }

    /**
     * Get available colors
     */
    private function get_available_colors() {

        return array(
            'red' => 'Red',
            'blue' => 'Blue',
            'green' => 'Green',
        );
    }

    /**
     * Get available accessories
     */
    private function get_available_accessories() {

        return array(
            'case' => 'Case',
            'tempered_glass' => 'Tempered glass',
            'headphones' => 'Headphones',
        );
    }

    /**
     * Define hooks related to plugin
     */
    private function define_hooks() {

        /**
         * Add action to send email
         */
        add_action( 'wp', array( $this, 'controller' ) );

        /**
         * Add shortcode to display form
         */
        add_shortcode( 'contact', array( $this, 'display_form' ) );
    }
}

new WPSE_299521_Form();