<?php
/**
 * Elementor Pricing Widget.
 */
class Codermsiit_Pricing_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'pricing	';
	}

	public function get_title() {
		return __( 'Codermsiit Pricing Table', 'codermsiit' );
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
                	'standered'	=> __('Standered', 'codermsiit'),
                	'simple'	=> __('Simple', 'codermsiit'),
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
			'title_small', [
				'label' => __( 'Title small text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
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
			'value_small', [
				'label' => __( 'Value small text', 'codermsiit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
			$html = '<div class="pricing-area">';
				foreach ($settings['prices'] as $price) {
					$html .= '
					<div class="pricing-box '.$price['box_class'].' text-center">
						<div class="pricing-box-inner">
							<div class="price-title">';
								if(!empty($price['title'])) {
									$html .= ''.$price['title'].'';
								}

								if(!empty($price['title_small'])) {
									$html .= '<small>'.$price['title_small'].'</small>';
								}
							$html .= '</div>';
							
							$html .= '<div class="price-text">';
								if(!empty($price['value'])) {
									$html .= '<strong>'.$price['value'].'</strong>';
								}

								if(!empty($price['title_small'])) {
									$html .= '<small>'.$price['value_small'].'</small>';
								}
							$html .= '</div>';

							if(!empty($price['content'])) {
								$html .= ''.$price['content'].'';
							}

							if(!empty($price['price_link'])) {
								$html .= '
								<div class="pricing-button">
									<a href="'.$price['price_link'].'" class="btn boxed-btn">'.$price['price_btn_text'].'</a>
								</div>';
							}

						$html .= '
						</div>
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
