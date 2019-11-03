<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Slider Shortcode
function medpro_slide_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
            'count'         => 3,
            'columns'       => 6,
            'slide_id'      => '',
            'height'        => 730,
            'loop'          => esc_html__( 'true', 'medpro-toolkit' ),
            'dots'          => esc_html__( 'true', 'medpro-toolkit' ),
            'nav'           => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplay'      => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplayTimeout'=> 5000,
        ), $atts
    ));

    if ($count == 1) {
        $q = new WP_Query( array('posts_per_page' => $count,'post_type' => 'slide', 'p' => $slide_id) );
    }else {
        $q = new WP_Query( array('posts_per_page'=> $count,'post_type'=> 'slide') );
    }

    $medpro_slide_desc_tags = array(
        'a' => array(
            'href'  => array(),
            'title' => array(),
            'class' => array(),
        ),
        'img'   => array(
            'alt'   => array(),
            'src'   => array(),
        ),
        'br'    => array(),
        'em'    => array(),
        'strong'=> array(),
    );
    
    if ($count == 1) {
        $medpro_slide_markup = '';
    }else {
        $medpro_slide_markup = '
        <script>
            jQuery(window).load(function(){
                jQuery(".medpro-slides").owlCarousel({
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
        $medpro_slide_markup .= '
        <div class="medpro-slides">';
    } else {
        $medpro_slide_markup .= '
        <div class="medpro-slides owl-carousel">';
    }

    while ($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $content = get_the_content();

        if (get_post_meta( $post_id, 'medpro_slide_options', true )) {
            $slide_meta = get_post_meta( $post_id, 'medpro_slide_options', true );
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

    $medpro_slide_markup .= '
    <div style="background-image: url('.get_the_post_thumbnail_url( $post_id, 'large' ).');height: '.esc_attr( $height ).'px" class="single-slide-item">';

        if ($enable_overlay == true) {
            $medpro_slide_markup .= '<div style="opacity: '.esc_attr( $overlay_opacity ).';background-color: '.esc_attr( $overlay_color ).'" class="slide-overlay"></div>';
        }

        $medpro_slide_markup .= '
        <div class="container">
            <div class="row">
                <div style="color: '.esc_attr( $text_color ).'" class="col-lg-'.esc_attr( $columns ).'">
                    '.wp_kses( wpautop( esc_html( $content ) ), $medpro_slide_desc_tags ).'
                    <h2>'.do_shortcode( get_the_title($post_id) ).'</h2>';

                    if ( !empty($slide_meta['buttons']) ) {
                        $medpro_slide_markup .= '<div class="medpro-slide-buttons">';
                        foreach ($slide_meta['buttons'] as $button) {

                            if ($button['link_type'] == 1) {
                                $button_link = get_page_link( $button['link_to_page'] );
                            } else {
                                $button_link = $button['link_to_external'];
                            }
                            $medpro_slide_markup .= '<a href="'.esc_url( $button_link ).'" class="'.esc_attr( $button['type'] ).'-btn medpro-slide-btn">'.esc_html( $button['text'] ).'</a>';
                        }
                        $medpro_slide_markup .= '</div>';
                    }

                    $medpro_slide_markup .='
                </div>
            </div>
        </div>
    </div>

    ';
    endwhile;
    $medpro_slide_markup .= '</div>';
    wp_reset_query();

    return $medpro_slide_markup;
}
add_shortcode( 'medpro_slides', 'medpro_slide_shortcode' );
// End slider shortcode


/*===== Start popup image gallery shortcode =====*/
function bunzl_popup_image_gallery_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'images'    => '',
    ), $atts ));

    $images_ids = explode(',', $images);

    if (!empty($images)) {
        $html = '<div class="zoom-gallery">';

                foreach ($images_ids as $image) {
                    $image_array = wp_get_attachment_image_src( $image, 'large' );

                    $html .= '
                    <a href="'.esc_url($image_array[0]).'" data-source="'.esc_url($image_array[0]).'" style="width:193px;height:125px;">
                        <img src="'.esc_url($image_array[0]).'" width="193" height="125" alt="'.esc_attr(get_the_title()).'">

                    </a>
                    ';
                }

            $html .='
        </div>
        ';
    } else {
        $html = '';
    }
    return $html;
}
add_shortcode( 'image_gallery', 'bunzl_popup_image_gallery_shortcode' );

// Services Carousel
function medpro_service_carousel_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'count'         => -1,
            'loop'          => esc_html__( 'true', 'medpro-toolkit' ),
            'dots'          => esc_html__( 'true', 'medpro-toolkit' ),
            'nav'           => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplay'      => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplayTimeout'=> 5000,
            'desktop_count' => 4,
            'tablet_count'  => 3,
            'mobile_count'  => 2,
            's_link_type'   => '1',
            's_link_to_page'=> '',
            's_link_to_external'=> '',
    ), $atts ));

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'service-carousel', 'orderby' => 'menu_order', 'order' => 'ASC') );

    $dynamic_id = rand(3456346, 3452899);

    $medpro_service_carousel_markup = '
    <script>
        jQuery(document).ready(function($) {
            $("#service-carousel-'.$dynamic_id.'").owlCarousel({
                slideBy: 4,
                margin: 20,
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
    <div id="service-carousel-'.$dynamic_id.'" class="medpro-service-carousel owl-carousel">
    ';
    while ($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();

       if (get_post_meta( $post_id, 'medpro_service_carousel_options', true )) {
            $service_carousel_meta = get_post_meta( $post_id, 'medpro_service_carousel_options', true );
        } else {
            $service_carousel_meta = array();
        }

        if (array_key_exists('s_link_type', $service_carousel_meta)) {
            $s_link_type = $service_carousel_meta['s_link_type'];
        } else {
            $s_link_type = '';
        }

        if (array_key_exists('s_link_to_page', $service_carousel_meta)) {
            $link_to_page = $service_carousel_meta['s_link_to_page'];
        } else {
            $link_to_page = '';
        }

        if (array_key_exists('s_link_to_external', $service_carousel_meta)) {
            $link_to_external = $service_carousel_meta['s_link_to_external'];
        } else {
            $link_to_external = '';
        }
        
        $medpro_service_carousel_markup .= '
        <div class="medpro-service-carousel-item" style="background-image: url('.esc_url( get_the_post_thumbnail_url($post_id, 'medium')).')">
            <div class="service-carousel-title text-center">';
                if ($s_link_type == 1) {
                    $link_source = get_page_link($link_to_page);
                } else {
                    $link_source = ''.$link_to_external.'';
                }
                $medpro_service_carousel_markup .= '
                <h3><a href="'.esc_url( $link_source ).'">'.get_the_title().'</a></h3>
            </div>
        </div>
        ';
    endwhile;
    $medpro_service_carousel_markup .= '</div>';
    wp_reset_query();
    return $medpro_service_carousel_markup;
}
add_shortcode( 'service_carousel', 'medpro_service_carousel_shortcode' );
// End service shortcode

/*===== Start testimonials shortcode =====*/
function medpro_testimonial_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
            'count'         => '-1',
            'testi_id'      => '',
            'loop'          => esc_html__( 'true', 'medpro-toolkit' ),
            'dots'          => esc_html__( 'true', 'medpro-toolkit' ),
            'nav'           => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplay'      => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplayTimeout'=> '15000',
        ), $atts 
    ));

    if ($count == 1) {
       $q = new WP_query( array('posts_per_page' => $count, 'post_type' => 'testimonial', 'p' => $testi_id) );
    } else {    
        $q = new WP_query( array('posts_per_page' => $count, 'post_type' => 'testimonial') );
    }
    

    $testimonial_id = rand(960988, 897245);

    if ($count ==1) {
        $testimonial_markup = '';
    } else {
        $testimonial_markup = '
        <script>
            
            jQuery(document).ready(function($) {
                $("#testimonil-'.esc_attr( $testimonial_id ).'").owlCarousel({
                    items: 1,
                    loop: '.esc_attr( $loop ).',
                    dots: '.esc_attr( $dots ).',
                    nav: '.esc_attr( $nav ).',
                    navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
                    autoplay: '.esc_attr( $autoplay ).',
                    autoplayTimeout: '.esc_attr( $autoplayTimeout ).',
                    autoplayHoverPause:true,
                    autoplaySpeed:500,
                });
            });
            
        </script>';
    }

    if ($count == 1) {
        $testimonial_markup .= '
        <div class="testimonials">';
    } else {
        $testimonial_markup .= '
        <div id="testimonil-'.esc_attr( $testimonial_id ).'" class="testimonials owl-carousel">';
    }

    while ( $q->have_posts() ) : $q->the_post();
    $post_id = get_the_ID();
    $content = get_the_content();

    if ( get_post_meta( $post_id, 'testimonial_options', true ) ) {
        $testimonial_meta = get_post_meta( $post_id, 'testimonial_options', true );
    } else {
        $testimonial_meta = array();
    }

    if ( array_key_exists( 'author_info', $testimonial_meta ) ) {
        $author_info = $testimonial_meta['author_info'];
    } else {
        $author_info = '';
    }

    $testimonial_markup .= '
    <div class="single-testimonial-item">
        '.get_the_post_thumbnail( $post_id, 'thumbnail' ).'
        <div class="testimonial-content">
            '.wpautop( do_shortcode( $content ) ).'
        </div>
        <div class="author-meta">
            <h4>'.esc_html( get_the_title() ).'</h4>
            <p class="testimonial-author-details">'.esc_html( $author_info ).'</p>
        </div>
    </div>
    ';
    endwhile;

    $testimonial_markup .= '</div>';

    wp_reset_query();
    return $testimonial_markup;
}
add_shortcode( 'medpro_testimonial', 'medpro_testimonial_shortcode' );
// End testimonials shortcode

// Logo Carousel
function medpro_logo_carousel_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'logos'         => '',
            'desktop_count' => 5,
            'tablet_count'  => 3,
            'mobile_count'  => 2,
            'loop'          => esc_html__( 'true', 'medpro-toolkit' ),
            'dots'          => esc_html__( 'true', 'medpro-toolkit' ),
            'nav'           => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplay'      => esc_html__( 'true', 'medpro-toolkit' ),
            'autoplayTimeout'=> 5000,
    ), $atts ));

    $logo_ids = explode(',', $logos);

    $medpro_logo_carousel_markup = '
    <script>
        jQuery(document).ready(function($) {
            $(".medpro-logo-carousel").owlCarousel({
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
    <div class="medpro-logo-carousel owl-carousel">
    ';
    foreach ($logo_ids as $logo) {
        $logo_img_array = wp_get_attachment_image_src( $logo, 'large' );
        $medpro_logo_carousel_markup .= '
            <div class="medpro-logo-carousel-item">
                <div class="medpro-logo-carousel-item-tablecell">
                    <img src="'.esc_url( $logo_img_array[0] ).'" alt="">
                </div>
            </div>
        ';
    }
    $medpro_logo_carousel_markup .= '</div>';

    return $medpro_logo_carousel_markup;
}
add_shortcode( 'logo_carousel', 'medpro_logo_carousel_shortcode' );
// End logo shortcode

// Section title shortcode 
function medpro_section_title_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'style'     => 1,
        'title'     => '',
        'desc_option'=> 1,
        'desc'      => '',
        'text_align'=> 'center'
    ), $atts ));

    $section_title_markup = '
        <div class="medpro-section-title theme-'.esc_attr( $style ).' text-'.esc_attr( $text_align ).'">
            <h2>'.esc_html($title).'</h2>';

            if ($desc_option == 1 && !empty($desc)) {
                $section_title_markup .= ''.wpautop( $desc ).'';
            }
    $section_title_markup .= '</div>';

    return $section_title_markup;

}
add_shortcode( 'medpro_section_title', 'medpro_section_title_shortcode' );
// End section title shortcode

// Iconic button shortcode 
function medpro_iconic_btn_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'btn_style'         =>  '1',
        'button_text'       =>  'Know more',
        'link_type'         =>  '1',
        'link_to_page'      =>  '',
        'link_to_external'  =>  '',
        'icon'              =>  '',
        'btn_color'         =>  '#44a6f0',
        'show_icon'         =>  '2',
    ), $atts ));

    if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

    if(!empty($icon) && $show_icon == 1){
        $buton_icon = '<i class="'.esc_attr($icon).'"></i>';
    } else {
        $buton_icon = '';
    }

    $medpro_iconic_btn_markup = '
       <a style="color:'.esc_attr($btn_color).'" class="medpro-iconic-btn style-'.esc_attr($btn_style).'" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).' '.$buton_icon.'</a>
    ';

    return $medpro_iconic_btn_markup;
}
add_shortcode( 'medpro_iconic_btn', 'medpro_iconic_btn_shortcode' );
// End iconicbutton shortcode


// Promo box shortcode 
function medpro_promo_box_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'icon_type' => '',
            'icon' => 'fa fa-star',
            'image'=> '',
            'title' => '',
            'desc' => '',
            'type' => '1',
            'link_page' => '',
            'link_external' => '',
            'link_text' => 'fa fa-long-arrow-right',
        ), $atts ));

    if ($type == 1) {
        $link_source = get_page_link( $link_page );
    } else {
        $link_source = $link_external;
    }

    $medpro_promo_desc_tags = array(
        'a' => array(
            'href'  => array(),
            'title' => array(),
            'class' => array(),
        ),
        'img'   => array(
            'alt'   => array(),
            'src'   => array(),
        ),
        'br'    => array(),
        'em'    => array(),
        'strong'=> array(),
    );

    $promo_image = wp_get_attachment_image_src( $image, 'thumbnail', true );

    $medpro_promo_box = '
    <div class="promo-box text-center">
        <div class="promo-icon">';

        if ($icon_type == 2) {
            $medpro_promo_box .= '<img src="'.esc_url($promo_image[0]).'" alt="'.esc_html($title).'">';
        } else {
            $medpro_promo_box .= '<i class="'.esc_attr( $icon ).'"></i>';
        }
        
        $medpro_promo_box .= '
        </div>
        <h3>'.esc_html( $title ).'</h3>
        '.wp_kses( wpautop( $desc ), $medpro_promo_desc_tags ).'
        <div class="probo-buttons">
            <a href="'.esc_url( $link_source ).'" class="inline-btn promo-btn"><i class="'.esc_attr( $link_text ).'"></i></a>
        </div>
    </div>
    ';

    return $medpro_promo_box;
}
add_shortcode( 'promo_box', 'medpro_promo_box_shortcode' );

// Iconic box shortcode 
function medpro_iconic_box_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'icon_type'     => '',
        'icon'          => 'fa fa-star',
        'image'         => '',
        'title'         => '',
        'desc'          => '',
    ), $atts ));

    $icon_image_array = wp_get_attachment_image_src( $image, 'thumbnail', true );

    $list = '
    <div class="medpro-iconic-box">
        <div class="medpro-icon-img">';
        if ($icon_type == 2) {
            $list .= '<img src="'.esc_url( $icon_image_array[0] ).'" alt="'.esc_html($title).'">';
        } else {
            $list .= '<i class="'.esc_attr( $icon ).'"></i>';
        }
        $list .= '
        </div>
        <h3>'.esc_html($title).'</h3>
        '.wpautop( $desc ).'
    ';
    $list .= '</div>';

    return $list;
}
add_shortcode( 'medpro_iconic_box', 'medpro_iconic_box_shortcode' );
// End iconic box shortcode

// Team shortcode 
function medpro_team_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'image'     => '',
        'title'     => '',
        'profession'=> '',
    ), $atts ));
    $team_image_array = wp_get_attachment_image_src( $image, 'medium', true );
    $list = '
    <div class="medpro-team-box">
        <div class="team-img">
            <img src="'.esc_url( $team_image_array[0] ).'" alt="'.esc_html($title).'">
        </div>
        <div class="team-meta">
            <h4>'.esc_html($title).'</h4>
            '.wpautop( $profession ).'
        </div>
    </div>
    ';
    return $list;
}
add_shortcode( 'medpro_team', 'medpro_team_shortcode' );
// End team shortcode

// Service shortcode 
function medpro_service_box_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'title'           => '',
            'desc'            => '',
            'icon_type'       => 1,
            'upload_icon'     => '',
            'chosse_icon'     => '',
    ), $atts ));

    $medpro_service_desc_tags = array(
        'a' => array(
        'href'  => array(),
        'title' => array(),
        'class' => array(),
        ),
        'img'   => array(
        'alt'   => array(),
        'src'   => array(),
        ),
        'br'    => array(),
        'em'    => array(),
        'strong'=> array(),
    );

    $medpro_service_box_markup = '
        <div class="medpro-service-box">
            <div class="medpro-service-icon">';

            if ($icon_type == 1) {
                $service_icon_array = wp_get_attachment_image_src( $upload_icon, 'thumbnail' );
                $medpro_service_box_markup .= '<img src="'.esc_url( $service_icon_array[0] ).'" alt="'.esc_html( $title ).'">';
            } else {
                $medpro_service_box_markup .= '<i class="'.esc_attr( $chosse_icon ).'"></i>';
            }

            $medpro_service_box_markup .= '
            </div>
            <div class="medpro-service-content">
                <h3>'.esc_html( $title ).'</h3>
                '.wp_kses( wpautop( esc_html( $desc ) ), $medpro_service_desc_tags ).'
            </div>
        </div>
    ';
    $medpro_service_box_markup .= '';

    return $medpro_service_box_markup;
}
add_shortcode( 'medpro_service_box', 'medpro_service_box_shortcode' );
// End team shortcode


// Recent post shortcode 
function medpro_recent_post_list_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => '3',
    ), $atts) );
     
    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'post') );      
         
    $list = '<div class="recent-post-list">';
    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $list .= '
        <div class="single-recent-post-item">
            '.get_the_post_thumbnail( $post_id, 'medium' ).'
            <h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
        </div>
        ';        
    endwhile;
    $list.= '</div>';
    wp_reset_query();
    return $list;
}
add_shortcode('recent_posts', 'medpro_recent_post_list_shortcode'); 
// End recent post shortcode 

// Post shortcode 
function medpro_posts_shortcode($atts) {
    extract( shortcode_atts( array(
        'columns'       => 1,
        'count'         => 2,
        'category_id'   => '',
        'date'          => 1,
        'img_height'    => 220,
        'content'       => 1,
        'post_btn'      => 1,
        'btn_text'	    => 'read more',
    ), $atts ));

    if ($category_id) {
        $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'post', 'cat' => array($category_id), 'order' => 'ASC') );
    } else {
        $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'post') );
    }

    if ($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif ($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif ($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif ($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif ($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    }
    
    $post_markup = '
    <div class="row">';
    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $post_content = get_the_content();
        $post_excerpt = get_the_excerpt();

        if (get_post_meta( $post_id, 'medpro_post_options', true )) {
            $post_meta = get_post_meta( $post_id, 'medpro_post_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('external_page_link', $post_meta)) {
            $external_page_link = $post_meta['external_page_link'];
        } else {
            $external_page_link = false;
        }

        if (array_key_exists('link_to_external_page', $post_meta)) {
            $link_to_external_page = $post_meta['link_to_external_page'];
        } else {
            $link_to_external_page = '';
        }


        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).');height: '.esc_attr( $img_height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        $post_markup .= '
            <div class="'.esc_attr($column_markup).'">
                <div class="medpro-single-post-block">';

                    $post_markup .= '<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>';
                    if ($date == 1) {
                    	$post_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';                   	
                    }

                	$post_markup .= '
                    <div class="post-block-content">
                    <h2><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h2>';
                    

                    if ($content == 1) {
                        $post_markup .= '<div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>';
                    } else {
                    	$post_markup .= '<div class="post-block-excerpt">'.esc_html($post_content).'</div>';
                    }

                    if ($post_btn == 1) {
                        if ($external_page_link == true) {
                            $page_link = get_page_link( $link_to_external_page );
                            $post_markup .= '
                            <a class="post-btn filled-btn" href="'.esc_url($page_link).'">'.esc_html($btn_text).'</a>';
                        } else {
                            $post_markup .= '
                            <a class="post-btn filled-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html($btn_text).'</a>';
                        }   
                    }
                    
                    $post_markup .= '
                    </div>    
                </div>
            </div>    
        ';
    endwhile;

    $post_markup .= '</div>';
    wp_reset_query();
    return $post_markup; 
}
add_shortcode( 'medpro_posts', 'medpro_posts_shortcode' );
// End post shortcode
