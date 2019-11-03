<?php 
/*
Plugin Name: Intrunk Toolkit
Description: This plugin only used for intrunk themes.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
Text Domain: 'intrunk-toolkit'
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'INTRUNK_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'INTRUNK_ACC_PATH', plugin_dir_path( __FILE__ ) );

// add_action( 'init', 'intrunk_toolkit_custom_post' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( INTRUNK_ACC_PATH . 'vc-blocks-load.php' );
require_once( INTRUNK_ACC_PATH . 'vc-blocks.php' );
require_once( INTRUNK_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering intrunk toolkit files
function intrunk_toolkit_scripts() {
    wp_enqueue_style( 'intrunk-toolkit', plugins_url( '/assets/css/intrunk-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'isotope', plugins_url( '/assets/js/isotope-3.0.4.min.js', __FILE__ ), array('jquery'), 'v3.0.4', true );
}
add_action( 'wp_enqueue_scripts', 'intrunk_toolkit_scripts' );

// Register select page options 
function intrunk_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'intrunk-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Registering custom post
function intrunk_custom_post_cat() {
	// Premium brands
	register_post_type( 'primium_brand',
        array(
            'labels' => array(
                'name' => __( 'Primium brands' ),
                'singular_name' => __( 'Primium brand' ),
                'add_new_item' => __( 'Add New Primium brand' )
            ),
            'public' => false,
            'show_ui' => true,
            'supports' => array('title', 'thumbnail', 'page-attributes'),
            'menu_icon'           => 'dashicons-buddicons-forums',
        )
    );

    register_taxonomy(
        'primium_brand_cat',  
        'primium_brand', 
        array(
            'hierarchical'          => true,
            'label'                 => 'Primium Brand Category', 
            'query_var'             => true,
            'show_admin_column'     => true,
            'has_archive'     		=> true,
            'rewrite'               => array(
                'slug'              => 'primium-brand-category', 
                'with_front'        => true 
            )
        )
    ); 

    // Indie brands
	register_post_type( 'indie_brand',
        array(
            'labels' => array(
                'name' => __( 'Indie brands' ),
                'singular_name' => __( 'Indie brand' ),
                'add_new_item' => __( 'Add New Indie brand' )
            ),
            'public' => false,
            'show_ui' => true,
            'supports' => array('title', 'thumbnail', 'page-attributes'),
            'menu_icon'           => 'dashicons-buddicons-friends',
        )
    );

    register_taxonomy(
        'indie_brand_cat',  
        'indie_brand', 
        array(
            'hierarchical'          => true,
            'label'                 => 'Indie Brand Category', 
            'query_var'             => true,
            'show_admin_column'     => true,
            'has_archive'     		=> true,
            'rewrite'               => array(
                'slug'              => 'indie-brand-category', 
                'with_front'        => true 
            )
        )
    ); 
}
add_action( 'init', 'intrunk_custom_post_cat' );


