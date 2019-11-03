<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 
// Class started
/**
* 
*/
class dmvstairliftsVCExtendAddonClass {
	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'dmvstairliftsIntegrateWithVC' ) );
	}

	public function dmvstairliftsIntegrateWithVC() {
		//Checks if visual composer is not installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			add_action( 'admin_notices', array( $this, 'dmvstairliftsShowVcVersionNotice' ) );
			return;
		}

		// Visual composer addons.
		include_once('vc-blocks.php');
	}

	// show visual composer version
	public function dmvstairliftsShowVcVersionNotice() {
		$theme_data = wp_get_theme();
		echo '
		<div class="notice notice-warning">
			<p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be intalled and activated on your site.', 'optimistic-crazycafe'), $theme_data->get('Name')).'</p>
		</div>';
	}
}
// Finally initialize code
new dmvstairliftsVCExtendAddonClass();