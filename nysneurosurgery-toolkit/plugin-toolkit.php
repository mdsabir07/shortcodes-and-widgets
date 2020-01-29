<?php 
/*
Plugin Name: NYSNS Toolkit
Description: This plugin only used for nysneurosurgery themes.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
Text Domain: 'nysneurosurgery-toolkit'
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'NYS_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'NYS_ACC_PATH', plugin_dir_path( __FILE__ ) );

// add_action( 'init', 'nysneurosurgery_toolkit_custom_post' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( NYS_ACC_PATH . 'vc-blocks-load.php' );
require_once( NYS_ACC_PATH . 'vc-blocks.php' );
require_once( NYS_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering nysneurosurgery toolkit files
function nysneurosurgery_toolkit_scripts() {
    wp_enqueue_style( 'slick', plugins_url( '/assets/css/slick.css', __FILE__ ) );
    wp_enqueue_style( 'slick-theme', plugins_url( '/assets/css/slick-theme.css', __FILE__ ) );
    wp_enqueue_style( 'animate', plugins_url( '/assets/css/animate.css', __FILE__ ) );
    wp_enqueue_style( 'toolkit', plugins_url( '/assets/css/toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'wow', plugins_url( '/assets/js/wow.min.js', __FILE__ ), array('jquery'), '2015412', true );
    wp_enqueue_script( 'slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ), array('jquery'), 'v1.9.0', true );
}
add_action( 'wp_enqueue_scripts', 'nysneurosurgery_toolkit_scripts' );

// Register select page options 
function nysneurosurgery_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'nysneurosurgery-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Registering custom post
function nysneurosurgery_custom_post_cat() {
    register_post_type( 'slide', 
        array(
            'labels' => array(
                'name'          => __('Slides'),
                'singular_name' => __('Slide'),
                'add_new'       => __('Add New Slide'),
                'add_new_item'  => __('Add New Slider Item')
            ),
            'supports'  => array('title', 'editor', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );
}
add_action( 'init', 'nysneurosurgery_custom_post_cat' );



