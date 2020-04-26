<?php
 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

function msiit_integrateWithVC() {


// Product carousel addon
vc_map(
    array(
        "name"      => esc_html__( "MSIIT Slider", "msiit" ),
        "base"      => "msiit_slides",
        "category"  => esc_html__( "MSIIT", "msiit" ),
        "params"    => array(
            array(
                'type' => 'param_group',
                "heading"       =>  esc_html__("Add slider", "msiit"),
                'param_name' => 'slides',
                'params' => array(
                    array(
                        "type"          => "attach_image",
                        "heading"       => esc_html__( "Upload image", "msiit" ),
                        "param_name"    => "image",
                        "description"   => esc_html__( "Upload slider image", "msiit" )
                    ),
                    array(
                        "type"          => "text",
                        "heading"       => esc_html__( "Title", "msiit" ),
                        "param_name"    => "title",
                        "description"   => esc_html__( "Type post title", "msiit" )
                    ),
                    array(
                        "type"          => "textarea_html",
                        "heading"       => esc_html__( "Content", "msiit" ),
                        "param_name"    => "content",
                        "description"   => esc_html__( "Type content", "msiit" )
                    ),
                    array(
                        "type"       => "dropdown",
                        "heading"    => esc_html__( "Link to page", "msiit" ),
                        "param_name" => "link_to_page",
                        "value"      => msiit_toolkit_get_page_as_list(),
                        "description"=> esc_html__( "Select page link.", "msiit" ),
                        "dependency"  => array(
                            "element"   => "type",
                            "value"     => array("1")
                        )
                    ),
                    array(
                        "type"       => "textfield",
                        "heading"    => esc_html__( "Link", "msiit" ),
                        "param_name" => "link",
                        "description"=> esc_html__( "Insert link.", "msiit" ),
                    ),
                    array(
                        "type"       => "textfield",
                        "heading"    => esc_html__( "Link text", "msiit" ),
                        "param_name" => "link_text",
                        "description"=> esc_html__( "Type link text.", "msiit" ),
                    ),
                )
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Enable loop?", "msiit" ),
                "param_name" => "loop",
                "std"        => __( "true", "msiit" ),
                "value"      => array(
                    'Yes' => 'true',
                    'No'  => 'false'
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Enable dots?", "msiit" ),
                "param_name" => "dots",
                "std"        => __( "true", "msiit" ),
                "value"      => array(
                    'Yes' => 'true',
                    'No'  => 'false'
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Enable navigation icons?", "msiit" ),
                "param_name" => "arrows",
                "std"        => __( "true", "msiit" ),
                "value"      => array(
                    'Yes' => 'true',
                    'No'  => 'false'
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Enable autoplay?", "msiit" ),
                "param_name" => "autoplay",
                "std"        => __( "true", "msiit" ),
                "value"      => array(
                    'Yes'=> 'true',
                    'No' => 'false'
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Autoplay Speed", "msiit" ),
                "param_name" => "autoplaySpeed",
                "std"        => __( "3000", "msiit" ),
                "value"      => array(
                    '2000'=> '2000',
                    '3000'=> '3000',
                    '4000' => '4000',
                    '5000' => '5000',
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __( "Speed", "msiit" ),
                "param_name" => "speed",
                "std"        => __( "3000", "msiit" ),
                "value"      => array(
                    '2000'=> '2000',
                    '3000'=> '3000',
                    '4000' => '4000',
                    '5000' => '5000',
                ),
            ),
        )
    )
);

}
add_action( 'vc_before_init', 'msiit_integrateWithVC' );
