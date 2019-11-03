<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 


function findgo_show_tag_id_and_desc(){
$tags = get_terms( array("job_listing_tag"), array("orderby"=>"count","order"=>"DESC"));
if ( !empty( $tags ) && !is_wp_error( $tags ) ) :
echo '<div class="job-listing-tags">';
foreach ( $tags as $tag ) :
echo '<a href="'.get_tag_link( $tag->term_id ).'">' . $tag->name . '(' . $tag->count . ')</a>';
echo '<p>' . $tag->description . '</p>';
endforeach;
echo '</div>';
endif;
}
add_shortcode( 'tags_show', 'findgo_show_tag_id_and_desc' );


//SHORTCODE
function wpb_tag_desc() { 
	ob_start();

$tags = get_tags( array( 'hide_empty' => false ) );
	if ($tags) {
	  foreach ($tags as $tag) {
		if ($tag->description) {
		  echo '<dt><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></dt><dd>' . $tag->description . '</dd>';
		}
	  }
	} 
?>

<?php return ob_get_clean(); }
add_shortcode('wpb_tags', 'wpb_tag_desc');


//OUTPUT
//<?php echo do_shortcode('[wpb_tags]'); 

function findgo_show_tag_and_desc($atts, $content = null) {


	$tags = get_terms('job_listing_tag', array(
		'hide_empty' => false,
	));

	$tag_markup = '';

	if (!empty($tags)) {
		$tag_markup .= '<div class="row tag-shortcode">';
		foreach ($tags as $tag) { 
			if($tag->description) {
			 	$tag_markup .= '<div class="col-lg-4">
					<div class="single-tag-box">
						<a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'(' . $tag->count . ')</a>
						<p class="tag-desc">'.$tag->description.'</p>
					</div>
			 	</div>';
			}
		}
		$tag_markup .= '</div>'; 
	}

	return $tag_markup;
}
add_shortcode( 'show_tags_desc', 'findgo_show_tag_and_desc' );

function findgo_tag_show_with_list_desc_shortcode($atts, $content = null) {
	shortcode_atts( 
		array(
			'tag_ids' => '',
			'count'	  => '',
	), $atts );

	// $q = new WP_Query( array(
	// 	'posts_per_page'	=> $count,
	// 	'post_type'		=> 'job_listing',
	// 	'tax_query'		=> array(
	// 		array(
	// 			'taxonomy'	=> 'job_listing_tag',
	// 			'field'		=> 'term_id',
	// 			'terms'		=> array('tag_ids'),
	// 		),
	// 	),
	// ) );

	$args = array(
	    'post_type' => 'post',
	    'tax_query' => array(
	        array(
	            'taxonomy' => 'post_tag',
	            'field' => 'id',
	            'terms' => array( 1,2,3 ), 
	            'operator' => 'NOT IN'
	        )
	    )
	);
	$query = new WP_Query( $args );

	$list = '<div class="row">';

	while($query->have_posts()) : $query->the_post();
		$tags = get_terms( array('post_tag'), array() );
		if(!empty($tags)) {
			foreach ($tags as $tag) {
				$list .= '<div class="col-lg-4">
					<div class="single-tag-box2">
						<a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'('.$tag->count.')</a>
						<p>'.$tag->description.'</p>
					</div>
				</div>';
			}
		}
		
	endwhile;
	$list .= '</div>';
	wp_reset_query();
	return $list;
}
add_shortcode( 'tags_show_with_list_desc', 'findgo_tag_show_with_list_desc_shortcode' );


