<?php 
/*
Plugin Name: Findgo Toolkit
Plugin URI: https://codermsiit.com/
Description: This plugin only used for findgo themes.
Author: Sabirul Islam
Author URI: https://codermsiit.com/
License: GPLv2 or later
Version: 1.0.0
Text Domain: findgo-tookit
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }// Exit if accessed directly

// Translate direction
function findgo_toolkit_load_textdomain() {
load_plugin_textdomain( 'findgo-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'findgo_toolkit_load_textdomain' );

//Defines
define( 'FINDGO_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'FINDGO_ACC_PATH', plugin_dir_path( __FILE__ ) );

// Findgo Plugin script files
function findgo_toolkit_script_files() {
	wp_enqueue_style( 'findgo-toolkit-main', plugin_dir_url( __FILE__ ) . '/assets/css/plugin-toolkit.css' );

	wp_enqueue_script( 'findgo-toolkit-main', plugin_dir_url( __FILE__ ) . '/assets/js/plugin-toolkit.js', array('jquery'), '2652640', true );
}
add_action( 'wp_enqueue_scripts', 'findgo_toolkit_script_files' );

// Registering listing tag texonomy
function findgo_listing_tag_as_list() {
	$listing_tags = get_terms( array(
		'texonomy'	=> 'job_listing_tag',
		'hide_empty'=> false
	));

	$listing_tag_option = array(esc_html__( '-- Select Tag --', 'findgo-toolkit' ) => '');
	if ($listing_tags) {
		foreach ($listing_tags as $listing_tag) {
			$listing_tag_option[ $listing_tag->name ] = $listing_tag->term_id;
		}
	}
	return $listing_tag_option;
}

// Registering post tag texonomy
function findgo_post_tag_as_list() {
	$post_tags = get_terms( array(
		'texonomy'	=> 'post_tag',
		'hide_empty'=> false
	));

	$post_tag_option = array(esc_html__( '-- Select Tag --', 'findgo-toolkit' ) => '');
	if ($post_tags) {
		foreach ($post_tags as $post_tag) {
			$post_tag_option[ $post_tag->name ] = $post_tag->term_id;
		}
	}
	return $post_tag_option;
}


// Loading Visual Composer blocks
require_once( FINDGO_ACC_PATH . 'vc-blocks-load.php' );

// Theme shortcodes
require_once( FINDGO_ACC_PATH . 'theme-shortcodes.php' );


add_action( 'admin_menu', 'findgo_add_admin_menu' );
add_action( 'admin_init', 'findgo_settings_init' );


function findgo_add_admin_menu(  ) { 

	add_options_page( 'Findgo Toolkit', 'Findgo Toolkit', 'manage_options', 'findgo_toolkit', 'findgo_options_page' );

}




function findgo_settings_init(  ) { 

	register_setting( 'pluginPage', 'findgo_settings' );

	add_settings_section(
		'findgo_pluginPage_section', 
		__( 'Use this plugins shortcode for display tag list with description', 'findgo-toolkit' ), 
		'findgo_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'findgo_textarea_field_0', 
		__( 'Settings field description', 'findgo-toolkit' ), 
		'findgo_textarea_field_0_render', 
		'pluginPage', 
		'findgo_pluginPage_section' 
	);


}


function findgo_textarea_field_0_render(  ) { 

	$options = get_option( 'findgo_settings' );
	?>
	<textarea cols='40' rows='5' name='findgo_settings[findgo_textarea_field_0]'> 
		<?php echo $options['findgo_textarea_field_0']; ?>
 	</textarea>
	<?php

}


function findgo_settings_section_callback(  ) { 

	echo __( 'Shortcode for display Job listing tags with description [show_tags_desc] and use this shortcode for display general post tag with description [tags_show_with_list_desc]', 'findgo-toolkit' );

}


function findgo_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Findgo Toolkit</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

