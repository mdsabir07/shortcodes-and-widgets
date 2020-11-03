<?php

function msiit_course_category_list( ) {
    $elements = get_terms( 'course_category', array('hide_empty' => false) );
    $product_cat_array = array();

    if ( !empty($elements) ) {
        foreach ( $elements as $element ) {
            $info = get_term($element, 'course_category');
            $product_cat_array[ $info->term_id ] = $info->name;
        }
    }
    return $product_cat_array;
}

function msiit_course_list() {
	$args = wp_parse_args( array(
		'post_type'	=> 'lp_course',
		'posts_per_page'	=> -1,
		'orderby'	=> 'title',
		'order'	=> 'ASC'
	) );

	$queries = get_posts( $args );
	$query_array = array();
	if ($queries) {
		foreach ($queries as $query) {
			$query_array[ $query->ID ] = $query->post_title;
		}
	}
	return $query_array;
}




/**
 * Elementor Pricing Widget.
 */
class Msiit_Pricing_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'pricing	';
	}

	public function get_title() {
		return __( 'MSIIT Pricing Table', 'msiit' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Pricing Box', 'msiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'box_bg', [
				'label' => __( 'Background image', 'msiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Pricing Title' , 'msiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'private_title', [
				'label' => __( 'Title private', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '(private)' , 'msiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title_hour', [
				'label' => __( 'Title for hour', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'discount_img', [
				'label' => __( 'Discount image', 'msiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'discounts', [
				'label' => __( 'Discount text', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'sale_price', [
				'label' => __( 'Sale price', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$19.99' , 'msiit' ),
			]
		);

		$repeater->add_control(
			'regular_price', [
				'label' => __( 'Regualr price', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$29.99' , 'msiit' ),
			]
		);

		$repeater->add_control(
			'large_texts', [
				'label' => __( 'Large texts', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subscribe_form', [
				'label' => __( 'Subscribe form Shortcode', 'msiit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'price_btn', [
				'label' => __( 'Button text', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Buy Now' , 'msiit' ),
			]
		);

		$repeater->add_control(
			'price_link', [
				'label' => __( 'Button link', 'msiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'prices',
			[
				'label' => __( 'Pricings', 'msiit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if(!empty($settings['prices'])) {
			$html = '<div class="pricing-area">';
				$x = 0;
				foreach ($settings['prices'] as $price) {
					$x++;


					$html .= '
					<div class="pricing-boxs table-number-'.$x.'">
						<div class="pricing-box-inner" style="background-image:url('.wp_get_attachment_image_url( $price['box_bg']['id'], 'full', true ).')">
							<div class="price-title">';
								if(!empty($price['title'])) {
									$html .= '<h2>'.$price['title'].'</h2>';
								}

								if(!empty($price['private_title'])) {
									$html .= '<i>'.$price['private_title'].'</i>';
								}

								if(!empty($price['title_hour'])) {
									$html .= '<h4>'.$price['title_hour'].'</h4>';
								}
							$html .= '
							</div>';
							
							$html .= '
							<div class="discount-price-text">';
								if (!empty($price['discounts'])) {
									$html .= '
									<div class="discount-img">
										<img src="'.wp_get_attachment_image_url( $price['discount_img']['id'], 'medium', true ).'" alt="'.$price['discounts'].'">

										<div class="discount-texts">'.$price['discounts'].'</div>
									</div>';
								}
								
								if(!empty($price['sale_price'])) {
									$html .= '
									<div class="price-text">
										<strong>'.$price['sale_price'].'</strong>
										<span>'.$price['regular_price'].'</span>
									</div>';
								}
							$html .= '</div><div class="clearfix"></div>';

							if(!empty($price['large_texts'])) {
								$html .= '
								<div class="larger-texts">
									'.$price['large_texts'].'
								</div>
								';
							}

							if(!empty($price['subscribe_form'])) {
								$html .= '
								<div class="price-subscribe-form">
									'.$price['subscribe_form'].'
								</div>
								';
							}

						$html .= '
						</div>';

						if(!empty($price['price_link'])) {
							$html .= '
							<div class="pricing-button">
								<a href="'.$price['price_link'].'" class="btn boxed-btn">'.$price['price_btn'].'</a>
							</div>';
						}
					$html .= '
					</div>';
				}
				$html .= '
			</div>';
		} else {
			$html = '<div class="alert alert-warning">Please add pricing box.</div>';
		}

		echo $html;
	}
}


// Specific categories courses
class Msiit_SpacificCourse_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'msiit-spacificcourse';
	}

	public function get_title() {
		return 'Msiit Spacific Category courses';	
	}

	public function get_icon() {
		return 'fa fa-code';	
	}

	public function get_categories() {
		return 'general';	
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label'	=> __('Configuration', 'msiit-toolkit'),
				'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'count',
            [
                'label' => __( 'Course limit', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'	=> '-1',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __( 'Columns', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '2'  => __( '2 Columns', 'msiit-toolkit' ),
                    '1'  => __( '1 Columns', 'msiit-toolkit' ),
                ],
            ]
        );

        $this->add_control(
        	'cat_ids',
        	[
        		'label'	=> __('Select Categories', 'msiit-toolkit'),
            	'type'	=> \Elementor\Controls_Manager::SELECT,
            	'multiple'	=> 'true',
            	'options'	=> msiit_course_category_list(),
        	]
        );

        $this->add_control(
        	'p_ids',
        	[
        		'label'	=> __('Select course', 'msiit-toolkit'),
            	'type'	=> \Elementor\Controls_Manager::SELECT2,
            	'multiple'	=> 'true',
            	'options'	=> msiit_course_list(),
        	]
        );

		$this->add_control(
            'img_position',
            [
                'label' => __( 'Image position', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'right' => __( 'Right', 'msiit-toolkit' ),
                    'left'  => __( 'Left', 'msiit-toolkit' ),
                ],
            ]
        );

        $this->add_control(
            'img',
            [
                'label' => __( 'Image', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'flag',
            [
                'label' => __( 'Flag Image', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$html = '
		<div class="spanish-courses '.$settings['img_position'].'-imgae">';
			if(!empty($settings['flag'])) :
				$html .= '<img class="flag-img" src="'.wp_get_attachment_image_url( $settings['flag']['id'], 'medium', true ).'" alt="Flag">';
			endif;
			$html .= '
			<div class="container-fluid">
			<div class="row courses-sc-wrapper">';

				if($settings['img_position'] == 'left') :
					if(!empty($settings['img'])) :
						$html .= '
						<div class="col-lg-6 col-md-6 col-sm-12 '.$settings['img_position'].'">
							<div class="course-big-img">
								<img src="'.wp_get_attachment_image_url( $settings['img']['id'], 'full', true ).'">
							</div>
						</div>';
					endif;
				endif;

				$html .= '<div class="col-lg-6 col-md-6 col-sm-12 my-auto"><div class="row">';
				global $course;
				$course_id = get_the_ID();

				$q = new WP_Query( array(
					'post_type'	=> 'lp_course', 
					'posts_per_page' => $settings['count'],
					'post__in'	=> $settings['p_ids'],
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'course_category',
							'field'		=> 'term_id',
							'terms'		=> $settings['cat_ids']
						)
					),
				) );

				if($settings['columns'] == '2') {
		            $columns_markup = 'col-lg-6 col-md-6 col-sm-12';
		        } else {
		            $columns_markup = 'col';
		        }
				


				while($q->have_posts()) : $q->the_post();

					if (get_post_meta( get_the_ID(), 'codermsiit_course_options', true )) {
				        $course_meta = get_post_meta( get_the_ID(), 'codermsiit_course_options', true );
				    } else {
				        $course_meta = array();
				    }

				    if(array_key_exists('course_img', $course_meta)) {
				        $course_img = $course_meta['course_img'];
				    } else {
				        $course_img = '';
				    }

				    if(array_key_exists('badge_text', $course_meta)) {
				        $badge_text = $course_meta['badge_text'];
				    } else {
				        $badge_text = '';
				    }

				    if(array_key_exists('badge_bg', $course_meta)) {
				        $badge_bg = $course_meta['badge_bg'];
				    } else {
				        $badge_bg = '';
				    }


				    if(array_key_exists('level_title', $course_meta)) {
				        $level_title = $course_meta['level_title'];
				    } else {
				        $level_title = '';
				    }

				    if(array_key_exists('phone_no', $course_meta)) {
				        $phone_no = $course_meta['phone_no'];
				    } else {
				        $phone_no = '';
				    }

				    if(array_key_exists('chat_now', $course_meta)) {
				        $chat_now = $course_meta['chat_now'];
				    } else {
				        $chat_now = '';
				    }

				    if(array_key_exists('chat_now_link', $course_meta)) {
				        $chat_now_link = $course_meta['chat_now_link'];
				    } else {
				        $chat_now_link = '';
				    }

				    if(array_key_exists('available', $course_meta)) {
				        $available = $course_meta['available'];
				    } else {
				        $available = '';
				    }

					$html .= '
					<div class="'.$columns_markup.' spanish-course-addons">
						<div class="post-media">';
				        	if(!empty($course_img)) :
				                $course_img_array = wp_get_attachment_image_src( $course_img, 'thumbnail', true );
							$html .= '
				            <div class="course-editional-img">
				                <img class="editional_img" src="'.$course_img_array[0].'" alt="'.get_the_title().'">

				                <div class="badge-text" style="background-color:'.$badge_bg.'">
				                    '.$badge_text.'
				                </div>
				            </div>';
				        	endif;

					        $html .= '
					        <div class="entry">
					            <div class="magnifier">
					                <div class="magni-desc">
					                    <a class="secondicon" href="'.esc_url(get_the_permalink()).'"> <span class="oi" data-glyph="link-intact" title="'.esc_attr(get_the_title()).'" aria-hidden="false"></span></a>
					                </div>
					            </div>
					        </div>
				    	</div>

					    <div class="widget-title text-center clearfix">
					        <h3><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h3>';
					        if(!empty($level_title)) :
					        	$html .= '
					            <div class="level-title">
					                '.$level_title.'
					            </div>';
					        endif;

					        $html .= '
					        <div class="course-custom-excerpt clearfix">
					            '.get_the_excerpt().'
					        </div>

					        <div class="course-contact-options clearfix">';
					            if(!empty($phone_no)) :
					            	$html .= '
					                <div class="pull-left"><i class="fa fa-phone"> </i>'.$phone_no.'</div>';
					            endif;

					            if(!empty($chat_now)) :
					            	$html .= '
					                <div class="pull-right">
					                    <a href="'.$chat_now_link.'">
					                       <i class="fa fa-comments-o"></i> '.$chat_now.'
					                    </a>  
					                </div>';
					            endif;

					        $html .= '
					        </div>
					        <div class="bottom-line clearfix">
					            <div class="pull-left">
					                <a href="'.esc_url(get_the_permalink()).'" class="btn btn-sm btn-inverse">'.wp_kses($course->get_price_html(), array('a'=>array('href'=>array(), 'title'=>array(), 'class'=>array()))).'</a>
					            </div>
					            <div class="pull-right">
					                <a href="'.esc_url(get_the_permalink()).'" class="available-btn">
					                    '.$available.'
					                </a>
					            </div>
					        </div>
					    </div>

					    <div class="course-meta clearfix">
					        <div class="students-count text-center">
					            <p>'.wp_kses($course->get_students_html(), array('span'=>array('class'=>array()))).'</p>
					        </div>
					    </div>
					</div>';
				
				endwhile; wp_reset_query();
				$html .= '</div></div>';

				if($settings['img_position'] == 'right') :
					if(!empty($settings['img'])) :
						$html .= '
						<div class="col-lg-6 col-md-6 col-sm-12 '.$settings['img_position'].'">
							<div class="course-big-img">
								<img src="'.wp_get_attachment_image_url( $settings['img']['id'], 'full', true ).'">
							</div>
						</div>';
					endif;
				endif;
			$html .= '</div></div></div>
			';

		if (empty($settings['cat_ids'])) {
			$html = '
			<div class="alert alert-warning">
				<p>Please select course category</p>
			</div>';
		}

		echo $html;
	}
}
