<?php 
if ( !defined('ABSPATH') ) die( '-1' );

// Class started
/**
* 
*/
class brightnightVCExtendAddonClass {
	
	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'brightnightIntegrateWithVC' ) );
	}

	public function brightnightIntegrateWithVC() {
		//Checks if visual composer is not installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			add_action( 'admin_notices', array( $this, 'brightnightShowVcVersionNotice' ) );
			return;
		}
	}

	// show visual composer version
	public function brightnightShowVcVersionNotice() {
		$theme_data = wp_get_theme();
		echo '
		<div class="notice notice-warning">
			<p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be intalled and activated on your site.', 'bright-night'), $theme_data->get('Name')).'</p>
		</div>';
	}
}
// Finally initialize code
new brightnightVCExtendAddonClass();