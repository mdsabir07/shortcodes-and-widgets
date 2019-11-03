<?php
 
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

function brendan_integrateWithVC() {
vc_map(
    array(
        "name"      => esc_html__( "Banner with tags", "brendan-toolkit" ),
        "base"      => "brendan_banner",
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        "params"    => array(
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Banner height", "brendan-toolkit" ),
                "param_name"=> "height",
                "std"       => esc_html__( "730", "brendan-toolkit" ),
                "description" => esc_html__( "Type Banner height on px. Numbers only.", "brendan-toolkit" ),
            ),
            array(
                "type"      => "colorpicker",
                "heading"   => esc_html__( "Banner background color", "brendan-toolkit" ),
                "param_name"=> "bg_color",
                "std"       =>  "#4DBFBF",
                "description" => esc_html__( "Select Banner background color.", "brendan-toolkit" ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Banner title", "banner-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type banner title.", "banner-toolkit" )
            ),


            // array(
            //     "type"          =>  "textfield",
            //     "heading"       =>  esc_html__("Button left text", "banner-toolkit"),
            //     "param_name"    =>  "button_text_l",
            //     "std"        => esc_html__( "Know more", "brendan-toolkit" ),
            //     "description"   =>  esc_html__("Type button text")
            // ),
            // array(
            //     "type"          =>  "colorpicker",
            //     "heading"       =>  esc_html__("Button background color", "banner-toolkit"),
            //     "param_name"    =>  "btn_bg_color1",
            //     "std"           => "#70CBCB",
            //     "description"   =>  esc_html__("Select button background color")
            // ),
            // array(
            //     "type"          =>  "colorpicker",
            //     "heading"       =>  esc_html__("Button text color", "banner-toolkit"),
            //     "param_name"    =>  "btn_text_color1",
            //     "std"           => "#fff",
            //     "description"   =>  esc_html__("Select button text color")
            // ),
            // array(
            //     "type"          =>  "dropdown",
            //     "heading"       =>  esc_html__("Select link type", "banner-toolkit"),
            //     "param_name"    =>  "link_type1",
            //     "std"           =>  esc_html__("1", "banner-toolkit"),
            //     "value"         =>  array(
            //         esc_html__("Wordpress Page", "banner-toolkit")    =>  "1",
            //         esc_html__("External link", "banner-toolkit")     =>  "2",
            //     ),
            //     "description"   =>  esc_html__("Choose link form pages.", "banner-toolkit")
            // ),
            // array(
            //     "type"          =>  "dropdown",
            //     "heading"       =>  esc_html__("Select page", "banner-toolkit"),
            //     "param_name"    =>  "link_to_page1",
            //     "value"         =>  banner_toolkit_get_page_as_list(),
            //     "description"   =>  esc_html__("Select page for using as link", "banner-toolkit"),
            //     "dependency"    =>  array(
            //         "element"   =>  "link_type1",
            //         "value"     =>  "1"
            //     )
            // ),
            // array(
            //     "type"          =>  "textfield",
            //     "heading"       =>  esc_html__("Type url", "banner-toolkit"),
            //     "param_name"    =>  "link_to_external1",
            //     "description"   =>  esc_html__("Type url for booking", "banner-toolkit"),
            //     "dependency"    =>  array(
            //         "element"   =>  "link_type1",
            //         "value"     =>  "2"
            //     )
            // ),
            // array(
            //     "type"          =>  "textfield",
            //     "heading"       =>  esc_html__("Button right text", "banner-toolkit"),
            //     "param_name"    =>  "button_text_2",
            //     "std"        => esc_html__( "Learn more", "brendan-toolkit" ),
            //     "description"   =>  esc_html__("Type button text")
            // ),
            // array(
            //     "type"          =>  "colorpicker",
            //     "heading"       =>  esc_html__("Button background color", "banner-toolkit"),
            //     "param_name"    =>  "btn_bg_color2",
            //     "std"           => "#70CBCB",
            //     "description"   =>  esc_html__("Select button background color")
            // ),
            // array(
            //     "type"          =>  "colorpicker",
            //     "heading"       =>  esc_html__("Button text color", "banner-toolkit"),
            //     "param_name"    =>  "btn_text_color2",
            //     "std"           => "#fff",
            //     "description"   =>  esc_html__("Select button text color")
            // ),
            // array(
            //     "type"          =>  "dropdown",
            //     "heading"       =>  esc_html__("Select link type", "banner-toolkit"),
            //     "param_name"    =>  "link_type2",
            //     "std"           =>  esc_html__("1", "banner-toolkit"),
            //     "value"         =>  array(
            //         esc_html__("Wordpress Page", "banner-toolkit")    =>  "1",
            //         esc_html__("External link", "banner-toolkit")     =>  "2",
            //     ),
            //     "description"   =>  esc_html__("Choose link form pages.", "banner-toolkit")
            // ),
            // array(
            //     "type"          =>  "dropdown",
            //     "heading"       =>  esc_html__("Select page", "banner-toolkit"),
            //     "param_name"    =>  "link_to_page2",
            //     "value"         =>  banner_toolkit_get_page_as_list(),
            //     "description"   =>  esc_html__("Select page for using as link", "banner-toolkit"),
            //     "dependency"    =>  array(
            //         "element"   =>  "link_type2",
            //         "value"     =>  "1"
            //     )
            // ),
            // array(
            //     "type"          =>  "textfield",
            //     "heading"       =>  esc_html__("Type url", "banner-toolkit"),
            //     "param_name"    =>  "link_to_external2",
            //     "description"   =>  esc_html__("Type url for booking", "banner-toolkit"),
            //     "dependency"    =>  array(
            //         "element"   =>  "link_type2",
            //         "value"     =>  "2"
            //     )
            // ),
            array(
                'type' => 'param_group',
                "heading"       =>  esc_html__("Add new tag", "banner-toolkit"),
                'param_name' => 'css_tags',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Tag neme", "brendan-toolkit" ),
                        'param_name' => 'tag_name',
                        'description'=> esc_html__( 'Type tag name', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'colorpicker',
                        "heading" => esc_html__( "Tag background", "brendan-toolkit" ),
                        'param_name' => 'tag_bg',
                        'description'=> esc_html__( 'Chose tag background', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'colorpicker',
                        "heading" => esc_html__( "Tag color", "brendan-toolkit" ),
                        'param_name' => 'tag_color',
                        'description'=> esc_html__( 'Chose tag color', 'brendan-toolkit' )
                    ),
                )
            ),
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "banner-toolkit" ),
                "param_name" => "image",
                "description"=> esc_html__( "Upload image.", "banner-toolkit" ),
            ),
        )
    )
);

// Banner 2 addon
vc_map(
    array(
        "name"      => esc_html__( "Banner with button", "brendan-toolkit" ),
        "base"      => "brendan_banner2",
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        "params"    => array(
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Banner height", "brendan-toolkit" ),
                "param_name"=> "height",
                "std"       => esc_html__( "730", "brendan-toolkit" ),
                "description" => esc_html__( "Type Banner height on px. Numbers only.", "brendan-toolkit" ),
            ),
            array(
                "type"      => "attach_image",
                "heading"   => esc_html__( "Background image", "brendan-toolkit" ),
                "param_name"=> "banner_bg",
                "description" => esc_html__( "Upload background image", "brendan-toolkit" ),
            ),
            array(
                "type"      => "colorpicker",
                "heading"   => esc_html__( "Banner background color", "brendan-toolkit" ),
                "param_name"=> "bg_color",
                "std"       =>  "#4DBFBF",
                "description" => esc_html__( "Select Banner background color.", "brendan-toolkit" ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Banner title", "banner-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type banner title.", "banner-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "banner-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type banner description.", "banner-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button left text", "banner-toolkit"),
                "param_name"    =>  "button_text_l",
                "std"        => esc_html__( "Know more", "brendan-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button background color", "banner-toolkit"),
                "param_name"    =>  "btn_bg_color1",
                "std"           => "#70CBCB",
                "description"   =>  esc_html__("Select button background color")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button text color", "banner-toolkit"),
                "param_name"    =>  "btn_text_color1",
                "std"           => "#fff",
                "description"   =>  esc_html__("Select button text color")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "banner-toolkit"),
                "param_name"    =>  "link_type1",
                "std"           =>  esc_html__("1", "banner-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "banner-toolkit")    =>  "1",
                    esc_html__("External link", "banner-toolkit")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "banner-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "banner-toolkit"),
                "param_name"    =>  "link_to_page1",
                "value"         =>  banner_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "banner-toolkit"),
                "param_name"    =>  "link_to_external1",
                "description"   =>  esc_html__("Type url for booking", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button right text", "banner-toolkit"),
                "param_name"    =>  "button_text_2",
                "std"        => esc_html__( "Learn more", "brendan-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button background color", "banner-toolkit"),
                "param_name"    =>  "btn_bg_color2",
                "std"           => "#70CBCB",
                "description"   =>  esc_html__("Select button background color")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Button text color", "banner-toolkit"),
                "param_name"    =>  "btn_text_color2",
                "std"           => "#fff",
                "description"   =>  esc_html__("Select button text color")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "banner-toolkit"),
                "param_name"    =>  "link_type2",
                "std"           =>  esc_html__("1", "banner-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "banner-toolkit")    =>  "1",
                    esc_html__("External link", "banner-toolkit")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "banner-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "banner-toolkit"),
                "param_name"    =>  "link_to_page2",
                "value"         =>  banner_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type2",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "banner-toolkit"),
                "param_name"    =>  "link_to_external2",
                "description"   =>  esc_html__("Type url for booking", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type2",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "banner-toolkit" ),
                "param_name" => "image",
                "description"=> esc_html__( "Upload image.", "banner-toolkit" ),
            ),
        )
    )
);


// Banner 3 addon
vc_map(
    array(
        "name"      => esc_html__( "Banner without button", "brendan-toolkit" ),
        "base"      => "brendan_banner3",
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        "params"    => array(
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Banner height", "brendan-toolkit" ),
                "param_name"=> "height",
                "std"       => esc_html__( "380", "brendan-toolkit" ),
                "description" => esc_html__( "Type Banner height on px. Numbers only.", "brendan-toolkit" ),
            ),
            array(
                "type"      => "attach_image",
                "heading"   => esc_html__( "Background image", "brendan-toolkit" ),
                "param_name"=> "banner_bg",
                "description" => esc_html__( "Upload background image", "brendan-toolkit" ),
            ),
            array(
                "type"      => "colorpicker",
                "heading"   => esc_html__( "Banner background color", "brendan-toolkit" ),
                "param_name"=> "bg_color",
                "std"       =>  "#4DBFBF",
                "description" => esc_html__( "Select Banner background color.", "brendan-toolkit" ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Banner title", "banner-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type banner title.", "banner-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "banner-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type banner description.", "banner-toolkit" )
            ),
        )
    )
);


// About addon 
vc_map(
    array(
        "name"      => esc_html__( "Brendan about box", "brendan-toolkit" ),
        "base"      => "brendan_about",
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        "params"    => array(
            array(
            "type"          => "attach_image",
            "heading"       => esc_html__( "Image", "brendan-toolkit" ),
            "param_name"    => "image",
            "description"   => esc_html__( "Upload about image.", "brendan-toolkit" )
            ),
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Title", "brendan-toolkit" ),
            "param_name"    => "title",
            "description"   => esc_html__( "Type author name.", "brendan-toolkit" )
            ),
            array(
            "type"          => "textfield",
            "heading"       => esc_html__( "Profession", "brendan-toolkit" ),
            "param_name"    => "profession",
            "description"   => esc_html__( "Type author profession.", "brendan-toolkit" )
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon 1', 'banner-toolkit'),
                'param_name' => 'icon1',
                'description'=> esc_html__( 'Select icon', 'banner-toolkit' ) 
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon 1 link', 'banner-toolkit'),
                'param_name' => 'icon1_link',
                'description'=> esc_html__( 'Type icon 1 link here', 'banner-toolkit' ) 
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon 2', 'banner-toolkit'),
                'param_name' => 'icon2',
                'description'=> esc_html__( 'Select icon', 'banner-toolkit' ) 
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon 2 link', 'banner-toolkit'),
                'param_name' => 'icon2_link',
                'description'=> esc_html__( 'Type icon 2 link here', 'banner-toolkit' ) 
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon 3', 'banner-toolkit'),
                'param_name' => 'icon3',
                'description'=> esc_html__( 'Select icon', 'banner-toolkit' ) 
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon 3 link', 'banner-toolkit'),
                'param_name' => 'icon3_link',
                'description'=> esc_html__( 'Type icon 3 link here', 'banner-toolkit' ) 
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button right text", "banner-toolkit"),
                "param_name"    =>  "button_text",
                "std"        => esc_html__( "Contact me", "brendan-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "banner-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "banner-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "banner-toolkit")    =>  "1",
                    esc_html__("External link", "banner-toolkit")     =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "banner-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "banner-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  banner_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "banner-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type url for booking", "banner-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__( "Content", "brendan-toolkit" ),
                "param_name" => "content",
                'description'=> esc_html__( 'Type content here', 'brendan-toolkit' )
            ),
        )
    )
);


// Social media addon 
vc_map(
    array(
        "name"      => esc_html__( "Brendan Socials", "brendan-toolkit" ),
        'base' => 'socials',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                "param_name" => "title",
                'description'=> esc_html__( 'Type title here', 'brendan-toolkit' )
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'socials',
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        "heading" => esc_html__( "Icon", "brendan-toolkit" ),
                        'param_name' => 'icon',
                        'description'=> esc_html__( 'Select social icon', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Link", "brendan-toolkit" ),
                        'param_name' => 'link',
                        'description'=> esc_html__( 'Type social link', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);


// Social media addon 
vc_map(
    array(
        "name"      => esc_html__( "Blog menus", "brendan-toolkit" ),
        'base' => 'blog_menus',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'param_group',
                'param_name' => 'blog_menu_lists',
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        "heading" => esc_html__( "Icon", "brendan-toolkit" ),
                        'param_name' => 'icon',
                        'description'=> esc_html__( 'Select social icon', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Link", "brendan-toolkit" ),
                        'param_name' => 'menu_link',
                        'description'=> esc_html__( 'Insert menu link', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Title", "brendan-toolkit" ),
                        'param_name' => 'menu_text',
                        'description'=> esc_html__( 'Type menu title', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);



// Designer location addon 
vc_map(
    array(
        "name"      => esc_html__( "Designer location", "brendan-toolkit" ),
        'base' => 'p_locations',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
        	array(
                'type' => 'textfield',
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                'param_name' => 'title',
                "std"        =>  esc_html__("Canada", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'locations',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Title", "brendan-toolkit" ),
                        'param_name' => 'menu_text',
                        'description'=> esc_html__( 'Type location name', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Link", "brendan-toolkit" ),
                        'param_name' => 'menu_link',
                        'description'=> esc_html__( 'Insert location link', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);


// Section title link addon 
vc_map(
    array(
        "name"      => esc_html__( "Section title with link button", "brendan-toolkit" ),
        'base' => 'section_title_link',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                "param_name" => "title",
                'description'=> esc_html__( 'Type title here', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Link", "brendan-toolkit" ),
                "param_name" => "link",
                'description'=> esc_html__( 'Insert link here', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "LInk text", "brendan-toolkit" ),
                "param_name" => "link_text",
                'description'=> esc_html__( 'Type link text here', 'brendan-toolkit' )
            ),
        ),
    )
);


// Post addon 
vc_map(
    array(
        "name"      => esc_html__( "Post article", "brendan-toolkit" ),
        'base' => 'brendan_posts',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Count", "brendan-toolkit" ),
                "param_name" => "count",
                "std"        =>  esc_html__("4", "banner-toolkit"),
                'description'=> esc_html__( 'Type how many post want to show', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Image height", "brendan-toolkit" ),
                "param_name" => "img_height",
                "std"        =>  esc_html__("224", "banner-toolkit"),
                'description'=> esc_html__( 'Type image height. default is 224px', 'brendan-toolkit' )
            ),
        ),
    )
);


// Post addon 
vc_map(
    array(
        "name"      => esc_html__( "Case Studies", "brendan-toolkit" ),
        'base' => 'case_studies',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Count", "brendan-toolkit" ),
                "param_name" => "count",
                "std"        =>  esc_html__("4", "banner-toolkit"),
                'description'=> esc_html__( 'Type how many post want to show', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Image height", "brendan-toolkit" ),
                "param_name" => "img_height",
                "std"        =>  esc_html__("212", "banner-toolkit"),
                'description'=> esc_html__( 'Type image height. default is 212px', 'brendan-toolkit' )
            ),
        ),
    )
);



// Why hire desinger addon 
vc_map(
    array(
        "name"      => esc_html__( "Why hire designer", "brendan-toolkit" ),
        'base' => 'wh_designer',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                "type" => "textarea",
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                "param_name" => "title",
                "std"        =>  esc_html__("Title", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__( "Description", "brendan-toolkit" ),
                "param_name" => "content",
                "std"        =>  esc_html__("Description", "banner-toolkit"),
                'description'=> esc_html__( 'Type description', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button text", "brendan-toolkit" ),
                "param_name" => "btn_text",
                "std"        =>  esc_html__("View my work", "banner-toolkit"),
                'description'=> esc_html__( 'Type button text', 'brendan-toolkit' )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button link", "brendan-toolkit" ),
                "param_name" => "btn_link",
                'description'=> esc_html__( 'Insert button link', 'brendan-toolkit' )
            ),
        ),
    )
);



// Approach addon 
vc_map(
    array(
        "name"      => esc_html__( "Approach", "brendan-toolkit" ),
        'base' => 'approach',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'colorpicker',
                "heading" => esc_html__( "Background color", "brendan-toolkit" ),
                'param_name' => 'bg_color',
                "std"        =>  esc_html__("#1B4564", "banner-toolkit"),
                'description'=> esc_html__( 'Choose background color', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                'param_name' => 'title',
                "std"        =>  esc_html__("Title", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'colorpicker',
                "heading" => esc_html__( "Title color", "brendan-toolkit" ),
                'param_name' => 'title_color',
                'description'=> esc_html__( 'Choose title color', 'brendan-toolkit' )
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'ap_boxs',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        "heading" => esc_html__( "Image", "brendan-toolkit" ),
                        'param_name' => 'img_icon',
                        'description'=> esc_html__( 'Upload Icon image', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Title", "brendan-toolkit" ),
                        'param_name' => 'box_title',
                        'description'=> esc_html__( 'Type box title', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Description", "brendan-toolkit" ),
                        'param_name' => 'desc',
                        'description'=> esc_html__( 'Type description', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Button text", "brendan-toolkit" ),
                        'param_name' => 'btn_text',
                        'description'=> esc_html__( 'Type button text', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Link", "brendan-toolkit" ),
                        'param_name' => 'link',
                        'description'=> esc_html__( 'Insert link', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);

// Feature NY city addon 
vc_map(
    array(
        "name"      => esc_html__( "Feature NY city", "brendan-toolkit" ),
        'base' => 'feature_nyc',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'colorpicker',
                "heading" => esc_html__( "Background color", "brendan-toolkit" ),
                'param_name' => 'bg_color',
                "std"        =>  esc_html__("#1B4564", "banner-toolkit"),
                'description'=> esc_html__( 'Choose background color', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                'param_name' => 'title',
                "std"        =>  esc_html__("Title", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'colorpicker',
                "heading" => esc_html__( "Title color", "brendan-toolkit" ),
                'param_name' => 'title_color',
                'description'=> esc_html__( 'Choose title color', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textarea',
                "heading" => esc_html__( "Content", "brendan-toolkit" ),
                'param_name' => 'details',
                'description'=> esc_html__( 'Type content', 'brendan-toolkit' )
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'techcrunchs',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        "heading" => esc_html__( "Image", "brendan-toolkit" ),
                        'param_name' => 'img_icon',
                        'description'=> esc_html__( 'Upload Icon image', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Title", "brendan-toolkit" ),
                        'param_name' => 'tech_title',
                        'description'=> esc_html__( 'Type box title', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Description", "brendan-toolkit" ),
                        'param_name' => 'desc',
                        'description'=> esc_html__( 'Type description', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);



// Feature NY city addon 
vc_map(
    array(
        "name"      => esc_html__( "Venturs", "brendan-toolkit" ),
        'base' => 'venturs',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'attach_image',
                "heading" => esc_html__( "Background image", "brendan-toolkit" ),
                'param_name' => 'venture_bg',
                'description'=> esc_html__( 'Upload background image', 'brendan-toolkit' )
            ),
        	array(
                'type' => 'attach_image',
                "heading" => esc_html__( "Top shape image", "brendan-toolkit" ),
                'param_name' => 'shape_img',
                'description'=> esc_html__( 'Upload top shape image', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                'param_name' => 'title',
                "std"        =>  esc_html__("Title", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'colorpicker',
                "heading" => esc_html__( "Title color", "brendan-toolkit" ),
                'param_name' => 'title_color',
                'description'=> esc_html__( 'Choose title color', 'brendan-toolkit' )
            ),
        	array(
                'type' => 'textarea',
                "heading" => esc_html__( "Content", "brendan-toolkit" ),
                'param_name' => 'details',
                'description'=> esc_html__( 'Type content', 'brendan-toolkit' )
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'ventures',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        "heading" => esc_html__( "Image", "brendan-toolkit" ),
                        'param_name' => 'img_icon',
                        'description'=> esc_html__( 'Upload Icon image', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Title", "brendan-toolkit" ),
                        'param_name' => 'venture_title',
                        'description'=> esc_html__( 'Type box title', 'brendan-toolkit' )
                    ),
                    array(
                        'type' => 'textarea',
                        "heading" => esc_html__( "Description", "brendan-toolkit" ),
                        'param_name' => 'desc',
                        'description'=> esc_html__( 'Type description', 'brendan-toolkit' )
                    ),
                )
            ),
        ),
    )
);



// cta addon 
vc_map(
    array(
        "name"      => esc_html__( "Call to Action", "brendan-toolkit" ),
        'base' => 'cta',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'attach_image',
                "heading" => esc_html__( "Background image", "brendan-toolkit" ),
                'param_name' => 'bg_img',
                'description'=> esc_html__( 'Upload background image', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Title", "brendan-toolkit" ),
                'param_name' => 'title',
                "std"        =>  esc_html__("Title", "banner-toolkit"),
                'description'=> esc_html__( 'Type title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textarea',
                "heading" => esc_html__( "Sub title", "brendan-toolkit" ),
                'param_name' => 'desc',
                'description'=> esc_html__( 'Type sub title', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Button text", "brendan-toolkit" ),
                'param_name' => 'btn_text',
                "std"        =>  esc_html__("Start your project", "banner-toolkit"),
                'description'=> esc_html__( 'Type button text', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Button link", "brendan-toolkit" ),
                'param_name' => 'btn_link',
                'description'=> esc_html__( 'Type button link', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Learn button text", "brendan-toolkit" ),
                'param_name' => 'lbtn_text',
                "std"        =>  esc_html__("Or learn how I do it!", "banner-toolkit"),
                'description'=> esc_html__( 'Type Learn button text', 'brendan-toolkit' )
            ),
            array(
                'type' => 'textfield',
                "heading" => esc_html__( "Learn button link", "brendan-toolkit" ),
                'param_name' => 'lbtn_link',
                'description'=> esc_html__( 'Type Learn button link', 'brendan-toolkit' )
            ),
        ),
    )
);



// Get free course addon 
vc_map(
    array(
        "name"      => esc_html__( "Get free course", "brendan-toolkit" ),
        'base' => 'get_free_course',
        "category"  => esc_html__( "Brendan", "brendan-toolkit" ),
        'params' => array(
            array(
                'type' => 'attach_image',
                "heading" => esc_html__( "Background image", "brendan-toolkit" ),
                'param_name' => 'bg_img',
                'description'=> esc_html__( 'Upload background image', 'brendan-toolkit' )
            ),
        	array(
                'type' => 'attach_image',
                "heading" => esc_html__( "Left image", "brendan-toolkit" ),
                'param_name' => 'image_left',
                'description'=> esc_html__( 'Upload left image', 'brendan-toolkit' )
            ),
        	array(
                'type' => 'textarea_html',
                "heading" => esc_html__( "Right content", "brendan-toolkit" ),
                'param_name' => 'content',
            ),
        ),
    )
);



}
add_action( 'vc_before_init', 'brendan_integrateWithVC' );