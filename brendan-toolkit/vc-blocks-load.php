<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly


// Class started
class brendanVCExtendAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'brendanIntegrateWithVC' ) );
    }

    public function brendanIntegrateWithVC() {
        // Checks if Visual composer is not installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'brendanShowVcVersionNotice' ));
            return;
        }
        // visual composer addons.
        //include get_template_directory_uri() . '/inc/vc-blocks.php';
        include_once('vc-blocks.php');
    }

    public function brendanShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.esc_url(site_url()).'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'brendan-toolkit'), $theme_data->get('Name')).'</p>
        </div>';
    }
}
// Finally initialize code 
new brendanVCExtendAddonClass();