<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Industry_RRFOnline
 */

get_header(); ?>


<!-- <?php if(has_post_thumbnail() ) : ?> style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);" <?php endif; ?> -->
<?php while ( have_posts() ) : the_post(); ?>
<div class="breadcamp-area-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col">
				<div class="single-breacrumb-inner">
					<div class="category"><?php the_category(', '); ?></div>
					<h2><?php the_title(); ?></h2>
					<div class="entry-meta">
						<?php
						echo get_avatar( get_the_author_meta( 'ID' ), 32 );
						industry_rrfonline_posted_by();

						?>
					</div><!-- .entry-meta -->
				</div>
			</div>
		</div>
	</div>
</div>

<div id="primary" class="content-area theme-padding-area case-studis-single content-single">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2 col-sm-12">
					<div class="content-single-inner">
						<?php echo do_shortcode( '[TheChamp-Sharing]' ); ?>
						<?php
							get_template_part( 'template-parts/content', get_post_type() );

							// the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php endwhile; // End of the loop. ?>



<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 col-sm-12">
			<?php echo do_shortcode( '[get_free_courses]' ); ?>
		</div>
	</div>
</div>

<div class="container single-page-hr">
	<div class="row">
		<div class="col-md-8 offset-md-2 col-sm-12">
			<hr>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 col-sm-12">
			<div class="check-out-other-post"><?php _e( 'Check out these other posts', 'brendan' ); ?></div>
			<?php
				echo do_shortcode( '[brendan_posts]' );
			?>
		</div>
	</div>
</div>

<?php
get_footer();
