<?php 

function stockmsiit_projects_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'theme'		=> 1
	), $atts ));

	$project_categories = get_terms( 'project_cat' );

	$dynamic_number = rand(455234563, 3425634665);

	$stockmsiit_projects_markup = '
	
	<script>
		jQuery(document).ready(function($){
			$(".stockmsiit-project-s-active li").click(function(){

				$(".stockmsiit-project-s-active li").removeClass("active");
				$(this).addClass("active");

				var selector = $(this).attr("data-filter");
				$(".project-list-'.esc_attr($dynamic_number).'").isotope({
					filter: selector,
				});
			});
		});
		
		jQuery(window).load(function() {
			jQuery(".project-list-'.esc_attr($dynamic_number).'").isotope();
		});
	</script>

	<div class="row m-bottom">';

		if ($theme == '1') {
		 	$stockmsiit_projects_markup .='<div class="col-lg-3">';
		 	$project_list_class = 'stockmsiit-project-shortlist';
		} else {
		 	$stockmsiit_projects_markup .='<div class="col-lg-12">';
		 	$project_list_class = 'stockmsiit-project-shortlist-2';
		}

		$stockmsiit_projects_markup .='
			<ul class="stockmsiit-project-s-active '.esc_attr( $project_list_class ).' stockmsiit-project-shortlist-'.esc_attr($theme).'">
				<li class="active" data-filter="*">'.esc_html_e( 'All Project', 'stockmsiit' ).'</li>';

				if(!empty($project_categories && ! is_wp_error( $project_categories ) )) {
					foreach ($project_categories as $category) {
						$stockmsiit_projects_markup .='<li data-filter=".'.$category->slug.'">'.$category->name.'</li>';
					}
				}

			$stockmsiit_projects_markup .='
			</ul>
		</div>';

		if ($theme == '1') {
			$project_column_width = 'col-lg-9';
			$project_inner_column_width = 'col-lg-4 col-sm-6';
		} else {
			$project_column_width = 'col-lg-12';
			$project_inner_column_width = 'col-lg-3 col-sm-6';
		}

		$stockmsiit_projects_markup .='
		<div class="'.esc_attr( $project_column_width ).'">
			<div class="row m-bottom project-list-'.esc_attr($dynamic_number).'">';
			$projects_array = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'project'));

			while($projects_array->have_posts()) : $projects_array->the_post();

				$project_category = get_the_terms( get_the_ID(), 'project_cat' );

				if ($project_category && ! is_wp_error( $project_category )) {
					$project_cat_list = array();

					foreach ($project_category as $category) {
						$project_cat_list[] = $category->slug;
					}
					$project_assigned_cat = join( " ", $project_cat_list );

				} else {
					$project_assigned_cat = '';
				}

				$stockmsiit_projects_markup .='
				<div class="'.esc_attr( $project_inner_column_width ).' '.esc_attr( $project_assigned_cat ).'">
					<a href="'.esc_url( get_the_permalink() ).'" class="single-work-box">
						<div class="work-box-bg" style="background-image:url('.esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ).')"><i class="fa fa-link"></i></div>
						<p>'.esc_html(get_the_title()).'</p>
					</a>
				</div>';
			endwhile;
			wp_reset_query();

			$stockmsiit_projects_markup .='
			</div>
		</div>
	</div>
	';

	return $stockmsiit_projects_markup;
}
add_shortcode( 'stockmsiit_projects', 'stockmsiit_projects_shortcode' );