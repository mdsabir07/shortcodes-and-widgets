<?php
/**
 * Elementor Pricing Widget.
 */
class Elementor_Pricing_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'pricing	';
	}

	public function get_title() {
		return __( 'Pricing Table', 'codermsiit' );
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
				'label' => __( 'Pricing Box', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'box_class', [
				'label' => __( 'Select Box Style', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'	=> [
                	'standered'	=> __('Standered', 'avocado-toolkit'),
                ],
			]
		);

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Pricing Title' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Pricing list', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Pricing list' , 'codermsiit' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'value', [
				'label' => __( 'Value', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$19.99' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'price_btn_text', [
				'label' => __( 'Button text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read more' , 'codermsiit' ),
			]
		);

		$repeater->add_control(
			'price_link', [
				'label' => __( 'Button link', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'prices',
			[
				'label' => __( 'Pricings', 'codermsiit' ),
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
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'testimonial';
	}

	public function get_title() {
		return __( 'Malp Testimonials', 'codermsiit' );
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
				'label' => __( 'Testimonials', 'codermsiit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'codermsiit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'test_image', [
				'label' => __( 'Image', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'name', [
				'label' => __( 'Name', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'desig', [
				'label' => __( 'Designation', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Add Star', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'include' => [
					'fa fa-star',
				],
			]
		);

		$this->add_control(
			'testis',
			[
				'label' => __( 'Testimonial Box', 'codermsiit' ),
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
											<i class="'.$testi['icon'].'"></i>
											<i class="'.$testi['icon'].'"></i>
											<i class="'.$testi['icon'].'"></i>
											<i class="'.$testi['icon'].'"></i>
											<i class="'.$testi['icon'].'"></i>
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
