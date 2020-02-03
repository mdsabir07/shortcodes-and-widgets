<?php
// product carousel shortcode
function msiit_product_cat_shortcode($atts) {

    extract( shortcode_atts( array(

        'cat_id'            => '',

    ), $atts ));

    global $post, $PIXAD_Autos;

    $Settings = new PIXAD_Settings(); 
	$settings = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

	$validate = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_validation', true ); // Get validation settings

	$showInSidebar = pixad::getsideviewfields($validate);
	$validate = pixad::validation( $validate ); // Fix undefined index notice

    $q = new WP_Query( array(
		'post_type'	=> 'pixad-autos', 
		'tax_query'	=> array(
			array(
				'taxonomy'	=> 'auto-model',
				'field'		=> 'term_id',
				'terms'		=> $cat_id
			)
		),
		'order' => 'DESC',
	) );

    $list = '';

    $list .= '
	<div class="container">
		<div class="row>
			<div class="col">
    			<div class="msiit-pruduct-carousel">';

    while($q->have_posts()) : $q->the_post();

        $post_id = get_the_ID();

        $post_content = get_the_content();

        $comment_args = array( 'status' => 'approve', 'post_id' => get_the_ID(), );
        $comments = get_comments($comment_args);
        $post_rating = [];
        foreach($comments as $comment){
          $post_rating[] = floatval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
        }



        $list .= '
        <div class="msiit_p_cats">

            <div class="card__img">';
	            if( has_post_thumbnail() ):
                    $list .= '
                    <a href="'.get_the_permalink().'">
                		'.get_the_post_thumbnail( get_the_ID(), 'autozone_latest_item', array('class' => 'img-responsive')).'
                	</a>';
                else:
                    $list .= '<img class="no-image" src="'.PIXAD_AUTO_URI .'assets/img/no_image.jpg" alt="no-image">';
                endif;
            $list .= '</div>

            <div class="tmpl-gray-footer">
                <h4>
                	<a href="'.get_the_permalink( $post_id ).'">'.get_the_title().'</a>
                </h4>';

                if( $validate['auto-price_show'] && $PIXAD_Autos->get_meta('_auto_price') ):
                    $list .= '
                    <span class="slider-grid__price_wrap">
                    	<span class="slider-grid__price">
                    		<span>'.wp_kses_post($PIXAD_Autos->get_price()).'</span>
                    	</span>
                    </span>';
                endif;

                if(!empty($post_rating)):
                    $list .= '
                    <div class="star-rating">
                    	<span style="width:'.  esc_html( array_sum($post_rating)/count($post_rating) * 20 ).'%"></span>
                    </div>';
                endif;

                $list .= '
                <ul class="msiit_p_cats__info list-unstyled">';
	                foreach ($showInSidebar as $id => $sideAttribute):
	                    $id='_'.$id; 
	                    $id = str_replace('-', '_', $id);
	                    if( $PIXAD_Autos->get_meta($id) ):                     
	                        $list .= '
	                        <li>
	                        	<i class="'.  esc_html($sideAttribute['icon']).'"></i>'.  
	                            wp_kses_post(ucfirst($PIXAD_Autos->get_meta($id))) .
	                        '</li>';  
	                    endif; 
	                endforeach;
                $list .= '</ul>
            </div>

        </div>';
    endwhile;

    $list .= '</div></div></div></div>';
    wp_reset_query();

    return $list;
}
add_shortcode( 'msiit_p_cats', 'msiit_product_cat_shortcode' );