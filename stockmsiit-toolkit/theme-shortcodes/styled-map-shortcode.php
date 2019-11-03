<?php
// Styled map
function theme_styled_map_shortcode( $atts , $content = null  ){
    extract( shortcode_atts( array(
        'latitude'      => '40.9811099',
        'longitude'     => '-74.9637603',
        'height'        => '500',
        'color'        => '#8da4c2'
    ) , $atts ) );
    $google_api = cs_get_option('google_api');

    
    $optimistic_styled_map_markup ='';

    $dynamic_map_id = rand(11123,25478);
    if(!empty($google_api)){
           $optimistic_styled_map_markup .= '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.esc_url($google_api).'"></script>';
        }
    
    $optimistic_styled_map_markup .='<div style="height:'.$height.'px;" class="optimistic-map-'.$dynamic_map_id.'"></div>';
    $optimistic_styled_map_markup .= 
    '<script>
        jQuery(document).ready(function($){
            $(".optimistic-map-'.esc_attr($dynamic_map_id).'")
                  .gmap3({
                    center:['.esc_attr($latitude).', '.esc_attr($longitude).'],
                    zoom:11,
                    mapTypeId: "shadeOfGrey", // to select it directly
                    mapTypeControlOptions: {
                      mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
                    },
                    disableDefaultUI: true,
                    scrollwheel:false
                  })
                  .marker({
                    position: ['.esc_attr($latitude).', '.esc_attr($longitude).']
                  })    
                  .styledmaptype(
                    "shadeOfGrey",
                    [
                      {"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},
               
                      {"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
                      {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#222222"},{"lightness":20}]},
                      {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#222222"},{"lightness":17},{"weight":1.2}]},
                      {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},
                      {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":21}]},
                      {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ebebeb"},{"lightness":17}]},
                      {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ebebeb"},{"lightness":29},{"weight":0.2}]},
                      {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ececec"},{"lightness":18}]},
                      {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ececec"},{"lightness":16}]},
                      {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":19}]},
                      {"featureType":"water","elementType":"geometry","stylers":[{"color":"'.esc_attr($color).'"},{"lightness":17}]}
                    ],
                    {name: "Shades of Grey"}
                  );
        });
    </script>';
    return $optimistic_styled_map_markup;
}
add_shortcode('optimistic_styled_map','theme_styled_map_shortcode');