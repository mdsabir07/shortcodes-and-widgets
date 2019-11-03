<?php 
/*
Plugin Name: Stock MSIit Toolkit
Plugin URI: http://wordpress.org/plugins
Description: This plugin only used for Stock MSIit theme.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Define
define( 'STOCKMSIIT_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'STOCKMSIIT_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Registering optimistic toolkit files
function stockmsiit_toolkit_script_files() {
	wp_enqueue_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) );
	wp_enqueue_style( 'toolkit', plugins_url( '/assets/css/stockmsiit-toolkit.css', __FILE__ ) );

	wp_enqueue_script( 'owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array('jquery'), 'v2.2.1', true );
	wp_enqueue_script( 'counterup', plugins_url( '/assets/js/counterup.js', __FILE__ ), array('jquery'), 'v1.0', true );
	wp_enqueue_script( 'waypoint', plugins_url( '/assets/js/waypoint.js', __FILE__ ), array('jquery'), 'v2.0.3', true );
	wp_enqueue_script( 'gmap', plugins_url( '/assets/js/gmap3.min.js', __FILE__ ), array('jquery'), 'v7.2', true );
	wp_enqueue_script( 'isotope', plugins_url( '/assets/js/isotope-3.0.4.min.js', __FILE__ ), array('jquery'), 'v2.0.0', true );
	wp_enqueue_script( 'theme-js', plugins_url( '/assets/js/main.js', __FILE__ ), array('jquery'), 'v2.0.3', true );
}
add_action( 'wp_enqueue_scripts', 'stockmsiit_toolkit_script_files' );

// Register select slider options
function stockmsiit_toolkit_get_slide_as_list( ) {
	$args = wp_parse_args( 
		array(
			'post_type'		=> 'slide',
			'numberposts'	=> -1,
		)
	);
	$posts = get_posts( $args );
	$post_options = array(esc_html__('-- Select Slide --', 'stockmsiit-toolkit')=>'');
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->post_title ] = $post->ID;
		}
	}
	return $post_options;
}
// Register select page options
function stockmsiit_toolkit_get_page_as_list( ) {
	$args = wp_parse_args( 
		array(
			'post_type'		=> 'page',
			'numberposts'	=> -1,
		)
	);
	$posts = get_posts( $args );
	$post_options = array(esc_html__('-- Select Page --', 'stockmsiit-toolkit')=>'');
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->post_title ] = $post->ID;
		}
	}
	return $post_options;
}

// Register Custom Post
function stockmsiit_toolkit_custom_post() {
	register_post_type( 'slide', 
		array(
			'labels'	=> array(
				'name'			=> esc_html__( 'Slides', 'stockmsiit-toolkit' ),
				'singular_name'	=> esc_html__( 'Slide', 'stockmsiit-toolkit' ),
				'add_new'		=> esc_html__( 'Add New Slide', 'stockmsiit-toolkit' ),
				'add_new_item'	=> esc_html__( 'Add New Slide Item', 'stockmsiit-toolkit' )
			),
			'supports'	=> array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'public'	=> false,
			'show_ui'	=> true
		)
	);
	register_post_type( 'project',
        array(
            'labels' => array(
                'name'          => esc_html__('Projects', 'stockmsiit-toolkit'),
                'singular_name' => esc_html__('Project', 'stockmsiit-toolkit'),
                'add_new'       => esc_html__('Add New Project', 'stockmsiit-toolkit'),
                'add_new_item'  => esc_html__('Add New Project Item', 'stockmsiit-toolkit')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => true
        ) 
    );


}
add_action( 'init', 'stockmsiit_toolkit_custom_post' );

// Registering custom texomomy
function stockmsiit_toolkit_custom_texonomy() {
    register_taxonomy(
        'project_cat',
        'project',
        array(
            'hierarchical'      => true,
            'label'             => esc_html__( 'Project Category', 'stockmsiit-toolkit' ),
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'      => 'project-category',
                'with_front'=> true
            )
        )
    );
}
add_action( 'init', 'stockmsiit_toolkit_custom_texonomy' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading vc addons
require_once( STOCKMSIIT_ACC_PATH . 'vc-addons/vc-blocks-load.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	//require_once( OPTIMISTIC_ACC_PATH . 'theme-shortcodes/staff-shortcode.php' );
}

// Theme shortcode
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/slide-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/logo-carousel-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/service-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/cta-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/btn-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/stat-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/testimonial-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/gmap-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/tile-gallery-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/promo-box-shortcode.php' );
require_once( STOCKMSIIT_ACC_PATH . 'theme-shortcodes/project-shortcode.php' );
