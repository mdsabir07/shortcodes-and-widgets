<?php

class Codercommerce_Slider_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'codercommerce-slider';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return __( 'Codercommerce Slider', 'plugin-name' );
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
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Slide Content' , 'plugin-domain' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'slide_desc',
			[
				'label' => __( 'Slide description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'slide_image',
			[
				'label' => __( 'Slide Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'show_label' => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Slide #1', 'plugin-domain' ),
						'list_content' => __( 'Slide content', 'plugin-domain' ),
					],
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Slider Settings', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fade',
			[
				'label' => __( 'Fade effect?', 'plugin-name' ),
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
				'label' => __( 'Loop?', 'plugin-name' ),
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
				'label' => __( 'Show arrows?', 'plugin-name' ),
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
				'label' => __( 'Show dots?', 'plugin-name' ),
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
				'label' => __( 'Autoplay?', 'plugin-name' ),
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
				'label' => __( 'Autoplay time', 'plugin-name' ),
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
				'label' => __( 'Sliding speed', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3000',
				'condition'	=> [
					'autoplay' => 'yes',
				],
			]
		);

		$this->end_controls_section();


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ($settings['slides']) {

			$slides_id = rand(23423, 432545);
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

				echo '
					<script>
						jQuery(document).ready(function($) {
							$("#slides-'.$slides_id.'").slick({
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

			echo '<div id="slides-'.$slides_id.'" class="slides">';
			foreach ($settings['slides'] as $slide) {
				echo '
					<div class="single-slide-item" style="background-image: url('.wp_get_attachment_image_url( $slide['slide_image']['id'], 'large' ).');">
						<div class="row">
							<div class="col my-auto">
								'.wpautop( $slide['slide_content'] ).'
							</div>
						</div>
						<div class="slide-info">
							<h4>'.$slide['slide_title'].'</h4>
							'.$slide['slide_desc'].'
						</div>
					</div>
				';
			}
			echo '</div>';
		}
		

	}

}
