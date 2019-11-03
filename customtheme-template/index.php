<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Industry_RRFOnline
 */

get_header(); ?>


<div class="blogs-breadcamp-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>Startup UX Design Blog</h2>
				<p>Free UX/UI design + marketing resources for startups  🚀</p>
			</div>
		</div>
	</div>
</div>

	<div id="primary" class="content-area theme-padding-area">
		<main id="main" class="site-main">

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="theme-article-list">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>

				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();