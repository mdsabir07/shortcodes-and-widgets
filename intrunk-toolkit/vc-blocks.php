<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 
function intrunk_integrateWithVC() {

// Banner section addon
vc_map(
    array(
        "name"      => esc_html__( "Intrunk Banner", "intrunk-toolkit" ),
        "base"      => "intrunk_banners",
        "category"  => esc_html__( "Intrunk", "intrunk-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "intrunk-toolkit" ),
                "param_name" => "bg_img",
                "description"=> esc_html__( "Upload image.", "intrunk-toolkit" ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "intrunk-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type intrunk title.", "intrunk-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "intrunk-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "intrunk-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "intrunk-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "Register Membership", "intrunk-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "intrunk-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "intrunk-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "intrunk-toolkit") =>  "1",
                    esc_html__("External link", "intrunk-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "intrunk-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "intrunk-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  intrunk_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "intrunk-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
        )
    )
);


// Colored section addon
vc_map(
    array(
        "name"      => esc_html__( "Intrunk Colored", "intrunk-toolkit" ),
        "base"      => "colored_section",
        "category"  => esc_html__( "Intrunk", "intrunk-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "intrunk-toolkit" ),
                "param_name" => "colored_bg",
                "description"=> esc_html__( "Upload image.", "intrunk-toolkit" ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( "Background color", "intrunk-toolkit" ),
                "param_name"    => "bg_color",
                "description"   => esc_html__( "Choose background color", "intrunk-toolkit" )
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Select class", "intrunk-toolkit" ),
                "param_name"    => "dynamic_class",
                "value" => array(
                    esc_html__( 'Black', 'intrunk-toolkit' )   => 'black',
                    esc_html__( 'Blue', 'intrunk-toolkit' )    => 'blue'
                ),
                "description"   => esc_html__( "Select class for section", "intrunk-toolkit" )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "intrunk-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type intrunk title.", "intrunk-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "intrunk-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "intrunk-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "intrunk-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "멤버쉽 가입하기", "intrunk-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "intrunk-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "intrunk-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "intrunk-toolkit") =>  "1",
                    esc_html__("External link", "intrunk-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "intrunk-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "intrunk-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  intrunk_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "intrunk-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "intrunk-toolkit"),
                "param_name"    =>  "right_img1",
                "description"   =>  esc_html__("Upload right 1st image", "intrunk-toolkit")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "intrunk-toolkit"),
                "param_name"    =>  "right_img2",
                "description"   =>  esc_html__("Upload right 2nd image", "intrunk-toolkit")
            ),
        )
    )
);



// Colored grey section addon
vc_map(
    array(
        "name"      => esc_html__( "Intrunk Colored Grey", "intrunk-toolkit" ),
        "base"      => "colored_grey_section",
        "category"  => esc_html__( "Intrunk", "intrunk-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "intrunk-toolkit" ),
                "param_name" => "colored_bg",
                "description"=> esc_html__( "Upload image.", "intrunk-toolkit" ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( "Background color", "intrunk-toolkit" ),
                "param_name"    => "bg_color",
                "description"   => esc_html__( "Choose background color", "intrunk-toolkit" )
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Select class", "intrunk-toolkit" ),
                "param_name"    => "dynamic_class",
                "value" => array(
                    esc_html__( 'Double Image', 'intrunk-toolkit' )   => 'double-image',
                    esc_html__( 'Single Image', 'intrunk-toolkit' )    => 'single-image'
                ),
                "description"   => esc_html__( "Select class for section", "intrunk-toolkit" )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "intrunk-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type intrunk title.", "intrunk-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "intrunk-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "intrunk-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "intrunk-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "멤버쉽 가입하기", "intrunk-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "intrunk-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "intrunk-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "intrunk-toolkit") =>  "1",
                    esc_html__("External link", "intrunk-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "intrunk-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "intrunk-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  intrunk_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "intrunk-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "intrunk-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "intrunk-toolkit"),
                "param_name"    =>  "right_img1",
                "description"   =>  esc_html__("Upload right 1st image", "intrunk-toolkit")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "intrunk-toolkit"),
                "param_name"    =>  "right_img2",
                "description"   =>  esc_html__("Upload right 2nd image", "intrunk-toolkit")
            ),
        )
    )
);


// Section title addon 
vc_map( 
    array(
        "name" => esc_html__( "Intrunk Section Title", "intrunk" ),
        "base" => "intrunk_section_title",
        // "icon"  => intrunk_ACC_URL.'/assets/img/section-title.png',
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Section Style", "intrunk"),
                "param_name"    =>  "style",
                "std"           =>  esc_html__("1", "intrunk"),
                "description"   =>  esc_html__("Select section title style", "intrunk"),
                "value"         =>  array(
                    esc_html__("Font size 40", "intrunk")   =>  "1",
                    esc_html__("Font size 35", "intrunk")   =>  "2",
                    esc_html__("Font size 30", "intrunk")   =>  "3",
                    esc_html__("Font size 27", "intrunk")   =>  "4",
                    esc_html__("Font size 20", "intrunk")   =>  "5",
                ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Section title", "intrunk"),
                "param_name"    =>  "title",
                "description"   =>  esc_html__("Write your section title", "intrunk")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Title color", "intrunk"),
                "param_name"    =>  "title_color",
                "description"   =>  esc_html__("Choose section title color", "intrunk")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Description", "intrunk"),
                "param_name"    =>  "desc_option",
                "std"           =>  esc_html__("2", "intrunk"),
                "description"   =>  esc_html__("Enable description with setcion title? Select yes.", "intrunk"),
                "value"         =>  array(
                    esc_html__("Yes", "intrunk")   =>  "1",
                    esc_html__("No", "intrunk")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "textarea",
                "heading"       =>  esc_html__("Section description", "intrunk"),
                "param_name"    =>  "desc",
                "description"   =>  esc_html__("Write your section title", "intrunk"),
                "dependency"    =>  array(
                    "element"   =>  "desc_option",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "intrunk"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling for your section title", "intrunk"),
                "value"         =>  array(
                    esc_html__("Left", "intrunk")        =>  "left",
                    esc_html__("Center", "intrunk")      =>  "center",
                    esc_html__("Right", "intrunk")       =>  "right"
                ),
            )
        )
    ) 
);


// Primium Brand project addon 
vc_map( 
    array(
        "name" => esc_html__( "Primium brands project", "intrunk" ),
        "base" => "primium_brands_project",
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params"   => array(
        	array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Count", "intrunk"),
                "param_name"    =>  "count",
                "std"           =>  esc_html__( "-1", "intrunk" ),
                "description"   =>  esc_html__("Type how many items want to display", "intrunk")
            ),
        )
    ) 
);


// Indie Brand project addon 
vc_map( 
    array(
        "name" => esc_html__( "Indie brands project", "intrunk" ),
        "base" => "indie_brands_project",
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params"   => array(
        	array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Count", "intrunk"),
                "param_name"    =>  "count",
                "std"           =>  esc_html__( "-1", "intrunk" ),
                "description"   =>  esc_html__("Type how many items want to display", "intrunk")
            ),
        )
    ) 
);



// Brand banner addon 
vc_map( 
    array(
        "name" => esc_html__( "Brand banner (category page)", "intrunk" ),
        "base" => "primium_brand_banner",
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params"   => array(
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "intrunk"),
                "param_name"    =>  "brand_bg",
                "description"   =>  esc_html__("Upload brand banner image for category page", "intrunk")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Title type", "intrunk"),
                "param_name"    =>  "title_type",
                "std"           =>  esc_html__("1", "intrunk"),
                "description"   =>  esc_html__("Select title type. you can choose logo or text", "intrunk"),
                "value"         =>  array(
                    esc_html__("Logo", "intrunk")   =>  "1",
                    esc_html__("Text", "intrunk")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "intrunk"),
                "param_name"    =>  "brand_bg_logo",
                "description"   =>  esc_html__("Upload logo for banner", "intrunk"),
                "dependency"    =>  array(
                    "element"   =>  "title_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Title", "intrunk"),
                "param_name"    =>  "brand_bg_title",
                "description"   =>  esc_html__("Type title here", "intrunk"),
                "dependency"    =>  array(
                    "element"   =>  "title_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Kurian title", "intrunk"),
                "param_name"    =>  "brand_bg_k_title",
                "description"   =>  esc_html__("Type Kurian title here", "intrunk"),
            ),
        )
    ) 
);




// Brand wholesale addon 
vc_map( 
    array(
        "name" => esc_html__( "Brand wholesale (category page)", "intrunk" ),
        "base" => "brand_wholesale",
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params"   => array(
        	array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Title", "intrunk" ),
                "param_name" => "wsp_title",
                "std"		 => esc_html__( 'WHOLESALE POLICY', 'intrunk' ),
                "description"=> esc_html__( "Type title here", "intrunk" ),
            ),
            array(
                'type' => 'param_group',
                "heading"       =>  esc_html__("Add new text", "intrunk"),
                'param_name' => 'table_list_text',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 1", "intrunk" ),
                        'param_name' => 'text1',
                        'description'=> esc_html__( 'Type column 1 text', 'intrunk' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 2", "intrunk" ),
                        'param_name' => 'text2',
                        'description'=> esc_html__( 'Type column 2 text', 'intrunk' )
                    ),
                )
            ),
            array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Text", "intrunk" ),
                "param_name" => "table_black_text",
                "std"		 => esc_html__( '주문신청하기', 'intrunk' ),
                "description"=> esc_html__( "Type black table text here", "intrunk" ),
            ),
        )
    ) 
);

/*====== Start brand image gallery addon ======*/
vc_map( 
	array(
		"name"			=> esc_html__( "Brand gallery images (Category page)", "intrunk" ),
		"base"			=> "brand_images",
		"category"		=> esc_html__( "Intrunk", "intrunk" ),
		"params"		=> array(
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( "Select clase", "intrunk" ),
				"param_name"	=> "gallery_class",
				"std"			=> esc_html__( "left", "intrunk" ),
				"value"         =>  array(
                    esc_html__("left", "intrunk")   =>  "left",
                    esc_html__("right", "intrunk")  =>  "right"
                ),
				"description"	=> esc_html__( "Select gallery class for left or right side design", "intrunk" ),	
			),
			array(
				"type"			=> "attach_images",
				"heading"		=> esc_html__( "Upload images", "intrunk" ),
				"param_name"	=> "images",
				"description"	=> esc_html__( "Upload brand gallery images", "intrunk" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image height", "intrunk" ),
				"param_name"	=> "height",
				"description"	=> esc_html__( "Type image height in numbers.", "intrunk" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image size", "intrunk" ),
				"param_name"	=> "size",
				"std"			=> esc_html__( "large", "intrunk" ),
				"description"	=> esc_html__( "Type image size.", "intrunk" ),	
			)
		)
	)
);
// End tile gallery addon




}
add_action( 'vc_before_init', 'intrunk_integrateWithVC' );