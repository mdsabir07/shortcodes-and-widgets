<?php 

function stockmsiit_service_box_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'title'			  => '',
			'desc'			  => '',
			'type'			  => 1,
			'link_to_page'	  => '',
			'link_to_external'=> '',
			'link_text'		  => esc_html__( 'See more', 'stockmsiit-toolkit' ),
			'icon_type'		  => 1,
			'upload_icon'	  => '',
			'chosse_icon'	  => '',
			'box_img'		  => '',
	), $atts ));

	if ($type == 1) {
		$link_source = get_page_link( $link_to_page );
	} else {
		$link_source = $link_to_external;
	}

	$stockmsiit_service_desc_tags = array(
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

	$box_bg_array = wp_get_attachment_image_src( $box_img, 'medium' );

	$stockmsiit_service_box_markup = '
		<div class="stockmsiit-service-box">
			<div style="background-image:url('.esc_url( $box_bg_array[0] ).')" class="stockmsiit-service-icon">';

			if ($icon_type == 1) {
				$service_icon_array = wp_get_attachment_image_src( $upload_icon, 'thumbnail' );
				$stockmsiit_service_box_markup .= '<img src="'.esc_url( $service_icon_array[0] ).'" alt="'.esc_html( $title ).'">';
			} else {
				$stockmsiit_service_box_markup .= '<i class="'.esc_attr( $chosse_icon ).'"></i>';
			}

			$stockmsiit_service_box_markup .= '
			</div>
			<div class="stockmsiit-service-content">
				<h3>'.esc_html( $title ).'</h3>
				'.wp_kses( wpautop( esc_html( $desc ) ), $stockmsiit_service_desc_tags ).'

				<a href="'.esc_url( $link_source ).'" class="service-btn">'.esc_html( $link_text ).'</a>
			</div>
		</div>
	';
	$stockmsiit_service_box_markup .= '';


	return $stockmsiit_service_box_markup;
}
add_shortcode( 'stockmsiit_service_box', 'stockmsiit_service_box_shortcode' );