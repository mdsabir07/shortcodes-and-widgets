<?php 

// Project Shortcode start
function intrunk_primium_brands_project_shortcode($atts) {
	extract( shortcode_atts( 
		array(
			'count'		=> -1,
	), $atts ));

	$categories = get_terms( 'product_cat' );
	$dynamic_number = rand(4648456, 65495656);

	$html = '';

	$html .= '
	<script>
		jQuery(document).ready(function($){
			$(".project-shortlist li").click(function(){
				$(".project-shortlist li").removeClass("active");
				$(this).addClass("active");

				var selector = $(this).attr("data-filter");
				$(".project-list-'.$dynamic_number.'").isotope({
					filter: selector,
				});
			});
		});

		jQuery(window).load(function(){
			jQuery("project-list-'.$dynamic_number.'").isotope();
		});
	</script>
	';
	$html .= '
	<div class="row">
		<div class="col">
			<ul class="project-shortlist">
				<li class="active" data-filter="*">All Brands</li>';
				if (!empty($categories && !is_wp_error( $categories ))) {
					foreach ($categories as $category) {
						$html .= '
						<li data-filter=".'.$category->slug.'">'.$category->name.'</li>
						';
					}
				}

				$html .= '
			</ul>
		</div>
		<div class="col-sm-12">
			<div class="row project-list-'.$dynamic_number.' mt-30">';

			$q = new WP_Query(array(
				'posts_per_page' => $count, 
				'post_type' => 'product'
			));

			while ($q->have_posts()) : $q->the_post();
                $post_id = get_the_ID(); 

				$project_category = get_the_terms( get_the_ID(), 'product_cat' );

				if (!empty($project_category && ! is_wp_error( $project_category ))) {
					$project_cat_list = array();

					foreach ($project_category as $category) {
						$project_cat_list[] = $category->slug;
					}
					$project_assigned_cat = join(" ", $project_cat_list);
				} else {
					$project_assigned_cat = '';
				}

                if (get_post_meta( $post_id, 'intrunk_product_options', true )) {
                    $product_meta = get_post_meta( $post_id, 'intrunk_product_options', true );
                } else {
                    $product_meta = array();
                }

                if (array_key_exists('kurian_title', $product_meta)) {
                    $kurian_title = $product_meta['kurian_title'];
                } else {
                    $kurian_title = '';
                }

                

				

				$html .= '
				<div class="col-lg-3 '.esc_attr( $project_assigned_cat ).'">
					<div class="single-project-box">
						<div class="project-box-bg" style="background-image:url('.esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ).')"></div>

						<h4><a href="'.esc_url( get_the_permalink() ).'">'.esc_html(get_the_title()).'</a></h4>
						<p class="kurian-title">'.$kurian_title.'</p>
					</div>
				</div>';
			endwhile;
			wp_reset_query();
				$html .= '
			</div>
		</div>
	</div>
	';

	return $html;
}
add_shortcode( 'primium_brands_project', 'intrunk_primium_brands_project_shortcode' );
// Project shortcode end
