<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 

// Banner with video/button Shortcode
function nysneurosurgery_banner_slider_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
        	'bg_img'	=> '',
        	'autoplay'	=> esc_html__( 'true', 'nysneurosurgery-toolkit' ),
        	'autoplayspeed'	=> 2000,
        	'speed'	=> 2000,
        	'pauseonhover'	=> esc_html__( 'false', 'nysneurosurgery-toolkit' ),
        ), $atts
    ));

    $bg_img_array = wp_get_attachment_image_src( $bg_img, 'large', true );

    $html = '
    <div style="background-image: url('.$bg_img_array[0].')" class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 my-auto">';
                	$q = new WP_Query( array('posts_per_page'=> $count,'post_type'=> 'slide') );

					$html .= '
			        <script>
			            jQuery(document).ready(function($){
                            $(document).ready(function(){
                                $(".banner-slides").slick({
                                    infinite: true,
                                    nextArrow: "<i class=\'fa fa-angle-right\'></i>",
                    				prevArrow: "<i class=\'fa fa-angle-left\'></i>",
                                    autoplay: '.$autoplay.',
                                    autoplaySpeed: '.$autoplayspeed.',
                                    speed: '.$speed.',
                                    pauseOnHover: '.$pauseonhover.',  
                                });
                            });
			            });
			        </script>

					<div class="banner-slides">';
						while($q->have_posts()) : $q->the_post();
							$post_id = get_the_ID();
							$title = get_the_title();
							$content = get_the_content();

							if (get_post_meta( $post_id, 'nysneurosurgry_slide_options', true )) {
					            $slide_meta = get_post_meta( $post_id, 'nysneurosurgry_slide_options', true );
					        } else {
					            $slide_meta = array();
					        }

					        if (array_key_exists('style_text', $slide_meta)) {
					            $style_text = $slide_meta['style_text'];
					        } else {
					            $style_text = '';
					        }
					        if (array_key_exists('style_text_color', $slide_meta)) {
					            $style_text_color = $slide_meta['style_text_color'];
					        } else {
					            $style_text_color = '';
					        }
					        if (array_key_exists('box_heading', $slide_meta)) {
					            $box_heading = $slide_meta['box_heading'];
					        } else {
					            $box_heading = '';
					        }

							$html .= '
							<div class="single-slide-item">
								<div class="slide-stylist-content">
									<div class="great-stylists wow fadeInUp" data-wow-duration="3s">
										<span class="wow bounceInUp">'.$style_text.'</span>
										<span class="slide-color-text">'.$style_text_color.'</span>
									</div>
									<p>'.$box_heading.'</p>
								</div>
								<div class="slide-bottom-content">
									<div class="slide-testimonials">
										<p>'.$content.'</p>
									</div>
									<h6><i class="fa fa-user-md"></i> '.$title.'</h6>
								</div>
							</div>';
						endwhile;
						$html .= '
					</div>';
					wp_reset_query();
                	$html .= '
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'nysneurosurgery_banner_slider', 'nysneurosurgery_banner_slider_shortcode' );
// End banner video/button shortcode

// Image with content shortcode start
function nysneurosurgery_img_with_content_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'bg_img'		=> '',
		'icon_img'		=> '',
		'button_text'      => 'Learn more',
        'link_type'        => '1',
        'link_to_page'     => '',
        'link_to_external' => ''
	), $atts ));

	$bg_img_array = wp_get_attachment_image_src( $bg_img, 'large', true );
	$img = $bg_img_array[0];

	$icon_img_array = wp_get_attachment_image_src( $icon_img, 'thumbnail', true );
	$icon = $icon_img_array[0];

	if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

	$html = '
	<div class="content-with-img" style="background-image: url('.esc_url($img).')">
		<div class="content-info text-center">
			<div class="section-icon-img icon-type-'.esc_attr( $icon_type ).'">';
				if (!empty($icon_img)) {
					$html .= '<span class="icon-img"><img src="'.esc_url($icon).'" alt="'.esc_attr($icon_type).' Icon"></span>';
				}
			$html .= '
			</div>
			<div class="content-info-desc">';
				if (!empty($content)) {
					$html .= ''.do_shortcode( $content ).'';
				}
			$html .= '
			</div>
			<a class="banner-btn boxed-btn" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).' <i class="fa fa-angle-right"></i></a>
		</div>
	</div>';

	return $html;
}
add_shortcode( 'img_with_content', 'nysneurosurgery_img_with_content_shortcode' );
// Image with content shortcode end


// Banner with form Shortcode
function nysneurosurgery_banner_with_form_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
        	'bg_img'	=> '',
        	'title'		=> '',
        	'desc'		=> '',
            'button_text'      => 'View services',
            'link_type'        => '1',
            'link_to_page'     => '',
            'link_to_external' => '',
        ), $atts
    ));

    $bg_img_array = wp_get_attachment_image_src( $bg_img, 'large', true );

    if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

    $html = '
    <div style="background-image: url('.$bg_img_array[0].')" class="banner-area banner-style-'.$style.'">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12 my-auto">
                	<div class="banner-content">
						<h2>'.esc_html( $title ).'</h2>

	                    '.wpautop( $desc ).'
	                    <div class="nysneurosurgery-banner-buttons">
	                        <a class="banner-btn boxed-btn" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).'</a>
	                    </div>               	
	                </div>
                </div>
                <div class="col-lg-5 col-sm-12 my-auto positioning-form">
					<div class="banner-forms">
						'.do_shortcode( $content ).'
					</div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'banners_form', 'nysneurosurgery_banner_with_form_shortcode' );
// End banner form shortcode


// Section title shortcode 
function nysneurosurgery_section_title_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'style'     => 1,
        'title'     => '',
        'title_color'=> '',
        'desc_option'=> 1,
        'text_align'=> 'center'
    ), $atts ));

    $section_title_markup = '
        <div class="nysneurosurgery-section-title theme-'.esc_attr( $style ).' text-'.esc_attr( $text_align ).'">
            <h2 style="color:'.$title_color.'">'.esc_html($title).'</h2>';

            if ($desc_option == 1) {
                $section_title_markup .= ''.do_shortcode( $content ).'';
            }
    $section_title_markup .= '</div>';

    return $section_title_markup;

}
add_shortcode( 'nysneurosurgery_section_title', 'nysneurosurgery_section_title_shortcode' );
// End section title shortcode

// Section icon shortcode start
function nysneurosurgery_section_icon_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'icon_type'	=> 'large',
		'icon_img'	=> '',
		'text_align'=> 'center'
	), $atts ));

	$icon_img_array = wp_get_attachment_image_src( $icon_img, 'thumbnail', true );

	$html = '
	<div class="section-icon-img icon-type-'.esc_attr( $icon_type ).' text-'.esc_attr( $text_align ).'">';
		if (!empty($icon_img)) {
			$html .= '<span class="icon-img"><img src="'.$icon_img_array[0].'" alt="'.$icon_type.' Icon"></span>';
		}
		$html .= '
	</div>
	';

	return $html;
}
add_shortcode( 'nysneurosurgery_section_icon', 'nysneurosurgery_section_icon_shortcode' );
// Section icon shortcode end


function nysneurosurgery_grey_sections_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'icon_type'	=> 'large',
		'icon_img'	=> '',
	), $atts ));

	$icon_img_array = wp_get_attachment_image_src( $icon_img, 'thumbnail', true );

	$html = '
	<div class="grey-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 my-auto text-center">
					<div class="section-icon-img icon-type-'.esc_attr( $icon_type ).'">';
						if (!empty($icon_img)) {
							$html .= '<span class="icon-img"><img src="'.$icon_img_array[0].'" alt="'.$icon_type.' Icon"></span>';
						}
						if (!empty($content)) {
							$html .= ''.do_shortcode( $content ).'';
						}
						$html .= '
					</div>
				</div>
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'grey_sections', 'nysneurosurgery_grey_sections_shortcode' );


// Testimonials shortcode start
function nysneurosurgery_testimonials_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'bg_img'	=> '',
		'video_url'	=> '',
		'author_img'	=> '',
		'author_name'	=> '',
		'author_location'	=> '',
	), $atts ));

	$testi_bg_array = wp_get_attachment_image_src( $bg_img, 'large', true );
	$bg_img = $testi_bg_array[0];

	$author_img_array = wp_get_attachment_image_src( $author_img, 'thumbnail', true );
	$author = $author_img_array[0];

	$html = '
	<div class="testi-wrapper">
		<div class="testi-bg" style="background-image: url('.$bg_img.')">
			<a class="popup-video" href="'.esc_url( $video_url ).'"><i class="fa fa-play"></i></a>
			<script>
				jQuery(window).load(function(){
				    jQuery(\'a[href*="youtube.com/watch"]\').magnificPopup({
				       type: \'iframe\',
			           iframe: {
			               patterns: {
			                   youtube: {
			                       index: \'youtube.com\', 
			                       id: \'v=\', 
			                       src: \'//www.youtube.com/embed/%id%?rel=0&autoplay=1\'
			                    }
			               }
			           }   
				    });      
				});
			</script>
		</div>
		<div class="testimonials">
			'.do_shortcode( $content ).'
			<div class="testti-author-info">
				<span><img src="'.$author.'" alt="'.$author_name.'" class="author-img"></span>
				<span class="author-name">'.$author_name.'</span>
				<span class="author-location">'.$author_location.'</span>
			</div>
		</div>
	</div>';
	return $html;
}
add_shortcode( 'testimonials', 'nysneurosurgery_testimonials_shortcode' );
// Testimonials shortcode end


// Team shortcode start
function nysneurosurgery_team_members_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'img'	=> '',
		'name'	=> '',
		'designation'	=> '',
	), $atts ));

	$img_array = wp_get_attachment_image_src( $img, 'medium', true );
	$img = $img_array[0];

	$html = '
	<div class="team-wrapper">
		<div class="team-bg" style="background-image: url('.$img.')"></div>
		<div class="team-info">
			<h6 class="team-name">'.$name.'</h6>
			<p class="designation">'.$designation.'</p>
		</div>
	</div>';
	return $html;
}
add_shortcode( 'team_members', 'nysneurosurgery_team_members_shortcode' );
// team shortcode end


// Table shortcode start
function nysneurosurgery_table_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'table_title'	=> '',
		'table_list_text' 	=> '',
	), $atts ));

	$html = '
	<div class="row">
		<div class="col-lg-10 offset-lg-1">
			<div class="table-wrapper">';
				if(!empty($table_title)) :
					$html .= '<h2>'.esc_html($table_title).'</h2>';
				endif;
				$html .= '
				<table class="table">
					<tbody>';
						$table_list_text = vc_param_group_parse_atts($atts['table_list_text']);
						foreach ($table_list_text as $table_text) {
							$html .= '
							<tr>
								<td>'.esc_html($table_text['text1']).'</td>
								<td>'.esc_html($table_text['text2']).'</td>
								<td>'.esc_html($table_text['text3']).'</td>
							</tr>';
						}
						$html .= '
					</tbody>
				</table>
			</div>
		</div>
	</div>
	';
	return $html;
}
add_shortcode( 'tables', 'nysneurosurgery_table_shortcode' );
// Table shortcode End