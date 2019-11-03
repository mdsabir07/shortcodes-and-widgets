<?php 
function stockmsiit_slide_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 
		array(
			'count'			=> 3,
			'slide_id'		=> '',
			'height'		=> 730,
			'loop'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'dots'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'nav'			=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'autoplay'		=> esc_html__( 'true', 'stockmsiit-toolkit' ),
			'autoplayTimeout'=> 5000,
		), $atts
	));

	if ($count == 1) {
		$q = new WP_Query( array('posts_per_page' => $count,'post_type' => 'slide', 'p' => $slide_id) );
	}else {
		$q = new WP_Query( array('posts_per_page'=> $count,'post_type'=> 'slide') );
	}

	$stockmsiit_slide_desc_tags = array(
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
	
	if ($count == 1) {
		$stockmsiit_slide_markup = '';
	}else {
		$stockmsiit_slide_markup = '
		<script>
			jQuery(window).load(function(){
				jQuery(".stockmsiit-slides").owlCarousel({
					items: 1,
					loop: '.esc_attr( $loop ).',
					dots: '.esc_attr( $dots ).',
					nav: '.esc_attr( $nav ).',
					navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
					autoplay: '.esc_attr( $autoplay ).',
					autoplayTimeout: '.esc_attr( $autoplayTimeout ).'
				});
				
			});
		</script>';
	}

	if ($count == 1) {
		$stockmsiit_slide_markup .= '
		<div class="stockmsiit-slides">';
	} else {
		$stockmsiit_slide_markup .= '
		<div class="stockmsiit-slides owl-carousel">';
	}

	while ($q->have_posts()) : $q->the_post();
		$post_id = get_the_ID();
		$content = get_the_content();

		if (get_post_meta( $post_id, 'stockmsiit_slide_options', true )) {
			$slide_meta = get_post_meta( $post_id, 'stockmsiit_slide_options', true );
		} else {
			$slide_meta = array();
		}

		if (array_key_exists('text_color', $slide_meta)) {
			$text_color = $slide_meta['text_color'];
		} else {
			$text_color = esc_attr( '#fff' );
		}

		if (array_key_exists('enable_overlay', $slide_meta)) {
			$enable_overlay = $slide_meta['enable_overlay'];
		} else {
			$enable_overlay = false;
		}

		if (array_key_exists('overlay_color', $slide_meta)) {
			$overlay_color = $slide_meta['overlay_color'];
		} else {
			$overlay_color = esc_attr( '#181a1f' );
		}

		if (array_key_exists('overlay_opacity', $slide_meta)) {
			$overlay_opacity = $slide_meta['overlay_opacity'];
		} else {
			$overlay_opacity = 0.7;
		}

	$stockmsiit_slide_markup .= '
	<div style="background-image: url('.get_the_post_thumbnail_url( $post_id, 'large' ).');height: '.esc_attr( $height ).'px" class="single-slide-item">';

		if ($enable_overlay == true) {
			$stockmsiit_slide_markup .= '<div style="opacity: '.esc_attr( $overlay_opacity ).';background-color: '.esc_attr( $overlay_color ).'" class="slide-overlay"></div>';
		}

		$stockmsiit_slide_markup .= '
		<div class="container">
			<div class="row">
				<div style="color: '.esc_attr( $text_color ).'" class="col-lg-6">
					<h2>'.do_shortcode( get_the_title($post_id) ).'</h2>
					'.wp_kses( wpautop( esc_html( $content ) ), $stockmsiit_slide_desc_tags ).'';

					if ( !empty($slide_meta['buttons']) ) {
						$stockmsiit_slide_markup .= '<div class="stockmsiit-slide-buttons">';
						foreach ($slide_meta['buttons'] as $button) {

							if ($button['link_type'] == 1) {
								$button_link = get_page_link( $button['link_to_page'] );
							} else {
								$button_link = $button['link_to_external'];
							}
							$stockmsiit_slide_markup .= '<a href="'.esc_url( $button_link ).'" class="'.esc_attr( $button['type'] ).'-btn stockmsiit-slide-btn">'.esc_html( $button['text'] ).'</a>';
						}
						$stockmsiit_slide_markup .= '</div>';
					}

					$stockmsiit_slide_markup .='
				</div>
			</div>
		</div>
	</div>

	';
	endwhile;
	$stockmsiit_slide_markup .= '</div>';
	wp_reset_query();

	return $stockmsiit_slide_markup;
}
add_shortcode( 'stockmsiit_slides', 'stockmsiit_slide_shortcode' );
