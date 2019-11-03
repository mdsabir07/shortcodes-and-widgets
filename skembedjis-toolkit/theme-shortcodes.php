<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }


// Slider shortcode start 
function skembedjis_slider_shortcode($atts, $content = null) {
	extract(shortcode_atts( array(
		'bg_img'			=> '',
		'text_col'			=> '7',
		'title'				=> '',
		'sub_title'			=> '',
		'button_text_l'     => 'Contact us',
        'link_type1'        => '1',
        'link_to_page1'     => '',
        'link_to_external1' => '',
        'btn_bg_color1'     => '#FCC61D',
        'btn_text_color1'   => '#fff',
        'button_text_2'     => 'Call me back!',
        'link_type2'        => '1',
        'link_to_page2'     => '',
        'link_to_external2' => '',
        'btn_bg_color2'     => '#363636',
        'btn_text_color2'   => '#fff',
        'slider_col'		=> '5',
        'count'         	=> 3,
        'loop'          	=> esc_html__( 'true', 'skembedjis' ),
        'dots'          	=> esc_html__( 'true', 'skembedjis' ),
        'nav'           	=> esc_html__( 'true', 'skembedjis' ),
        'autoplay'      	=> esc_html__( 'true', 'skembedjis' ),
        'autoplayTimeout'	=> 5000,
	), $atts ));

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

    $slider_bg_img = wp_get_attachment_image_src( $bg_img, 'large', true );

	$html = '';

	$html .= '
	<div class="slider-bg" style="background-image: url('.$slider_bg_img[0].');">
		<div class="container">
			<div class="row">
				<div class="col-lg-'.$text_col.'">
					<div class="slider-content">
						<h2>'.$title.'</h2>
						<h5>'.$sub_title.'</h5>

						<div class="slider-buttons">
							<a href="'.$link_markup1.'" class="boxed-btn btn-1" style="background-color:'.$btn_bg_color1.';color:'.$btn_text_color1.'">'.$button_text_l.'</a>
							<a href="'.$link_markup2.'" class="boxed-btn btn-2" style="background-color:'.$btn_bg_color2.';color:'.$btn_text_color2.'">'.$button_text_2.'</a>
						</div>
					</div>
				</div>

				<div class="col-lg-'.$slider_col.' absolute-position">';
					$q = new WP_Query( array('posts_per_page'=> $count,'post_type'=> 'slide') );

					$html .= '
			        <script>
			            jQuery(document).ready(function($){
                            $(document).ready(function(){
                                $(".skembedjis-slides").slick({
                                    infinite: true,
                                    arrows: false,
                                    fade: true,
                                    autoplay: true,
                                    autoplaySpeed: 2000,
                                    speed: 3000,
                                    pauseOnHover: false,  
                                });
                            });
			            });
			        </script>

					<div class="skembedjis-slides">';
						while($q->have_posts()) : $q->the_post();
							$post_id = get_the_ID();
							$html .= '
							<div class="single-slide-item">
								<img src="'.get_the_post_thumbnail_url( $post_id, 'full' ).'" alt="Slider Image">
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
add_shortcode( 'skembedjis_slide', 'skembedjis_slider_shortcode' );
// Slider shortcode end


// Blog Post shortcode 
function skembedjis_posts_shortcode($atts) {
    extract( shortcode_atts( array(
        'columns'       => 1,
        'count'         => 2,
        'category_id'   => '',
        'date'          => 1,
        'img_height'    => 220,
        'content'       => 2,
        'post_btn'      => 1,
        'btn_text'      => 'read more',
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
        $post_excerpt = get_the_excerpt();


        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).');height: '.esc_attr( $img_height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        $post_markup .= '
            <div class="'.esc_attr($column_markup).'">
                <div class="skembedjis-single-post-block">

                    <a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>';

                    $post_markup .= '
                    <div class="post-block-content">';
                    if ($date == 1) {
                        $post_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';                    
                    }

                    $post_markup .= '
                    <h2><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h2>';

                    if ($content == 1) {
                        $post_markup .= '<div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>';
                    }

                    if ($post_btn == 1) {
                        $post_markup .= '
                        <a class="post-btn filled-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html($btn_text).' <i class="fa fa-long-arrow-right"></i></a>';
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
add_shortcode( 'skembedjis_posts', 'skembedjis_posts_shortcode' );
// End blog post shortcode


// Follow us shortcode start 
function skembedjis_follow_socias_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'image' => '',
        'icon'  => '',
        'link'  => '',
    ), $atts ));

    $follow_us_img = wp_get_attachment_image_src( $image, 'thumbnail', true );

    $html .= '
    <div class="skembedjis-follow-us">
        <div class="follow-us-img" style="background-image:url('.$follow_us_img[0].')">
            <a class="follow-us-icon" target="_blank" href="'.$link.'"><i class="'.$icon.'"></i></a>
        </div>
    </div>
    ';
    return $html;
}
add_shortcode('follow_socials', 'skembedjis_follow_socias_shortcode');
// Follow us shortcode end 


// Product slide shortcode start
function skembedjis_product_slide_shortcode( $atts ) {
    extract( shortcode_atts( 
        array(
            'bg_image'      => '',
            'loop'          => esc_html__( 'true', 'skembedjis' ),
            'dots'          => esc_html__( 'true', 'skembedjis' ),
            'nav'           => esc_html__( 'true', 'skembedjis' ),
            'autoplay'      => esc_html__( 'true', 'skembedjis' ),
            'autoplayTimeout'=> 5000,
    ), $atts ));

    $product_bg_img = wp_get_attachment_image_src( $bg_image, 'large', true );

    $html = '<div class="product-slide-bg" style="background-image: url('.$product_bg_img[0].')">
    	<div class="container">
    ';

    $q = new WP_Query( 
    	array(
    		'posts_per_page' => $count, 
    		'post_type' => 'product', 
    		'orderby' => 'menu_order', 
    		'order' => 'ASC'
    	) 
    );

    $html .= '
    <script>
        jQuery(document).ready(function($){
            $(document).ready(function(){
                $(".product-slide-carousel").slick({
                    infinite: true,
                    nextArrow: "<i class=\'fa fa-angle-right\'></i>",
                    prevArrow: "<i class=\'fa fa-angle-left\'></i>",
                    autoplay: true,
                    slidesToShow: 6,
                    slidesToScroll: 2,
                    autoplaySpeed: 2000,
                    speed: 3000,  
                });
            });
        });
    </script>
    
    <div class="product-slide-carousel">
    ';
    while ($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $title   = get_the_title($post_id);
        
        $html .= '
        <div class="single-product-slide text-center">
        	<div class="product-img" style="background-image: url('.get_the_post_thumbnail_url( $post_id, 'medium' ).')">
        	</div>
            <div class="product-slide-title">
                <h3><a href="'.get_the_permalink( $post_id ).'">'.$title.'</a></h3>
            </div>
        </div>
        ';
    endwhile;
    $html .= '</div>';
    wp_reset_query();
    $html .= '</div></div>';
    return $html;
}
add_shortcode( 'products_slide', 'skembedjis_product_slide_shortcode' );
// Product slide shortcode end

// product carousel shortcode
function skembedjis_product_carousel_shortcodes($atts) {
    extract( shortcode_atts( array(
        'cat_id'            => '',
        'height'            => '300',
        'loop'              => 'true',
        'nav'               => 'true',
        'dots'              => 'true',
        'autoplay'          => 'false',
        'autoplaytimeout'   => 5000,
    ), $atts ));

    if ($cat_id == true) {
        $q = new WP_Query( array(
            'posts_per_page' => $count, 
            'post_type' => 'product', 
            'cat' => $cat_id, 
            'order' => 'DESC',
        ));
    } else {
        $q = new WP_Query(array(
            'posts_per_page' => $count, 
            'post_type' => 'product', 
            'order' => 'DESC',
        ));
    }
    
    $list = '
    <script>
        jQuery(document).ready(function($){
            $(document).ready(function(){
                $(".skembedjis-pruduct-carousel").slick({
                    infinite: true,
                    nextArrow: "<i class=\'fa fa-angle-right\'></i>",
                    prevArrow: "<i class=\'fa fa-angle-left\'></i>",
                    autoplay: false,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    autoplaySpeed: 2000,
                    speed: 3000,  
                });
            });
        });
    </script>';

    $list .= '<div class="skembedjis-pruduct-carousel">';

    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $post_content = get_the_content();

        $list .= '
        <div class="single-product-item">
            <div class="single-product-item-inner">
                <div class="product-bg" style="background-image: url('.get_the_post_thumbnail_url( $post_id, 'medium' ).');height: '.$height.'px">
                </div>
                <div class="product-detail">
                    <h4><a href="'.get_the_permalink( $post_id ).'">'.get_the_title().'</a></h4>
                    <a href="'.get_the_permalink( $post_id ).'" class="readmore-btn">More Info <i class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        ';
    endwhile;
    $list .= '</div>';

    wp_reset_query();
    return $list;
}
add_shortcode( 'skembedjis_product_carousel', 'skembedjis_product_carousel_shortcodes' );


// Section title shortcode 
function skembedjis_section_title_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'style'     => 1,
        'title'     => '',
        'desc_option'=> 1,
        'desc'      => '',
        'text_align'=> 'center'
    ), $atts ));

    $section_title_markup = '
        <div class="skembedjis-section-title theme-'.esc_attr( $style ).' text-'.esc_attr( $text_align ).'">
            <h2>'.esc_html($title).'</h2>';

            if ($desc_option == 1 && !empty($desc)) {
                $section_title_markup .= ''.wpautop( $desc ).'';
            }
    $section_title_markup .= '</div>';

    return $section_title_markup;

}
add_shortcode( 'skembedjis_section_title', 'skembedjis_section_title_shortcode' );
// End section title shortcode

// Iconic button shortcode 
function skembedjis_iconic_btn_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'btn_style'         =>  'boxed-btn',
        'button_text'       =>  'Know more',
        'link_type'         =>  '1',
        'link_to_page'      =>  '',
        'link_to_external'  =>  '',
        'icon'              =>  '',
        'btn_color'         =>  '#44a6f0',
        'btn_bg'            =>  '',
        'm_top'             =>  '20',
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

    $skembedjis_iconic_btn_markup = '
       <a style="color:'.esc_attr($btn_color).';background-color:'.$btn_bg.';margin-top:'.$m_top.'px;" class="skembedjis-iconic-btn '.esc_attr($btn_style).'" href="'.esc_url( $link_markup ).'">'.esc_html($button_text).' '.$buton_icon.'</a>
    ';

    return $skembedjis_iconic_btn_markup;
}
add_shortcode( 'skembedjis_iconic_btn', 'skembedjis_iconic_btn_shortcode' );
// End iconicbutton shortcode

// Product category list 
function skembedjis_product_cat_list_shortcode($atts) {
	extract(shortcode_atts( array(
		'title'	=> 'Categories',
	), $atts ));

	$terms = get_terms( 'product_cat' );

	echo '<div class="product-cat-list-wrap">
	<a class="btn btn-inline" data-toggle="collapse" href="#collapseCatlist" role="button" aria-expanded="false" aria-controls="collapseCatlist">
	'.$title.' <i class="fa fa-caret-down"></i></a>
	<ul class="collapse" id="collapseCatlist">';
	foreach ( $terms as $term )  { 
	    echo '<li><a href="'.get_category_link( $term->term_id ).'">' . $term->name . '</a></li>';
	}
	echo '</ul></div>';

}
add_shortcode('product_cat_lists', 'skembedjis_product_cat_list_shortcode');


function skembedjis_pct_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'cat_ids' => '',
        'columns' => '4',
    ), $atts ));

    if ($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    }elseif ($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif ($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif ($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif ($columns == 1) {
        $column_markup = 'col';
    }

    $cat_array = explode(',', $cat_ids);

    if (!empty($cat_array)) {
        $list = '<div class="row no-gutters">';
        foreach ($cat_array as $cat_id) {

            $cat_info = get_term($cat_id, 'product_cat');

            if (!$cat_info || is_wp_error($cat_info)) {
                continue;
            }

            $link = get_term_link($cat_info);

            $thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true ); 
            $image = wp_get_attachment_url( $thumbnail_id ); 

            $list .= '
                <div class="'.esc_attr($column_markup).' text-center">
                    <a href="'.esc_url($link).'" class="single-wns-cat-item" style="background-image:url('.$image.')"></a>
                    <div class="cat-title-wrapper">
                        <h6><a href="'.esc_url($link).'">'.esc_html($cat_info->name).'</a></h6>
                    </div>
                </div>
            ';
        }

        $list .= '</div>';
    } else {
        $list = '';
    }


    return $list;
}
add_shortcode( 'skembedjis_pct', 'skembedjis_pct_shortcode' );