<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Skembedjis
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function skembedjis_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'skembedjis_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function skembedjis_woocommerce_scripts() {
	wp_enqueue_style( 'skembedjis-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'skembedjis-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'skembedjis_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function skembedjis_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'skembedjis_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function skembedjis_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'skembedjis_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function skembedjis_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'skembedjis_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function skembedjis_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'skembedjis_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function skembedjis_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'skembedjis_woocommerce_related_products_args' );

if ( ! function_exists( 'skembedjis_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function skembedjis_woocommerce_product_columns_wrapper() {
		$columns = skembedjis_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'skembedjis_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'skembedjis_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function skembedjis_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'skembedjis_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'skembedjis_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function skembedjis_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area skembedjis-woocommerce">
			<main id="main" class="site-main" role="main">
				<?php if(! is_single()) : ?>
				<div class="intro">
					<div class="light-overlay"></div>
					<div class="row">
						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('
						<p id="breadcrumbs">','</p>
						');
						}
						?> 
						</div>
						<div class="col-lg-8 col-sm-12 col-xs-12 intro-content">
							Our inventory changes regularly, so get in touch today to discuss what material handling equipment is in stock.
						</div>

						<div class="col-lg-4 col-sm-12 col-xs-12 intro-content-contact">
							<div class="callout solid cta text-center padding-top-medium padding-bottom-medium">
								<ul class="no-bullet">
									<p class="no-margin-bottom">Do you have any questions or remarks? Please contact us, we will gladly help you!</p>
									<li>
										
											<h4 class="h3">
												
													<a class="button secondary expanded" href="tel:+35725712265"><i class="fa fa-phone primary-color"></i> 7000 44 40</a>
											</h4>
										
									</li>					
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="container">
					<div class="row">
						<div class="col-lg-9">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'skembedjis_woocommerce_wrapper_before' );

if ( ! function_exists( 'skembedjis_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function skembedjis_woocommerce_wrapper_after() {
			?>
						</div>
						<div class="col-lg-3">

		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'skembedjis_woocommerce_wrapper_after' );

if ( ! function_exists( 'skembedjis_woocommerce_sidebar' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function skembedjis_woocommerce_sidebar() {
			?>
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_sidebar', 'skembedjis_woocommerce_sidebar' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'skembedjis_woocommerce_header_cart' ) ) {
			skembedjis_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'skembedjis_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function skembedjis_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		skembedjis_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'skembedjis_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'skembedjis_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function skembedjis_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'skembedjis' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'skembedjis' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'skembedjis_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function skembedjis_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php skembedjis_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
