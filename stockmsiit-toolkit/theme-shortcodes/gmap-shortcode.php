<?php 

function stockmsiit_gmap_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 
		array(
			'height'	=> 600
		), $atts ));
	$stockmsiit_gmap = '
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf27_uWLsbjIlHKL45ZMG9vvWIPkMUbUE&region=US"></script>

	<div class="map" style="height:'.esc_attr( $height ).'px;width:100%"></div>

	<script>
		jQuery(document).ready(function($){
			$(".map")
			.gmap3({
				center:[23.4684869, 91.1702478],
				zoom:14,
				mapTypeId: "shadeOfGrey",
				mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
				}
			})
			.styledmaptype(
				"shadeOfGrey",
					[
					{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#858585"},{"lightness":40}]},
					{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#F9F9F9"},{"lightness":16}]},
					{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
					{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#E5E5E5"},{"lightness":20}]},
					{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#E5E5E5"},{"lightness":17},{"weight":1.2}]},
					{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#F2F2F2"},{"lightness":20}]},
					{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#F7F7F7"},{"lightness":21}]},
					{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#E3E3E3"},{"lightness":17}]},
					{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#FFFFFF"},{"lightness":29},{"weight":0.2}]},
					{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#E2E2E2"},{"lightness":18}]},
					{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#FFFFFF"},{"lightness":16}]},
					{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#ABB1BA"},{"lightness":19}]},
					{"featureType":"water","elementType":"geometry","stylers":[{"color":"#EDEDED"},{"lightness":17}]}
					],
				{name: "Shades of Grey"}
			);
		});
	</script>

	';

	return $stockmsiit_gmap;
}
add_shortcode( 'gmap', 'stockmsiit_gmap_shortcode' );