<?php 

function stockmsiit_tile_gallery_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'images' => '',
			'height' => esc_attr__( '310', 'stokmsiit-toolkit' ),
			'size'	 => esc_html__( 'large', 'stokmsiit-toolkit' ),
	), $atts ));

	$images_ids = explode(',', $images);
	$image_count	= count($images_ids);
	$image_no = 0;

	if (!empty($images)) {
		$tile_gallery = '
		<div class="stockmsiit-tile-gallery stockmsiit-tile-gallery-image-'.esc_attr($image_count).'">';
		foreach ($images_ids as $image) {
			$image_array = wp_get_attachment_image_src( $image, $size );
			$image_no++;
			$tile_gallery .= '
			<div style="background-image:url('.esc_url( $image_array[0] ).');height:'.esc_attr($height).'px" class="tile-gallery-block tile-gallery-block-'.esc_attr($image_no).'"></div>';
		}
		$tile_gallery .='
		</div>
		';
		
	} else {
		$tile_gallery = '';
	}

	return $tile_gallery;
}
add_shortcode( 'tile_gallery', 'stockmsiit_tile_gallery_shortcode' );