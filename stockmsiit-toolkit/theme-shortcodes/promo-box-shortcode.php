<?php 

function stockmsiit_promo_box_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'title'			=> '',
			'desc'			=> '',
			'type'			=> 1,
			'link_page'		=> '',
			'link_external' => '',
			'link_text'		=> esc_html__( 'Apply now', 'stockmsiit-toolkit' )
	), $atts ));

	if ($type == 1) {
		$link_source = get_page_link( $link_page );
	} else {
		$link_source = $link_external;
	}

	$stockmsiit_promo_desc_tags = array(
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

	$stockmsiit_promo_box = '
	<div class="promo-box">
		<h3>'.esc_html( $title ).'</h3>
		'.wp_kses( wpautop( $desc ), $stockmsiit_promo_desc_tags ).'

		<a href="'.esc_url( $link_source ).'" class="bordered-btn promo-btn">'.esc_html( $link_text ).'</a>
	</div>
	';

	return $stockmsiit_promo_box;
}
add_shortcode( 'promo_box', 'stockmsiit_promo_box_shortcode' );