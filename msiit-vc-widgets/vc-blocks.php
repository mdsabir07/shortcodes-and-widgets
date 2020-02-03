<?php
 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

function msiit_integrateWithVC() {


// Product carousel addon
vc_map(
    array(
        "name"      => esc_html__( "Product carousel", "skembedjis" ),
        "base"      => "msiit_p_cats",
        "category"  => esc_html__( "Skembedjis", "skembedjis" ),
        "params"    => array(
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Category", "skembedjis" ),
                "param_name"=> "cat_id",
                "value"     => skembedjis_product_category_as_list(),
                "description"=> esc_html__( "Select product category", "skembedjis" ),
            ),
        )
    )
);

}
add_action( 'vc_before_init', 'msiit_integrateWithVC' );
