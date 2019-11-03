<?php 

function stockmsiit_cta_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'title'			  => '',
			'desc'			  => '',
			'type'			  => 1,
			'theme'			  => 1,
			'link_to_page'	  => '',
			'link_to_external'=> '',
			'link_text'		  => esc_html__( 'See more', 'stockmsiit-toolkit' ),
	), $atts ));

	if ($type == 1) {
		$link_source = get_page_link( $link_to_page );
	} else {
		$link_source = $link_to_external;
	}

	$stockmsiit_cta_markup = '
		<div class="stockmsiit-cta-box cta-box-'.esc_attr( $theme ).'">

			<h2>'.esc_html( $title ).'</h2>
			'.wpautop( esc_html( $desc ) ).'
			<a href="'.esc_url( $link_source ).'" class="bordered-btn">'.esc_html( $link_text ).'</a>
			
		</div>
	';
	$stockmsiit_cta_markup .= '';


	return $stockmsiit_cta_markup;
}
add_shortcode( 'stockmsiit_cta', 'stockmsiit_cta_shortcode' );