<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 


// Banner Shortcode
function dmvstairlifts_banner_section_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( 
        array(
        	'bg_img'	=> '',
        	'title'		=> '',
            'desc'   	=> '',
            'button_text'      => 'Register Membership',
            'link_type'        => '1',
            'link_to_page'     => '',
            'link_to_external' => ''
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
    <div style="background-image: url('.$bg_img_array[0].')" class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-sm-12 my-auto text-center">
                	<div class="banner-content">
						<h2>'.esc_html( $title ).'</h2>
	                    '.wpautop( $desc ).'

	                    <div class="dmvstairlifts-banner-buttons">
	                        <a class="banner-btn boxed-btn" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).'</a>
	                    </div>                	
	                </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'dmvstairlifts_banners', 'dmvstairlifts_banner_section_shortcode' );
// End bannerr shortcode


// Colored section shortcode
function dmvstairlifts_colored_section_shortcode($atts, $content = null) {
	extract( shortcode_atts( 
		array(
			'colored_bg'	=> '',
			'bg_color'		=> '',
			'dynamic_class'	=> '',
        	'title'			=> '',
            'desc'   		=> '',
            'button_text'      => '멤버쉽 가입하기',
            'link_type'        => '1',
            'link_to_page'     => '',
            'link_to_external' => '',
            'right_img1'	   => '',
            'right_img2'	   => ''
	), $atts ));

	$bg_img_array = wp_get_attachment_image_src( $colored_bg, 'large', true );
	$right_img1_array = wp_get_attachment_image_src( $right_img1, 'large', true );
	$right_img2_array = wp_get_attachment_image_src( $right_img2, 'large', true );

    if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

    $html = '
    <div style="background-image: url('.$bg_img_array[0].');background: '.esc_attr( $bg_color ).'" class="colored-section '.$dynamic_class.'">
        <div class="container">
            <div class="row">
            	
                <div class="col-lg-6 col-sm-12">
                	<div class="colored-content">
						<h2>'.esc_html( $title ).'</h2>
	                    '.wpautop( $desc ).'

	                    <div class="dmvstairlifts-colored-buttons">
	                        <a class="colored-btn boxed-btn" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).'</a>
	                    </div>                	
	                </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                	<div class="colored-imgs">
                		<div class="img-left">
							<img src="'.$right_img1_array[0].'" alt="'.$title.'">
                		</div>               	
                		<div class="img-right">
							<img src="'.$right_img2_array[0].'" alt="'.$title.'">
                		</div>               	
	                </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'colored_section', 'dmvstairlifts_colored_section_shortcode' );
// End colored shortcode


// Colored grey section shortcode
function dmvstairlifts_colored_grey_section_shortcode($atts, $content = null) {
	extract( shortcode_atts( 
		array(
			'colored_bg'	=> '',
			'bg_color'		=> '',
			'dynamic_class'	=> '',
        	'title'			=> '',
            'desc'   		=> '',
            'button_text'      => '멤버쉽 가입하기',
            'link_type'        => '1',
            'link_to_page'     => '',
            'link_to_external' => '',
            'right_img1'	   => '',
            'right_img2'	   => ''
	), $atts ));

	$bg_img_array = wp_get_attachment_image_src( $colored_bg, 'large', true );
	$right_img1_array = wp_get_attachment_image_src( $right_img1, 'large', true );
	$right_img2_array = wp_get_attachment_image_src( $right_img2, 'large', true );

    if($link_type == 1 && !empty($link_to_page)) {
        $link_markup = get_page_link($link_to_page);
    } elseif($link_type == 2) {
        $link_markup = $link_to_external;
    } else {
        $link_markup = '';
    }

    $html = '
    <div style="background-image: url('.$bg_img_array[0].');background: '.esc_attr( $bg_color ).'" class="colored-section grey '.$dynamic_class.'">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-sm-12">
                	<div class="colored-imgs">
                		<div class="img-left">
							<img src="'.$right_img1_array[0].'" alt="'.$title.'">
                		</div>               	
                		<div class="img-right">
							<img src="'.$right_img2_array[0].'" alt="'.$title.'">
                		</div>               	
	                </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                	<div class="colored-content">
						<h2>'.esc_html( $title ).'</h2>
	                    '.wpautop( $desc ).'

	                    <div class="dmvstairlifts-colored-buttons">
	                        <a class="colored-btn boxed-btn" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).'</a>
	                    </div>                	
	                </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'colored_grey_section', 'dmvstairlifts_colored_grey_section_shortcode' );
// End colored shortcode


// Section title shortcode 
function dmvstairlifts_section_title_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'style'     => 1,
        'title'     => '',
        'title_color'=> '',
        'desc_option'=> 1,
        'desc'      => '',
        'text_align'=> 'center'
    ), $atts ));

    $section_title_markup = '
        <div class="dmvstairlifts-section-title theme-'.esc_attr( $style ).' text-'.esc_attr( $text_align ).'">
            <h2 style="color:'.$title_color.'">'.esc_html($title).'</h2>';

            if ($desc_option == 1 && !empty($desc)) {
                $section_title_markup .= ''.wpautop( $desc ).'';
            }
    $section_title_markup .= '</div>';

    return $section_title_markup;

}
add_shortcode( 'dmvstairlifts_section_title', 'dmvstairlifts_section_title_shortcode' );
// End section title shortcode


// Project Premium brands Shortcode start
function dmvstairlifts_primium_brands_project_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'count'		=> -1,
	), $atts ));

	$categories = get_terms( 'primium_brand_cat' );
	$dynamic_number = rand(4648456, 5495656);

	$html = '';

	$html .= '
	<script>
		jQuery(document).ready(function($){
			$(".project-shortlist li").click(function(){
				$(".project-shortlist li").removeClass("active");
				$(this).addClass("active");

				var selector = $(this).attr("data-filter");
				$(".project-list-'.$dynamic_number.'").isotope({
					filter: selector,
				});
			});
		});

		jQuery(window).load(function(){
			jQuery("project-list-'.$dynamic_number.'").isotope();
		});
	</script>
	';
	$html .= '
	<div class="row">
		<div class="col">
			<ul class="project-shortlist">
				<li class="active" data-filter="*">All Brands</li>';
				if (!empty($categories && !is_wp_error( $categories ))) {
					foreach ($categories as $category) {
						$html .= '
						<li data-filter=".'.$category->slug.'">'.$category->name.'</li>
						';
					}
				}

				$html .= '
			</ul>
		</div>
		<div class="col-sm-12">
			<div class="row project-list-'.$dynamic_number.' mt-30">';

			$q = new WP_Query(array(
				'posts_per_page' => $count, 
				'post_type' => 'primium_brand'
			));

			while ($q->have_posts()) : $q->the_post();
                $post_id = get_the_ID(); 

				$project_category = get_the_terms( get_the_ID(), 'primium_brand_cat' );

				if (!empty($project_category && ! is_wp_error( $project_category ))) {
					$project_cat_list = array();

					foreach ($project_category as $category) {
						$project_cat_list[] = $category->slug;
					}
					$project_assigned_cat = join(" ", $project_cat_list);
				} else {
					$project_assigned_cat = '';
				}

                if (get_post_meta( $post_id, 'dmvstairlifts_premium_brand_options', true )) {
                    $dmvstairlifts_brand_meta = get_post_meta( $post_id, 'dmvstairlifts_premium_brand_options', true );
                } else {
                    $dmvstairlifts_brand_meta = array();
                }

                if (array_key_exists('kurian_title', $dmvstairlifts_brand_meta)) {
                    $kurian_title = $dmvstairlifts_brand_meta['kurian_title'];
                } else {
                    $kurian_title = '';
                }

                if (array_key_exists('link_to_external_page', $dmvstairlifts_brand_meta)) {
                    $link_to_external_page = $dmvstairlifts_brand_meta['link_to_external_page'];
                } else {
                    $link_to_external_page = '';
                }

                $page_link = get_page_link( $link_to_external_page );

				$html .= '
				<div class="col-lg-3 '.esc_attr( $project_assigned_cat ).'">
					<div class="single-project-box">
						<div class="project-box-bg" style="background-image:url('.esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ).')"></div>

						<h4><a href="'.esc_url( $page_link ).'">'.esc_html(get_the_title()).'</a></h4>
						<p class="kurian-title">'.$kurian_title.'</p>
					</div>
				</div>';
			endwhile;
			wp_reset_query();
				$html .= '
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'primium_brands_project', 'dmvstairlifts_primium_brands_project_shortcode' );
// Project Premium brands shortcode end

// Project Indie brands Shortcode start
function dmvstairlifts_indie_brands_project_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'count'		=> -1,
	), $atts ));

	$categories = get_terms( 'indie_brand_cat' );
	$dynamic_number = rand(4648456, 5495656);

	$html = '';

	$html .= '
	<script>
		jQuery(document).ready(function($){
			$(".project-shortlist li").click(function(){
				$(".project-shortlist li").removeClass("active");
				$(this).addClass("active");

				var selector = $(this).attr("data-filter");
				$(".project-list-'.$dynamic_number.'").isotope({
					filter: selector,
				});
			});
		});

		jQuery(window).load(function(){
			jQuery("project-list-'.$dynamic_number.'").isotope();
		});
	</script>
	';
	$html .= '
	<div class="row">
		<div class="col">
			<ul class="project-shortlist">
				<li class="active" data-filter="*">All Brands</li>';
				if (!empty($categories && !is_wp_error( $categories ))) {
					foreach ($categories as $category) {
						$html .= '
						<li data-filter=".'.$category->slug.'">'.$category->name.'</li>
						';
					}
				}

				$html .= '
			</ul>
		</div>
		<div class="col-sm-12">
			<div class="row project-list-'.$dynamic_number.' mt-30">';

			$q = new WP_Query(array(
				'posts_per_page' => $count, 
				'post_type' => 'indie_brand'
			));

			while ($q->have_posts()) : $q->the_post();
                $post_id = get_the_ID(); 

				$project_category = get_the_terms( get_the_ID(), 'indie_brand_cat' );

				if (!empty($project_category && ! is_wp_error( $project_category ))) {
					$project_cat_list = array();

					foreach ($project_category as $category) {
						$project_cat_list[] = $category->slug;
					}
					$project_assigned_cat = join(" ", $project_cat_list);
				} else {
					$project_assigned_cat = '';
				}

                if (get_post_meta( $post_id, 'dmvstairlifts_indie_brand_options', true )) {
                    $dmvstairlifts_indie_brand_options = get_post_meta( $post_id, 'dmvstairlifts_indie_brand_options', true );
                } else {
                    $dmvstairlifts_indie_brand_options = array();
                }

                if (array_key_exists('indie_kurian_title', $dmvstairlifts_indie_brand_options)) {
                    $indie_kurian_title = $dmvstairlifts_indie_brand_options['indie_kurian_title'];
                } else {
                    $indie_kurian_title = '';
                }

                if (array_key_exists('link_to_external_page', $dmvstairlifts_indie_brand_options)) {
                    $link_to_external_page = $dmvstairlifts_indie_brand_options['link_to_external_page'];
                } else {
                    $link_to_external_page = '';
                }

                $page_link = get_page_link( $link_to_external_page );

				$html .= '
				<div class="col-lg-3 '.esc_attr( $project_assigned_cat ).'">
					<div class="single-project-box">
						<div class="project-box-bg" style="background-image:url('.esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ).')"></div>

						<h4><a href="'.esc_url( $page_link ).'">'.esc_html(get_the_title()).'</a></h4>
						<p class="kurian-title">'.$indie_kurian_title.'</p>
					</div>
				</div>';
			endwhile;
			wp_reset_query();
				$html .= '
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'indie_brands_project', 'dmvstairlifts_indie_brands_project_shortcode' );
// Project Indie brands shortcode end


// Brands categories pages banner shortcode
function dmvstairlifts_primium_brand_banner_shortcode($atts, $conten = null) {
	extract( shortcode_atts( 
		array(
			'brand_bg'	=> '',
			'title_type'	=> '1',
			'brand_bg_logo'	=> '',
			'brand_bg_title'	=> '',
			'brand_bg_k_title'	=> '',
	), $atts ));

	$brand_bg = wp_get_attachment_image_src( $brand_bg, 'large', true );
	$brand_bg_logo = wp_get_attachment_image_src( $brand_bg_logo, 'thumbnail', true );

	$html = '
	<div class="brand-bg" style="background-image: url('.esc_url( $brand_bg[0] ).')">
		<div class="right-side-content text-right">
			<span class="cat-title">'.get_the_title( $post->ID ).'</span>
			<p class="bookmark"><i class="fa fa-heart-o"></i> Bookmark</p>
		</div>
		<div class="container">
			<div class="row">
				<div class="col mu-auto text-center">
					<div class="brand-bg-content">';
					if ($title_type == 1) {
						$html .= '<img src="'.esc_url($brand_bg_logo[0]).'" alt="'.esc_attr($brand_bg_k_title).'">';
					} else {
						$html .= '<h2>'.esc_html($brand_bg_title).'</h2>';
					}
					$html .= '
						<h4>'.esc_html($brand_bg_k_title).'</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	';
	return $html;
}
add_shortcode( 'primium_brand_banner', 'dmvstairlifts_primium_brand_banner_shortcode' );

// Brand wholesale shortcode start
function dmvstairlifts_brand_wholesale_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'wsp_title'	=> 'WHOLESALE POLICY',
		'table_list_text' 	=> '',
		'table_black_text'	=> '주문신청하기',
	), $atts ));

	$html = '
	<div class="row">
		<div class="col-lg-6 offset-lg-3 text-center">
			<div class="wsale-wrap">
				<h2>'.esc_html($wsp_title).'</h2>
				<table class="table">
					<tbody>';
						$table_list_text = vc_param_group_parse_atts($atts['table_list_text']);
						foreach ($table_list_text as $table_text) {
							$html .= '
							<tr>
								<td>'.esc_html($table_text['text1']).'</td>
								<td>'.esc_html($table_text['text2']).'</td>
							</tr>';
						}
						$html .= '
						<tr class="black-bg table-dark">
							<td colspan="2">'.esc_html($table_black_text).'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	';
	return $html;
}
add_shortcode( 'brand_wholesale', 'dmvstairlifts_brand_wholesale_shortcode' );

// Brand Images shortcode start
function dmvstairlifts_brand_image_gallery_shortcode($atts) {
	extract( shortcode_atts( array(
		'gallery_class'	=> 'left',
		'images'		=> '',
		'height'		=> '',
		'size'			=> 'large',
	), $atts ));

	$image_ids = explode(',', $images);
	$image_count = count($image_ids);
	$image_no = 0;

	if (!empty($images)) {
		$html = '
		<div class="brand-image-gallery gallery-image-'.$image_count.' '.esc_attr($gallery_class).'">';
			foreach ($image_ids as $image) {
				$image_array = wp_get_attachment_image_src( $image, $size );
				$image_no++;
				$html .= '
				<div style="background-image:url('.esc_url( $image_array[0] ).');height:'.($height).'px" class="image-gallery-block gallery-block-'.$image_no.'"></div>';
			}
			$html .= '
		</div>';
	} else {
		$html = '';
	}

	return $html;
}
add_shortcode( 'brand_images', 'dmvstairlifts_brand_image_gallery_shortcode' );



