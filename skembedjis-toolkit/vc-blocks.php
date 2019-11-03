<?php
 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

function skembedjis_integrateWithVC() {
vc_map(
    array(
        "name"      => esc_html__( "Skembedjis Slider", "skembedjis" ),
        "base"      => "skembedjis_slide",
        "category"  => esc_html__( "Skembedjis", "skembedjis" ),
        "params"    => array(
            array(
                "type"      => "attach_image",
                "heading"   => esc_html__( "Background Image", "skembedjis" ),
                "param_name"=> "bg_img",
                "description"=> esc_html__( "Upload background image", "skembedjis" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Columns", "skembedjis" ),
                "param_name"=> "text_col",
                "value"     => esc_html__( "7", "skembedjis" ),
                "description"=> esc_html__( "Type slides content columns. Numbers only.", "skembedjis" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Title", "skembedjis" ),
                "param_name"=> "title",
                "description"=> esc_html__( "Type title", "skembedjis" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Sub title", "skembedjis" ),
                "param_name"=> "sub_title",
                "description"=> esc_html__( "Type sub title", "skembedjis" ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button 1 text", "skembedjis"),
                "param_name"    =>  "button_text_l",
                "std"        => esc_html__( "Contact us", "brendan-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button background color", "skembedjis"),
                "param_name"    =>  "btn_bg_color1",
                "std"           => "#FCC61D",
                "description"   =>  esc_html__("Choose button background color")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button text color", "skembedjis"),
                "param_name"    =>  "btn_text_color1",
                "std"           => "#fff",
                "description"   =>  esc_html__("Choose button text color")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "skembedjis"),
                "param_name"    =>  "link_type1",
                "std"           =>  esc_html__("1", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "skembedjis")    =>  "1",
                    esc_html__("External link", "skembedjis")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages", "skembedjis")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "skembedjis"),
                "param_name"    =>  "link_to_page1",
                "value"         =>  skembedjis_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "skembedjis"),
                "param_name"    =>  "link_to_external1",
                "description"   =>  esc_html__("Type url", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button 2 text", "skembedjis"),
                "param_name"    =>  "button_text_2",
                "std"        => esc_html__( "Call me back!", "brendan-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button background color", "skembedjis"),
                "param_name"    =>  "btn_bg_color2",
                "std"           => "#363636",
                "description"   =>  esc_html__("Select button background color")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button text color", "skembedjis"),
                "param_name"    =>  "btn_text_color2",
                "std"           => "#fff",
                "description"   =>  esc_html__("Select button text color")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "skembedjis"),
                "param_name"    =>  "link_type2",
                "std"           =>  esc_html__("1", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "skembedjis")    =>  "1",
                    esc_html__("External link", "skembedjis")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "skembedjis")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "skembedjis"),
                "param_name"    =>  "link_to_page2",
                "value"         =>  skembedjis_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type2",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "skembedjis"),
                "param_name"    =>  "link_to_external2",
                "description"   =>  esc_html__("Type url for booking", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type2",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Columns", "skembedjis" ),
                "param_name"=> "slider_col",
                "value"     => esc_html__( "5", "skembedjis" ),
                "description"=> esc_html__( "Type slider area columns. Numbers only.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable Loop?", "skembedjis" ),
                "param_name"=> "loop",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide loop. If want to enable loop! Select yes.", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable dots?", "skembedjis" ),
                "param_name"=> "dots",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide dots. If want to enable dots! Select yes.", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable navigation icon?", "skembedjis" ),
                "param_name"=> "nav",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select slide navigation. If want to enable navigation icon! Select yes.", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplay?", "skembedjis" ),
                "param_name"=> "autoplay",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => esc_html__( "Select slide autoplay. If want to enable autoplay! Select yes.", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplayTimeout?", "skembedjis" ),
                "param_name"=> "autoplayTimeout",
                "std"       => esc_html__( "5000", "skembedjis" ),
                "value"     => array(
                    '1 second'  => esc_attr__( '1000', 'skembedjis' ),
                    '2 seconds' => esc_attr__( '2000', 'skembedjis' ),
                    '3 seconds' => esc_attr__( '3000', 'skembedjis' ),
                    '4 seconds' => esc_attr__( '4000', 'skembedjis' ),
                    '5 seconds' => esc_attr__( '5000', 'skembedjis' ),
                    '6 seconds' => esc_attr__( '6000', 'skembedjis' ),
                    '7 seconds' => esc_attr__( '7000', 'skembedjis' ),
                    '8 seconds' => esc_attr__( '8000', 'skembedjis' ),
                    '9 seconds' => esc_attr__( '9000', 'skembedjis' ),
                    '10 seconds'=> esc_attr__( '10000', 'skembedjis' ),
                    '11 seconds'=> esc_attr__( '11000', 'skembedjis' ),
                    '12 seconds'=> esc_attr__( '12000', 'skembedjis' ),
                    '13 seconds'=> esc_attr__( '13000', 'skembedjis' ),
                    '14 seconds'=> esc_attr__( '14000', 'skembedjis' ),
                    '15 seconds'=> esc_attr__( '15000', 'skembedjis' ),
                ),
                "description" => esc_html__( "Select slide autoplayTimeout", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "count",
                    "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
                )
            ),
        )
    )
);

// Product category list addon
vc_map( 
    array(
        "name"          => esc_html__( "Product category list", "bunzl-toolkit" ),
        "base"          => "product_cat_lists",
        "category"      => esc_html__( "Skembedjis", "bunzl-toolkit" ),
        "params"        => array(
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "bunzl-toolkit" ),
                "param_name"    => "title",
                "std"       => esc_html__( "Categories", "skembedjis" ),
                "description"   => esc_html__( "Type title", "bunzl-toolkit" ),   
            ),
        )
    )
);


// Section title addon 
vc_map( 
    array(
        "name" => esc_html__( "Skembedjis Section Title", "skembedjis" ),
        "base" => "skembedjis_section_title",
        // "icon"  => skembedjis_ACC_URL.'/assets/img/section-title.png',
        "category" => esc_html__( "Skembedjis", "skembedjis"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Section Style", "skembedjis"),
                "param_name"    =>  "style",
                "std"           =>  esc_html__("1", "skembedjis"),
                "description"   =>  esc_html__("Select section title style", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Font size 40", "skembedjis")   =>  "1",
                    esc_html__("Font size 35", "skembedjis")   =>  "2",
                    esc_html__("Font size 30", "skembedjis")   =>  "3",
                    esc_html__("Font size 27", "skembedjis")   =>  "4",
                    esc_html__("Font size 20", "skembedjis")   =>  "5",
                ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Section title", "skembedjis"),
                "param_name"    =>  "title",
                "description"   =>  esc_html__("Write your section title", "skembedjis")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Description", "skembedjis"),
                "param_name"    =>  "desc_option",
                "std"           =>  esc_html__("2", "skembedjis"),
                "description"   =>  esc_html__("Enable description with setcion title? Select yes.", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Yes", "skembedjis")   =>  "1",
                    esc_html__("No", "skembedjis")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "textarea",
                "heading"       =>  esc_html__("Section description", "skembedjis"),
                "param_name"    =>  "desc",
                "description"   =>  esc_html__("Write your section title", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "desc_option",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "skembedjis"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling for your section title", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Left", "skembedjis")        =>  "left",
                    esc_html__("Center", "skembedjis")      =>  "center",
                    esc_html__("Right", "skembedjis")       =>  "right"
                ),
            )
        )
    ) 
);

// Iconic Button VC map
vc_map(
    array(
        "name" => esc_html__( "Iconic Button", "skembedjis" ),
        "base" => "skembedjis_iconic_btn",
        // "icon"  => skembedjis_ACC_URL.'/assets/img/Iconic---button.png',
        "category" => esc_html__( "Skembedjis", "skembedjis"),
        "params" => array(
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Button style", "skembedjis"),
                "param_name"    =>  "btn_style",
                "std"           =>  "boxed-btn",
                "value"         =>  array(
                    esc_html__('Boxed button', 'skembedjis')   =>  'boxed-btn',
                    esc_html__('Inline button', 'skembedjis')   =>  'inline-btn',
                ),
                "description"   =>  esc_html__("Choose button style.", "skembedjis"),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "skembedjis"),
                "param_name"    =>  "button_text",
                "std"           =>  esc_html__("Know more", "skembedjis"),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "skembedjis"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "skembedjis")    =>  "1",
                    esc_html__("External link", "skembedjis")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "skembedjis")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "skembedjis"),
                "param_name"    =>  "link_to_page",
                "value"         =>  skembedjis_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "skembedjis"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type url for booking", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Want icon?", "skembedjis"),
                "param_name"    =>  "show_icon",
                "std"           =>  esc_html__("2", "skembedjis"),
                "value"         =>  array(
                    esc_html__("Yes", "skembedjis")   => '1',
                    esc_html__("No", "skembedjis")    =>  '2'
                ),
                "description"   =>  esc_html__("Do you want icon? Select yes.", "skembedjis")
            ),
            array(
                "type"          =>  "iconpicker",
                "heading"       =>  esc_html__("Select icon", "skembedjis"),
                "param_name"    =>  "icon",
                "description"   =>  esc_html__("Choose icon for your link", "skembedjis"),
                "dependency"    =>  array(
                    "element"   =>  "show_icon",
                    "value"     =>  array("1")
                )
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Choose color", "skembedjis"),
                "param_name"    =>  "btn_bg",
                "description"   =>  esc_html__("Choose background color.", "skembedjis")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Choose color", "skembedjis"),
                "param_name"    =>  "btn_color",
                "std"           =>  "#44a6f0",
                "description"   =>  esc_html__("Choose text color.", "skembedjis")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Margin top", "skembedjis"),
                "param_name"    =>  "m_top",
                "std"           =>  "20",
                "description"   =>  esc_html__("Type how much want to margin top", "skembedjis")
            )
        )
    )
);

// Blog Post addon 
vc_map(
    array(
        "name" => esc_html__( "Skembedjis Blog Post", "skembedjis" ),
        "base" => "skembedjis_posts",
        // "icon"  => skembedjis_ACC_URL.'/assets/img/posts-blog.png',
        "category" => esc_html__( "Skembedjis", "skembedjis"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Columns", "skembedjis" ),
                "param_name" => "columns",
                "std" => esc_html__( "1", "skembedjis" ),
                "description" => esc_html__( "Select post column", "skembedjis" ),
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
                "heading" => esc_html__( "Posts count", "skembedjis" ),
                "param_name" => "count",
                "std" => esc_html__( "2", "skembedjis" ),
                "description" => esc_html__( "How many posts you want to show?", "skembedjis" ),
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
                    esc_html__('Unlimited', 'skembedjis') => '-1',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Height", "skembedjis" ),
                "param_name" => "img_height",
                "std" => esc_html__( "220", "skembedjis" ),
                "description" => esc_html__( "Type image height, number only.", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Select category", "skembedjis" ),
                "param_name" => "category_id",
                "value" => skembedjis_toolkit_post_cat_as_list(),
                "description" => esc_html__( "Select post category", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Content", "skembedjis" ),
                "param_name" => "content",
                "std" => esc_html__( "2", "skembedjis" ),
                "description" => esc_html__( "Select content type.", "skembedjis" ),
                "value" => array(
                    esc_html__('Yes', 'skembedjis') => '1',
                    esc_html__('No', 'skembedjis') => '2',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Show post date?", "skembedjis" ),
                "param_name" => "date",
                "std" => esc_html__( "1", "skembedjis" ),
                "description" => esc_html__( "Show or hide post date", "skembedjis" ),
                "value" => array(
                    esc_html__('Yes', 'skembedjis') => '1',
                    esc_html__('No', 'skembedjis') => '2',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Show button?", "skembedjis" ),
                "param_name" => "post_btn",
                "std" => esc_html__( "1", "skembedjis" ),
                "description" => esc_html__( "Select button show or not.", "skembedjis" ),
                "value"  => array(
                    "Yes"   => "1",
                    "No"    => "2"
                )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button text", "skembedjis" ),
                "param_name" => "btn_text",
                "std" => esc_html__( "read more", "skembedjis" ),
                "description" => esc_html__( "Type button text", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "post_btn",
                    "value"     => array("1")
                )
            ),
        )
    )
);


// Follow us addon 
vc_map(
    array(
        "name" => esc_html__( "Follow us social media", "skembedjis" ),
        "base" => "follow_socials",
        // "icon"  => skembedjis_ACC_URL.'/assets/img/Iconic---button.png',
        "category" => esc_html__( "Skembedjis", "skembedjis"),
        "params" => array(
            array(
                "type"      =>  "attach_image",
                "heading"       =>  esc_html__("Image", "skembedjis"),
                "param_name"    =>  "image",
                "description"   =>  esc_html__("Upload image", "skembedjis"),
            ),
            array(
                "type"          =>  "iconpicker",
                "heading"       =>  esc_html__("Icon", "skembedjis"),
                "param_name"    =>  "icon",
                "description"   =>  esc_html__("Select icon")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Social link", "skembedjis"),
                "param_name"    =>  "link",
                "description"   =>  esc_html__("Type social link here", "skembedjis")
            ),
        )
    )
);

//Product slide addon 
vc_map(
    array(
        "name"      => esc_html__( "Product slide", "skembedjis" ),
        "base"      => "products_slide",
        "category"  => esc_html__( "Skembedjis", "skembedjis" ),
        "params"    => array(
        	array(
                "type"      =>  "attach_image",
                "heading"       =>  esc_html__("Image", "skembedjis"),
                "param_name"    =>  "bg_image",
                "description"   =>  esc_html__("Upload image", "skembedjis"),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Columns", "skembedjis" ),
                "param_name" => "columns",
                "std" => esc_html__( "6", "skembedjis" ),
                "description" => esc_html__( "Select column", "skembedjis" ),
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
                "heading" => esc_html__( "Posts count", "skembedjis" ),
                "param_name" => "count",
                "std" => esc_html__( "12", "skembedjis" ),
                "description" => esc_html__( "How many posts you want to show?", "skembedjis" ),
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
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    esc_html__('Unlimited', 'skembedjis') => '-1',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Desktop Count", "skembedjis" ),
                "param_name" => "desktop_count",
                "std" => __( "4", "skembedjis" ),
                "description" => __( "Type product slide count.", "skembedjis" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Tablet Count", "skembedjis" ),
                "param_name" => "tablet_count",
                "std" => __( "3", "skembedjis" ),
                "description" => __( "Type product slide count.", "skembedjis" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Mobile Count", "skembedjis" ),
                "param_name" => "mobile_count",
                "std" => __( "2", "skembedjis" ),
                "description" => __( "Type product slide count.", "skembedjis" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable loop?", "skembedjis" ),
                "param_name" => "loop",
                "std" => __( "true", "skembedjis" ),
                "value" => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => __( "Select product slide loop. If you want to enable loop, select yes.", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable dots?", "skembedjis" ),
                "param_name" => "dots",
                "std" => __( "true", "skembedjis" ),
                "value" => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => __( "Select product slide dots. If you want to enable dots, select yes.", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable navigation icons?", "skembedjis" ),
                "param_name" => "nav",
                "std" => __( "true", "skembedjis" ),
                "value" => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => __( "Select product slide navigation. If you want to enable navigation icons, select yes.", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplay?", "skembedjis" ),
                "param_name" => "autoplay",
                "std" => __( "true", "skembedjis" ),
                "value" => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => __( "Select product slide autoplay. If you want to enable autoplay, select yes.", "skembedjis" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Enable autoplayTimeout?", "skembedjis" ),
                "param_name" => "autoplayTimeout",
                "std" => __( "5000", "skembedjis" ),
                "value" => array(
                    '1 Second'  => esc_attr__( '1000', 'skembedjis' ),
                    '2 Seconds' => esc_attr__( '2000', 'skembedjis' ),
                    '3 Seconds' => esc_attr__( '3000', 'skembedjis' ),
                    '4 Seconds' => esc_attr__( '4000', 'skembedjis' ),
                    '5 Seconds' => esc_attr__( '5000', 'skembedjis' ),
                    '6 Seconds' => esc_attr__( '6000', 'skembedjis' ),
                    '7 Seconds' => esc_attr__( '7000', 'skembedjis' ),
                    '8 Seconds' => esc_attr__( '8000', 'skembedjis' ),
                    '9 Seconds' => esc_attr__( '9000', 'skembedjis' ),
                    '10 Seconds'=> esc_attr__( '10000', 'skembedjis' ),
                    '11 Seconds'=> esc_attr__( '11000', 'skembedjis' ),
                    '12 Seconds'=> esc_attr__( '12000', 'skembedjis' ),
                    '13 Seconds'=> esc_attr__( '13000', 'skembedjis' ),
                    '14 Seconds'=> esc_attr__( '14000', 'skembedjis' ),
                    '15 Seconds'=> esc_attr__( '15000', 'skembedjis' )
                ),
                "description" => __( "Select autoplay timeout.", "skembedjis" ),
                "dependency"  => array(
                    "element"   => "autoplay",
                    "value"     => array("true")
                )
            ),
        )
    )
);


// Product carousel addon
vc_map(
    array(
        "name"      => esc_html__( "Product carousel", "skembedjis" ),
        "base"      => "skembedjis_product_carousel",
        "category"  => esc_html__( "Skembedjis", "skembedjis" ),
        "params"    => array(
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Count", "skembedjis" ),
                "param_name"=> "count",
                "std"       => esc_html__( "10", "skembedjis" ),
                "description"=> esc_html__( "Type product carousel count. If you want to show unlimited, type -1.", "skembedjis" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Columns", "skembedjis" ),
                "param_name"=> "columns",
                "std"       => esc_html__( "4", "skembedjis" ),
                "description"=> esc_html__( "Type product carousel columns. Numbers only.", "skembedjis" ),
            ),
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Category", "skembedjis" ),
                "param_name"=> "cat_id",
                "value"     => skembedjis_product_category_as_list(),
                "description"=> esc_html__( "Select product category", "skembedjis" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Image height", "skembedjis" ),
                "param_name"=> "height",
                "std"       => esc_html__( "300", "skembedjis" ),
                "description" => esc_html__( "Type image height on px. Numbers only.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable Loop?", "skembedjis" ),
                "param_name"=> "loop",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select product carousel loop. If want to enable loop! Select yes.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable dots?", "skembedjis" ),
                "param_name"=> "dots",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select product carousel dots. If want to enable dots! Select yes.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable navigation icon?", "skembedjis" ),
                "param_name"=> "nav",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    'Yes'   => 'true',
                    'No'    => 'false'
                ),
                "description" => esc_html__( "Select product carousel navigation. If want to enable navigation icon! Select yes.", "skembedjis" )
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplay?", "skembedjis" ),
                "param_name"=> "autoplay",
                "std"       => esc_html__( "true", "skembedjis" ),
                "value"     => array(
                    esc_html__( 'Yes', 'skembedjis' )   => 'true',
                    esc_html__( 'No', 'skembedjis' )    => 'false'
                ),
                "description" => esc_html__( "Select product carousel autoplay. If want to enable autoplay! Select yes.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Enable autoplayTimeout?", "skembedjis" ),
                "param_name"=> "autoplaytimeout",
                "std"       => esc_html__( "5000", "skembedjis" ),
                "value"     => array(
                    '1 second'  => esc_attr__( '1000', 'skembedjis' ),
                    '2 seconds' => esc_attr__( '2000', 'skembedjis' ),
                    '3 seconds' => esc_attr__( '3000', 'skembedjis' ),
                    '4 seconds' => esc_attr__( '4000', 'skembedjis' ),
                    '5 seconds' => esc_attr__( '5000', 'skembedjis' ),
                    '6 seconds' => esc_attr__( '6000', 'skembedjis' ),
                    '7 seconds' => esc_attr__( '7000', 'skembedjis' ),
                    '8 seconds' => esc_attr__( '8000', 'skembedjis' ),
                    '9 seconds' => esc_attr__( '9000', 'skembedjis' ),
                    '10 seconds'=> esc_attr__( '10000', 'skembedjis' ),
                    '11 seconds'=> esc_attr__( '11000', 'skembedjis' ),
                    '12 seconds'=> esc_attr__( '12000', 'skembedjis' ),
                    '13 seconds'=> esc_attr__( '13000', 'skembedjis' ),
                    '14 seconds'=> esc_attr__( '14000', 'skembedjis' ),
                    '15 seconds'=> esc_attr__( '15000', 'skembedjis' ),
                ),
                "description" => esc_html__( "Select product carousel autoplayTimeout", "skembedjis" ),
            ),
        )
    )
);


// Product category thumbnail addon
vc_map(
    array(
        "name"      => esc_html__( "Product category thumbnail", "skembedjis" ),
        "base"      => "skembedjis_pct",
        "category"  => esc_html__( "Skembedjis", "skembedjis" ),
        ///'icon'      => WOWNEWSHOP_ACC_URL.'/assets/img/category-thumb.png',
        "params"    => array(
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Select category", "skembedjis" ),
                "param_name"=> "cat_ids",
                "value"     => wownewshop_product_category_as_list(),
                "description" => esc_html__( "Select category. You can select any category.", "skembedjis" ),
            ),
            array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Columns", "skembedjis" ),
                "param_name"=> "columns",
                "std"       => esc_html__( "4", "skembedjis" ),
                "description"=> esc_html__( "Select columns", "skembedjis" ),
                "value"     => array(
                    "1" => esc_html__( "1 column", "skembedjis" ),
                    "2" => esc_html__( "2 columns", "skembedjis" ),
                    "3" => esc_html__( "3 columns", "skembedjis" ),
                    "4" => esc_html__( "4 columns", "skembedjis" ),
                    "4" => esc_html__( "5 columns", "skembedjis" ),
                    "4" => esc_html__( "6 columns", "skembedjis" ),
                )
            ),
        )
    )
);


}
add_action( 'vc_before_init', 'skembedjis_integrateWithVC' );
