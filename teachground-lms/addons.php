<?php 

function teachground_lms_cat_list( ) {
    $elements = get_terms( 'tg_course_category', array('hide_empty' => false) );
    $tg_course_cat_array = array();

    if ( !empty($elements) ) {
        foreach ( $elements as $element ) {
            $info = get_term($element, 'tg_course_category');
            $tg_course_cat_array[ $info->term_id ] = $info->name;
        }
    }
    return $tg_course_cat_array;
}

/**
 * Course test.
 */
class Course_List_Lms extends \Elementor\Widget_Base {

	public function get_name() {
		return 'course-list';
	}

	public function get_title() {
		return __( 'Course List New', 'teachground-lms' );
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
				'label'	=> __('Configuration', 'teachground-lms'),
				'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'show_cat_filter',
			[
				'label' => __( 'Show category filter', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'category_label',
			[
				'label'	=> __('Categories label', 'teachground-lms'),
				'tab'	=> \Elementor\Controls_Manager::TEXT,
				'default'	=> 'Category: ...',
			]
		);
		$this->add_control(
            'cat_ids',
            [
                'label' => __( 'Select Categories', 'teachground-lms' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => teachground_lms_cat_list()
            ]
        );


		$this->end_controls_section();


		$this->start_controls_section(
			'_section_display_settings',
			[
				'label' => __( 'Settings', 'teachground-lms' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_image',
			[
				'label' => __( 'Show Image', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show Excerpt', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_author',
			[
				'label' => __( 'Show Author', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'course_orderby',
			[
				'label' => __( 'Orderby', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __( 'Date', 'teachground-lms' ),
					'title' => __( 'Title', 'teachground-lms' ),
				]
			]
		);

		$this->add_control(
			'course_order',
			[
				'label' => __( 'Order', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __( 'ASC', 'teachground-lms' ),
					'desc' => __( 'DESC', 'teachground-lms' ),
				]
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'_style_display_settings',
			[
				'label' => __( 'Style Settings', 'teachground-lms' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'category_label_color',
			[
				'label' => __( 'Select label color', 'teachground-lms' ),
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
			'font_family',
			[
				'label' => __( 'Label Font Family', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'font_size', [
				'label' => __( 'Label font size', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '18' , 'teachground-lms' ),
			]
		);
		
		$this->add_control(
			'course_title_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'course_title_color',
			[
				'label' => __( 'Course title color', 'teachground-lms' ),
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
			'course_title_font_family',
			[
				'label' => __( 'Title Font Family', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'course_title_font_size', [
				'label' => __( 'Title font size', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '18' , 'teachground-lms' ),
			]
		);	


		$this->add_control(
			'content_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'teachground-lms' ),
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
			'content_font_family',
			[
				'label' => __( 'Content Font Family', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_font_size', [
				'label' => __( 'Content font size', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '14' , 'teachground-lms' ),
			]
		);
		
		$this->add_control(
			'author_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
			'author_color',
			[
				'label' => __( 'Author color', 'teachground-lms' ),
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
			'author_font_family',
			[
				'label' => __( 'Author Font Family', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'author_font_size', [
				'label' => __( 'Author font size', 'teachground-lms' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '14' , 'teachground-lms' ),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$html = '

		';

		$html .= '
		<section class="project-courses">';
			if ($settings['show_cat_filter'] == 'yes') {
				$html .= '
				<div class="trigger" style="font-family: '.$settings['font_family'].';color:'.$settings['category_label_color'].';font-size:'.$settings['font_size'].'px;">
					'.$settings['category_label'].' <i class="fa fa-caret-down"></i>
				</div>
				<ul class="course-cats hidden">
					<li class="list active" data-filter="all">All</li>';
					foreach ($settings['cat_ids'] as $cat) {
						$cat_info = get_term( $cat, 'tg_course_category' );
						$html .= '<li class="list" data-filter="'.$cat_info->slug.'">'.$cat_info->name.'</li>';
					}
					$html .= '
				</ul>';
			}

			$html .= '
			<div class="tg_course">';
				$q = new WP_Query( array(
					'post_type'	=> 'tg_course',
					'posts_per_page' => '-1',
					'orderby' => $settings['course_orderby'],
					'order' => $settings['course_order'],
				) );

				while($q->have_posts()) : $q->the_post();

					$course_category = get_the_terms( get_the_ID(), 'tg_course_category' );

					if (!empty($course_category && ! is_wp_error( $course_category ))) {
						$course_cat_list = array();

						foreach ($course_category as $category) {
							$course_cat_list[] = $category->slug;
						}
						$course_assigned_cat = join(" ", $course_cat_list);
					} else {
						$course_assigned_cat = '';
					}

					$html .= '
					<div class="itemBx '.esc_attr( $course_assigned_cat ).'">';
						if ($settings['show_image'] == 'yes') {
							$html .= '
							<div class="course-img">
								<img src="'.get_the_post_thumbnail_url( get_the_ID(), 'medium' ).'" alt="'.get_the_title().'">
							</div>
							';
						}

						$html .= '
						<div class="course-content">';
							if ($settings['show_title'] == 'yes') {
								$html .= '
								<div class="course-title">
									<a href="'.get_the_permalink().'">
										<h4 style="font-family: '.$settings['course_title_font_family'].';color:'.$settings['course_title_color'].';font-size:'.$settings['course_title_font_size'].'px;">'.get_the_title().'</h4>
									</a>
								</div>';
							}

							if ($settings['show_excerpt'] == 'yes') {
								$html .= '<div class="course-excerpt" style="font-family: '.$settings['content_font_family'].';color:'.$settings['content_color'].';font-size:'.$settings['content_font_size'].'px;">'.get_the_excerpt().'</div>';
							}

							if ($settings['show_author'] == 'yes') {
								$html .= '
								<div class="course-author">
									'.get_avatar( get_the_author_meta( 'ID' ), 32 ).'
									<span class="author-name" style="font-family: '.$settings['author_font_family'].';color:'.$settings['author_color'].';font-size:'.$settings['author_font_size'].'px;">'.get_the_author().'</span>
								</div>';
							}
							$html .= '
						</div>
					</div>
					<div class="clearfix"></div>
					';
				endwhile; wp_reset_query();
				$html .= '
			</div>';
			$html .= '
		</section>';

		echo $html;
	}
}
