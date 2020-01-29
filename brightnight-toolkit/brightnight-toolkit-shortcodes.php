<?php 

/*===== Start Section title shortcode =====*/ 

function brightnight_section_title_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 

		array(
			'title'		=> '',
			'sub_title'	=> '',
			'desc'		=> ''
		), $atts ));

	$section_title_markup = '<div class="optimistic-section-title">';

	if ( !empty($title) ) {
		$section_title_markup .= '<h1>'.esc_html($title).'</h1>';
	}

	if ( !empty($sub_title) ) {
		$section_title_markup .= '<h4>'.esc_html($sub_title).'</h4>';
	}

	if ( !empty($desc) ) {
		$section_title_markup .= ''.wpautop(esc_html($desc)).'';
	}
	$section_title_markup .= '</div>';

	return $section_title_markup;
}
add_shortcode( 'section_title', 'brightnight_section_title_shortcode' );
//End Section title shortcode

/*===== Start Slides shortcode =====*/
add_filter('dvkss_display', '__return_true');
function brightnight_slides_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'count'		=> '',
			'height'	=> '350',
	        'loop'      => 'true',
	        'dots'      => 'true',
	        'nav'       => 'true',
	        'autoplay'  => 'true',
	        'autoplayTimeout'=> 5000
		), $atts ));
	$q = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'slide'));
	$slides_rand_number = rand(6876545, 4425262);
	$slides_markup = '
	<script>
		jQuery(document).ready(function(){
	        jQuery("#rand-slides-'.$slides_rand_number.'").owlCarousel({
	            items: 1,
	            loop: '.$loop.',
	            dots: '.$dots.',
	            nav: '.$nav.',
	            navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
	            autoplay: '.$autoplay.',
	            autoplayTimeout: '.$autoplayTimeout.'
	        });
		});
	</script>
	<div id="rand-slides-'.$slides_rand_number.'" class="brightnight-home2-slides owl-carousel">';

	while ( $q->have_posts() ) : $q->the_post();
	    $post_id = get_the_ID();
	    $content = get_the_content();

		if ( get_post_meta( $post_id, 'brightnight_slide_options', true ) ) {
	        $slide_meta = get_post_meta( $post_id, 'brightnight_slide_options', true );
	    } else {
	        $slide_meta = array();
	    }

	    if ( array_key_exists( 'text_color', $slide_meta ) ) {
	        $text_color = $slide_meta['text_color'];
	    } else {
	        $text_color = '#333';
	    }

	    if ( array_key_exists('enable_overlay', $slide_meta) ) {
	        $enable_overlay = $slide_meta['enable_overlay'];
	    } else {
	        $enable_overlay = false;
	    }

	    if ( array_key_exists('overlay_color', $slide_meta) ) {
	        $overlay_color = $slide_meta['overlay_color'];
	    } else {
	        $overlay_color = '#333';
	    }

	    if ( array_key_exists('overlay_opacity', $slide_meta) ) {
	        $overlay_opacity = $slide_meta['overlay_opacity'];
	    } else {
	        $overlay_opacity = 70;
	    }

		$slides_markup .= '
		<div style="background-image:url('.get_the_post_thumbnail_url($post_id, 'large').')" class="home2-single-slide-item">';

		    if ($enable_overlay == true) {
            $slides_markup .= '<div style="opacity:.'.$overlay_opacity.';background-color:'.$overlay_color.'" class="optimistic-slide-overlay"></div>';
        	}

        	$slides_markup .= '
			<div class="container">
				<div class="row">
					<div style="color:'.$text_color.'" class="col-lg-6 offset-lg-6">
						<div class="home2-slide-content">
							<h1>'.get_the_title( $post_id ).'</h1>
							'.wpautop( get_the_content( $content ) ).'';

	                        if ( !empty($slide_meta['buttons']) ) {
	                            $slides_markup .= '<div class="brightnight-btn">';

	                            foreach ($slide_meta['buttons'] as $button) {
	                                if ($button['link_type'] == 1) {
	                                    $button_link = get_page_link( $button['link_to_page'] );
	                                } else {
	                                    $button_link = $button['link_to_external'];
	                                }
	                                $slides_markup .= '<a href="'.esc_url( $button_link ).'" class="'.esc_attr( $button['type'] ).'-btn brightnight-slide-btn">'.esc_html( $button['text'] ).'</a>';
	                            }
	                            $slides_markup .= '</div>';
	                        }
           				$slides_markup .= '
						</div>
					</div>
				</div>
			</div>
		</div>
		';
	endwhile;
	$slides_markup .= '</div>';
	wp_reset_query();
	return $slides_markup;
}
add_shortcode( 'brightnight_slides', 'brightnight_slides_shortcode' );
// End slides shortcode

/*===== Start home6 slider shortcode =====*/
function brightnight_home6_slides_shortcode( $atts, $content = null  ) {
    extract( shortcode_atts( array(
        'count'			=> '2',
        'height'		=> '530',	
        'loop' 			=> 'true',
        'dots' 			=> 'true',
        'nav' 			=> 'true',
        'autoplay' 		=> 'true',
        'autoplayTimeout' => 5000,
    ), $atts ) );

    $q = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'img-slide'));

    $img_slides = rand(4652545, 8998455);

    $home6_slides_markup ='
	<script>
		jQuery(document).ready(function($){
			$(".image-slides-'.$img_slides.'").owlCarousel({
				items: 2,
                loop: '.$loop.',
                dots: '.$dots.',
                nav: '.$nav.',
                navText: ["<i class=\'fa fa-long-arrow-left\'></i>", "<i class=\'fa fa-long-arrow-right\'></i>"],
                autoplay: '.$autoplay.',
                autoplayTimeout: '.$autoplayTimeout.'
			});
		});
	</script>
    <div class="image-slides-'.$img_slides.' image-slide-wrap owl-carousel">';

    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $content = get_the_content();

        if(has_post_thumbnail()){
            $img_slides_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url( get_the_ID(), 'large' )).');height:'.$height.'px"';
        } else {
            $img_slides_markup = '';
        }

        $home6_slides_markup .='
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
	                <div class="single-slide-box">
	                	<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$img_slides_markup.'></a>
						<div class="img-slide-content">
                    		<h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>
							<span class="post-date product-type">'.wpautop( do_shortcode( $content )).'</span>
	                	</div>
	                </div>
                </div>
            </div>
        </div>';
    endwhile;
        $home6_slides_markup .='</div>';
    wp_reset_query();
    return $home6_slides_markup;
}   
add_shortcode('img_slides', 'brightnight_home6_slides_shortcode');
// End home6 slider shortcode

/*===== Start product page slider shortcode =====*/
function brightnight_product_slides_shortcode( $atts, $content = null  ) {
    extract( shortcode_atts( array(
        'count'			=> '2',
        'height'		=> '565',	
        'loop' 			=> 'true',
        'dots' 			=> 'true',
        'nav' 			=> 'true',
        'autoplay' 		=> 'true',
        'autoplayTimeout' => 5000,
    ), $atts ) );

    $q = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'product-slide'));

    $product_slides = rand(5674567, 3234645);
    $product_slides_markup ='
	<script>
		jQuery(document).ready(function($){
			$(".product-slides-'.$product_slides.'").owlCarousel({
				items: 1,
                loop: '.$loop.',
                dots: '.$dots.',
                nav: '.$nav.',
                navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
                autoplay: '.$autoplay.',
                autoplayTimeout: '.$autoplayTimeout.'
			});
		});
	</script>
    <div class="product-slides-'.$product_slides.' product-slide-wrap owl-carousel">';

    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();

        if(has_post_thumbnail()){
            $img_slides_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url( get_the_ID(), 'large' )).');height:'.$height.'px"';
        } else {
            $img_slides_markup = '';
        }

        $product_slides_markup .='
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
	                <div class="single-product-slide">
	                	<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$img_slides_markup.'></a>
	                </div>
                </div>
            </div>
        </div>';
    endwhile;
        $product_slides_markup .='</div>';
    wp_reset_query();
    return $product_slides_markup;
}   
add_shortcode('product_slides', 'brightnight_product_slides_shortcode');
// End product page slider shortcode

/*===== Start Social shortcode =====*/
function brightnight_home4_social_shortcode($atts) {
	$social_icons = cs_get_option('social_icons');

	if ( !empty($social_icons) ) {
		$social_markup = '<div class="brightnight-social-icons">';
		foreach ($social_icons as $icon) {
			$social_markup .= '<a target="'.esc_url( $icon['link_target'] ).'" href="'.esc_url( $icon['link'] ).'"><i class="'.esc_attr( $icon['icon'] ).'"></i></a>';
		}
		$social_markup .= '</div>';
	} else {
		$social_markup = '';
	}
	return $social_markup;
}
add_shortcode( 'socials', 'brightnight_home4_social_shortcode' );
// End social shortcode

/*===== Start Magnific popup shortcode =====*/ 
function brightnight_popup_video_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'link_text'		=> 'Play this interior',
			'link_url'		=> '',
	), $atts ));
	$popup_video_markup = '
	<div class="brightnight-video">
		<a class="brightnight-popup-video" href="'.esc_url( $link_url ).'"><span><i class="fa fa-play"></i></span>'.esc_html( $link_text ).'</a>
	</div>
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
	';
	return $popup_video_markup;
}
add_shortcode( 'popup_video', 'brightnight_popup_video_shortcode' );
// End magnific popup shortcode

/*===== Start like comment shortcode =====*/
function brightnight_like_comment_shortcode( $atts, $content = null ) {
	$post_meta = cs_get_option('like_comment_info');

	if ( !empty($post_meta) ) {
		$like_comment_markup = '<div class="brightnight_like_comment">';

		foreach ($post_meta as $meta) {
			$like_comment_markup .= '
			<span>
				<i class="'.esc_html( $meta['icon'] ).'"></i>
				'.esc_html( $meta['text'] ).'
			</span>';
		}
		$like_comment_markup .= '</div>';
	} else {
		$like_comment_markup = '';
	}
	return $like_comment_markup;
}
add_shortcode( 'like_comment', 'brightnight_like_comment_shortcode' );
// End like comment shortcode

/*===== Start home 4 static post shortcode =====*/ 
function brightnight_post_shortcode( $atts, $content = null) {
    extract( shortcode_atts( 
        array(
            'photo'         => '',
            'product_type'  => '',
            'desc'          => '',
    ), $atts ));
    $img_array = wp_get_attachment_image_src( $photo, 'large' );
    $home4_post_markup = '
    <div class="home4-single-post-box">
        <img src="'.esc_url( $img_array[0] ).'">
        <div class="home4-post-content">
	        '.do_shortcode($content).'
	        <span>'.esc_html( $product_type ).'</span>
	        '.wpautop( esc_html( $desc ) ).'
        </div>
    </div>
    ';
    return $home4_post_markup;
}
add_shortcode( 'home4_post', 'brightnight_post_shortcode' );
// End home 4 static post shortcode

/*===== Start home 3 work area shortcode =====*/
add_filter( 'category_description', 'do_shortcode');
function brightnight_home3_post_shortcode($atts){
    extract( shortcode_atts( array(
        'columns'   => '3',
        'count'     => '2',
        'date'      => '1',
        'author'    => '2',
        'style'     => '1',
        'button'    => '1',
        'btn_text'  => '',
        'category'  => '',
    ), $atts) );

    $q = array(
        'category_name' => 'work',
    	'posts_per_page'=> $count, 
    	'post_type'     => 'post',
    );

    $post_query = new WP_Query( $q );

    $post_count = $post_query->post_count;
    $found_posts = $post_query->found_posts;
    $total_page = $found_posts / $post_count;

    if($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    } 

    $post_markup ='<div class="row more-posts">';
    while($post_query->have_posts()) : $post_query->the_post();
        $post_id = get_the_ID();
        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).')"';
        } else {
            $posts_img_markup = '';
        }

        if (get_post_meta( $post_id, 'brightnight_post_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_post_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('product_type', $post_meta)) {
            $product_type = $post_meta['product_type'];
        } else {
            $product_type = '';
        }

        $post_excerpt = get_the_excerpt();
        $post_markup .= '
        <div class="'.esc_attr($column_markup).'">
            <div class="brightnight-single-post-block home3">';
                $post_markup .= '<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>';
                if($style == 1) {
                    $post_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';
                } else {
                    $post_markup .= '<span class="post-date">'.esc_html( $product_type ).'</span>';
                }

            	$post_markup .= '
                <div class="post-block-content">
                <h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>';

                if ($button == 1) {
                    $post_markup .='<a class="post-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html( $btn_text ).'</a>';
                } else {
                     $post_markup .= '';
                }

                $post_markup .= '
                </div>    
            </div>
        </div>    
        ';
    endwhile;
    $post_markup.= '</div>
    <script>
		var page = 2;
	    jQuery(document).ready(function($) {
	        $(".show-more-post").on(\'click\', function() {
	            $.ajax({
	                type: \'POST\',
	                url: "'.esc_url(site_url()).'/wp-admin/admin-ajax.php",
	                dataType: \'html\',
	                data: {
	                    action: \'post_load_function\',
	                    nonce: $(this).data(\'nonce\'),
	                    count: $(this).attr("data-count"),
	                    columns: $(this).attr("data-column"),
	                    columns_markup: $(this).attr("data-column-markup"),
	                    page: page,
	                },
	                beforeSend: function(data) {
	                    $("#load-more-message").append("Wait Please ...");
	                    $(".show-more-post").hide();
	                },
	                success: function(data, result){
	                    if( result != \'error\' ) {
	                        $(".more-posts").append(data);
	                        $("#load-more-message").empty();
	                        $(".show-more-post").show();
	                        page++;
	                        if(page > Math.ceil('.$total_page.')) {
	                            $(".show-more-post").hide();
	                        }
	                    } else {
	                    	$(".show-more-post").hide();
	                    }
	                }
	            }); 
	            return false;
	        });
	    });
	</script>

	<div id="load-more-message"></div>
        <a data-nonce="'.wp_create_nonce('post_load_function_nonce').'" data-count="'.$count.'" data-column="'.esc_attr( $columns ).'" data-column-markup="'.esc_attr( $column_markup ).'"  href="" class="show-more-post">Load more</a>
    ';
    wp_reset_query();
    return $post_markup;
}
add_shortcode('brightnight_home3_posts', 'brightnight_home3_post_shortcode');

// Load More Post
add_action('wp_ajax_nopriv_post_load_function', 'post_load_function_callback');
add_action('wp_ajax_post_load_function', 'post_load_function_callback');

function post_load_function_callback() {
    $permission = check_ajax_referer( 'post_load_function_nonce', 'nonce', false );
    $paged = $_POST['page'];

    if( $permission == false ) {
        echo 'error';
        $project_list = '
            <div class="light-ajax-error-content">
                <i class="fa fa-warning"></i>
                <h3>'.esc_html__('I don\'t know what happened, but there is an error!', 'project-toolkit').'</h3>
            </div>
        ';        
    } else {
    $post_count   = (isset($_POST['count'])) ? $_POST['count'] : 0;
    $columns      = (isset($_POST['columns'])) ? $_POST['columns'] : 0;
    $column_markup= (isset($_POST['column_markup'])) ? $_POST['column_markup'] : 0;

    $settings = array(
        'showposts' => $post_count, 
        'post_type' => 'post',
        'category_name' => 'work',
        'paged' => $paged,
    );
    $light_projects_query = new WP_Query($settings);
    $post_no = 0;
    while($light_projects_query->have_posts()) : $light_projects_query->the_post();
        $post_id = get_the_ID();
        $post_no++;

        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).')"';
        } else {
            $posts_img_markup = '';
        }

        if (get_post_meta( $post_id, 'brightnight_post_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_post_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('product_type', $post_meta)) {
            $product_type = $post_meta['product_type'];
        } else {
            $product_type = '';
        }

        $post_excerpt = get_the_excerpt();

    	if($columns == 1) {
	        $column_markup = 'col-lg-12';
	    } elseif($columns == 2) {
	        $column_markup = 'col-lg-6 col-sm-6';
	    } elseif($columns == 3) {
	        $column_markup = 'col-lg-4 col-sm-6';
	    } elseif($columns == 4) {
	        $column_markup = 'col-lg-3 col-sm-6';
	    } elseif($columns == 6) {
	        $column_markup = 'col-lg-2 col-sm-6';
	    }

        $project_list .='
        <div class="'.esc_attr($column_markup).'">
            <div class="brightnight-single-post-block home3">';
                $project_list .= '<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>';
                if($style == 1) {
                    $project_list .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';
                } else {
                    $project_list .= '<span class="post-date">'.esc_html( $product_type ).'</span>';
                }

                $project_list .= '
                <div class="post-block-content">
                <h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>';

                if ($button == 1) {
                    $project_list .='<a class="post-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html( $btn_text ).'</a>';
                } else {
                     $project_list .= '';
                }
                $project_list .= '
                </div>    
            </div>
        </div>
        ';
    endwhile;
    wp_reset_postdata(); 
    }
    wp_die($project_list);
}
// End home 3 work area shortcode


/*===== Start post box shortcode =====*/
function brightnight_post_box_shortcode($atts){
    extract( shortcode_atts( array(
    	'height'	=> '350',
        'columns'   => '3',
        'count'     => 9,
        'post_cats' => '',
        'meta_type' => '1',
        'date'      => '1',
        'author'    => '2',
        'expand'    => '',
        'style'     =>  '1',
        'button'    =>  '1',
        'btn_text'  =>  '',
        'paginate'  =>  '1',
        'category'  =>  '',
    ), $atts) );

    global $paged;
    if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
    } else if ( get_query_var('page') ) {
    $paged = get_query_var('page');
    } else {
    $paged = 1;
    }

    $q = array(
    	'showposts'     => $count,
    	'posts_per_page'=> $count, 
        'post_type'     => 'post',
    	'cat'        	=> array($post_cats),
        'order'         => 'DESC', 
        'paged'         => $paged,
    );

    $post_query = new WP_Query( $q );

    $total_found_posts = $post_query->found_posts;
    $total_page = ceil($total_found_posts / $count);

    if($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    } 

    $post_markup ='
    <div class="row more-posts">';
    while($post_query->have_posts()) : $post_query->the_post();
        $post_id = get_the_ID();
        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).');height:'.esc_html( $height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        if (get_post_meta( $post_id, 'brightnight_post_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_post_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('product_type', $post_meta)) {
            $product_type = $post_meta['product_type'];
        } else {
            $product_type = '';
        }

        $post_excerpt = get_the_excerpt();

        $post_markup .= '
            <div class="'.esc_attr($column_markup).'">
                <div class="brightnight-single-post-block home2">';
                    $post_markup .= '<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>';

                    if($style == 1) {
                        $post_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';
                    } else {
                        $post_markup .= '<span class="post-date product-type">'.esc_html( $product_type ).'</span>';
                    }

                	$post_markup .= '<div class="post-block-content">
                    <h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>';                
                    $post_markup .= '<div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>';
                    
                    if ($button == 1) {
                        $post_markup .='<a class="post-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html( $btn_text ).'</a>';
                    } else {
                        $post_markup .= '';
                    }

                    $post_markup .= '
                    </div>    
                </div>
            </div>    
        ';
    endwhile;
    $post_markup.= '</div>';
    if ($paginate == 1) {

        if(function_exists('wp_pagenavi')) {
        $post_markup .='<div class="page-navigation">'.wp_pagenavi(array('query' => $post_query, 'echo' => false)).'</div>'; //This come form Wp Pagenavi plugins
        } else {
            $post_markup.='
            <span class="prev-posts-links">'.get_previous_posts_link('<< Previous ').'</span>
            <span class="next-posts-links">'.get_next_posts_link(' Next >>', $total_page).'</span>
            ';
        }
    }
    wp_reset_query();       
    return $post_markup;
}
add_shortcode('brightnight_post_box', 'brightnight_post_box_shortcode');
// End post shortcode

/*===== Start gmap shortcode =====*/ 
function brightnight_gmap_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 
		array(
			'height'	=> '600'
		), $atts ));
	$brightnight_gmap = '
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf27_uWLsbjIlHKL45ZMG9vvWIPkMUbUE&region=US"></script>
	<div class="map" style="height:'.$height.'px;width:100%"></div>

	<script>
		jQuery(document).ready(function($){
			$(".map")
			.gmap3({
				center:[40.7905291, -74.0559084],
				zoom:11,
				mapTypeId: "shadeOfGrey",
				mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
				}
			})
			.styledmaptype(
				"shadeOfGrey",[
					{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#858585"},{"lightness":40}]},
					{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#F9F9F9"},{"lightness":16}]},
					{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
					{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#E5E5E5"},{"lightness":20}]},
					{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#E5E5E5"},{"lightness":17},{"weight":1.2}]},
					{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f3f3f3"},{"lightness":20}]},
					{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#F7F7F7"},{"lightness":21}]},
					{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#E3E3E3"},{"lightness":17}]},
					{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#FFFFFF"},{"lightness":29},{"weight":0.2}]},
					{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#FFFFFF"},{"lightness":18}]},
					{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#FFFFFF"},{"lightness":16}]},
					{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f3f3f3"},{"lightness":19}]},
					{"featureType":"water","elementType":"geometry","stylers":[{"color":"f3f3f3"},{"lightness":17}]}
					],
				{name: "Shades of Grey"}
			);
		});
	</script>';
	return $brightnight_gmap;
}
add_shortcode( 'gmap', 'brightnight_gmap_shortcode' );
// End gmap shortcode

/*===== Start contact details shortcode =====*/ 
function brightnight_contact_details_shortcode( $atts, $content = null ) {
	$title = cs_get_option('title');
	$contact_info = cs_get_option('contact_info');

	$contact_details_markup = '
	<div class="contact-details-box">
		<h1>'.esc_html( $title ).'</h1>';

		if ( !empty($contact_info) ) {
			$contact_details_markup .='
			<div class="contact-details-info">';
			foreach ($contact_info as $info) {
				$contact_details_markup .='<div class="info-text">
				<h3>'.esc_html( $info['sub_title'] ).'</h3>
				'.wpautop( esc_html( $info['desc'] ) ).'
				</div>';
			}
			$contact_details_markup .= '</div>';
		} else {
			$contact_details_markup = '';
		}
	$contact_details_markup .= '</div>';
	return $contact_details_markup;
}
add_shortcode( 'contact_details', 'brightnight_contact_details_shortcode' );
// End contact details shortcode

/*===== Start Contact page contact details shortcode =====*/ 
function brightnight_contact_page_contact_details_shortcode( $atts, $content = null ) {
	$title = cs_get_option('contact_page_title');
	$contact_page_contact_info = cs_get_option('contact_page_contact_info');

	$contact_details_markup = '
	<div class="contact-details-box contact-page2">
		<h2>'.esc_html( $title ).'</h2>';

		if ( !empty($contact_page_contact_info) ) {
			$contact_details_markup .='
			<div class="contact-details-info contact-page2">';

			foreach ($contact_page_contact_info as $info) {
				$contact_details_markup .='<div class="info-text">
				<h3>'.esc_html( $info['sub_title'] ).'</h3>
				'.wpautop( esc_html( $info['desc'] ) ).'
				</div>';
			}
			$contact_details_markup .= '</div>';
		} else {
			$contact_details_markup = '';
		}
	$contact_details_markup .= '</div>';
	return $contact_details_markup;
}
add_shortcode( 'contact_page_contact_details', 'brightnight_contact_page_contact_details_shortcode' );
// End contact page contact details shortcode

/*===== Start Buttons shortcode =====*/ 
function brightnight_btn_shortcode( $atts ) {
	extract( shortcode_atts( 
		array(
			'type'				=> '1',
			'link_to_page'		=> '',
			'link_to_external'	=> '',
			'link_text'			=> 'Read more about us',
	), $atts ));

	if ($type == 1) {
		$link_source = get_page_link( $link_to_page );
	} else {
		$link_source = $link_to_external;
	}

	$brightnight_btn_markup = '
		<div class="brightnight-btn">
			<a href="'.esc_url( $link_source ).'" class="bordered-btn filled-btn">'.esc_html( $link_text ).'</a>
		</div>
	';
	return $brightnight_btn_markup;
}
add_shortcode( 'brightnight_btn', 'brightnight_btn_shortcode' );
// End buttons shortcode

/*===== Start tile gallery shortcode =====*/
function brightnight_tile_gallery_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'images' => '',
			'height' => '310',
			'size'	 => 'large',
	), $atts ));

	$images_ids = explode(',', $images);
	$image_count	= count($images_ids);
	$image_no = 0;

	if (!empty($images)) {
		$tile_gallery = '
		<div class="brightnight-tile-gallery brightnight-tile-gallery-image-'.$image_count.'">';
		foreach ($images_ids as $image) {
			$image_array = wp_get_attachment_image_src( $image, $size );
			$image_no++;
			$tile_gallery .= '
			<div style="background-image:url('.esc_url( $image_array[0] ).');height:'.($height).'px" class="tile-gallery-block tile-gallery-block-'.$image_no.'"></div>';
		}
		$tile_gallery .='
		</div>
		';	
	} else {
		$tile_gallery = '';
	}
	return $tile_gallery;
}
add_shortcode( 'tile_gallery', 'brightnight_tile_gallery_shortcode' );
// End tile gallery shortcode

/*===== Start full width section shortcode =====*/
function brightnight_fullwidth_section_shortcode( $atts, $content = null  ) {
    extract( shortcode_atts( array(
        'image' 		=> '',
        'size'  		=> 'large',
        'fd_title'  	=> '',
        'col_count' 	=> '',
        'content_align' => 'end',
    ), $atts ) );

    $image_array = wp_get_attachment_image_src( $image, $size);
    $full_width_markup = '
    <div class="full-width-section">
        <div class="full-width-bg hero-area" style="background-image:url('.esc_url( $image_array[0] ).')"></div>
        <div class="container">
            <div class="row justify-content-'.$content_align.'">
                <div class="col-lg-'.$col_count.'">
                	<div class="fullwidth-section-content">
                    	'.do_shortcode($content).'
                	</div>
                </div>
            </div>
        </div>
    </div>
    ';
    return $full_width_markup;
}   
add_shortcode('fullwidth_section', 'brightnight_fullwidth_section_shortcode');
// End full width section shortcode

/*===== Start service box shortcode =====*/
function brightnight_service_box_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 
		array(
			'title'		=> '',
			'service_info' => '',
	), $atts ));
	$service_info = vc_param_group_parse_atts( $atts['service_info'] );
	$service_box_markup = '
	<div class="service-box">
		<h1>'.esc_html( $title ).'</h1>';

		if ( !empty($service_info) ) {
			foreach ($service_info as $info) {
				$service_box_markup .='<div class="single-service-box">';
				if ($info['icon_type'] == '1') {
					$service_box_markup	.= '<div class="service-icon">
						<i class="'.esc_attr($info['choose_icon']).'"></i>
					</div>';
				} else {
					$service_icon_img_array = wp_get_attachment_image_src( $info['img_icon'], 'thumbnail' );
					$service_box_markup	.= '<div class="service-img">
						<img src="'.esc_url($service_icon_img_array[0]).'" alt="'.esc_html($title).'"/>
					</div>';
				}
				$service_box_markup .='<div class="info-text">
				<h3>'.esc_html( $info['sub_title'] ).'</h3>
				'.wpautop( esc_html( $info['desc'] ) ).'
				<a href="'.esc_url( get_the_permalink() ).'" class="bordered-btn">'.esc_html( $info['link_text'] ).' <i class="fa fa-long-arrow-right"></i></a>
				</div>';
			$service_box_markup .= '</div>';
			}
		} else {
			$service_box_markup .= '';
		}
	$service_box_markup .= '</div>';
	return $service_box_markup;
}
add_shortcode( 'brightnight_service_box', 'brightnight_service_box_shortcode' );
// End service box shortcode

/*===== Start service box shortcode =====*/
function brightnight_service_shortcode($atts){
    extract( shortcode_atts( array(
        'columns'   => '3',
        'count'     => '3',
        'icon_type' => '1',
    ), $atts) );

    $q = array('posts_per_page'=> $count, 'post_type' => 'service');
    $post_query = new WP_Query( $q );
    $post_count = $post_query->post_count;
    $found_posts = $post_query->found_posts;
    $total_page = $found_posts / $post_count;

    if($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    } 

    $service_markup ='<div class="row more-services">';
    while($post_query->have_posts()) : $post_query->the_post();
        $post_id = get_the_ID();

        if (get_post_meta( $post_id, 'brightnight_service_box_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_service_box_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('icon_type', $post_meta)) {
            $icon_type = $post_meta['icon_type'];
        } else {
            $icon_type = '';
        }

        if (array_key_exists('icon', $post_meta)) {
            $icon = $post_meta['icon'];
        } else {
            $icon = '';
        }

        if (array_key_exists('img_icon', $post_meta)) {
            $img_icon = $post_meta['img_icon'];
        } else {
            $img_icon = '';
        }

        if (array_key_exists('btn_text', $post_meta)) {
            $btn_text = $post_meta['btn_text'];
        } else {
            $btn_text = '';
        }

        $post_excerpt = get_the_excerpt();
        $service_markup .= '
        <div class="'.esc_attr($column_markup).'">
            <div class="single-service-box">';

                if($icon_type == 1) {
                    $service_markup .= '<div class="service-icom"><i class="'.esc_attr($icon).'"></i></div>';
                } else {
                	$service_img_array = wp_get_attachment_image_src( $img_icon, 'thumbnail' );
                    $service_markup .= '<div class="service-img">
						<img src="'.esc_url($img_icon).'" alt="'.get_the_title( $post_id ).'"/>
                    </div>';
                }
            	$service_markup .= '<div class="info-text">
				<h3>'.esc_html( get_the_title($post_id) ).'</h3>
				'.wpautop( do_shortcode( $post_excerpt ) ).'

				<a href="'.esc_url( get_the_permalink($post_id) ).'" class="bordered-btn">'.esc_html( $btn_text ).' <i class="fa fa-long-arrow-right"></i></a>
				</div>';
    	$service_markup .= '</div></div>';
    endwhile;
    $service_markup.= '</div>
    <script>
		var page = 2;
	    jQuery(document).ready(function($) {
	        $(".show-more-post").on(\'click\', function() {
	            $.ajax({
	                type: \'POST\',
	                url: "'.esc_url(site_url()).'/wp-admin/admin-ajax.php",
	                dataType: \'html\',
	                data: {
	                    action: \'service_load_function\',
	                    nonce: $(this).data(\'nonce\'),
	                    count: $(this).attr("data-count"),
	                    columns: $(this).attr("data-column"),
	                    columns_markup: $(this).attr("data-column-markup"),
	                    page: page,
	                },
	                beforeSend: function(data) {
	                    $("#load-more-message").append("Wait Please ...");
	                    $(".show-more-post").hide();
	                },
	                success: function(data, result){
	                    if( result != \'error\' ) {
	                        $(".more-services").append(data);
	                        $("#load-more-message").empty();
	                        $(".show-more-post").show();
	                        page++;
	                        if(page > Math.ceil('.$total_page.')) {
	                            $(".show-more-post").hide();
	                        }
	                    } else {
	                    	$(".show-more-post").hide();
	                    }
	                }
	            }); 
	            return false;
	        });
	    });
	</script>
	<div id="load-more-message"></div>
        <a data-nonce="'.wp_create_nonce('post_load_function_nonce').'" data-count="'.$count.'" data-column="'.esc_attr( $columns ).'" data-column-markup="'.esc_attr( $column_markup ).'"  href="" class="show-more-post service-area">More service</a>
    ';
    wp_reset_query();
    return $service_markup;
}
add_shortcode('brightnight_service', 'brightnight_service_shortcode');
// Load More Post
add_action('wp_ajax_nopriv_service_load_function', 'service_load_function_callback');
add_action('wp_ajax_service_load_function', 'service_load_function_callback');

function service_load_function_callback() {
    $permission = check_ajax_referer( 'post_load_function_nonce', 'nonce', false );
    $paged = $_POST['page'];

    if( $permission == false ) {
        echo 'error';
        $project_list = '
            <div class="light-ajax-error-content">
                <i class="fa fa-warning"></i>
                <h3>'.esc_html__('I don\'t know what happened, but there is an error!', 'project-toolkit').'</h3>
            </div>
        ';        
    } else {
    $post_count   = (isset($_POST['count'])) ? $_POST['count'] : 0;
    $columns      = (isset($_POST['columns'])) ? $_POST['columns'] : 0;
    $column_markup= (isset($_POST['column_markup'])) ? $_POST['column_markup'] : 0;
    $settings = array(
        'showposts' => $post_count, 
        'post_type' => 'service',
        'paged' => $paged,
    );
    $light_projects_query = new WP_Query($settings);
    $post_no = 0;
    while($light_projects_query->have_posts()) : $light_projects_query->the_post();
        $post_id = get_the_ID();
        $post_no++;

        if (get_post_meta( $post_id, 'brightnight_service_box_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_service_box_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('icon_type', $post_meta)) {
            $icon_type = $post_meta['icon_type'];
        } else {
            $icon_type = '';
        }

        if (array_key_exists('icon', $post_meta)) {
            $icon = $post_meta['icon'];
        } else {
            $icon = '';
        }

        if (array_key_exists('img_icon', $post_meta)) {
            $img_icon = $post_meta['img_icon'];
        } else {
            $img_icon = '';
        }

        if (array_key_exists('btn_text', $post_meta)) {
            $btn_text = $post_meta['btn_text'];
        } else {
            $btn_text = '';
        }

        $post_excerpt = get_the_excerpt();

    	if($columns == 1) {
	        $column_markup = 'col-lg-12';
	    } elseif($columns == 2) {
	        $column_markup = 'col-lg-6 col-sm-6';
	    } elseif($columns == 3) {
	        $column_markup = 'col-lg-4 col-sm-6';
	    } elseif($columns == 4) {
	        $column_markup = 'col-lg-3 col-sm-6';
	    } elseif($columns == 6) {
	        $column_markup = 'col-lg-2 col-sm-6';
	    }

        $project_list .= '
        <div class="'.esc_attr($column_markup).'">
            <div class="single-service-box">';
                if($icon_type == 1) {
                    $project_list .= '<div class="service-icom"><i class="'.esc_attr($icon).'"></i></div>';
                } else {
                	$service_img_array = wp_get_attachment_image_src( $img_icon, 'thumbnail' );
                    $project_list .= '<div class="service-img">
						<img src="'.esc_url($img_icon).'" alt="'.get_the_title( $post_id ).'"/>
                    </div>';
                }
            	$project_list .= '<div class="info-text">
				<h3>'.esc_html( get_the_title($post_id) ).'</h3>
				'.wpautop( do_shortcode( $post_excerpt ) ).'
				<a href="'.esc_url( get_the_permalink($post_id) ).'" class="bordered-btn">'.esc_html( $btn_text ).' <i class="fa fa-long-arrow-right"></i></a>
				</div>';
    	$project_list .= '</div></div>';
    endwhile;
    wp_reset_postdata(); 
    }
    wp_die($project_list);
}
// End home 3 work area shortcode

/*===== Start Brightnight project shortcode =====*/
function brightnight_project_shortcode($atts) {
	extract( shortcode_atts( array(
		'title'		=> '',
		'count'		=> '9',
		'columns'	=> '3',
		'height'	=> '400',
		'style'		=> '1',
		'button'	=> '1',
		'btn_text'	=> 'view full details',
		'paginate'	=> '1'
	), $atts));

	$project_categories = get_terms( 'project_cat' );
	$dynamic_number = rand(455234563, 3425634665);
	global $paged;

    if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
    } else if ( get_query_var('page') ) {
    $paged = get_query_var('page');
    } else {
    $paged = 1;
    }

    if($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    }

	$project_markup = '
	<script>
		jQuery(document).ready(function($){
			$(".project-shorting li").click(function(){
				$(".project-shorting li").removeClass("active");
				$(this).addClass("active");

				var selector = $(this).attr("data-filter");
				$(".project-list-'.$dynamic_number.'").isotope({
					filter: selector,
				});
			});
		});
		jQuery(window).load(function(){
			jQuery(".project-list-'.$dynamic_number.'").isotope();
		});
	</script>
	<div class="row">
		<div class="col-md-12">
			<h1 class="project-title">'.esc_html($title).'</h1>
			<ul class="project-shorting">
				<li class="active" data-filter="*">All project</li>';

				if (!empty($project_categories && ! is_wp_error( $project_categories ))) {
					foreach ($project_categories as $category) {
						$project_markup .='<li data-filter=".'.$category->slug.'">'.$category->name.'</li>';
					}
				}

				$project_markup .='
			</ul>
		</div>
	</div>';
	$project_markup .= '<div class="row project-list-'.$dynamic_number.'">';

	$q = array(
    	'showposts'     => $count,
    	'posts_per_page'=> $count, 
        'post_type'     => 'project',
        'paged'         => $paged,
    );

    $post_query = new WP_Query( $q );

    $total_found_posts = $post_query->found_posts;
    $total_page = ceil($total_found_posts / $count);

	while ($post_query->have_posts()) : $post_query->the_post();
		$post_id = get_the_ID();
		$post_excerpt = get_the_excerpt();
		$project_category = get_the_terms( $post_id, 'project_cat' );

		if ($project_category && ! is_wp_error( $project_category )) {
			$project_cat_list = array();

			foreach ($project_category as $category) {
				$project_cat_list[] = $category->slug;
			}
			$project_assigned_cat = join(" ", $project_cat_list);
		} else {
			$project_assigned_cat = '';
		}

		if(has_post_thumbnail()){
            $project_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).');height:'.$height.'px"';
        } else {
            $project_img_markup = '';
        }

        if (get_post_meta( $post_id, 'brightnight_project_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_project_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('product_type', $post_meta)) {
            $product_type = $post_meta['product_type'];
        } else {
            $product_type = '';
        }

        $project_markup .= '
		<div class="'.esc_attr($column_markup).' '.$project_assigned_cat.'">
            <div class="brightnight-single-post-block project">
            	<a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$project_img_markup.'></a>
                <div class="post-block-content">
                	<h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>
	                <div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>';

	                if($style == 1) {
	                    $project_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';
	                } else {
	                    $project_markup .= '<span class="post-date">'.esc_html( $product_type ).'</span>';
	                }
	               
	                if ($button == 1) {
	                    $project_markup .='<a class="post-btn" href="'.esc_url(get_permalink($post_id)).'">'.esc_html( $btn_text ).'</a>';
	                } else {
	                    $project_markup .= '';
	                }

	                $project_markup .= '
                </div>    
            </div>
        </div>';
	endwhile;
	$project_markup.= '</div>';
    if ($paginate == 1) {

        if(function_exists('wp_pagenavi')) {
        $project_markup .='<div class="page-navigation">'.wp_pagenavi(array('query' => $post_query, 'echo' => false)).'</div>'; //This come form Wp Pagenavi plugins
        } else {
            $project_markup.='
            <span class="prev-posts-links">'.get_previous_posts_link('<< Previous ').'</span>
            <span class="next-posts-links">'.get_next_posts_link(' Next >>', $total_page).'</span>
            ';
        }
    }
	wp_reset_query();
	$project_markup .= '</div>';
	return $project_markup;
}
add_shortcode( 'brightnight_projects', 'brightnight_project_shortcode' );
// End Brightnight project shortcode

/*===== Start Brightnight project masonry shortcode =====*/
function brightnight_project_masonry_shortcode($atts) {
	extract( shortcode_atts( array(
		'title'		=> '',
		'count'		=> '9',
		'columns'	=> '3',
		'style'		=> '1',
	), $atts));

	$project_categories = get_terms( 'project_cat' );
	$dynamic_number = rand(984655, 894954);

    if($columns == 1) {
        $column_markup = 'col-lg-12';
    } elseif($columns == 2) {
        $column_markup = 'col-lg-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-lg-4 col-sm-6';
    } elseif($columns == 4) {
        $column_markup = 'col-lg-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-lg-2 col-sm-6';
    }

    $project_no = 0;
	$project_markup = '
	<script>
		jQuery(document).ready(function($){
			$(".project-shorting li").click(function(){
				$(".project-shorting li").removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$(".project-masonry-list-'.$dynamic_number.'").isotope({
					filter: selector,
				});
			});
		});
		jQuery(window).load(function(){
			jQuery(".project-masonry-list-'.$dynamic_number.'").isotope({
				itemSelector: ".project-masonry-item",
				layoutMode: "masonry",
				masonry: {
                    columnWidth: ".project-masonry-item"
                }
			});
		});
	</script>
	<div class="row">
		<div class="col-md-12">
			<h1 class="project-title">'.esc_html($title).'</h1>
			<ul class="project-shorting">
				<li class="active" data-filter="*">All project</li>';

				if (!empty($project_categories && ! is_wp_error( $project_categories ))) {
					foreach ($project_categories as $category) {
						$project_markup .='<li data-filter=".'.$category->slug.'">'.$category->name.'</li>';
					}
				}

				$project_markup .='
			</ul>
		</div>
	</div>';
	$project_markup .= '<div class="row project-masonry-list-'.$dynamic_number.'">';

	$q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'project-masonry') );

	while ($q->have_posts()) : $q->the_post();
		$post_id = get_the_ID();
		$post_excerpt = get_the_excerpt();
		$project_no++;

		$project_category = get_the_terms( $post_id, 'project_cat' );

		if ($project_category && ! is_wp_error( $project_category )) {
			$project_cat_list = array();
			foreach ($project_category as $category) {
				$project_cat_list[] = $category->slug;
			}
			$project_assigned_cat = join(" ", $project_cat_list);
		} else {
			$project_assigned_cat = '';
		}

        if (get_post_meta( $post_id, 'brightnight_project_masonry_options', true )) {
            $post_meta = get_post_meta( $post_id, 'brightnight_project_masonry_options', true );
        } else {
            $post_meta = array();
        }

        if (array_key_exists('product_type', $post_meta)) {
            $product_type = $post_meta['product_type'];
        } else {
            $product_type = '';
        }

        // if($columns == '3') {
        // 	if ($project_no === 1) {
        // 		$cw_variation = 'col-lg-5 custom-width-1';
        // 		var_dump($cw_variation);
        // 	} else if ($project_no == 2) {
        // 		$cw_variation = 'col-lg-7 custom-width-2';
        // 	} else {
        // 		$cw_variation = $column_markup;
        // 	}
        // }

        if ($columns == 1) {
        	$cw_variation = $column_markup;
        } elseif ($columns == 2) {
        	$cw_variation = 'col-sm-6';
        } elseif ($columns == 4) {
        	$cw_variation = 'col-lg-3 col-sm-6';
        } else {
        	if ($project_no == 1) {
        		$cw_variation = 'col-lg-5 custom-width-1';
        	} else {
        		$cw_variation = $column_markup;
        	}
        	if ($project_no == 2) {
        		$cw_variation = 'col-lg-8 custom-width-2';
        	} else {
        		$cw_variation = $column_markup;
        	}

        	if ($project_no == 3 OR $project_no == 4 OR $project_no == 5 OR $project_no == 6 OR $project_no == 7 OR $project_no == 8 OR $project_no == 9) {
        		$cw_variation = 'col-lg-4 custom-width-3';
        	}
        }

        $project_markup .= '
		<div class="'.esc_attr($cw_variation).' '.$project_assigned_cat.' project-masonry-item">
            <div class="project-masonry-bg single-project-masonry-'.$project_no.'" style="background-image:url('.esc_url( get_the_post_thumbnail_url( $post_id, 'large' ) ).')">
                <div class="post-block-content">
                	<h4><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h4>';

	                if($style == 1) {
	                    $project_markup .= '<span class="post-date">'.get_the_date( 'd F Y').'</span>';
	                } else {
	                    $project_markup .= '<span class="post-date">'.esc_html( $product_type ).'</span>';
	                }

	                $project_markup .= '
                </div>    
            </div>
        </div>';
	endwhile;
	$project_markup.= '</div>';
	wp_reset_query();
	$project_markup .= '</div>';
	return $project_markup;
}
add_shortcode( 'brightnight_projects_masonry', 'brightnight_project_masonry_shortcode' );
// End Brightnight project masonry shortcode


