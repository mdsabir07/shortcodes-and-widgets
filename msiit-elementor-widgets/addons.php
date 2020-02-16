<?php

function msiit_post_cat_list( ) {
    $elements = get_terms( 'category', array('hide_empty' => false) );
    $post_cat_array = array();

    if ( !empty($elements) ) {
        foreach ( $elements as $element ) {
            $info = get_term($element, 'category');
            $post_cat_array[ $info->term_id ] = $info->name;
        }
    }
    return $post_cat_array;
}

function msiit_page_list() {
	$args = wp_parse_args( array(
		'post_type'	=> 'page',
		'posts_per_page'	=> -1,
		'orderby'	=> 'title',
		'order'	=> 'ASC'
	) );

	$queries = get_pages( $args );
	$query_array = array();
	if ($queries) {
		foreach ($queries as $query) {
			$query_array[ $query->ID ] = $query->post_title;
		}
	}
	return $query_array;
}

/**
 * Elementor Slider Widget.
 */
class Msiit_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';
	}

	public function get_title() {
		return __( 'Msiit Slider', 'msiit-toolkit' );
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
				'label' => __( 'Slides', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title' , 'msiit-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'heading',
			[
				'label' => __( 'Select heading tag', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
                'options' => [
                    '1'  => __( 'h1', 'msiit-toolkit' ),
                    '2'  => __( 'h2', 'msiit-toolkit' ),
                    '3'  => __( 'h3', 'msiit-toolkit' ),
                    '4'  => __( 'h4', 'msiit-toolkit' ),
                    '5'  => __( 'h5', 'msiit-toolkit' ),
                    '6'  => __( 'h6', 'msiit-toolkit' ),
                ],
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Slide Content' , 'msiit-toolkit' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'font_size', [
				'label' => __( 'Content font size', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '18' , 'msiit-toolkit' ),
			]
		);

		$repeater->add_control(
			'slide_btn_text', [
				'label' => __( 'Button text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Learn more' , 'msiit-toolkit' ),
			]
		);

		$repeater->add_control(
			'slide_link', [
				'label' => __( 'Button link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slide_bg', [
				'label' => __( 'Slide background', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'slide_height', [
				'label' => __( 'Slide height (exm: 300)', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Title #1', 'msiit-toolkit' ),
						'slide_btn_text' => __( 'Read more' , 'msiit-toolkit' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Slider Settings', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fade',
			[
				'label' => __( 'Fade effect?', 'msiit-toolkit' ),
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
				'label' => __( 'Loop?', 'msiit-toolkit' ),
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
				'label' => __( 'Show arrows?', 'msiit-toolkit' ),
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
				'label' => __( 'Show dots?', 'msiit-toolkit' ),
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
				'label' => __( 'Autoplay?', 'msiit-toolkit' ),
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
				'label' => __( 'Autoplay time', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Sliding speed', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
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
		                    nextArrow: "<i class=\'fa fa-angle-right\'></i>",
		                    prevArrow: "<i class=\'fa fa-angle-left\'></i>",
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
					$html .= '
					<div class="single-slider-item" style="background-image:url('.wp_get_attachment_image_url( $slide['slide_bg']['id'], 'full' ).');height:'.$slide['slide_height'].'px">
						<div class="container">
							<div class="row justify-content-center text-center">
								<div class="col col-auto">
									<div class="slide-content-box">
										<div class="slide-content" style="font-size:'.$slide['font_size'].'px">
											<h'.$slide['heading'].' class="slide-title">'.$slide['title'].'</h'.$slide['heading'].'>
											'.wpautop( do_shortcode( $slide['content'] ) ).'
										</div>
										<a href="'.$slide['slide_link'].'" class="boxed-btn">'.$slide['slide_btn_text'].'</a>
									</div>
								</div>
							</div>
						</div>
					</div>';
				}
			$html .= '</div></div>';
		} else {
			$html = '<div class="alert alert-warning">Please add slides.</div>';
		}

		echo $html;
	}
}

/**
 * Tab Slider Widget.
 */
class Msiit_TabtSlider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tab-slider';
	}

	public function get_title() {
		return __( 'Msiit Tab Slider', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_content',
			[
				'label' => __( 'Title and content', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Default title',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'tab_id',
			[
				'label' => __( 'Tab ID name (small letter)', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'space1',
			]
		);

		$repeater->add_control(
			'space_value',
			[
				'label' => __( 'Space value', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '120 sq.fit.',
			]
		);

		$repeater->add_control(
			'space_tt_content',
			[
				'label' => __( 'Space tooltip text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Space tooltip text',
			]
		);

		$repeater->add_control(
			'tab_image',
			[
				'label' => __( 'Image', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'content_list',
			[
				'label' => __( 'Content list', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'msiit_tabs',
			[
				'label' => __( 'Tabs', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$html = '
		<div class="tab-wrap newtest-slider">    
			<div class="container-fluid">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 col-sm-12 text-center">
						<div class="tab-left">
							<div class="left-inner-title">
								'.wpautop( do_shortcode( $settings['title_content'] ) ).'
							</div>
							<div class="letf-inner-slide">
								<ul class="tab-titles">';
									$i = 0;
									foreach($settings['msiit_tabs'] as $ttab) :
										$i++;
										if ($i == 1) {
											$class = 'active';
										} else {
											$class = '';
										}
										$html .= '
										<li class="'.$class.'">
											<a href="#'.$ttab['tab_id'].'"></a>
											<div class="space-content">
												
													<strong>'.$ttab['space_value'].'</strong>
													'.$ttab['space_tt_content'].'
												
											</div>
										</li>';
									endforeach;
									$html .= '
								</ul>
								<div class="sml">
									<span>Small</span>
									<span>Medium</span>
									<span>Large</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="tab-right">';
							$x = 0;
							foreach($settings['msiit_tabs'] as $ctab) :
								$x++;
								if ($x == 1) {
									$add_css = 'style="display: block;"';
								} else {
									$add_css = '';
								}
								$html .= '
								<div id="'.$ctab['tab_id'].'" class="slider-tab-content" '.$add_css.'>
									<div class="right-image" style="background-image:url('.wp_get_attachment_image_url( $ctab['tab_image']['id'], 'large' ).')">
										<div class="right-list">
											'.wpautop( $ctab['content_list'] ).'
										</div>
									</div>
								</div>';
							endforeach;
							$html .= '
						</div>
					</div>
				</div>
			</div>
		</div>';

		echo $html;
	}
}

/**
 * Section title Widget.
 */
class Msiit_SectionT_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-sectiont';
	}

	public function get_title() {
		return __( 'Msiit Section Title', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => __( 'Text align', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'text-center',
                'options' => [
                    'text-center'  => __( 'Center', 'msiit-toolkit' ),
                    'text-left'  => __( 'Left', 'msiit-toolkit' ),
                    'text-right'  => __( 'Right', 'msiit-toolkit' ),
                ],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default title',
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Select heading tag', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
                'options' => [
                    '1'  => __( 'h1', 'msiit-toolkit' ),
                    '2'  => __( 'h2', 'msiit-toolkit' ),
                    '3'  => __( 'h3', 'msiit-toolkit' ),
                    '4'  => __( 'h4', 'msiit-toolkit' ),
                    '5'  => __( 'h5', 'msiit-toolkit' ),
                    '6'  => __( 'h6', 'msiit-toolkit' ),
                ],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title font color', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Default sub title',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = '
		<div class="section-title '.$settings['text_align'].'">';
		if (!empty($settings['title'])) {
			$html .= '<h'.$settings['heading'].' style="color:'.$settings['title_color'].'">'.$settings['title'].'</h'.$settings['heading'].'>';
		}
		if (!empty($settings['sub_title'])) {
			$html .= ''.wpautop( do_shortcode( $settings['sub_title'] ) ).'';
		}
		$html .= '</div>';
		echo $html;
	}
}

/**
 * Content box Widget.
 */
class Msiit_ContentBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-contentbox';
	}

	public function get_title() {
		return __( 'Msiit Content Box', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_img',
			[
				'label' => __( 'Upload Image', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'content_img_link',
			[
				'label' => __( 'Image link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'content_title',
			[
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default title',
			]
		);

		$this->add_control(
			'content_title_color',
			[
				'label' => __( 'Title color', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Default sub title',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = '
		<div class="single-content-box wow fadeInUp" data-wow-duration="2s">';
			if (!empty($settings['content_img_link'])) {
				$html .= '<a href="'.$settings['content_img_link'].'"><img src="'.wp_get_attachment_image_url( $settings['content_img']['id'], 'full' ).'" alt="'.$settings['content_title'].'" title="'.$settings['content_title'].'"></a>';
			}
			$html .= '
			<div class="contentbox-content">';
				if (!empty($settings['content_title'])) {
					$html .= '
					<h3 style="color:'.$settings['content_title_color'].'">'.$settings['content_title'].'</h3>';
				}
				if (!empty($settings['sub_title'])) {
					$html .= ''.wpautop( do_shortcode( $settings['sub_title'] ) ).'';
				}
				$html .= '
			</div>
		</div>';

		echo $html;
	}
}

/**
 * Dealer Information Widget.
 */
class Msiit_DealerInfo_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-dealerinfo';
	}

	public function get_title() {
		return __( 'Msiit Dealer Information', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'dealer_info',
			[
				'label' => __( 'Information', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'dealer_link_text',
			[
				'label' => __( 'Link text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'dealer_link',
			[
				'label' => __( 'Link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'mobile_number',
			[
				'label' => __( 'Mobile Number', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0111xxxxxx',
			]
		);

		$this->add_control(
			'mobile_number_link',
			[
				'label' => __( 'Mobile Number link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '+80111xxxxxx',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = '
		<div class="dealer-info-box wow fadeInUp" data-wow-duration="2s">';
			if (!empty($settings['dealer_info'])) {
				$html .= '
				'.wpautop( do_shortcode( $settings['dealer_info'] ) ).'';
			}
	
			if (!empty($settings['dealer_link_text'])) {
				$html .= '
				<div class="link">
					<a target="_blank" href="'.$settings['dealer_link'].'">'.$settings['dealer_link_text'].'</a>
				</div>';
			}
			
			if (!empty($settings['mobile_number'])) {
				$html .= '
				<a href="tel:'.$settings['mobile_number_link'].'">'.$settings['mobile_number'].'</a>';
			}
			$html .= '
		</div>';
		echo $html;
	}
}


/**
 * Page list Widget.
 */
class Msiit_PageList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-pagelist';
	}

	public function get_title() {
		return __( 'Msiit Page List', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'page_title',
			[
				'label' => __( 'Page title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
            'page_lists',
            [
                'label' => __( 'Select pages', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => msiit_page_list(),
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = '
		<div class="page-list">
			<h6>'.$settings['page_title'].'</h6>';
			if (!empty($settings['page_lists'])) : foreach($settings['page_lists'] as $list) :
				$html .= '
				<div class="p-list">
					<a href="'.get_the_permalink($list).'">'.get_the_title($list).'</a>
				</div>';
			endforeach; endif;
			$html .= '
		</div>';
		echo $html;
	}
}


/**
 * Download brochure Widget.
 */
class Msiit_DownloadB_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-downloads';
	}

	public function get_title() {
		return __( 'Msiit Download brochure', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'download_text',
			[
				'label' => __( 'Download text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Download the brochure:',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'pdf_text',
			[
				'label' => __( 'pdf text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'pdf_link',
			[
				'label' => __( 'Insert pdf link from media', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'pdfs',
			[
				'label' => __( 'Add pdf item', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->add_control(
			'inquiry_btn',
			[
				'label' => __( 'Button Text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Make an Enquiry',
			]
		);

		$this->add_control(
			'inquiry_link',
			[
				'label' => __( 'Button link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = '
		<div class="download-box wow fadeInUp" data-wow-duration="2s">';
			if (!empty($settings['download_text'])) {
				$html .= '<strong>'.$settings['download_text'].'</strong>';
			}
	
			if (!empty($settings['pdfs'])) : foreach ($settings['pdfs'] as $pdf) :
				$html .= '
				<div class="link">
					<a href="'.$pdf['pdf_link'].'">'.$pdf['pdf_text'].'</a>
				</div>';
			endforeach; endif;
			
			if (!empty($settings['inquiry_btn'])) {
				$html .= '
				<div class="download-btn">
					<a href="'.$settings['inquiry_link'].'" class="boxed-btn">'.$settings['inquiry_btn'].'</a>
				</div>';
			}
			$html .= '
		</div>';
		echo $html;
	}
}

/**
 * Tabs Widget.
 */
class Msiit_Tabs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'msiit-tabs';
	}

	public function get_title() {
		return __( 'Msiit Tabs', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'tab_id',
			[
				'label' => __( 'Tab ID name (small letter)', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'description',
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Description',
			]
		);

		$repeater->add_control(
			't_content',
			[
				'label' => __( 'tab content', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'msiit_tabs',
			[
				'label' => __( 'Tabs', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if (!empty($settings['msiit_tabs'])) {
			$html = '
			<div class="msiit-tabs wow fadeInUp" data-wow-duration="2s">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">';
					$i = 0;
					foreach ($settings['msiit_tabs'] as $tab) {
						$i++;
						if ($i == 1) {
							$active_class = 'active';
							$a_select = 'true';
						} else {
							$active_class = '';
							$a_select = '';
						}

						$html .= '<a class="nav-item nav-link '.$active_class.'" id="'.$tab['tab_id'].'-tab" data-toggle="tab" href="#'.$tab['tab_id'].'" role="tab" aria-controls="'.$tab['tab_id'].'" aria-selected="'.$a_select.'">'.$tab['button_text'].'</a>';
					}
					$html .= '
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">';
					$x = 0;
					foreach ($settings['msiit_tabs'] as $contents) {
						$x++;
						if ($x == 1) {
							$show = 'show';
							$ac_class = 'active';
						} else {
							$show = '';
							$active_class = '';
						}
						$html .= '
						<div class="tab-pane fade '.$show.' '.$ac_class.'" id="'.$contents['tab_id'].'" role="tabpanel" aria-labelledby="'.$contents['tab_id'].'-tab">
							'.wpautop( do_shortcode( $contents['t_content'] ) ).'
						</div>
						';
					}
					$html .= '
				</div>
			</div>
			';
		}

		echo $html;
	}
}

/**
 * Elementor Pricing Widget.
 */
class Msiit_Pricing_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'pricing	';
	}

	public function get_title() {
		return __( 'Msisit Pricing Table', 'msiit-toolkit' );
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
				'label' => __( 'Pricing Box', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'box_class', [
				'label' => __( 'Select Box Style', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'	=> [
                	'standered'	=> __('Standered', 'msiit-toolkit'),
                ],
			]
		);

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Pricing Title' , 'msiit-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Pricing list', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Pricing list' , 'msiit-toolkit' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'value', [
				'label' => __( 'Value', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$19.99' , 'msiit-toolkit' ),
			]
		);

		$repeater->add_control(
			'price_btn_text', [
				'label' => __( 'Button text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read more' , 'msiit-toolkit' ),
			]
		);

		$repeater->add_control(
			'price_link', [
				'label' => __( 'Button link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'prices',
			[
				'label' => __( 'Pricings', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if(!empty($settings['prices'])) {
			$html = '<div id="pricing" class="pricing-area padding-top-150 wow fadeInUp" data-wow-duration="2s">
				<div class="container">
					<div class="row>
						<div class="col">';
						foreach ($settings['prices'] as $price) {
							$html .= '
							<div class="pricing-box '.$price['box_class'].'">
								<div class="pricing-box-inner">
									<h3>'.$price['title'].'</h3>
									'.$price['content'].'
									<strong>'.$price['value'].'</strong>
									
									<a href="'.$price['price_link'].'" class="btn boxed-btn">'.$price['price_btn_text'].'</a>
								</div>
							</div>';
						}
						$html .= '</div>
						</div>
					</div>
				</div>
			</div>';
		} else {
			$html = '<div class="alert alert-warning">Please add pricing box.</div>';
		}

		echo $html;
	}
}

/**
 * Elementor Testimonials Widget.
 */
class Msiit_Testimonial_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'testimonial';
	}

	public function get_title() {
		return __( 'Msiit Testimonials', 'msiit-toolkit' );
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
				'label' => __( 'Testimonials', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'msiit-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'test_image', [
				'label' => __( 'Image', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'name', [
				'label' => __( 'Name', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'desig', [
				'label' => __( 'Designation', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$this->add_control(
			'testis',
			[
				'label' => __( 'Testimonial Box', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if(!empty($settings['testis'])) {
			$html = '<div id="testimonials" class="testimonials-area wow fadeInUp" data-wow-duration="2s">
				<div class="container">
					<div class="row>
						<div class="col">
							<div class="testimonial-carousel slider">';
							foreach ($settings['testis'] as $testi) {
								$html .= '
								<div class="single-testimonial-box">
									<div class="testimonial-top-content">
										<h4>'.$testi['title'].'</h4>
										'.$testi['content'].'
										<img src="'.wp_get_attachment_image_url( $testi['test_image']['id'], 'thumbnail' ).'" alt="'.$testi['name'].'">
									</div>
									<div class="testimonial-bottom-content">
										<h5>'.$testi['name'].'</h5>
										<span>'.$testi['desig'].'</span>

										<div class="stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
								</div>';
							}
							$html .= '</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		} else {
			$html = '<div class="alert alert-warning">Please add testimonial box.</div>';
		}

		echo $html;
	}
}


// Blog post widget
class Msiit_Posts_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'msiit-posts';
	}

	public function get_title() {
		return __( 'Msiit Blog Posts', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'count',
			[
				'label' => __( 'Post count', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '5',
			]
		);

        $this->add_control(
            'columns',
            [
                'label' => __( 'Columns', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '6'  => __( '6 Columns', 'msiit-toolkit' ),
                    '4'  => __( '4 Columns', 'msiit-toolkit' ),
                    '3'  => __( '3 Columns', 'msiit-toolkit' ),
                    '2'  => __( '2 Columns', 'msiit-toolkit' ),
                    '1'  => __( '1 Columns', 'msiit-toolkit' ),
                ],
            ]
        );

        $this->add_control(
            'cat_ids',
            [
                'label' => __( 'Select Categories', 'msiit-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => msiit_post_cat_list(),
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ($settings['cat_ids']) {
			$q = new WP_Query( array(
				'post_type'	=> 'post', 
				'posts_per_page' => $settings['count'],
				'tax_query'	=> array(
					array(
						'taxonomy'	=> 'category',
						'field'		=> 'term_id',
						'terms'		=> $settings['cat_ids']
					)
				),
			) );
		} else {
			$q = new WP_Query( array(
				'post_type'	=> 'post', 
				'posts_per_page' => $settings['count']
			) );
		}


		if($settings['columns'] == '6') {
            $columns_markup = 'col-lg-2 col-md-6 col-sm-12';
        } else if($settings['columns'] == '4') {
            $columns_markup = 'col-lg-3 col-md-6 col-sm-12';
        } else if($settings['columns'] == '3') {
            $columns_markup = 'col-lg-4 col-md-6 col-sm-12';
        } else if($settings['columns'] == '2') {
            $columns_markup = 'col-lg-6 col-md-6 col-sm-12';
        } else {
            $columns_markup = 'col';
        }

		$html = '<div class="row no-gutters wow fadeInUp" data-wow-duration="2s">';
		while($q->have_posts()) : $q->the_post();
			$post_id = get_the_ID();

			$html .= '
			<div class="'.$columns_markup.' text-center">
				<div class="msiit-section-blog">
					<div class="section-blog-img" style="background-image:url('.get_the_post_thumbnail_url($post_id, 'large').')"></div>
					<div class="section-blog-content">
						<h3 class="entry-title">
							<a href="'.get_the_permalink($post_id).'">'.get_the_title( $post_id ).'</a>
						</h3>
						<p class="entry-date blog-date">'.get_the_date( 'd.m.Y' ).'</p>
					</div>
				</div>
			</div>
			';
		endwhile; 
		$html .= '</div>';
		wp_reset_query();

		echo $html;
	}
}



// Image box widget
class Msiit_ImgBox_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'msiit-imgbox';
	}

	public function get_title() {
		return __( 'Msiit Image Box', 'msiit-toolkit' );
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
				'label' => __( 'Content', 'msiit-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default title',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'attribute_name', [
				'label' => __( 'Attribute name', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'J Series 5.0 – 8.5t' , 'msiit-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'img_btn_text', [
				'label' => __( 'Button text', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Find out more >>>' , 'msiit-toolkit' ),
			]
		);

		$repeater->add_control(
			'img_btn_link', [
				'label' => __( 'Button link', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'image', [
				'label' => __( 'Upload Image', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'image_boxs',
			[
				'label' => __( 'Image Boxes', 'msiit-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$html = '<div class="row image-boxes wow fadeInUp" data-wow-duration="2s"><div class="col-sm-12">';
			if (!empty($settings['title'])) { $html .= '<h4>'.$settings['title'].'</h4>'; }
			$html .= '</div>';
			if(!empty($settings['image_boxs'])) : foreach($settings['image_boxs'] as $box) :
				$html .= '
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="msiit-image-box">';
						if(!empty($box['image'])) :
							$html .= '<img src="'.wp_get_attachment_image_url( $box['image']['id'], 'full').'" alt="'.$box['attribute_name'].'" title="'.$box['attribute_name'].'">';
						endif;
						$html .= '
						<div class="image-box-content">
							<strong>'.$box['attribute_name'].'</strong>
							<a href="'.$box['img_btn_link'].'">'.$box['img_btn_text'].'</a>
						</div>
					</div>
				</div>';
			endforeach; endif;
		$html .= '</div>';
		echo $html;
	}
}




/**
 * WooCommerce Widgets.
 */
if (class_exists('WooCommerce')) {

	function msiit_product_cat_list( ) {
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

    function msiit_product_list() {
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

    // Specific categories product
	class Msiit_SpacifiCat_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'msiit-spacificcat';
		}

		public function get_title() {
			return 'Msiit Spacific Category';	
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
                    'label' => __( 'Product limit', 'msiit-toolkit' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default'	=> '4',
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Columns', 'msiit-toolkit' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '4'  => __( '4 Columns', 'msiit-toolkit' ),
                        '3'  => __( '3 Columns', 'msiit-toolkit' ),
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
	            	'options'	=> msiit_product_cat_list(),
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
			
			<div class="row product-sc-wrapper wow fadeInUp" data-wow-duration="2s">';
			while($q->have_posts()) : $q->the_post();
				global $product;

				$html .= '
				<div class="'.$columns_markup.' single-sc-product">
					<h4>'.get_the_title().'</h4>
					<a href="'.get_permalink().'" class="product-sc">
						<img class="product-sc-thumb" src="'.get_the_post_thumbnail_url( get_the_ID(), 'full' ).'" alt="'.get_the_title().'" title="'.get_the_title().'">
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

}
