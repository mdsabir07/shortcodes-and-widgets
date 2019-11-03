<?php 
function stockmsiit_logo_carousel_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'logos'			=> '',
			'desktop_count'	=> 5,
			'tablet_count'	=> 3,
			'mobile_count'	=> 2,
			'loop'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'dots'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'nav'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'autoplay'		=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'autoplayTimeout'=> 5000,
	), $atts ));

	$logo_ids = explode(',', $logos);

	$stockmsiit_logo_carousel_markup = '
	<script>
		jQuery(document).ready(function($) {
			$(".stockmsiit-logo-carousel").owlCarousel({
				items: 5,
				margin: 30,
				loop: '.esc_attr( $loop ).',
				dots: '.esc_attr( $dots ).',
				nav: '.esc_attr( $nav ).',
				navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
				autoplay: '.esc_attr( $autoplay ).',
				autoplayTimeout: '.esc_attr( $autoplayTimeout ).',
				responsive: {
					992: {
						items: '.esc_attr( $desktop_count ).'
					},
					480: {
						items: '.esc_attr( $tablet_count ).'
					},
					0: {
						items: '.esc_attr( $mobile_count ).'
					},
				}
			});
		});
	</script>
	<div class="stockmsiit-logo-carousel owl-carousel">
	';
	foreach ($logo_ids as $logo) {
		$logo_img_array = wp_get_attachment_image_src( $logo, 'large' );
		$stockmsiit_logo_carousel_markup .= '
			<div class="stockmsiit-logo-carousel-item">
				<div class="stockmsiit-logo-carousel-item-tablecell">
					<img src="'.esc_url( $logo_img_array[0] ).'" alt="">
				</div>
			</div>
		';
		
	}
	$stockmsiit_logo_carousel_markup .= '</div>';

	return $stockmsiit_logo_carousel_markup;
}
add_shortcode( 'logo_carousel', 'stockmsiit_logo_carousel_shortcode' );