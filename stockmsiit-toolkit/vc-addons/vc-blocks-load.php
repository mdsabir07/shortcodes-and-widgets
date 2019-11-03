<?php 
if ( !defined('ABSPATH') ) die( '-1' );

// Class started
/**
* 
*/
class stockmsiitVCExtendAddonClass {
	
	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'stockmsiitIntegrateWithVC' ) );
	}

	public function stockmsiitIntegrateWithVC() {
		//Checks if visual composer is not installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			add_action( 'admin_notices', array( $this, 'stockmsiitShowVcVersionNotice' ) );
			return;
		}

		// Visual composer addons.
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-slides.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-logo-carousel.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-service.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-cta.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-btn.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-state.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-testimonial.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-gmap.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-tile-gallery.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-promo-box.php';
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-project.php';

		// Load stock default template
		include STOCKMSIIT_ACC_PATH . '/vc-addons/vc-templates.php';
	}

	// show visual composer version
	public function stockmsiitShowVcVersionNotice() {
		$theme_data = wp_get_theme();
		echo '
		<div class="notice notice-warning">
			<p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be intalled and activated on your site.', 'stock-msiit'), $theme_data->get('Name')).'</p>
		</div>';
	}
}
// Finally initialize code
new stockmsiitVCExtendAddonClass();