<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Slider Shortcode
function brendan_banner_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
            'height'            => 730,
            'bg_color'          => '#00f',
            'title'             => 3,
            'button_text_l'     => 'Know more',
            'button_text_2'     => 'Learn more',
            'link_type1'        => '1',
            'link_type2'        => '1',
            'link_to_page1'     => '',
            'btn_bg_color1'     => '#70CBCB',
            'btn_text_color1'   => '#fff',
            'link_to_page2'     => '',
            'link_to_external1' => '',
            'link_to_external2' => '',
            'btn_bg_color2'     => '#70CBCB',
            'btn_text_color2'   => '#fff',
            'image'             => '',
            'css_tags'          => '',
        ), $atts
    ));

    if($link_type1 == 1 && !empty($link_to_page1)) {
        $link_markup1 = get_page_link($link_to_page1);
    } elseif($link_type1 == 2) {
        $link_markup1 = $link_to_external1;
    } else {
        $link_markup1 = '';
    }

    if($link_type2 == 1 && !empty($link_to_page2)) {
        $link_markup2 = get_page_link($link_to_page2);
    } elseif($link_type2 == 2) {
        $link_markup2 = $link_to_external2;
    } else {
        $link_markup2 = '';
    }

    $banner_image = wp_get_attachment_image_src( $image, 'full', true );

    $html = '';

    $html .= '
    <div style="background-color: '.esc_attr( $bg_color ).';height: '.esc_attr( $height ).'px" class="brendan-banner">';

        $html .= '
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-left-content">
                        <h2>'.esc_html( $title ).'</h2>';

                        $tags = vc_param_group_parse_atts($atts['css_tags']);

                        $html .= '<div class="css-tags">';

                            foreach ($tags as $tag) {
                                $html .= '<span style="background-color:'.$tag['tag_bg'].';color:'.$tag['tag_color'].'">'.$tag['tag_name'].'</span>';
                            }

                        $html .='</div>';

                        $html .='
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-area-img">
                        <img src="'.esc_url($banner_image[0]).'" alt="'.esc_html($title).'">
                    </div>
                </div>
            </div>
        </div>';

    $html .= '</div>';

    return $html;
}
add_shortcode( 'brendan_banner', 'brendan_banner_shortcode' );
// End bannerr shortcode


// button shortcode
// <div class="brendan-banner-buttons">
//     <a style="background-color:'.$btn_bg_color1.';color:'.$btn_text_color1.'" class="banner-btn button-left" href="'.esc_url( $link_markup1 ).'">'.esc_html($button_text_l).'</a>

//     <a style="background-color:'.$btn_bg_color2.';color:'.$btn_text_color2.'" class="banner-btn button-right" href="'.esc_url( $link_markup2 ).'">'.esc_html($button_text_2).'</a>
// </div>

// Banner 2 Shortcode
function brendan_banner2_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
            'height'            => 730,
            'banner_bg'         => '',
            'bg_color'          => '#00f',
            'title'             => 3,
            'desc'              => '',
            'button_text_l'     => 'Know more',
            'button_text_2'     => 'Learn more',
            'link_type1'        => '1',
            'link_type2'        => '1',
            'link_to_page1'     => '',
            'btn_bg_color1'     => '#70CBCB',
            'btn_text_color1'   => '#fff',
            'link_to_page2'     => '',
            'link_to_external1' => '',
            'link_to_external2' => '',
            'btn_bg_color2'     => '#70CBCB',
            'btn_text_color2'   => '#fff',
            'image'             => '',
        ), $atts
    ));

    if($link_type1 == 1 && !empty($link_to_page1)) {
        $link_markup1 = get_page_link($link_to_page1);
    } elseif($link_type1 == 2) {
        $link_markup1 = $link_to_external1;
    } else {
        $link_markup1 = '';
    }

    if($link_type2 == 1 && !empty($link_to_page2)) {
        $link_markup2 = get_page_link($link_to_page2);
    } elseif($link_type2 == 2) {
        $link_markup2 = $link_to_external2;
    } else {
        $link_markup2 = '';
    }

    $banner_bg = wp_get_attachment_image_src( $banner_bg, 'large', true );
    $banner_image = wp_get_attachment_image_src( $image, 'full', true );

    $html = '';

    $html .= '
    <div style="background-image:url('.$banner_bg[0].');background-color: '.esc_attr( $bg_color ).';height: '.esc_attr( $height ).'px" class="brendan-banner banner2">';

        $html .= '
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <div class="banner-left-content">
                        <h2>'.esc_html( $title ).'</h2>
                        '.wpautop( $desc ).'

						<div class="brendan-banner-buttons">';
							if (!empty($button_text_l)) {
								$html .= '
						    <a style="background-color:'.$btn_bg_color1.';color:'.$btn_text_color1.'" class="boxed-btn banner-btn button-left" href="'.esc_url( $link_markup1 ).'">'.esc_html($button_text_l).'</a>';
							}

							if (!empty($button_text_2)) {
								$html .= '
						    <a style="background-color:'.$btn_bg_color2.';color:'.$btn_text_color2.'" class="boxed-btn banner-btn button-right" href="'.esc_url( $link_markup2 ).'">'.esc_html($button_text_2).'</a>';
							}
							$html .= '
						</div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-area-img">
                        <img src="'.esc_url($banner_image[0]).'" alt="'.esc_html($title).'">
                    </div>
                </div>
            </div>
        </div>';

    $html .= '</div>';

    return $html;
}
add_shortcode( 'brendan_banner2', 'brendan_banner2_shortcode' );
// End banner 2 shortcode

// Banner 3 Shortcode
function brendan_banner3_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
            'height'            => 380,
            'banner_bg'         => '',
            'bg_color'          => '#00f',
            'title'             => 3,
            'desc'              => '',
        ), $atts
    ));

    $banner_bg = wp_get_attachment_image_src( $banner_bg, 'large', true );

    $html = '
    <div style="background-image:url('.$banner_bg[0].');background-color: '.esc_attr( $bg_color ).';height: '.esc_attr( $height ).'px" class="brendan-banner banner3">
        <div class="container">
            <div class="row">
                <div class="col my-auto text-center">
                    <div class="banner3-content">
                        <h2>'.esc_html( $title ).'</h2>
                        '.wpautop( $desc ).'
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    return $html;
}
add_shortcode( 'brendan_banner3', 'brendan_banner3_shortcode' );
// End banner 3 shortcode


// About shortcode 
function brendan_about_shortcode( $atts, $content ) {
    extract( shortcode_atts( array(
        'image'             => '',
        'title'             => '',
        'profession'        => '',
        'icon1'             => '',
        'icon1_link'        => '',
        'icon2'             => '',
        'icon2_link'        => '',
        'icon3'             => '',
        'icon3_link'        => '',
        'button_text'       => 'Contact me',
        'link_type'         => '1',
        'link_to_page'      => '',
        'link_to_external'  => '',
    ), $atts ));
    $about_image_array = wp_get_attachment_image_src( $image, 'thumbnail', true );

     if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

    $list = '
    <div class="brendan-about-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="about-inner-box">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <div class="about-info">
                                    <div class="about-img">
                                        <img src="'.esc_url( $about_image_array[0] ).'" alt="'.esc_html($title).'">
                                        <div></div>
                                    </div>
                                    <div class="about-meta">
                                        <h4>'.esc_html($title).'</h4>
                                        '.wpautop( $profession ).'
                                    </div>
                                    <div class="about-socials">
                                        <a href="'.$icon1_link.'" target="_blank"><i class="'.$icon1.'"></i></a>
                                        <a href="'.$icon2_link.'" target="_blank"><i class="'.$icon2.'"></i></a>
                                        <a href="'.$icon3_link.'" target="_blank"><i class="'.$icon3.'"></i></a>
                                    </div>
                                    <div class="contact-btn">
                                        <a class="contact-button" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).'</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="about-details">
                                    '.do_shortcode( $content ).'
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    return $list;
}
add_shortcode( 'brendan_about', 'brendan_about_shortcode' );
// End about shortcode

// Social media shortcode 
function brendan_social_shortcode($atts) {
    extract(shortcode_atts(array(
        'title'     => '',
        'socials'   => '',
    ), $atts));

    $list = '<div class="brendan-social-media">
        <h2>'.$title.'</h2>
    ';


    $socials = vc_param_group_parse_atts($atts['socials']);

    $list .= '<div class="social-icons">';

        foreach ($socials as $social) {
            $list .= '<a href="'.$social['link'].'" target="_blank"><i class="'.$social['icon'].'"></i></a>';
        }

    $list .='
    </div></div>';

    return $list;
}
add_shortcode('socials', 'brendan_social_shortcode');

// Section title link shortcode 
function  brendan_section_title_link_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        'title'     => '',
        'link'      => '',
        'link_text' => '',
    ), $atts ));

    $html = '
        <div class="st-link-wrap">
            <div class="container">
                <div class="row">
                    <div class="col my-auto"><h2>'.$title.'</h2></div>
                    <div class="col col-auto my-auto">
                        <a href="'.$link.'">'.$link_text.'</a>
                    </div>
                </div>
            </div>
        </div>
    ';

    return $html;
}
add_shortcode( 'section_title_link', 'brendan_section_title_link_shortcode' );

// Case Studies shortcode 
function brendan_case_studies_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'count'         => 4,
        'img_height'    => 212,
    ), $atts ));

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'case_studies') );
    
    $html = '
    <div class="row">';
    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();

        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'medium')).');height: '.esc_attr( $img_height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        $html .= '
            <div class="col-md-6 col-sm-12">
                <div class="case-studies-block">
                	<a class="sin-case-studies" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>
                    <div class="case-studies-content">
	                    <h2><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h2>
                    </div>    
                </div>
            </div>    
        ';
    endwhile;

    $html .= '</div>';
    wp_reset_query();
    return $html; 
}
add_shortcode( 'case_studies', 'brendan_case_studies_shortcode' );
// End Case Studies shortcode

// Post shortcode 
function brendan_posts_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'count'         => 4,
        'img_height'    => 224,
    ), $atts ));

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'post') );
    
    $html = '
    <div class="row">';
    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $post_excerpt = get_the_excerpt();

        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'medium')).');height: '.esc_attr( $img_height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        $html .= '
            <div class="col-sm-12">
                <div class="brendan-single-post-block">
                	<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>
                    <div class="post-block-content">
	                    <h2><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h2>
	                    <div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>
                    </div>    
                </div>
            </div>    
        ';
    endwhile;

    $html .= '</div>';
    wp_reset_query();
    return $html; 
}
add_shortcode( 'brendan_posts', 'brendan_posts_shortcode' );
// End post shortcode

// Blog menu shortcode 
function brendan_blog_menu_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'blog_menu_lists'	=> '',
    ), $atts ));

    $menus = vc_param_group_parse_atts($atts['blog_menu_lists']);

    $html = '
        <div class="blog_menu-wrap">';
        foreach ($menus as $menu) {
            $html .= '<a href="'.$menu['menu_link'].'"><i class="'.$menu['icon'].'"></i>'.$menu['menu_text'].'</a>';
        }
        $html .= '</div>';

    return $html; 
}
add_shortcode( 'blog_menus', 'brendan_blog_menu_shortcode' );
// End Blog menu shortcode

// Programmer location shortcode
function brendan_p_locations_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'title'		=> 'Canada',
		'locations'	=> '',
	), $atts ));

	$location_list = vc_param_group_parse_atts($atts['locations']);
	$html = '
		<div class="location-box">
			<h3>'.$title.'</h3>
			<div class="location-list">';
				foreach ($location_list as $list) {
		            $html .= '<a href="'.$list['menu_link'].'">'.$list['menu_text'].'</a>';
		        }
			$html .= '
			</div>
		</div>
	';

	return $html;
}
add_shortcode( 'p_locations', 'brendan_p_locations_shortcode' );
// end Programmer location shortcode

// Why hire designer shortcode
function brendan_wh_desinger_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'title'		=> 'Title',
		'btn_text'	=> 'View my work',
		'btn_link'	=> '',
	), $atts ));

	$html = '
	<div class="wh-wrapper">
		<h2>'.wpautop($title).'</h2>
		'.do_shortcode($content).'';

        if(!empty($btn_text)) {
        $html .= '
    		<div class="wh-btn text-center">
    			<a href="'.$btn_link.'" class="boxed-btn">'.$btn_text.'</a>
    		</div>';
        }
        $html .= '
	</div>
	';

	return $html;
}
add_shortcode( 'wh_designer', 'brendan_wh_desinger_shortcode' );
// End Why hire designer shortcode

// Approach shortcode
function  brendan_approach_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        'bg_color'  => '#1B4564',
        'title'     => 'Title',
        'title_color'=> '',
        'ap_boxs'   => '',
    ), $atts ));

    $html = '
    <div class="approach-wrapper white-bg" style="background-color:'.$bg_color.'">
        <div class="container">
            <h2 style="color:'.$title_color.'">'.$title.'</h2>
            <div class="row">';
            $boxs = vc_param_group_parse_atts($atts['ap_boxs']);

            if(!empty($boxs)) {
                foreach ($boxs as $box) {
                    $icon_img = wp_get_attachment_image_src( $box['img_icon'], 'thumbnail' );
                    $html .= '
                    <div class="col-md-4 col-sm-12">
                        <div class="single-ap-box">
                            <img src="'.$icon_img[0].'" alt="'.$box['box_title'].'" class="icon-img">
                            <h3>'.wpautop($box['box_title']).'</h3>
                            '.wpautop($box['desc']).'
                            <a href="'.$box['link'].'" class="learnmore-btn">'.$box['btn_text'].' <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>';
                }
            }
            
            $html .= '
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'approach', 'brendan_approach_shortcode' );
// End Approach shortcode


// Feature NY city shortcode
function  brendan_feature_nyc_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        'bg_color'  => '#122f3f',
        'title'     => 'Title',
        'title_color'=> '',
        'details'      => '',
        'techcrunchs'=> '',
    ), $atts ));

    $html = '
    <div class="approach-wrapper feature-nyc" style="background-color:'.$bg_color.'">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col my-auto">
                    <div class="feature-nyc-top-content">
                        <h3 style="color:'.$title_color.'; text-align:center;">'.$title.'</h3>
                        '.wpautop( $details ).'
                    </div>
                </div>
            </div>
            <div class="row">';
            $nyc_tech = vc_param_group_parse_atts($atts['techcrunchs']);

            if(!empty($nyc_tech)) {
                foreach ($nyc_tech as $tech) {
                    $icon_img = wp_get_attachment_image_src( $tech['img_icon'], 'thumbnail' );
                    $html .= '
                    <div class="col-md-4 col-sm-12">
                        <div class="single-nyc-tech">
                            <div class="nyc-tech-icon text-center">
                                <img src="'.$icon_img[0].'" alt="'.$tech['tech_title'].'" class="icon-img">
                            </div>
                            <h4>'.wpautop($tech['tech_title']).'</h4>
                            '.wpautop($tech['desc']).'
                        </div>
                    </div>';
                }
            }
            
            $html .= '
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'feature_nyc', 'brendan_feature_nyc_shortcode' );
// End Feature NY city shortcode


// Ventures shortcode
function  brendan_ventures_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
        'venture_bg'=> '',
		'shape_img'	=> '',
        'title'     => 'Title',
        'title_color'=> '',
		'details'    => '',
		'ventures'=> '',
	), $atts ));

    $ventures_bg = wp_get_attachment_image_src( $venture_bg, 'large', 'true' );
    $ventures_shape_img = wp_get_attachment_image_src( $shape_img, 'large', 'true' );

	$html = '
	<div class="ventures-wrapper ventures-bg" style="background-image:url('.$ventures_bg[0].')">';
        if(!empty($shape_img)) {
            $html .= '
            <img src="'.$ventures_shape_img[0].'" alt="'.$title.'" class="ventures-top-shape">';
        }
        $html .= '
		<div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col my-auto">
                    <div class="feature-nyc-top-content">
                        <h3 style="color:'.$title_color.'; text-align:center;">'.$title.'</h3>
                        '.wpautop( $details ).'
                    </div>
                </div>
            </div>
			<div class="row venture-absolute">';
			$ventures_box = vc_param_group_parse_atts($atts['ventures']);

			if(!empty($ventures_box)) {
				foreach ($ventures_box as $venture) {
					$icon_img = wp_get_attachment_image_src( $venture['img_icon'], 'thumbnail' );
					$html .= '
					<div class="col-md-4 col-sm-12">
						<div class="single-nyc-tech venture-box">
							<div class="nyc-tech-icon text-center">
                                <img src="'.$icon_img[0].'" alt="'.$venture['venture_title'].'" class="icon-img">
                            </div>
							<h4>'.wpautop($venture['venture_title']).'</h4>
							'.wpautop($venture['desc']).'
						</div>
					</div>';
				}
			}
			
			$html .= '
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'venturs', 'brendan_ventures_shortcode' );
// End Feature NY city shortcode


// Call to action shortcode
function  brendan_cta_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        'bg_img'    => '',
        'title'     => 'Title',
        'desc'      => '',
        'btn_link'  => '',
        'btn_text'  => 'Start your project',
        'lbtn_link' => '',
        'lbtn_text' => 'Or learn how I do it!',
    ), $atts ));

    $cta_bg = wp_get_attachment_image_src( $bg_img, 'large', 'true' );

    $html = '
    <div class="cta-wrapper cta-bg" style="background-image:url('.$cta_bg[0].')">
        <div class="container">
            <div class="row">
                <div class="col text-center my-auto">
                    <div class="cta-content">
                        <h2>'.$title.'</h2>
                        '.wpautop( $desc ).'
                        <div class="cta-btn">
                            <a href="'.$btn_link.'" class="boxed-btn">'.$btn_text.'</a>
                            <a href="'.$lbtn_link.'" class="learnmore">'.$lbtn_text.'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'cta', 'brendan_cta_shortcode' );
// End Call to action shortcode


// Get free course shortcode
function  brendan_get_free_course_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'bg_img'	=> '',
		'image_left'=> '',
	), $atts ));

    $gfc_bg = wp_get_attachment_image_src( $bg_img, 'large', 'true' );
	$gfc_image_left = wp_get_attachment_image_src( $image_left, 'large', 'true' );

	$html = '
	<div class="gfc-wrapper cta-bg" style="background-image:url('.$gfc_bg[0].')">
		<div class="container">
			<div class="row">
                <div class="col text-center my-auto">
                    <div class="gfc-left-content" style="background-image:url('.$gfc_image_left[0].')"></div>
                </div>
				<div class="col my-auto">
					<div class="gfc-right-content">
						'.do_shortcode($content).'
					</div>
				</div>
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'get_free_course', 'brendan_get_free_course_shortcode' );
// End Get free course shortcode


