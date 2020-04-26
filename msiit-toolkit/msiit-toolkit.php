<?php 
/*
Plugin Name: MSIit Toolkit
Plugin URI: http://codermsiit.com/
Author: Sabirul Islam
Author URI: https://codermsiit.com/
Version: 1.0.0
License: GPLv2 or later
Text Domain: msiit
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'codermsiit_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'codermsiit_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( codermsiit_ACC_PATH . 'vc-blocks-load.php' );
require_once( codermsiit_ACC_PATH . 'vc-blocks.php' );
require_once( codermsiit_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


// Register select page options 
function msiit_toolkit_get_page_as_list() {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));
    
    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select page --', 'brightnight-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Registering codermsiit toolkit files
function msiit_toolkit_scripts() {
    wp_enqueue_style( 'slick', plugins_url( '/assets/css/slick.css', __FILE__ ) );
    wp_enqueue_style( 'msiit', plugins_url( '/assets/css/msiit-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ), array('jquery'), 'v.1.9.0', true );
    wp_enqueue_script( 'msiit', plugins_url( '/assets/js/msiit-toolkit.js', __FILE__ ), array('jquery'), 'v1.0', true );
}
add_action( 'wp_enqueue_scripts', 'msiit_toolkit_scripts' );


