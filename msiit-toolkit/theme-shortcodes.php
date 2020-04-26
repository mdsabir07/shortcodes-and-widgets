<?php

function msiit_slides_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'slides'      => '',
            'loop'      => 'true',
            'dots'      => 'true',
            'arrows'       => 'true',
            'autoplay'  => 'true',
            'autoplaySpeed'=> 3000,
            'speed'=> 3000,
    ), $atts ));

    $random = rand(4356345,3423566);

    $html = '
    <script>
        jQuery(document).ready(function($) {
            $("#slide-'.$random.'").slick({
                loop: '.$loop.',
                fade: '.$fade.',
                dots: '.$dots.',
                arrows: '.$arrows.',
                nextArrow: "<i class=\'fa fa-arrow-right\'></i>",
                prevArrow: "<i class=\'fa fa-arrow-left\'></i>",
                autoplay: '.$autoplay.',
                autoplaySpeed: '.$settings['autoplay_time'].',
                speed: '.$settings['speed'].'
            });
        });
    </script>
    <div class="slider-wrapper"><div id="slide-'.$random.'" class="slides">';
        $slides = vc_param_group_parse_atts($atts['slides']);
        foreach ($slides as $slide) {
            $bg = wp_get_attachment_image_src( $slide['image'], 'full', true );
            $bg_image = $bg[0];
            $html .= '<div class="single-slider-item" style="background-image:url('.$bg_image.')">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col col-auto">
                            <div class="slide-content">
                                '.wpautop( $slide['content'] ).'
                                <h3>'.$slide['title'].'</h3>
                                <a href="'.esc_url( $slide['link'] ).'" class="bordered-btn filled-btn">'.esc_html( $slide['link_text'] ).'</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    $html .= '</div>';
    return $html;
}
add_shortcode( 'msiit_slides', 'msiit_slides_shortcode' );
// End slides shortcode