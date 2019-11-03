<?php get_header(); 
/*
	Template Name: Case Studies
*/
?>

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
				<div class="main-case-studies-content">
					<h2><?php _e( 'UX Case Studies', 'text-domain' ); ?></h2>
					<div class="row">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array( 'post_type' => 'case_studies', 'posts_per_page' => 3, 'paged=' . $paged );
	    				$loop = new WP_Query( $args );
	    				if($loop->have_posts()) :
							while ($loop->have_posts()) : $loop->the_post(); ?>
								<div class="col-md-6">
									<div class="single-case-studies-item">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'medium' ); ?>
										</a>
										<div class="single-case-studies-content">
											<h2 title="Read more">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
											<!-- <?php the_excerpt(); ?> -->
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