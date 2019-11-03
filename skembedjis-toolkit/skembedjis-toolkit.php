<?php 
/*
Plugin Name: Skembedjis Toolkit
Plugin URI: http://codermsiit.com/
Description: This plugin only used for skembedjis themes. The plugin contain lots of shortcode and addons. Those are related with WPBakery page builder. The Plugin will work if WPBakery or Visual composer page builder install and active on the plugin directory.
Author: Sabirul Islam
Author URI: https://codermsiit.com/
Version: 1.0.0
License: GPLv2 or later
Text Domain: skembedjis
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'skembedjis_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'skembedjis_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Register select slider options 
function skembedjis_toolkit_get_slide_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'slide',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select slide --', 'skembedjis')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Registering product category texonomy
function skembedjis_product_category_as_list() {
    $product_catefories = get_terms( array(
        'texonomy'  => 'product_cat',
        'hide_empty'=> false
    ));

    $product_category_options = array(esc_html__( '-- Select category --', 'wow-toolkit' ) => '');
    if ($product_catefories) {
        foreach ($product_catefories as $product_category) {
            $product_category_options[ $product_category->name ] = $product_category->term_id;
        }
    }
    return $product_category_options;
}

// Register select testimonial options 
function skembedjis_toolkit_get_testimonial_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'testimonial',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select testimonial --', 'skembedjis')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Register select page options 
function skembedjis_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'skembedjis')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Register post category list 
function skembedjis_toolkit_get_post_as_list() {
    $args = wp_parse_args( array(
        'post_type' => 'post',
        'numberposts'=> -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__( 'All Post', 'skembedjis' )=>'');
    if ($posts) {
        foreach ($posts as $post) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options; 
}

// Dynamic post category list on VC addons
function skembedjis_toolkit_post_cat_as_list() {
    $posts_categories = get_terms( 'category' );
    $post_cat_options = array(esc_html__( 'All category', 'skembedjis' ));
    if (!empty($posts_categories)) {
        foreach ($posts_categories as $post_category) {
            $post_cat_options[ $post_category->name ] = $post_category->term_id;
        }
    }
    return $post_cat_options;
}


// Dynamic post texonomy list on VC addons
function skembedjis_toolkit_get_post_taxonomies_as_list( ) {

    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    $category_options = array(esc_html__('All Categories', 'skembedjis')=>'');
    if ( $categories ) {
        foreach ( $categories as $category ) {
            $category_options[ $category->name ] = $category->ID;
        }
    }
    return $category_options;
}

// Registering product category texonomy
function wownewshop_product_category_as_list() {
    $product_catefories = get_terms( array(
        'texonomy'  => 'product_cat',
        'hide_empty'=> false
    ));

    $product_category_options = array(esc_html__( '-- Select category --', 'wow-toolkit' ) => '');
    if ($product_catefories) {
        foreach ($product_catefories as $product_category) {
            $product_category_options[ $product_category->name ] = $product_category->term_id;
        }
    }
    return $product_category_options;
}


// Register custom post
function skembedjis_toolkit_custom_post() {
    register_post_type( 'slide', 
        array(
            'labels' => array(
                'name'          => __('Slides'),
                'singular_name' => __('Slide'),
                'add_new'       => __('Add New Slide'),
                'add_new_item'  => __('Add New Slider Item')
            ),
            'supports'  => array('thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );
    
    register_post_type( 'product-slide', 
        array(
            'labels' => array(
                'name'          => __('Products Slide'),
                'singular_name' => __('Product Slide'),
                'add_new'       => __('Add New Product Slide'),
                'add_new_item'  => __('Add New Product Slider Item')
            ),
            'supports'  => array('title', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );

}
add_action( 'init', 'skembedjis_toolkit_custom_post' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( skembedjis_ACC_PATH . 'vc-blocks-load.php' );
require_once( skembedjis_ACC_PATH . 'vc-blocks.php' );
require_once( skembedjis_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering skembedjis toolkit files
function skembedjis_toolkit_scripts() {
    wp_enqueue_style( 'slick', plugins_url( '/assets/css/slick.css', __FILE__ ) );
    wp_enqueue_style( 'slick-theme', plugins_url( '/assets/css/slick-theme.css', __FILE__ ) );
    wp_enqueue_style( 'skembedjis', plugins_url( '/assets/css/skembedjis-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ), array('jquery'), 'v1.9.0', true );
}
add_action( 'wp_enqueue_scripts', 'skembedjis_toolkit_scripts' );


