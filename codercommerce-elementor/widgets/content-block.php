<?php

class Codercommerce_ContentBlock_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'codercommerce-contentblock';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return __( 'Codercommerce ContentBlock', 'plugin-name' );
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
			'theme',
			[
				'label' => __( 'Theme style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Theme 1', 'plugin-domain' ),
					'2' => __( 'Theme 2', 'plugin-domain' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Girl Lookbook 2015',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Default content',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Background image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Select icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-angle-double-right',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
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

		if ($settings['link']['is_external'] == true) {
			$target = '_blank';
		} else {
			$target = '_self';
		}
		echo '
			<div class="content-block content-block-theme'.$settings['theme'].'">
				<div class="content-block-bg" style="background-image: url('.wp_get_attachment_image_url( $settings['image']['id'], 'large' ).')"></div>
				<div class="content-block-content">
					'.wpautop( $settings['content'] ).'
					<h6>'.$settings['title'].'</h6>
					<a href="'.$settings['link']['url'].'" target="'.$target.'"><i class="'.$settings['icon'].'"></i></a>
				</div>
			</div>
		';
		

	}

}
