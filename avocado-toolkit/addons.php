<?php
/**
 * Elementor Slider Widget.
 */
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';
	}

	public function get_title() {
		return __( 'Slider', 'avocado-toolkit' );
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
				'label' => __( 'Slides', 'avocado-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title' , 'avocado-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Slide Content' , 'avocado-toolkit' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'slide_btn_text', [
				'label' => __( 'Button text', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read more' , 'avocado-toolkit' ),
			]
		);

		$repeater->add_control(
			'slide_link', [
				'label' => __( 'Button link', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slide_bg', [
				'label' => __( 'Slide background', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Title #1', 'avocado-toolkit' ),
						'slide_btn_text' => __( 'Read more' , 'avocado-toolkit' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Slider Settings', 'avocado-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fade',
			[
				'label' => __( 'Fade effect?', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop?', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'arrows',
			[
				'label' => __( 'Show arrows?', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label' => __( 'Show dots?', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay?', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_time',
			[
				'label' => __( 'Autoplay time', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
				'condition'	=> [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Sliding speed', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
				'condition'	=> [
					'autoplay' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if (!empty($settings['slides'])) {
			$html = '';
			$random = rand(4356345,3423566);
			if (count($settings['slides']) > 1) {
				if ($settings['fade'] == 'yes') {
					$fade = 'true';
				} else {
					$fade = 'false';
				}

				if ($settings['loop'] == 'yes') {
					$loop = 'true';
				} else {
					$loop = 'false';
				}

				if ($settings['arrows'] == 'yes') {
					$arrows = 'true';
				} else {
					$arrows = 'false';
				}

				if ($settings['dots'] == 'yes') {
					$dots = 'true';
				} else {
					$dots = 'false';
				}

				if ($settings['autoplay'] == 'yes') {
					$autoplay = 'true';
				} else {
					$autoplay = 'false';
				}

				if ($settings['autoplay_time'] == 'yes') {
					$autoplay_time = 'true';
				} else {
					$autoplay_time = 'false';
				}

				if ($settings['speed'] == 'yes') {
					$speed = 'true';
				} else {
					$speed = 'false';
				}

				$html .= '
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
				';
			}
			$html .= '
			<div class="slider-wrapper"><div id="slide-'.$random.'" class="slides">';
				foreach ($settings['slides'] as $slide) {
					$html .= '<div class="single-slider-item" style="background-image:url('.wp_get_attachment_image_url( $slide['slide_bg']['id'], 'large' ).')">
						<div class="container">
							<div class="row justify-content-center text-center">
								<div class="col col-auto">
									<div class="slide-content">
										<h2>'.$slide['title'].'</h2>
										'.wpautop( do_shortcode( $slide['content'] ) ).'
										<a href="'.$slide['slide_link'].'" class="boxed-btn">'.$slide['slide_btn_text'].'</a>
									</div>
								</div>
							</div>
						</div>
					</div>';
				}
			$html .= '</div><img src="'.get_template_directory_uri().'/assets/imgs/banner-shap.png" alt="Banner Shape"></div>';
		} else {
			$html = '<div class="alert alert-warning">Please add slides.</div>';
		}

		echo $html;
	}
}

/**
 * Elementor Section title Widget.
 */
class Avocado_SectionT_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'avocado-sectiont';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return __( 'Avocado Section Title', 'avocado-toolkit' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register Slider widget controls.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'avocado-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default title',
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'avocado-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default sub title',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Section title widget output on the frontend.
	 *
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '
			<div class="product-section-title text-center">
				<h2>'.$settings['title'].'</h2>
				<p>'.$settings['sub_title'].'</p>
			</div>
		';
		

	}

}


/**
 * WooCommerce Widgets.
 */
if (class_exists('WooCommerce')) {
	
	function avocado_product_cat_list( ) {
        $elements = get_terms( 'product_cat', array('hide_empty' => false) );
        $product_cat_array = array();

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_cat');
                $product_cat_array[ $info->term_id ] = $info->name;
            }
        }
        return $product_cat_array;
    }

    function avocado_product_list() {
    	$args = wp_parse_args( array(
    		'post_type'	=> 'product',
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


	// Categories Widget
	class Avocado_Categories_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-categories';
		}

		public function get_title() {
			return 'Avocado Categories';
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
                    'label' => __( 'Configuration', 'avocado-toolkit' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'Select Categories', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list()
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Columns', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '4'  => __( '4 Columns', 'avocado-toolkit' ),
                        '3'  => __( '3 Columns', 'avocado-toolkit' ),
                        '2'  => __( '2 Columns', 'avocado-toolkit' ),
                        '1'  => __( '1 Columns', 'avocado-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'bg',
                [
                    'label' => __( 'Image as background?', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no'
                ]
            );

            $this->end_controls_section();

		}

		protected function render() {

            $settings = $this->get_settings_for_display();

            if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3';
            } else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4';
            } else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6';
            } else {
                $columns_markup = 'col';
            }

            if(!empty($settings['cat_ids'])) {
                $html = '<div class="row">';
                foreach($settings['cat_ids'] as $cat) {
                    $thumb_id = get_woocommerce_term_meta( $cat, 'thumbnail_id', true );
                    $term_img = wp_get_attachment_image_url(  $thumb_id, 'medium' );
                    $info = get_term($cat, 'product_cat');
                    $html .= '<div class="'.$columns_markup.' single-category-item text-center">';

                        if(!empty($thumb_id)) {
                            if($settings['bg'] == 'yes') {
                                $html .= '<a href="'.get_the_permalink($info->term_id).'" class="cat-img cat-img-bg" style="background-image:url('.$term_img.')"></a>';
                            } else {
                                $html .='
                                <div class="row cat-img">
                                    <div class="col text-center">
                                        <a href="'.get_the_permalink($info->term_id).'"><img src="'.$term_img.'" alt="'.$info->name.'"/></a>
                                    </div>
                                </div>';
                            }
                            
                        } else {
                            $html .= '<a  href="'.get_the_permalink($info->term_id).'" class="cat-no-thumb"><p>No thumbnail</p></a>';
                        }
                        

                        $html .='

                        <a href="'.get_the_permalink($info->term_id).'"><h3>'.$info->name.'</h3></a>
                        '.$info->description.'
                    </div>';
                }
                $html .= '</div>';
            } else {
                $html = '<div class="alert alert-warning"><p>Please select categories.</p></div>';
            }

            echo $html;

        }

	}

	class Avocado_Pcarousel_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-pcarosel';
		}

		public function get_title() {
			return 'Avocado Product Carousel';	
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
					'label'	=> __('Configuration', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
                'count',
                [
                    'label' => __( 'Product limit', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default'	=> '10',
                ]
            );

			$this->add_control(
                'from',
                [
                    'label' => __( 'Products From', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options'	=> [
                    	'select'	=> __('Select Products', 'avocado-toolkit'),
                    	'category'	=> __('Select Categories', 'avocado-toolkit'),
                    ],
                    'default'	=> 'select',
                ]
            );

            $this->add_control(
            	'p_ids',
            	[
            		'label'	=> __('And/Or Select Product', 'avocado-toolkit'),
	            	'type'	=> \Elementor\Controls_Manager::SELECT2,
	            	'multiple'	=> 'true',
	            	'options'	=> avocado_product_list() ,
	            	'condition'	=> [
	            		'from'	=> 'select',
	            	],
            	]
            );

            $this->add_control(
            	'cat_ids',
            	[
            		'label'	=> __('And/Or Select Categories', 'avocado-toolkit'),
	            	'type'	=> \Elementor\Controls_Manager::SELECT2,
	            	'multiple'	=> 'true',
	            	'options'	=> avocado_product_cat_list(),
	            	'condition'	=> [
	            		'from'	=> 'category',
	            	] 
            	]
            );

			$this->add_control(
                'nav',
                [
                    'label' => __( 'Enable navigation?', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes'
                ]
            );

			$this->add_control(
                'dots',
                [
                    'label' => __( 'Enable dots?', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no'
                ]
            );

			$this->add_control(
                'autoplay',
                [
                    'label' => __( 'Enable autoplay?', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes'
                ]
            );

            $this->add_control(
			'autoplay_time',
				[
					'label' => __( 'Autoplay time', 'avocado-toolkit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '3000',
					'condition'	=> [
						'autoplay' => 'yes',
					],
				]
			);

			$this->add_control(
				'speed',
				[
					'label' => __( 'Sliding speed', 'avocado-toolkit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '3000',
					'condition'	=> [
						'autoplay' => 'yes',
					],
				]
			);

            $this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			// $q = new WP_Query( array(
			// 	'post_type'	=> 'product', 
			// 	'posts_per_page' => 10,
			// 	'meta_query'	=> WC()->query->get_meta_query(),
			// 	'post__in'	=> array_merge( array( 0 ), wc_get_product_ids_on_sale() )
			// ) );

			// $q = new WP_Query( array(
			// 	'post_type'	=> 'product', 
			// 	'posts_per_page' => 10,
			// 	'post__in'	=> $settings['p_ids']
			// ) );
			if ($settings['from'] == 'category') {
				$q = new WP_Query( array(
					'post_type'	=> 'product', 
					'posts_per_page' => $settings['count'],
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'term_id',
							'terms'		=> $settings['cat_ids']
						)
					),
				) );
			} else {
				$q = new WP_Query( array(
					'post_type'	=> 'product', 
					'posts_per_page' => $settings['count'],
					'post__in'	=> $settings['p_ids']
				) );
			}
			
			$rand = rand(4536563, 32534255);

			if ($settings['nav'] == 'yes') {
				$arrows = 'true';
			} else {
				$arrows = 'false';
			}

			if ($settings['dots'] == 'yes') {
				$dots = 'true';
			} else {
				$dots = 'false';
			}

			if ($settings['autoplay'] == 'yes') {
				$autoplay = 'true';
			} else {
				$autoplay = 'false';
			}

			$html = '
			<script>
				jQuery(document).ready(function($) {
					$("#product-carousel-'.$rand.'").slick({
						arrows: '.$arrows.',
						dots: '.$dots.',
						autoplay: '.$autoplay.',
						nextArrow: "<i class=\'fa fa-angle-right\'></i>",
			            prevArrow: "<i class=\'fa fa-angle-left\'></i>",';

			            if ($settings['autoplay'] == 'yes') {
			            	$html .= 'autoplaySpeed: '.$settings['autoplay_time'].',';
			            }

			            if ($settings['autoplay'] == 'yes') {
			            	$html .= 'speed: '.$settings['speed'].'';
			            }
			            
		             	$html .= '
					});
				});
			</script>
			<div class="product-carousel" id="product-carousel-'.$rand.'">';
			while($q->have_posts()) : $q->the_post();
				global $product;
				$html .= '<div class="single-carousel-product">
					<div class="row">
						<div class="col product-box-shadow">
							<div class="product-carousel-thumb-inner">
								<div class="product-carousel-thumb" style="background-image:url('.get_the_post_thumbnail_url( get_the_ID(), 'medium' ).')">';
									if ( $product->is_on_sale() ) {
										$html .= '<span class="category-product-on-sale">Sale</span>';
									}
									$html .= '
								</div>
							</div>
						</div>
						<div class="col my-auto text-center pc-info">
							<div class="category-product-info">';
								if ( $product->is_on_sale() ) {
									$html .= '
									<div id="timer">
										<div id="days"></div>
										<div id="hours"></div>
										<div id="minutes"></div>
										<div id="seconds"></div>
									</div>';
								}
								$html .= '
								<a href="'.get_the_permalink().'"><h3>'.get_the_title().'</h3></a>
								<div class="category-product-price">'.$product->get_price_html().'</div>';
								if ($average = $product->get_average_rating()) {
									$html .= '<div class="category-star-rating"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div></div>';
								}
								$html .= '
								<div class="product-add-to-cart-category">'.do_shortcode( '[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]' ).'</div>
							</div>
						</div>
					</div>
				</div>';
			endwhile; wp_reset_query();

			$html .= '</div>';

			if ($settings['from'] == 'category' && empty($settings['cat_ids'])) {
				$html = '<div class="alert alert-warning">
					<p>Please select product category</p>
				</div>';
			}

			echo $html;
		}
	}

	class Avocado_ProductHovercard_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-hovercard';
		}

		public function get_title() {
			return 'Avocado Product Hovercard';	
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
					'label'	=> __('Configuration', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
                'count',
                [
                    'label' => __( 'Product limit', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default'	=> '10',
                ]
            );

			$this->add_control(
                'from',
                [
                    'label' => __( 'Products From', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options'	=> [
                    	'select'	=> __('Select Products', 'avocado-toolkit'),
                    	'category'	=> __('Select Categories', 'avocado-toolkit'),
                    ],
                    'default'	=> 'select',
                ]
            );

            $this->add_control(
            	'p_ids',
            	[
            		'label'	=> __('And/Or Select Product', 'avocado-toolkit'),
	            	'type'	=> \Elementor\Controls_Manager::SELECT2,
	            	'multiple'	=> 'true',
	            	'options'	=> avocado_product_list() ,
	            	'condition'	=> [
	            		'from'	=> 'select',
	            	],
            	]
            );

            $this->add_control(
            	'cat_ids',
            	[
            		'label'	=> __('And/Or Select Categories', 'avocado-toolkit'),
	            	'type'	=> \Elementor\Controls_Manager::SELECT2,
	            	'multiple'	=> 'true',
	            	'options'	=> avocado_product_cat_list(),
	            	'condition'	=> [
	            		'from'	=> 'category',
	            	] 
            	]
            );

            $this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			if ($settings['from'] == 'category') {
				$q = new WP_Query( array(
					'post_type'	=> 'product', 
					'posts_per_page' => $settings['count'],
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'term_id',
							'terms'		=> $settings['cat_ids']
						)
					),
				) );
			} else {
				$q = new WP_Query( array(
					'post_type'	=> 'product', 
					'posts_per_page' => $settings['count'],
					'post__in'	=> $settings['p_ids']
				) );
			}
			

			$html = '
			
			<div class="product-hovercard-wrapper">';
			while($q->have_posts()) : $q->the_post();
				global $product;

				$html .= '
				<div class="single-hc-product">
					<div class="single-product-base">
						'.get_the_post_thumbnail(get_the_ID(), 'thumbnail').'
						<span><i class="fa fa-angle-down"></i></span>
					</div>
					<div class="product-hovercard">
						'.do_shortcode( '[yith_wcwl_add_to_wishlist]' ).'
						<div class="product-hc-thumb" style="background-image:url('.get_the_post_thumbnail_url( get_the_ID(), 'medium' ).')"></div>
						<h4>'.get_the_title().'</h4>
						<div class="hc-product-price category-product-price">'.$product->get_price_html().'</div>
						<div class="product-add-to-cart-category">'.do_shortcode( '[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]' ).'</div>
						<span><i class="fa fa-angle-up"></i></span>
					</div>
				</div>';
				
			endwhile; wp_reset_query();

			$html .= '</div>';

			if ($settings['from'] == 'category' && empty($settings['cat_ids'])) {
				$html = '<div class="alert alert-warning">
					<p>Please select product category</p>
				</div>';
			}

			echo $html;
		}
	}


	class Avocado_SpacifiCat_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-spacificcat';
		}

		public function get_title() {
			return 'Avocado Spacific Category';	
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
					'label'	=> __('Configuration', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
                'count',
                [
                    'label' => __( 'Product limit', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default'	=> '4',
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Columns', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '4'  => __( '4 Columns', 'avocado-toolkit' ),
                        '3'  => __( '3 Columns', 'avocado-toolkit' ),
                        '2'  => __( '2 Columns', 'avocado-toolkit' ),
                        '1'  => __( '1 Columns', 'avocado-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
            	'cat_ids',
            	[
            		'label'	=> __('Select Categories', 'avocado-toolkit'),
	            	'type'	=> \Elementor\Controls_Manager::SELECT,
	            	'multiple'	=> 'true',
	            	'options'	=> avocado_product_cat_list(),
            	]
            );

            $this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$q = new WP_Query( array(
				'post_type'	=> 'product', 
				'posts_per_page' => $settings['count'],
				'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'term_id',
						'terms'		=> $settings['cat_ids']
					)
				),
			) );

			if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3';
            } else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4';
            } else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6';
            } else {
                $columns_markup = 'col';
            }
			

			$html = '
			
			<div class="row product-sc-wrapper">';
			while($q->have_posts()) : $q->the_post();
				global $product;

				$html .= '
				<div class="'.$columns_markup.' single-sc-product">
					<a href="'.get_permalink().'" class="product-sc">
						<div class="product-sc-thumb" style="background-image:url('.get_the_post_thumbnail_url( get_the_ID(), 'medium' ).')"></div>
						<h4>'.get_the_title().'</h4>
						<div class="sc-product-price category-product-price">'.$product->get_price_html().'</div>
					</a>
				</div>';
				
			endwhile; wp_reset_query();

			$html .= '</div>';

			if (empty($settings['cat_ids'])) {
				$html = '<div class="alert alert-warning">
					<p>Please select product category</p>
				</div>';
			}

			echo $html;
		}
	}


	class Avocado_ProductChoose_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-productchoose';
		}

		public function get_title() {
			return 'Avocado Choose Product';	
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
					'label'	=> __('Configuration', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default'	=> 'Choose Your Product',
                ]
            );

			$this->add_control(
                'content',
                [
                    'label' => __( 'Content', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default'	=> 'Excellent quality and fast delivery. Just choose the needed products and make an order.',
                ]
            );

            $this->add_control(
				'btn_text', [
					'label' => __( 'Button text', 'avocado-toolkit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'add to cart all set' , 'avocado-toolkit' ),
				]
			);

			$this->add_control(
				'btn_link', [
					'label' => __( 'Button link', 'avocado-toolkit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
				]
			);

			$this->add_control(
				'ortext',
				[
					'label'	=> __('Text', 'avocado-toolkit'),
					'type'	=> \Elementor\Controls_Manager::TEXT,
					'default' => __( 'or buy just one', 'avocado-toolkit' )
				]
			);

			$this->add_control(
				'image',
				[
					'label'	=> __('Arrow image', 'avocado-toolkit'),
					'type'	=> \Elementor\Controls_Manager::MEDIA,
				]
			);

            $this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$html = '
			<div class="product-choose-wrapper text-center">
				<h2>'.$settings['title'].'</h2>
				'.wpautop($settings['content']).'

				<a href="'.$settings['btn_link'].'" class="boxed-btn">'.$settings['btn_text'].'</a>
				<P>'.$settings['ortext'].'</P>
				<div class="arrow-img"><img src="'.wp_get_attachment_image_url($settings['image']['id'], 'thumbnail').'" alt="'.$settings['ortext'].'"></div>
			</div>
			';
			echo $html;
		}
	}

	class Avocado_AjaxTab_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'avocado-ajaxtab';
		}

		public function get_title() {
			return 'Avocado Ajax Tab';
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
					'label'	=> __('Configuration', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'title',
				[
					'label'	=> __('Title', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TEXT,
					'default' => __('Featured', 'avocado-toolkit'),
				]
			);

			$this->add_control(
                'cat_ids',
                [
                    'label' => __( 'Select Categories', 'avocado-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list()
                ]
            );

			$this->add_control(
				'count',
				[
					'label'	=> __('Count', 'avocado-toolkit'),
					'tab'	=> \Elementor\Controls_Manager::TEXT,
					'default'	=> 9,
				]
			);
			$this->end_controls_section();
		}

		protected function render() {

			$settings = $this->get_settings_for_display();

			$html = '
			<script>
				jQuery(document).ready(function($) {
					$(".fc-wrapper ul li button").on("click", function() {
						$(".fc-wrapper ul li button").removeClass("active");
						$(this).addClass("active");
						var cat_id = $(this).attr("data-id");
						var nonce = $(this).attr("data-nonce");
						$.ajax({
							url: "'.admin_url('admin-ajax.php').'",
							type: "POST",
							data: {
								action: "my_ajax_action",
								cat_id: cat_id,
								nonce_get: nonce
							},
							beforeSend: function() {
								$(".fc-products").empty();
								$(".fc-products").append(\'<div class="loading-bar"><i class="fa fa-spin fa-cog"></i> Loading ...</div>\');
							},
							success: function(html) {
								$(".fc-products").empty();
								$(".fc-products").append(html);
							}
						});
					});
				});
			</script>
			<div class="fc-wrapper"><h2>'.$settings['title'].'</h2>';
				if(!empty($settings['cat_ids'])) {
					$html .= '<ul>';
						$i = 0;
						foreach ($settings['cat_ids'] as $cat) {
							$i++;
							if ($i == 1) {
								$ac_class = 'active';
							} else {
								$ac_class = '';
							}
							$cat_info = get_term( $cat, 'product_cat' );
							$html .= '<li><button class="'.$ac_class.'" data-nonce="'.wp_create_nonce( 'my_ajax_action' ).'" data-id="'.$cat_info->term_id.'">'.$cat_info->name.'</button></li>';
						}
					$html .= '</ul>';

					$html .= '<div class="fc-products">';
						$q = new WP_Query( array(
							'post_type'	=> 'product',
							'posts_per_page'	=> $settings['count'],
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'product_cat',
									'field'		=> 'term_id',
									'terms'		=> $settings['cat_ids'][0],
								)
							),
						) );
						$html .= '<div class="row">';
						$thumb_id = get_woocommerce_term_meta( $settings['cat_ids'][0], 'thumbnail_id', true );
                    	$term_img = wp_get_attachment_image_url(  $thumb_id, 'large' );
                    	if (!empty($thumb_id)) {
                    		$html .= '<div class="col-lg-6">
								<div class="fc-featured-thumb" style="background-image:url('.$term_img.')"></div>
                    		</div>';
                    	}
							while($q->have_posts()) : $q->the_post();
								global $product;

								$html .= '
								<div class="col-lg-2">
									<a href="'.get_the_permalink().'" class="single-fc-product">
										<div class="single-fc-product-bg" style="background-image:url('.get_the_post_thumbnail_url( get_the_ID(), 'medium' ).')"></div>
										<h4>'.get_the_title().'</h4>
										<div class="hc-product-price category-product-price">'.$product->get_price_html().'</div>
									</a>
								</div>
								';
							endwhile; wp_reset_query();
						$html .= '</div>';
					$html .= '</div>';
				}
			$html .= '</div>';

			if(empty($settings['cat_ids'])) {
				$html = '<div class="alert alert-warning"><p>Please select product category</p></div>';
			}

			echo $html;
		}
	}


	class Avocado_StepCheckout_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'stepcheckout';
		}

		public function get_title() {
			return 'Avocado Step Checkout';
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
					'label'	=> __( 'Step One Configuration', 'avocado-toolkit' ),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'top_text',
				[
					'label'	=> __( 'Top text', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::WYSIWYG,
					'default'	=> '<h2>Select your Starter Kit</h2>',
				]
			);

			$this->add_control(
				'base_products',
				[
					'label'	=> __( 'Select Base Product', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::SELECT2,
					'multiple'	=> true,
					'options'	=> avocado_product_list(),
					'label_block' => true,
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'step_two_configuration',
				[
					'label'	=> __( 'Step Two Configuration', 'avocado-toolkit' ),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'step_two_title',
				[
					'label'	=> __( 'Step two title', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,
					'default'	=> 'Choose Candle holders, vases, & pillows',
					'label_block' => true,
				]
			);

			$this->add_control(
				'step_two_content',
				[
					'label'	=> __( 'Step two content', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::WYSIWYG,
					'default'	=> '<h2>Summer Elevated Kit $199.00</h2>',
					'label_block' => true,
				]
			);

			$this->add_control(
				'step_two_img',
				[
					'label'	=> __( 'Step two image', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::MEDIA,
				]
			);

			$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'box_title', [
					'label' => __( 'Box Title', 'avocado-toolkit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Box Title' , 'avocado-toolkit' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'box_product_ids',
				[
					'label'	=> __( 'Select Box Product', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::SELECT2,
					'multiple'	=> true,
					'options'	=> avocado_product_list(),
					'label_block' => true,
				]
			);

			$this->add_control(
				'step_two_boxes',
				[
					'label'	=> __( 'Product Boxes', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::REPEATER,
					'fields'=> $repeater->get_controls(),
					'default'	=> [
						[
							'title'	=> __( 'Box title', 'avocado-toolkit' ),
						]
					],
					'title_field'	=> '{{{ title }}}',
				]
			);
			$this->end_controls_section();

			$this->start_controls_section(
				'step_three_configuration',
				[
					'label'	=> __( 'Step Three Configuration', 'avocado-toolkit' ),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'step_three_title',
				[
					'label'	=> __( 'Step three title', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,
					'default'	=> 'Choose add-ons',
					'label_block' => true,
				]
			);

			$this->add_control(
				'step_three_products',
				[
					'label'	=> __( 'Select Step three products', 'avocado-toolkit' ),
					'type'	=> \Elementor\Controls_Manager::SELECT2,
					'multiple'	=> true,
					'options'	=> avocado_product_list(),
					'label_block' => true,
				]
			);
			$this->end_controls_section();
		}

		protected function render() {

			$settings = $this->get_settings_for_display();

			$html = '
			<script>
				jQuery(document).ready(function($) {
					$("#step-chckout-1, .step-1-product-btn a.button").on("click", function() {
						$(\'.nav-tabs a[href="#step-chckout-2"]\').tab("show");
						$("html, body").animate({ scrollTop: 0 }, "slow");
						$(\'.nav-tabs a[href="#step-chckout-2"], .nav-tabs a[href="#step-chckout-3"], .nav-tabs a[href="#step-chckout-4"]\').attr("data-toggle", "tab");
					});

					$(".next-step-link a").on("click", function() {
						$(\'.nav-tabs a[href="#step-chckout-3"]\').tab("show");
						$("html, body").animate({ scrollTop: 0 }, "slow");
						return false;
					});
				});
			</script>
			<div class="staped-checkout">
				<div class="steped-indicator text-center">
					<ul class="nav nav-tabs mb-3" id="mytab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#step-chckout-1" role="tab" aria-controls="step-chckout-1" aria-selected="true">Step 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#step-chckout-2" role="tab" aria-controls="step-chckout-2" aria-selected="false">Step 2</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#step-chckout-3" role="tab" aria-controls="step-chckout-3" aria-selected="false">Step 3</a>
						</li>
						<!--<li class="nav-item">
							<a class="nav-link" href="#step-chckout-4" role="tab" aria-controls="step-chckout-4" aria-selected="false">Step 4</a>
						</li>-->
					</ul>
				</div>
				<div class="tab-content" id="mytabContent">
					<div class="tab-pane fade show active" id="step-chckout-1" role="tabpanel">
						<div class="step-header-text text-center">'.do_shortcode( wpautop($settings['top_text']) ).'</div>';

						if (!empty($settings['base_products'])) {
							$html .= '<div class="row step-1-columns">';
							foreach ($settings['base_products'] as $step_1_p) {
								$_product = wc_get_product( $step_1_p );
								$html .= '
								<div class="col">
									<div class="step-1-product">
										<div class="step-1-product-img">
											'.get_the_post_thumbnail($step_1_p, 'large').'
										</div>
										<div class="step-1-product-title">
											<a href="'.get_the_permalink($step_1_p).'"><h3>'.get_the_title($step_1_p).'</h3></a>
										</div>
										<div class="step-1-product-content">
											'.wpautop(get_post_field( 'post_content', $step_1_p )).'
										</div>
										<div class="step-1-product-price">
											'.$_product->get_price_html().'
										</div>
										<div class="step-1-product-btn">
											'.do_shortcode( '[add_to_cart style="" show_price="FALSE" id="'.$step_1_p.'"]' ).'
										</div>
									</div>
								</div>
								';
							}
							$html .= '</div>';
						} else {
							$html .= '<div class="alert alert-danger">No products added. Please add some products.</div>';
						}
						$html .= '
					</div>
					<div class="tab-pane fade" id="step-chckout-2" role="tabpanel">
						<div class="step-header-text text-center"><h2 class="step-title">'.$settings['step_two_title'].'</h2></div>
						<div class="row">
							<div class="col">
								<img src="'.wp_get_attachment_image_url($settings['step_two_img']['id'], 'large').'" alt="'.$settings['step_two_title'].'">
							</div>
							<div class="col">
								<div class="step-two-content">
									'.wpautop($settings['step_two_content']).'';

									if (!empty($settings['step_two_boxes'])) {
										foreach ($settings['step_two_boxes'] as $box) {
											$html .= '<div class="step-two-box">
												<h3>'.$box['box_title'].'</h3>';
												if (!empty($box['box_product_ids'])) {
													$html .= '<div class="row no-gutters">';
													foreach ($box['box_product_ids'] as $box_product) {
														$html .= '<div class="col">
															<div class="box-single-product text-center">
																<a href="'.get_the_permalink($box_product).'"><h4>'.get_the_title($box_product).'</h4></a>
																<div class="boxed-product-bg" style="background-image:url('.get_the_post_thumbnail_url( $box_product, 'medium' ).')"></div>
																<div class="boxed-product-btn">
																	'.do_shortcode( '[add_to_cart style="" show_price="FALSE" id="'.$box_product.'"]' ).'
																</div>
															</div>
														</div>';
													}
													$html .= '</div>';
												}
												$html .= '
											</div>';
										}
									} else {
										$html .= '<div class="alert alert-danger">No products added. Please add some products.</div>';
									}
									$html .= '
									<div class="next-step-link text-right">
										<a href="" class="bordered-btn">Next Step <i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="step-chckout-3" role="tabpanel">
						<div class="step-header-text text-center">
							<h2 class="step-title">'.$settings['step_three_title'].'</h2>
						</div>';

						if (!empty($settings['step_three_products'])) {
							$html .= '<div class="row">';
							foreach ($settings['step_three_products'] as $step_3_p) {
								$_product = wc_get_product( $step_3_p );
								$html .= '<div class="col-lg-3 col-md-3 col-sm-12">
									<div class="step-3-product">
										<div class="step-3-product-img">
											'.get_the_post_thumbnail($step_3_p, 'full').'
										</div>
										<div class="step-3-product-title">
											<a href="'.get_the_permalink($step_3_p).'"><h4>'.get_the_title($step_3_p).'</h4></a>
										</div>
										<div class="step-3-product-content">
											'.wpautop(get_the_excerpt($step_3_p)).'
										</div>';
										if (!empty($_product->get_price_html())) {
											$html .= '
											<div class="step-3-product-price">Price: 
												'.$_product->get_price_html().'
											</div>
											';
										}
										$html .= '
										
										<div class="step-3-product-btn">
											'.do_shortcode( '[add_to_cart style="" show_price="FALSE" id="'.$step_3_p.'"]' ).'
										</div>
									</div>
								</div>';
							}
							$html .= '</div>';
						} else {
							$html .= '<div class="alert alert-danger">No products added. Please add some products.</div>';
						}

						$html .= '
						<div class="checkout-bar">
							<div class="row">
								<div class="col-lg-7 text-right my-auto">Ready to Checkout?</div>
								<div class="col col-lg-5 my-auto">
									<a href="'.get_page_link( wc_get_page_id('checkout') ).'?steps=true" class="bordered-btn text-uppercase">Checkout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			';

			$html .= '</div>';

			echo $html;
		}
	}




}

