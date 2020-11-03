<?php 

/**
 * Slider Widget.
 */
class Msiit_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';
	}

	public function get_title() {
		return __( 'CoderMSIit Slider', 'codermsiit' );
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
				'label' => __( 'Slides', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon1', [
				'label' => __( 'Icon 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'icon2', [
				'label' => __( 'Icon 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'title1', [
				'label' => __( 'Title 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title 1' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title2', [
				'label' => __( 'Title 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title 2' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'heading1',
			[
				'label' => __( 'Select heading tag 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
                'options' => [
                    '1'  => __( 'h1', 'codermsiit' ),
                    '2'  => __( 'h2', 'codermsiit' ),
                    '3'  => __( 'h3', 'codermsiit' ),
                    '4'  => __( 'h4', 'codermsiit' ),
                    '5'  => __( 'h5', 'codermsiit' ),
                    '6'  => __( 'h6', 'codermsiit' ),
                ],
			]
		);

		$repeater->add_control(
			'heading2',
			[
				'label' => __( 'Select heading tag 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
                'options' => [
                    '1'  => __( 'h1', 'codermsiit' ),
                    '2'  => __( 'h2', 'codermsiit' ),
                    '3'  => __( 'h3', 'codermsiit' ),
                    '4'  => __( 'h4', 'codermsiit' ),
                    '5'  => __( 'h5', 'codermsiit' ),
                    '6'  => __( 'h6', 'codermsiit' ),
                ],
			]
		);

		$repeater->add_control(
			'content1', [
				'label' => __( 'Content 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Slide Content 1' , 'codermsiit' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content2', [
				'label' => __( 'Content 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Slide Content 2' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'font_size', [
				'label' => __( 'Content font size', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '18' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'slide_btn_text1', [
				'label' => __( 'Button text 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Learn more' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'slide_btn_text2', [
				'label' => __( 'Button text 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Learn more' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'slide_link1', [
				'label' => __( 'Button link 1', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slide_link2', [
				'label' => __( 'Button link 2', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slide_bg', [
				'label' => __( 'Slide background', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'slide_height', [
				'label' => __( 'Slide height (exm: 300)', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Title #1', 'codermsiit' ),
						'slide_btn_text' => __( 'Read more' , 'codermsiit' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Slider Settings', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fade',
			[
				'label' => __( 'Fade effect?', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'codermsiit' ),
				'label_off' => __( 'No', 'codermsiit' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop?', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'codermsiit' ),
				'label_off' => __( 'No', 'codermsiit' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'arrows',
			[
				'label' => __( 'Show arrows?', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'codermsiit' ),
				'label_off' => __( 'No', 'codermsiit' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label' => __( 'Show dots?', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'codermsiit' ),
				'label_off' => __( 'No', 'codermsiit' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay?', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'codermsiit' ),
				'label_off' => __( 'No', 'codermsiit' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_time',
			[
				'label' => __( 'Autoplay time', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Sliding speed', 'codermsiit' ),
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
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="slide-content-box">';
									    if(!empty($slide['title1'])) :
									    $html .= '
										<div class="slide-content" style="font-size:'.$slide['font_size'].'px">
											<div class="slider-icon">
												<img src="'.wp_get_attachment_image_url( $slide['icon1']['id'], 'thumbnail' ).'" alt="'.$slide['title1'].'">
											</div>
											<h'.$slide['heading1'].' class="slide-title">'.$slide['title1'].'</h'.$slide['heading1'].'>
											'.( $slide['content1'] ).'

											<a target="_blank" href="'.$slide['slide_link1'].'" class="boxed-btn">'.$slide['slide_btn_text1'].'</a>
										</div>';
										endif;
										$html .= '
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="slide-content-box">';
									    if(!empty($slide['title2'])) :
									    $html .= '
										<div class="slide-content" style="font-size:'.$slide['font_size'].'px">
											<div class="slider-icon">
												<img src="'.wp_get_attachment_image_url( $slide['icon2']['id'], 'thumbnail' ).'" alt="'.$slide['title2'].'">
											</div>
											<h'.$slide['heading2'].' class="slide-title">'.$slide['title2'].'</h'.$slide['heading2'].'>
											'.( $slide['content2'] ).'

											<a target="_blank" href="'.$slide['slide_link2'].'" class="boxed-btn">'.$slide['slide_btn_text2'].'</a>
										</div>';
										endif;
										$html .= '
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
 * Services Widget.
 */
class Msiit_Services_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'services';
	}

	public function get_title() {
		return __( 'CoderMSIit Services', 'codermsiit' );
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
				'label' => __( 'Services', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Service Title' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subtitle', [
				'label' => __( 'Sub Title', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Service sub Title' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Content' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'font_size', [
				'label' => __( 'Content font size', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '18' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'btn_text', [
				'label' => __( 'Button text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'btn_link', [
				'label' => __( 'Button link', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'box_class', [
				'label' => __( 'Select Box Style', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'	=> [
                	'simple'	=> __('Simple', 'codermsiit'),
                	'standered'	=> __('Standered', 'codermsiit'),
                ],
			]
		);

		$this->add_control(
			'services',
			[
				'label' => __( 'Services', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if (!empty($settings['services'])) {
			$html = '';
			$html .= '<div class="container">
			<div class="row justify-content-center text-center">';
				foreach ($settings['services'] as $service) {
					$html .= '
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="service-box '.$service['box_class'].'">
							<div class="service-box-inner">';
							    if(!empty($service['title'])) :
								    $html .= '
									<div class="service-content" style="font-size:'.$service['font_size'].'px">
										<h3 class="service-title">'.$service['title'].'</h3>
										<h5 class="service-sub-title">'.$service['subtitle'].'</h5>
										'.wpautop( $service['content'] ).'

										<a href="'.$service['btn_link'].'" class="readmore-btn service-btn">
											'.$service['btn_text'].' <i class="fa fa-angle-double-right"></i>
										</a>
									</div>';
								endif;
								$html .= '
							</div>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>';
				}
				$html .= '
			</div></div>';
		} else {
			$html = '<div class="alert alert-warning">Please add services.</div>';
		}

		echo $html;
	}
}

/**
 * Accordion Widget.
 */
class Msiit_Accordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'accordions';
	}

	public function get_title() {
		return __( 'CoderMSIit Accordion', 'codermsiit' );
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
				'label' => __( 'Accordion', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Accordion Title' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'price', [
				'label' => __( 'Price', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Accordion Price' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'heading_text', [
				'label' => __( 'Header text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Header text' , 'codermsiit' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'header_color',
			[
				'label' => __( 'Select header background color', 'codermsiit' ),
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

		$repeater->add_control(
			'content', [
				'label' => __( 'Body content', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Body content' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'btn_text', [
				'label' => __( 'Button text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'btn_link', [
				'label' => __( 'Button link', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);


		$repeater->add_control(
			'body_color',
			[
				'label' => __( 'Select body background color', 'codermsiit' ),
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
			'accordions',
			[
				'label' => __( 'Accordion', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if (!empty($settings['accordions'])) {
		$html = '';

			$html .= '
			<div id="accordion">';
				$i = 0;
				$collapse_no = 0;
				$heading_no = 0;
				foreach ($settings['accordions'] as $accordion) {
					$i++;
					if ($i == 1) {
						$show = 'show';
						$heading_class = '';
						$a_expanded = 'true';
					} else {
						$show = '';
						$heading_class = 'collapsed';
					}
					$collapse_no++;
					$heading_no++;
					$html .= '
					<div class="card">
						<div class="card-header" id="heading-'.$heading_no.'" style="background-color: '.$accordion['header_color'].'">
							<div class="mb-0">
								<a class="'.$heading_class.'" role="button" data-toggle="collapse" href="#collapse-'.$collapse_no.'" aria-expanded="'.$a_expanded.'" aria-controls="collapse-'.$collapse_no.'">';

									if (!empty($accordion['price'])) {
										$html .= '<div class="heading title d-inline">'.$accordion['title'].'</div>';
									}

									if (!empty($accordion['price'])) {
										$html .= '<div class="heading price d-inline float-right">'.$accordion['price'].'</div>'; 
									}

									if (!empty($accordion['price'])) {
										$html .= ''.wpautop( $accordion['heading_text'] ).'';
									}
									$html .= '
								</a>
							</div>
						</div>
						<div id="collapse-'.$collapse_no.'" class="collapse '.$show.'" data-parent="#accordion" aria-labelledby="heading-'.$heading_no.'" style="background-color: '.$accordion['body_color'].'">
							<div class="card-body">';

								if (!empty($accordion['content'])) {
									$html .= ''.do_shortcode( $accordion['content'] ).'';
								}

								if (!empty($accordion['btn_link'])) {
									$html .= '
									<a href="'.$accordion['btn_link'].'" class="boxed-btn float-right">
										'.$accordion['btn_text'].'
									</a>';
								}
								$html .= '
							</div>
						</div>
					</div>';
				}
				$html .= '</div>';
		} else {
			$html = '<div class="alert alert-warning">Please add accordions.</div>';
		}
		echo $html;
	}
}