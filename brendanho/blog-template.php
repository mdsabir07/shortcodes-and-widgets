<?php
/**
 * Template Name: Blog Post
 */

get_header(); ?>


<?php the_content(); ?>

<div class="blgo-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h5 style="opacity: 0.5;font-size: 18px;"><?php _e( 'BLOG MENU' ); ?></h5>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'blog',
					) );
	            ?>
			</div>
			<div class="col-md-9">
				<div class="main-free-resource-content">
					<h2><?php _e( 'All Articles', 'text-domain' ); ?></h2>
					<div class="row">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'paged=' . $paged );
	    				$loop = new WP_Query( $args );
	    				if($loop->have_posts()) :
							while ($loop->have_posts()) : $loop->the_post(); ?>
								<div class="col-sm-12">
					                <div class="brendan-single-post-block">
					                	<a class="sin-post-link" href="<?php the_permalink(); ?>" style="background-image: url('<?php the_post_thumbnail_url(get_the_ID(), 'medium' ) ?>');"></a>
					                    <div class="post-block-content">
						                    <h2 title="Read more">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
						                    <div class="post-block-excerpt"><?php the_excerpt(); ?></div>
					                    </div>    
					                </div>
					            </div> 
							<?php endwhile; ?>
						<?php endif; wp_reset_postdata(); ?>
					</div>
					<nav class="pagination">
				        <?php pagination_bar( $loop ); ?>
				    </nav>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo do_shortcode('[cta]'); ?>

<?php get_footer(); ?>