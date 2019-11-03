<?php

class Codercommerce_PorductStitle_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'codercommerce-productstitle';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return __( 'Codercommerce PorductSectionTitle', 'plugin-name' );
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

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default title',
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Default sub title',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Product section title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '
			<div class="product-section-title text-center">
				<h3>'.$settings['title'].'</h3>
				<p>'.$settings['sub_title'].'</p>
				<span class="active"></span>
				<span></span>
				<span></span>
			</div>
		';
		

	}

}
