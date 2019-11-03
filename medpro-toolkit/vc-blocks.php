<?php
 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

// function medpro_integrateWithVC() {
vc_map(
    array(
        "name"      => esc_html__( "MedPro Slider", "medpro-toolkit" ),
        "base"      => "medpro_slides",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Count", "medpro-toolkit" ),
                "param_name"=> "count",
                "value"     => esc_html__( "3", "medpro-toolkit" ),
                "description"=> esc_html__( "Type slides count. If you want to show unlimited slides, type -1.", "medpro-toolkit" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Columns", "medpro-toolkit" ),
                "param_name"=> "columns",
                "value"     => esc_html__( "6", "medpro-toolkit" ),
                "description"=> esc_html__( "Type slides content columns. Numbers only.", "medpro-toolkit" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Select slide", "medpro-toolkit" ),
                "param_name"=> "slide_id",
                "value"     => medpro_toolkit_get_slide_as_list(),
                "description" => esc_html__( "Select slide. You can select any slide.", "medpro-toolkit" ),
                "dependency"=> array(
                    "element"   => "count",
                    "value"     => array("1")
                )
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Slider height", "medpro-toolkit" ),
                "param_name"=> "height",
                "std"       => esc_html__( "730", "medpro-toolkit" ),
                "description" => esc_html__( "Type slider height on px. Numbers only.", "medpro-toolkit" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable Loop?", "medpro-toolkit" ),
                "param_name"=> "loop",
                "std"       => esc_html__( "true", "medpro-toolkit" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide loop. If want to enable loop! Select yes.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable dots?", "medpro-toolkit" ),
                "param_name"=> "dots",
                "std"       => esc_html__( "true", "medpro-toolkit" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide dots. If want to enable dots! Select yes.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable navigation icon?", "medpro-toolkit" ),
                "param_name"=> "nav",
                "std"       => esc_html__( "true", "medpro-toolkit" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide navigation. If want to enable navigation icon! Select yes.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplay?", "medpro-toolkit" ),
                "param_name"=> "autoplay",
                "std"       => esc_html__( "true", "medpro-toolkit" ),
                "value"     => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => esc_html__( "Select slide autoplay. If want to enable autoplay! Select yes.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplayTimeout?", "medpro-toolkit" ),
                "param_name"=> "autoplayTimeout",
                "std"       => esc_html__( "5000", "medpro-toolkit" ),
                "value"     => array(
                    '1 second'  => esc_attr__( '1000', 'medpro-toolkit' ),
                    '2 seconds' => esc_attr__( '2000', 'medpro-toolkit' ),
                    '3 seconds' => esc_attr__( '3000', 'medpro-toolkit' ),
                    '4 seconds' => esc_attr__( '4000', 'medpro-toolkit' ),
                    '5 seconds' => esc_attr__( '5000', 'medpro-toolkit' ),
                    '6 seconds' => esc_attr__( '6000', 'medpro-toolkit' ),
                    '7 seconds' => esc_attr__( '7000', 'medpro-toolkit' ),
                    '8 seconds' => esc_attr__( '8000', 'medpro-toolkit' ),
                    '9 seconds' => esc_attr__( '9000', 'medpro-toolkit' ),
                    '10 seconds'=> esc_attr__( '10000', 'medpro-toolkit' ),
                    '11 seconds'=> esc_attr__( '11000', 'medpro-toolkit' ),
                    '12 seconds'=> esc_attr__( '12000', 'medpro-toolkit' ),
                    '13 seconds'=> esc_attr__( '13000', 'medpro-toolkit' ),
                    '14 seconds'=> esc_attr__( '14000', 'medpro-toolkit' ),
                    '15 seconds'=> esc_attr__( '15000', 'medpro-toolkit' ),
                ),
                "description" => esc_html__( "Select slide autoplayTimeout", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
        )
    )
);

// Image Gallery addon 
vc_map( 
    array(
        "name"          => esc_html__( "Popup Image Gallery", "bunzl-toolkit" ),
        "base"          => "image_gallery",
        "category"      => esc_html__( "BUNZL", "bunzl-toolkit" ),
        "params"        => array(
            array(
                "type"          => "attach_images",
                "heading"       => esc_html__( "Upload Image", "bunzl-toolkit" ),
                "param_name"    => "images",
                "description"   => esc_html__( "Upload gallery images", "bunzl-toolkit" ),   
            ),
        )
    )
);
// End Image gallery 


// Section title addon 
vc_map( 
    array(
        "name" => esc_html__( "MedPro Section Title", "medpro-toolkit" ),
        "base" => "medpro_section_title",
        // "icon"  => medpro_ACC_URL.'/assets/img/section-title.png',
        "category" => esc_html__( "MedPro", "medpro-toolkit"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Section Style", "medpro-toolkit"),
                "param_name"    =>  "style",
                "std"           =>  esc_html__("1", "medpro-toolkit"),
                "description"   =>  esc_html__("Select section title style", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__("Style 1", "medpro-toolkit")   =>  "1",
                    esc_html__("Style 2", "medpro-toolkit")   =>  "2",
                    esc_html__("Style 3", "medpro-toolkit")   =>  "3",
                    esc_html__("Style 4", "medpro-toolkit")   =>  "4"
                ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Section title", "medpro-toolkit"),
                "param_name"    =>  "title",
                "description"   =>  esc_html__("Write your section title", "medpro-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Description", "medpro-toolkit"),
                "param_name"    =>  "desc_option",
                "std"           =>  esc_html__("2", "medpro-toolkit"),
                "description"   =>  esc_html__("Enable description with setcion title? Select yes.", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__("Yes", "medpro-toolkit")   =>  "1",
                    esc_html__("No", "medpro-toolkit")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "textarea",
                "heading"       =>  esc_html__("Section description", "medpro-toolkit"),
                "param_name"    =>  "desc",
                "description"   =>  esc_html__("Write your section title", "medpro-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "desc_option",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "medpro-toolkit"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling for your section title", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__("Left", "medpro-toolkit")        =>  "left",
                    esc_html__("Center", "medpro-toolkit")      =>  "center",
                    esc_html__("Right", "medpro-toolkit")       =>  "right"
                ),
            )
        )
    ) 
);

// Iconic Button VC map
vc_map(
    array(
        "name" => esc_html__( "Iconic Button", "medpro-toolkit" ),
        "base" => "medpro_iconic_btn",
        // "icon"  => medpro_ACC_URL.'/assets/img/Iconic---button.png',
        "category" => esc_html__( "MedPro", "medpro-toolkit"),
        "params" => array(
            array(
                "type"      =>  "dropdown",
                "heading"       =>  esc_html__("Button style", "medpro-toolkit"),
                "param_name"    =>  "btn_style",
                "std"           =>  esc_html__("1", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__('Style 1', 'medpro-toolkit')   =>  '1',
                    esc_html__('Style 2', 'medpro-toolkit')   =>  '2',
                    esc_html__('Style 3', 'medpro-toolkit')   =>  '3',
                    esc_html__('Style 4', 'medpro-toolkit')   =>  '4',
                    esc_html__('Style 5', 'medpro-toolkit')   =>  '5',
                ),
                "description"   =>  esc_html__("Choose button style.", "medpro-toolkit"),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "medpro-toolkit"),
                "param_name"    =>  "button_text",
                "std"           =>  esc_html__("Know more", "medpro-toolkit"),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "medpro-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "medpro-toolkit")    =>  "1",
                    esc_html__("External link", "medpro-toolkit")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "medpro-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "medpro-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  medpro_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "medpro-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "medpro-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type url for booking", "medpro-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Want icon?", "medpro-toolkit"),
                "param_name"    =>  "show_icon",
                "std"           =>  esc_html__("2", "medpro-toolkit"),
                "value"         =>  array(
                    esc_html__("Yes", "medpro-toolkit")   => '1',
                    esc_html__("No", "medpro-toolkit")    =>  '2'
                ),
                "description"   =>  esc_html__("Do you want icon? Select yes.", "medpro-toolkit")
            ),
            array(
                "type"          =>  "iconpicker",
                "heading"       =>  esc_html__("Select icon", "medpro-toolkit"),
                "param_name"    =>  "icon",
                "description"   =>  esc_html__("Choose icon for your link", "medpro-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "show_icon",
                    "value"     =>  array("1")
                )
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Choose color", "medpro-toolkit"),
                "param_name"    =>  "btn_color",
                "std"           =>  "#44a6f0",
                "description"   =>  esc_html__("Choose text color.", "medpro-toolkit")
            )
        )
    )
);

// Logo carousel 
vc_map(
    array(
        "name"      => esc_html__( "MedPro logo carousel", "medpro-toolkit" ),
        "base"      => "logo_carousel",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type" => "attach_images",
            "heading" => __( "Upload Logos", "medpro-toolkit" ),
            "param_name" => "logos",
            "description" => __( "Upload company logos carousel.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Desktop Count", "medpro-toolkit" ),
                "param_name" => "desktop_count",
                "std" => __( "5", "medpro-toolkit" ),
                "description" => __( "Type logo carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Tablet Count", "medpro-toolkit" ),
                "param_name" => "tablet_count",
                "std" => __( "3", "medpro-toolkit" ),
                "description" => __( "Type logo carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Mobile Count", "medpro-toolkit" ),
                "param_name" => "mobile_count",
                "std" => __( "2", "medpro-toolkit" ),
                "description" => __( "Type logo carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable loop?", "medpro-toolkit" ),
                "param_name" => "loop",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select logo carousel loop. If you want to enable loop, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable dots?", "medpro-toolkit" ),
                "param_name" => "dots",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select logo carousel dots. If you want to enable dots, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable navigation icons?", "medpro-toolkit" ),
                "param_name" => "nav",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select logo carousel navigation. If you want to enable navigation icons, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplay?", "medpro-toolkit" ),
                "param_name" => "autoplay",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select logo carousel autoplay. If you want to enable autoplay, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplayTimeout?", "medpro-toolkit" ),
                "param_name" => "autoplayTimeout",
                "std" => __( "5000", "medpro-toolkit" ),
                "value" => array(
                    '1 Second'  => esc_attr__( '1000', 'medpro-toolkit' ),
                    '2 Seconds' => esc_attr__( '2000', 'medpro-toolkit' ),
                    '3 Seconds' => esc_attr__( '3000', 'medpro-toolkit' ),
                    '4 Seconds' => esc_attr__( '4000', 'medpro-toolkit' ),
                    '5 Seconds' => esc_attr__( '5000', 'medpro-toolkit' ),
                    '6 Seconds' => esc_attr__( '6000', 'medpro-toolkit' ),
                    '7 Seconds' => esc_attr__( '7000', 'medpro-toolkit' ),
                    '8 Seconds' => esc_attr__( '8000', 'medpro-toolkit' ),
                    '9 Seconds' => esc_attr__( '9000', 'medpro-toolkit' ),
                    '10 Seconds'=> esc_attr__( '10000', 'medpro-toolkit' ),
                    '11 Seconds'=> esc_attr__( '11000', 'medpro-toolkit' ),
                    '12 Seconds'=> esc_attr__( '12000', 'medpro-toolkit' ),
                    '13 Seconds'=> esc_attr__( '13000', 'medpro-toolkit' ),
                    '14 Seconds'=> esc_attr__( '14000', 'medpro-toolkit' ),
                    '15 Seconds'=> esc_attr__( '15000', 'medpro-toolkit' )
                ),
                "description" => __( "Select autoplay timeout.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "autoplay",
                    "value"     => array("true")
                )
            ),
        )
    )
);


// Service carousel 
vc_map(
    array(
        "name"      => esc_html__( "MedPro service carousel", "medpro-toolkit" ),
        "base"      => "service_carousel",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type" => "textfield",
            "heading" => __( "Count", "medpro-toolkit" ),
            "std" => __( "-1", "medpro-toolkit" ),
            "param_name" => "count",
            "description" => __( "Type service carousel count. If you want to show unlimited, type -1.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Desktop Count", "medpro-toolkit" ),
                "param_name" => "desktop_count",
                "std" => __( "4", "medpro-toolkit" ),
                "description" => __( "Type service carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Tablet Count", "medpro-toolkit" ),
                "param_name" => "tablet_count",
                "std" => __( "3", "medpro-toolkit" ),
                "description" => __( "Type service carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Mobile Count", "medpro-toolkit" ),
                "param_name" => "mobile_count",
                "std" => __( "2", "medpro-toolkit" ),
                "description" => __( "Type service carousel count.", "medpro-toolkit" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable loop?", "medpro-toolkit" ),
                "param_name" => "loop",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel loop. If you want to enable loop, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable dots?", "medpro-toolkit" ),
                "param_name" => "dots",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel dots. If you want to enable dots, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable navigation icons?", "medpro-toolkit" ),
                "param_name" => "nav",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel navigation. If you want to enable navigation icons, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplay?", "medpro-toolkit" ),
                "param_name" => "autoplay",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel autoplay. If you want to enable autoplay, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplayTimeout?", "medpro-toolkit" ),
                "param_name" => "autoplayTimeout",
                "std" => __( "5000", "medpro-toolkit" ),
                "value" => array(
                    '1 Second'  => esc_attr__( '1000', 'medpro-toolkit' ),
                    '2 Seconds' => esc_attr__( '2000', 'medpro-toolkit' ),
                    '3 Seconds' => esc_attr__( '3000', 'medpro-toolkit' ),
                    '4 Seconds' => esc_attr__( '4000', 'medpro-toolkit' ),
                    '5 Seconds' => esc_attr__( '5000', 'medpro-toolkit' ),
                    '6 Seconds' => esc_attr__( '6000', 'medpro-toolkit' ),
                    '7 Seconds' => esc_attr__( '7000', 'medpro-toolkit' ),
                    '8 Seconds' => esc_attr__( '8000', 'medpro-toolkit' ),
                    '9 Seconds' => esc_attr__( '9000', 'medpro-toolkit' ),
                    '10 Seconds'=> esc_attr__( '10000', 'medpro-toolkit' ),
                    '11 Seconds'=> esc_attr__( '11000', 'medpro-toolkit' ),
                    '12 Seconds'=> esc_attr__( '12000', 'medpro-toolkit' ),
                    '13 Seconds'=> esc_attr__( '13000', 'medpro-toolkit' ),
                    '14 Seconds'=> esc_attr__( '14000', 'medpro-toolkit' ),
                    '15 Seconds'=> esc_attr__( '15000', 'medpro-toolkit' )
                ),
                "description" => __( "Select autoplay timeout.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "autoplay",
                    "value"     => array("true")
                )
            ),
        )
    )
);


// Testimonial carousel 
vc_map(
    array(
        "name"      => esc_html__( "MedPro testimonial carousel", "medpro-toolkit" ),
        "base"      => "medpro_testimonial",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type" => "textfield",
            "heading" => __( "Count", "medpro-toolkit" ),
            "std" => __( "-1", "medpro-toolkit" ),
            "param_name" => "count",
            "description" => __( "Type service carousel count. If you want to show unlimited, type -1.", "medpro-toolkit" )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Select testimonial", "medpro-toolkit" ),
                "param_name"=> "testi_id",
                "value"     => medpro_toolkit_get_testimonial_as_list(),
                "description" => esc_html__( "Select testimonial. You can select any testimonial.", "medpro-toolkit" ),
                "dependency"=> array(
                    "element"   => "count",
                    "value"     => array("1")
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable loop?", "medpro-toolkit" ),
                "param_name" => "loop",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel loop. If you want to enable loop, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable dots?", "medpro-toolkit" ),
                "param_name" => "dots",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel dots. If you want to enable dots, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable navigation icons?", "medpro-toolkit" ),
                "param_name" => "nav",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel navigation. If you want to enable navigation icons, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplay?", "medpro-toolkit" ),
                "param_name" => "autoplay",
                "std" => __( "true", "medpro-toolkit" ),
                "value" => array(
                    esc_html__( 'Yes', 'medpro-toolkit' )   => 'true',
                    esc_html__( 'No', 'medpro-toolkit' )    => 'false'
                ),
                "description" => __( "Select service carousel autoplay. If you want to enable autoplay, select yes.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplayTimeout?", "medpro-toolkit" ),
                "param_name" => "autoplayTimeout",
                "std" => __( "15000", "medpro-toolkit" ),
                "value" => array(
                    '1 Second'  => esc_attr__( '1000', 'medpro-toolkit' ),
                    '2 Seconds' => esc_attr__( '2000', 'medpro-toolkit' ),
                    '3 Seconds' => esc_attr__( '3000', 'medpro-toolkit' ),
                    '4 Seconds' => esc_attr__( '4000', 'medpro-toolkit' ),
                    '5 Seconds' => esc_attr__( '5000', 'medpro-toolkit' ),
                    '6 Seconds' => esc_attr__( '6000', 'medpro-toolkit' ),
                    '7 Seconds' => esc_attr__( '7000', 'medpro-toolkit' ),
                    '8 Seconds' => esc_attr__( '8000', 'medpro-toolkit' ),
                    '9 Seconds' => esc_attr__( '9000', 'medpro-toolkit' ),
                    '10 Seconds'=> esc_attr__( '10000', 'medpro-toolkit' ),
                    '11 Seconds'=> esc_attr__( '11000', 'medpro-toolkit' ),
                    '12 Seconds'=> esc_attr__( '12000', 'medpro-toolkit' ),
                    '13 Seconds'=> esc_attr__( '13000', 'medpro-toolkit' ),
                    '14 Seconds'=> esc_attr__( '14000', 'medpro-toolkit' ),
                    '15 Seconds'=> esc_attr__( '15000', 'medpro-toolkit' )
                ),
                "description" => __( "Select autoplay timeout.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "autoplay",
                    "value"     => array("true")
                )
            ),
        )
    )
);

// Promo box
vc_map(
    array(
        "name"      => esc_html__( "MedPro Promo box", "medpro-toolkit" ),
        "base"      => "promo_box",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Icon type", "medpro-toolkit" ),
                "param_name"    => "icon_type",
                "std"           => esc_html__("1", "medpro-toolkit"),
                "description"   => esc_html__( "Select icon type.", "medpro-toolkit" ),
                "value"         => array(
                    'fontawesome icon'  => 1,
                    'image'  => 2
                ),
            ),
            array(
                "type"       => "iconpicker",
                "heading"    => esc_html__( "Icon", "medpro-toolkit" ),
                "param_name" => "icon",
                "std"        => "fa fa-star",
                "description"=> esc_html__( "Select icon.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("1")
                )
            ),
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "medpro-toolkit" ),
                "param_name" => "image",
                "description"=> esc_html__( "Upload image.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("2")
                )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Promo box title", "medpro-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type promo box title.", "medpro-toolkit" )
            ),
            array(
                "type"       => "textarea",
                "heading"    => __( "Content", "medpro-toolkit" ),
                "param_name" => "desc",
                "description"=> esc_html__( "Type promo box description.", "medpro-toolkit" )
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__( "Link type", "medpro-toolkit" ),
                "param_name" => "type",
                "std"        => esc_html__( "1", "medpro-toolkit" ),
                "description"=> esc_html__( "Select link type.", "medpro-toolkit" ),
                "value"      => array(
                    'link to page'    => 1,
                    'link to external'=> 2
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__( "Link to page", "medpro-toolkit" ),
                "param_name" => "link_page",
                "value"      => medpro_toolkit_get_page_as_list(),
                "description"=> esc_html__( "Select page link.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "type",
                    "value"     => array("1")
                )
            ),
            array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Link to external", "medpro-toolkit" ),
                "param_name" => "link_external",
                "description"=> esc_html__( "Select external link.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "type",
                    "value"     => array("2")
                )
            ),
            array(
                "type"       => "iconpicker",
                "heading"    => esc_html__( "Icon", "medpro-toolkit" ),
                "param_name" => "link_text",
                "std"        => esc_html__( "fa fa-long-arrow-right", "medpro-toolkit" ),
                "description"=> esc_html__( "Select Icon.", "medpro-toolkit" ),
            ),
        )
    )
);

// Iconic box addon
vc_map(
    array(
        "name"      => esc_html__( "MedPro Iconic box", "medpro-toolkit" ),
        "base"      => "medpro_iconic_box",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Icon type", "medpro-toolkit" ),
                "param_name"    => "icon_type",
                "std"           => esc_html__("1", "medpro-toolkit"),
                "description"   => esc_html__( "Select icon type.", "medpro-toolkit" ),
                "value"         => array(
                    'Fontawesome icon'  => 1,
                    'Image'  => 2
                ),
            ),
            array(
                "type"       => "iconpicker",
                "heading"    => esc_html__( "Icon", "medpro-toolkit" ),
                "param_name" => "icon",
                "std"        => "fa fa-star",
                "description"=> esc_html__( "Select icon.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("1")
                )
            ),
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "medpro-toolkit" ),
                "param_name" => "image",
                "description"=> esc_html__( "Upload image.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("2")
                )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Iconic box title", "medpro-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type iconic box title.", "medpro-toolkit" )
            ),
            array(
                "type"       => "textarea",
                "heading"    => __( "Content", "medpro-toolkit" ),
                "param_name" => "desc",
                "description"=> esc_html__( "Type iconic box description.", "medpro-toolkit" )
            ),
        )
    )
);

// Service addon 
vc_map(
    array(
        "name"      => esc_html__( "MedPro service box", "medpro-toolkit" ),
        "base"      => "medpro_service_box",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Service title", "medpro-toolkit" ),
            "param_name"    => "title",
            "description"   => esc_html__( "Type service title.", "medpro-toolkit" )
            ),
            array(
                "type"       => "textarea",
                "heading"    => esc_html__( "Description", "medpro-toolkit" ),
                "param_name" => "desc",
                "description"=> esc_html__( "Type service description.", "medpro-toolkit" )
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__( "Icon type", "medpro-toolkit" ),
                "param_name" => "icon_type",
                "std"        => esc_html__( "1", "medpro-toolkit" ),
                "description"=> esc_html__( "Select icon type.", "medpro-toolkit" ),
                "value"      => array(
                    esc_html__( 'Upload', 'medpro-toolkit' )      => 1,
                    esc_html__( 'FontAwesome', 'medpro-toolkit' ) => 2
                ),
            ),
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload icon", "medpro-toolkit" ),
                "param_name" => "upload_icon",
                "description"=> esc_html__( "Upload Icon or image.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("1")
                )
            ),
            array(
                "type"       => "iconpicker",
                "heading"    => esc_html__( "Choose icon", "medpro-toolkit" ),
                "param_name" => "chosse_icon",
                "description"=> esc_html__( "Choose Icon.", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "icon_type",
                    "value"     => array("2")
                )
            ),
        )
    )
);


// Team member addon 
vc_map(
    array(
        "name"      => esc_html__( "MedPro Team", "medpro-toolkit" ),
        "base"      => "medpro_team",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type"          => "attach_image",
            "heading"       => esc_html__( "Image", "medpro-toolkit" ),
            "param_name"    => "image",
            "description"   => esc_html__( "Upload team image.", "medpro-toolkit" )
            ),
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Title", "medpro-toolkit" ),
            "param_name"    => "title",
            "description"   => esc_html__( "Type author name.", "medpro-toolkit" )
            ),
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Profession", "medpro-toolkit" ),
            "param_name"    => "profession",
            "description"   => esc_html__( "Type author profession.", "medpro-toolkit" )
            ),
        )
    )
);

// Recent posts addon 
vc_map(
    array(
        "name"      => esc_html__( "MedPro Recent posts", "medpro-toolkit" ),
        "base"      => "recent_posts",
        "category"  => esc_html__( "MedPro", "medpro-toolkit" ),
        "params"    => array(
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Post count", "medpro-toolkit" ),
            "param_name"    => "count",
            "description"   => esc_html__( "Type post count, number only.", "medpro-toolkit" )
            ),
        )
    )
);

// Post block addon 
vc_map(
    array(
        "name" => esc_html__( "MedPro Blog Post", "medpro-toolkit" ),
        "base" => "medpro_posts",
        // "icon"  => medpro_ACC_URL.'/assets/img/posts-blog.png',
        "category" => esc_html__( "MedPro", "medpro-toolkit"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Columns", "medpro-toolkit" ),
                "param_name" => "columns",
                "std" => esc_html__( "1", "medpro-toolkit" ),
                "description" => esc_html__( "Select post column", "medpro-toolkit" ),
                "value" => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '6' => '6',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Posts count", "medpro-toolkit" ),
                "param_name" => "count",
                "std" => esc_html__( "2", "medpro-toolkit" ),
                "description" => esc_html__( "How many posts you want to show?", "medpro-toolkit" ),
                "value" => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    esc_html__('Unlimited', 'medpro-toolkit') => '-1',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Height", "medpro-toolkit" ),
                "param_name" => "img_height",
                "std" => esc_html__( "220", "medpro-toolkit" ),
                "description" => esc_html__( "Type image height, number only.", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Select category", "medpro-toolkit" ),
                "param_name" => "category_id",
                "value" => medpro_toolkit_post_cat_as_list(),
                "description" => esc_html__( "Select post category", "medpro-toolkit" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Content", "medpro-toolkit" ),
                "param_name" => "content",
                "std" => esc_html__( "1", "medpro-toolkit" ),
                "description" => esc_html__( "Select content type.", "medpro-toolkit" ),
                "value" => array(
                    esc_html__('Excerpt', 'medpro-toolkit') => '1',
                    esc_html__('Content', 'medpro-toolkit') => '2',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Show post date?", "medpro-toolkit" ),
                "param_name" => "date",
                "std" => esc_html__( "1", "medpro-toolkit" ),
                "description" => esc_html__( "Show or hide post date", "medpro-toolkit" ),
                "value" => array(
                    esc_html__('Yes', 'medpro-toolkit') => '1',
                    esc_html__('No', 'medpro-toolkit') => '2',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Show button?", "medpro-toolkit" ),
                "param_name" => "post_btn",
                "std" => esc_html__( "1", "medpro-toolkit" ),
                "description" => esc_html__( "Select button show or not.", "medpro-toolkit" ),
                "value"  => array(
                    "Yes"   => "1",
                    "No"    => "2"
                )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button text", "medpro-toolkit" ),
                "param_name" => "btn_text",
                "std" => esc_html__( "read more", "medpro-toolkit" ),
                "description" => esc_html__( "Type button text", "medpro-toolkit" ),
                "dependency"  => array(
                    "element"   => "post_btn",
                    "value"     => array("1")
                )
            ),
        )
    )
);

// }
// add_action( 'vc_before_init', 'medpro_integrateWithVC' );


/*====== Start contact details addon ======*/
// vc_map(
//     array(
//         "name"          => esc_html__( "Contact info", "dennis-haber" ),
//         "base"          => "contact_details",
//         "category"      => esc_html__( "DannisHaber", "dennis-haber" ),
//         'params' => array(
            // params group
            // array(
            //     'type' => 'param_group',
            //     'param_name' => 'contact_info',
                // Note params is mapped inside param-group:
//                 'params' => array(
//                     array(
//                         'type' => 'iconpicker',
//                         'heading' => esc_html__('Icon', 'dennis-haber'),
//                         'param_name' => 'icon',
//                         'description'=> esc_html__( 'Select icon', 'dennis-haber' ) 
//                     ),
//                     array(
//                         'type' => 'textfield',
//                         'heading' => esc_html__('Sub title', 'dennis-haber'),
//                         'param_name' => 'sub_title',
//                         'description'=> esc_html__( 'Type sub title here', 'dennis-haber' ) 
//                     ),
//                     array(
//                         'type' => 'textfield',
//                         'heading' => esc_html__('Link', 'dennis-haber'),
//                         'param_name' => 'tr_link',
//                         'description'=> esc_html__( 'Type link text here', 'dennis-haber' ) 
//                     ),
//                     array(
//                         'type' => 'textarea',
//                         'heading' => esc_html__('Descripton', 'dennis-haber'),
//                         'param_name' => 'desc',
//                         'description'=> esc_html__( 'Type description here', 'dennis-haber' ) 
//                     ),
//                 )
//             )
//         )
//     )
// );
// End Contact details addon


/*====== Start content block addon ======*/
// vc_map(
//     array(
//         "name"    => esc_html__( "Content block", "dennis-haber" ),
//         "base"    => "dennishaber_content",
//         "category"=> esc_html__( "DannisHaber", "dennis-haber" ),
//         'params'  => array(
//             array(
//                 "type" => "dropdown",
//                 "heading" => esc_html__( "Text colummns", "dennis-haber" ),
//                 "param_name" => "text_columns",
//                 "std" => esc_html__( "col-lg-12", "dennis-haber" ),
//                 "value" => array(
//                     '6 Columns' => 'col-lg-6',
//                     '7 Columns' => 'col-lg-7',
//                     '8 Columns' => 'col-lg-8',
//                     '9 Columns' => 'col-lg-9',
//                     '10 Columns' => 'col-lg-10',
//                     '11 Columns' => 'col-lg-11',
//                     '12 Columns' => 'col-lg-12',
//                 )
//             ),
//         	array(
//                 "type" => "textarea_html",
//                 "heading" => esc_html__( "Content", "dennis-haber" ),
//                 "param_name" => "content",
//                 'description'=> esc_html__( 'Type content here', 'dennis-haber' )
//             ),
//         )
//     )
// );
// End content block addon


/*====== Start testimonials addon ======*/
// vc_map( 
// 	array(
// 		"name"			=> __( "Testimonials", "dennis-haber" ),
// 		"base"			=> "cstudy_testimonial",
// 		"category"		=> __( "DannisHaber", "dennis-haber" ),
//         "params"    => array(
//             array(
//                 "type" => "dropdown",
//                 "heading" => esc_html__( "dropdown", "dennis-haber" ),
//                 "param_name" => "autoplay",
//                 "default" => esc_html__( "true", "dennis-haber" ),
//                 "value" => array(
//                     "True"  => "true",
//                     "False"  => "false",
//                 ),
//                 "description" => esc_html__( "Select autoplay options.", "dennis-haber" ),
//             )
//         )
// 	)
// );

// End testimonials addon