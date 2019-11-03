<?php 
function stockmsiit_testimonial_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'photo'		=> '',
			'title'		=> '',
			'position'	=> '',
			'desc'		=> '',
	), $atts ));

	$img_array = wp_get_attachment_image_src( $photo, 'large' );

	$stockmsiit_testi_desc_allowed_tags = array(
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

	$stockmsiit_testimonial_markup = '
	<div class="single-testimonial-box">
		<img src="'.esc_url( $img_array[0] ).'" alt="'.esc_html($title).'">
		<h3>'.esc_html( $title ).'</h3>
		<span>'.esc_html( $position ).'</span>
		'.wp_kses( wpautop( esc_html( $desc ) ), $stockmsiit_testi_desc_allowed_tags ).'
	</div>
	';

	return $stockmsiit_testimonial_markup;
}
add_shortcode( 'testimonials', 'stockmsiit_testimonial_shortcode' );