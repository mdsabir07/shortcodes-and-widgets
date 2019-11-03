<?php 
/*
Plugin Name: DMV Stairlifts Toolkit
Description: This plugin only used for dmvstairlifts themes.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
Text Domain: 'dmvstairlifts-toolkit'
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'DMV_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'DMV_ACC_PATH', plugin_dir_path( __FILE__ ) );

// add_action( 'init', 'dmvstairlifts_toolkit_custom_post' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( DMV_ACC_PATH . 'vc-blocks-load.php' );
require_once( DMV_ACC_PATH . 'vc-blocks.php' );
require_once( DMV_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering dmvstairlifts toolkit files
function dmvstairlifts_toolkit_scripts() {
    wp_enqueue_style( 'dmvstairlifts-toolkit', plugins_url( '/assets/css/dmvstairlifts-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'isotope', plugins_url( '/assets/js/isotope-3.0.4.min.js', __FILE__ ), array('jquery'), 'v3.0.4', true );
}
add_action( 'wp_enqueue_scripts', 'dmvstairlifts_toolkit_scripts' );

// Register select page options 
function dmvstairlifts_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'dmvstairlifts-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Registering custom post
function dmvstairlifts_custom_post_cat() {

}
add_action( 'init', 'dmvstairlifts_custom_post_cat' );


