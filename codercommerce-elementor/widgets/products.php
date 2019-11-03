<?php

function codercommerce_product_cat_list() {
	$term_id = 'product_cat';
	$categories = get_terms($term_id);

	$cat_array['all'] = "All Categories";
	if(!empty($categories)) {
		foreach ($categories as $cat) {
			$cat_info = get_term($cat, $term_id);
			$cat_array[$cat_info->slug] = $cat_info->name;
		}
	}
	return $cat_array;
}

class Codercommerce_Products_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'codercommerce-products';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return __( 'Codercommerce Products', 'plugin-name' );
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
	 * Register Products widget controls.
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
			'limit',
			[
				'label' => __( 'Count', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '4',
			]
		);

		$this->add_control(
			'columns',
			[
				'label' => __( 'columns', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'1'  => __( '1 Column', 'plugin-domain' ),
					'2' => __( '2 Columns', 'plugin-domain' ),
					'3' => __( '3 Columns', 'plugin-domain' ),
					'4' => __( '4 Columns', 'plugin-domain' ),
				],
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __( 'Select category', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => codercommerce_product_cat_list(),
				'default' => [ 'all' ],
			]
		);

		$this->add_control(
			'carousel',
			[
				'label' => __( 'Enable carousel?', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Carousel Settings', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition'	=> [
					'carousel' => 'yes',
				],
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
	 * Render Products widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if (empty($settings['category']) OR $settings['category'] == 'all') {
			$cats = '';
		} else {
			$cats = implode(',', $settings['category']);
		}

		if ($settings['carousel'] == 'yes') {
			$dynamic_id = rand(345346,3425345);
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
					jQuery(window).load(function() {
						jQuery("#product-carousel-'.$dynamic_id.' .products").slick({
							slidesToShow: '.$settings['columns'].',
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
				<div id="product-carousel-'.$dynamic_id.'">
			';
		}

		echo do_shortcode( '[products category="'.$cats.'" limit="'.$settings['limit'].'" columns="'.$settings['columns'].'"]' );

		if ($settings['carousel'] == 'yes') { echo '</div>'; }
		

	}

}
