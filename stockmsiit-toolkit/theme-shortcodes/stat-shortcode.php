<?php 

function stockmsiit_state_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'number'	=> '',
			'after_text'=> '',
			'desc'		=> '',
	), $atts ));

	$stockmsiit_state_desc_tags = array(
		'a'	=> array(
			'href'	=> array(),
			'title'	=> array(),
			'class'	=> array(),
		),
		'img'	=> array(
			'alt'	=> array(),
			'src'	=> array(),
		),
		'br'	=> array(),
		'em'	=> array(),
		'strong'=> array(),
	);

	$stockmsiit_state_markup = '
	<div class="stockmsiit-stat">
		<h1><span>'.esc_html( $number ).'</span>'.esc_html( $after_text ).'</h1>
		'.wp_kses( esc_html( $desc ), $stockmsiit_state_desc_tags ).'
	</div>
	';

	return $stockmsiit_state_markup;
}
add_shortcode( 'stockmsiit_state', 'stockmsiit_state_shortcode' );
