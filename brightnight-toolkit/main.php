<?php 
/*
Plugin Name: Brightnight Toolkit
Plugin URI: http://wordpress.org/plugins
Description: This plugin only used for Bright night themes.
Author: Sabirul Islam
Version: 1.0.2
Author URI: https://codermsiit.com/
*/

// Exit if accesed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Define
define( 'BRIGHTNIGHT_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'BRIGHTNIGHT_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Register select page options 
function brightnight_toolkit_get_page_as_list() {
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

// Register Custom Post
function brightnight_toolkit_custom_post() {
    register_post_type( 'slide', 
        array(
            'labels' => array(
                'name'          => __('Slides'),
                'singular_name' => __('Slide'),
                'add_new'       => __('Add New Slide'),
                'add_new_item'  => __('Add New Slide Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );
    register_post_type( 'img-slide', 
        array(
            'labels' => array(
                'name'          => __('Image slides'),
                'singular_name' => __('Image slide'),
                'add_new'       => __('Add New Image Slide'),
                'add_new_item'  => __('Add New Image Slide Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );
    register_post_type( 'product-slide', 
        array(
            'labels' => array(
                'name'          => __('Product slides'),
                'singular_name' => __('Product slide'),
                'add_new'       => __('Add New Product Slide'),
                'add_new_item'  => __('Add New Product Slide Item')
            ),
            'supports'  => array('thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true
        )
    );

    register_post_type( 'service', 
        array(
            'labels' => array(
                'name'          => __('Services'),
                'singular_name' => __('Service'),
                'add_new'       => __('Add New Service'),
                'add_new_item'  => __('Add New Service Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => true,
        )
    );
    register_post_type( 'project',
        array(
            'labels' => array(
                'name'          => __('Projects'),
                'singular_name' => __('Project'),
                'add_new'       => __('Add New Project'),
                'add_new_item'  => __('Add New Project Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => true
        ) 
    );
    register_post_type( 'project-masonry',
        array(
            'labels' => array(
                'name'          => __('Projects masonry'),
                'singular_name' => __('Project masonry'),
                'add_new'       => __('Add New Project masonry'),
                'add_new_item'  => __('Add New Project masonry Item')
            ),
            'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => true
        ) 
    );

    
}
add_action( 'init', 'brightnight_toolkit_custom_post' );

// Registering custom texomomy
function brightnight_toolkit_custom_texonomy() {
    register_taxonomy(
        'project_cat',
        'project',
        array(
            'hierarchical'      => true,
            'label'             => 'Project Category',
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'      => 'project-category',
                'with_front'=> true
            )
        )
    );
    register_taxonomy(
        'project_cat',
        'project-masonry',
        array(
            'hierarchical'      => true,
            'label'             => 'Project Masonry Category',
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'      => 'project-masonry-category',
                'with_front'=> true
            )
        )
    );
}
add_action( 'init', 'brightnight_toolkit_custom_texonomy' );

// Print shortcode in widgets
add_filter( 'widget_text', 'do_shortcode' );



// Shortcodes dependent on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Registering Bright night toolkit files
function brightnight_toolkit_script_files() {
    wp_enqueue_style( 'animate', plugins_url( '/assets/css/animate.css', __FILE__ ) );
    wp_enqueue_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) );
    wp_enqueue_style( 'magnific-popup', plugins_url( '/assets/css/magnific-popup.css', __FILE__ ) );

    wp_enqueue_style( 'brightnight-toolkit', plugins_url( '/assets/css/brightnight-toolkit.css', __FILE__ ) );

    wp_enqueue_script( 'owl-carousel-js', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array('jquery'), 'v2.2.1', true );
    wp_enqueue_script( 'gmap3', plugins_url( '/assets/js/gmap3.min.js', __FILE__ ), array('jquery'), 'v7.2', true );
    wp_enqueue_script( 'magnific-popup', plugins_url( '/assets/js/jquery.magnific-popup.min.js', __FILE__ ), array('jquery'), 'v1.1.0', true );
    wp_enqueue_script( 'isotope', plugins_url( '/assets/js/isotope-3.0.4.min.js', __FILE__ ), array('jquery'), 'v3.0.4', true );
    wp_enqueue_script( 'masonry', plugins_url( '/assets/js/jquery-masonry.min.js', __FILE__ ), array('jquery'), 'v4.2.0', true );
}
add_action( 'wp_enqueue_scripts', 'brightnight_toolkit_script_files' );

// Loading VC addons
require_once(BRIGHTNIGHT_ACC_PATH .'vc-blocs-load.php' );


require_once(BRIGHTNIGHT_ACC_PATH.'brightnight-toolkit-shortcodes.php');
require_once(BRIGHTNIGHT_ACC_PATH.'brightnight-toolkit-vc-addons.php');