<?php 
/*
Plugin Name: Brendan Toolkit
Plugin URI: http://wordpress.org/plugins
Description: This plugin only used for brendan themes.
Author: Sabirul Islam
Version: 1.0.0
Author URI: https://codermsiit.com/
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'BRENDAN_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'BRENDAN_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( BRENDAN_ACC_PATH . 'vc-blocks-load.php' );
require_once( BRENDAN_ACC_PATH . 'vc-blocks.php' );
require_once( BRENDAN_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering brendan toolkit files
function brendan_toolkit_scripts() {
    wp_enqueue_style( 'brendan-toolkit', plugins_url( '/assets/css/brendan-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'brendan-toolkit-js', plugins_url( '/assets/js/brendan-toolkit.js', __FILE__ ), array('jquery'), 'v1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'brendan_toolkit_scripts' );

// Register select page options 
function banner_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'banner-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}


