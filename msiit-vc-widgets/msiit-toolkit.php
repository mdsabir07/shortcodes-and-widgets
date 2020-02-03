<?php 
/*
Plugin Name: MSIit Toolkit
Plugin URI: http://codermsiit.com/
Author: Sabirul Islam
Author URI: https://codermsiit.com/
Version: 1.0.0
License: GPLv2 or later
Text Domain: msiit-toolkit
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'skembedjis_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'skembedjis_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Registering product category texonomy
function skembedjis_product_category_as_list() {
    $product_catefories = get_terms( array(
        'texonomy'  => 'auto-model',
    ));

    $product_category_options = array(esc_html__( '-- Select category --', 'msiit-toolkit' ) => '');
    if ($product_catefories) {
        foreach ($product_catefories as $product_category) {
            $product_category_options[ $product_category->name ] = $product_category->term_id;
        }
    }
    return $product_category_options;
}

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( skembedjis_ACC_PATH . 'vc-blocks-load.php' );
require_once( skembedjis_ACC_PATH . 'vc-blocks.php' );
require_once( skembedjis_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering skembedjis toolkit files
function msiit_toolkit_scripts() {
    wp_enqueue_style( 'msiit', plugins_url( '/assets/css/msiit-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'msiit', plugins_url( '/assets/js/msiit-toolkit.js', __FILE__ ), array('jquery'), 'v1.0', true );
}
add_action( 'wp_enqueue_scripts', 'msiit_toolkit_scripts' );


