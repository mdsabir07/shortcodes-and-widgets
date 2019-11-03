<?php 
/*
Plugin Name: MedPro Toolkit
Plugin URI: http://wordpress.org/plugins
Description: This plugin only used for medpro themes.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Define
define( 'MEDPRO_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'MEDPRO_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Register select slider options 
function medpro_toolkit_get_slide_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'slide',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select slide --', 'medpro-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Register select testimonial options 
function medpro_toolkit_get_testimonial_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'testimonial',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select testimonial --', 'medpro-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Register select page options 
function medpro_toolkit_get_page_as_list( ) {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array(esc_html__('-- Select page --', 'medpro-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

// Register post category list 
function medpro_toolkit_get_post_as_list() {
    $args = wp_parse_args( array(
        'post_type' => 'post',
        'numberposts'=> -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__( 'All Post', 'medpro-toolkit' )=>'');
    if ($posts) {
        foreach ($posts as $post) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options; 
}

// Dynamic post category list on VC addons
function medpro_toolkit_post_cat_as_list() {
    $posts_categories = get_terms( 'category' );
    $post_cat_options = array(esc_html__( 'All category', 'medpro-toolkit' ));
    if (!empty($posts_categories)) {
        foreach ($posts_categories as $post_category) {
            $post_cat_options[ $post_category->name ] = $post_category->term_id;
        }
    }
    return $post_cat_options;
}


// Dynamic post texonomy list on VC addons
function medpro_toolkit_get_post_taxonomies_as_list( ) {

    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    $category_options = array(esc_html__('All Categories', 'medpro-toolkit')=>'');
    if ( $categories ) {
        foreach ( $categories as $category ) {
            $category_options[ $category->name ] = $category->ID;
        }
    }
    return $category_options;
}

// Register custom post
function medpro_toolkit_custom_post() {
    register_post_type( 'slide', 
        array(
            'labels' => array(
                'name'          => __('Slides'),
                'singular_name' => __('Slide'),
                'add_new'       => __('Add New Slide'),
                'add_new_item'  => __('Add New Slider Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );

    register_post_type( 'testimonial', 
        array(
            'labels'    => array(
                'name'          => __('Testimonials'),
                'singular_name' => __('Testimonial'),
                'add_new'       => __('Add new Testimonial'),  
                'add_new_item'  => __('Add New Testimonial Item')
            ),  
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );

    register_post_type( 'service-carousel', 
        array(
            'labels' => array(
                'name'          => __('Service carousels'),
                'singular_name' => __('Service carousel'),
                'add_new'       => __('Add New'),
                'add_new_item'  => __('Add New Item')
            ),
            'supports' => array('title', 'thumbnail', 'page-attributes'),
            'public'   => false,
            'show_ui'  => true
        )
    );

    // register_post_type( 'cstudy', 
    //     array(
    //         'labels' => array(
    //             'name'          => __('Case Studies'),
    //             'singular_name' => __('Case Study'),
    //             'add_new'       => __('Add New Case Study'),
    //             'add_new_item'  => __('Add New Case Study Item')
    //         ),
    //         'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    //         'public'   => 'false',
    //         'show_ui'   => true
    //     )
    // );

    // register_post_type( 'cs-testimonial', 
    //     array(
    //         'labels' => array(
    //             'name'          => __('Cstudy Testimonials'),
    //             'singular_name' => __('Cstudy Testimonial'),
    //             'add_new'       => __('Add New Cstudy Testimonial'),
    //             'add_new_item'  => __('Add New Cstudy Testimonial Item')
    //         ),
    //         'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    //         'public'   => 'false',
    //         'show_ui'   => true
    //     )
    // );
}
add_action( 'init', 'medpro_toolkit_custom_post' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Loading VC addons theme Shortcode
require_once( MEDPRO_ACC_PATH . 'vc-blocks-load.php' );
require_once( MEDPRO_ACC_PATH . 'vc-blocks.php' );
require_once( MEDPRO_ACC_PATH . 'theme-shortcodes.php' );

// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering medpro toolkit files
function medpro_toolkit_scripts() {
    wp_enqueue_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) );
    wp_enqueue_style( 'medpro-toolkit', plugins_url( '/assets/css/medpro-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'owl-carousel-js', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array('jquery'), 'v2.3.4', true );
    //wp_enqueue_script( 'gmap3', plugins_url( '/assets/js/gmap3.min.js', __FILE__ ), array('jquery'), 'v7.2', true );
}
add_action( 'wp_enqueue_scripts', 'medpro_toolkit_scripts' );


