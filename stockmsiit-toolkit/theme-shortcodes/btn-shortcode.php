<?php 

function stockmsiit_btn_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'type'				=> 1,
			'link_to_page'		=> '',
			'link_to_external'	=> '',
			'link_text'			=> esc_html__( 'Read more about us', 'stockmsiit-toolkit' ),
	), $atts ));

	if ($type == 1) {
		$link_source = get_page_link( $link_to_page );
	} else {
		$link_source = $link_to_external;
	}

	$stockmsiit_btn_markup = '
		<div class="stockmsiit-btn">
			<a href="'.esc_url( $link_source ).'" class="bordered-btn">'.esc_html( $link_text ).'</a>
		</div>
	';
	return $stockmsiit_btn_markup;
}
add_shortcode( 'stockmsiit_btn', 'stockmsiit_btn_shortcode' );