<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 
function dmvstairlifts_integrateWithVC() {

// Banner section addon
vc_map(
    array(
        "name"      => esc_html__( "DMVStairlifts Banner", "dmvstairlifts-toolkit" ),
        "base"      => "dmvstairlifts_banners",
        "category"  => esc_html__( "DMVStairlifts", "dmvstairlifts-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "dmvstairlifts-toolkit" ),
                "param_name" => "bg_img",
                "description"=> esc_html__( "Upload image.", "dmvstairlifts-toolkit" ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "dmvstairlifts-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type dmvstairlifts title.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "dmvstairlifts-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "dmvstairlifts-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "Register Membership", "dmvstairlifts-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "dmvstairlifts-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "dmvstairlifts-toolkit") =>  "1",
                    esc_html__("External link", "dmvstairlifts-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "dmvstairlifts-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  dmvstairlifts_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "dmvstairlifts-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "dmvstairlifts-toolkit"),
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
        "name"      => esc_html__( "DMVStairlifts Colored", "dmvstairlifts-toolkit" ),
        "base"      => "colored_section",
        "category"  => esc_html__( "DMVStairlifts", "dmvstairlifts-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "dmvstairlifts-toolkit" ),
                "param_name" => "colored_bg",
                "description"=> esc_html__( "Upload image.", "dmvstairlifts-toolkit" ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( "Background color", "dmvstairlifts-toolkit" ),
                "param_name"    => "bg_color",
                "description"   => esc_html__( "Choose background color", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Select class", "dmvstairlifts-toolkit" ),
                "param_name"    => "dynamic_class",
                "value" => array(
                    esc_html__( 'Black', 'dmvstairlifts-toolkit' )   => 'black',
                    esc_html__( 'Blue', 'dmvstairlifts-toolkit' )    => 'blue'
                ),
                "description"   => esc_html__( "Select class for section", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "dmvstairlifts-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type dmvstairlifts title.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "dmvstairlifts-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "dmvstairlifts-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "멤버쉽 가입하기", "dmvstairlifts-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "dmvstairlifts-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "dmvstairlifts-toolkit") =>  "1",
                    esc_html__("External link", "dmvstairlifts-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "dmvstairlifts-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  dmvstairlifts_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "dmvstairlifts-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "dmvstairlifts-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "dmvstairlifts-toolkit"),
                "param_name"    =>  "right_img1",
                "description"   =>  esc_html__("Upload right 1st image", "dmvstairlifts-toolkit")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "dmvstairlifts-toolkit"),
                "param_name"    =>  "right_img2",
                "description"   =>  esc_html__("Upload right 2nd image", "dmvstairlifts-toolkit")
            ),
        )
    )
);



// Colored grey section addon
vc_map(
    array(
        "name"      => esc_html__( "DMVStairlifts Colored Grey", "dmvstairlifts-toolkit" ),
        "base"      => "colored_grey_section",
        "category"  => esc_html__( "DMVStairlifts", "dmvstairlifts-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "dmvstairlifts-toolkit" ),
                "param_name" => "colored_bg",
                "description"=> esc_html__( "Upload image.", "dmvstairlifts-toolkit" ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( "Background color", "dmvstairlifts-toolkit" ),
                "param_name"    => "bg_color",
                "description"   => esc_html__( "Choose background color", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( "Select class", "dmvstairlifts-toolkit" ),
                "param_name"    => "dynamic_class",
                "value" => array(
                    esc_html__( 'Double Image', 'dmvstairlifts-toolkit' )   => 'double-image',
                    esc_html__( 'Single Image', 'dmvstairlifts-toolkit' )    => 'single-image'
                ),
                "description"   => esc_html__( "Select class for section", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Title", "dmvstairlifts-toolkit" ),
                "param_name"    => "title",
                "description"   => esc_html__( "Type dmvstairlifts title.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__( "Description", "dmvstairlifts-toolkit" ),
                "param_name"    => "desc",
                "description"   => esc_html__( "Type description.", "dmvstairlifts-toolkit" )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "dmvstairlifts-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "멤버쉽 가입하기", "dmvstairlifts-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "dmvstairlifts-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "dmvstairlifts-toolkit") =>  "1",
                    esc_html__("External link", "dmvstairlifts-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "dmvstairlifts-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  dmvstairlifts_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "dmvstairlifts-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type1",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "dmvstairlifts-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "dmvstairlifts-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "dmvstairlifts-toolkit"),
                "param_name"    =>  "right_img1",
                "description"   =>  esc_html__("Upload right 1st image", "dmvstairlifts-toolkit")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "dmvstairlifts-toolkit"),
                "param_name"    =>  "right_img2",
                "description"   =>  esc_html__("Upload right 2nd image", "dmvstairlifts-toolkit")
            ),
        )
    )
);


// Section title addon 
vc_map( 
    array(
        "name" => esc_html__( "DMVStairlifts Section Title", "dmvstairlifts" ),
        "base" => "dmvstairlifts_section_title",
        // "icon"  => dmvstairlifts_ACC_URL.'/assets/img/section-title.png',
        "category" => esc_html__( "DMVStairlifts", "dmvstairlifts"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Section Style", "dmvstairlifts"),
                "param_name"    =>  "style",
                "std"           =>  esc_html__("1", "dmvstairlifts"),
                "description"   =>  esc_html__("Select section title style", "dmvstairlifts"),
                "value"         =>  array(
                    esc_html__("Font size 40", "dmvstairlifts")   =>  "1",
                    esc_html__("Font size 35", "dmvstairlifts")   =>  "2",
                    esc_html__("Font size 30", "dmvstairlifts")   =>  "3",
                    esc_html__("Font size 27", "dmvstairlifts")   =>  "4",
                    esc_html__("Font size 20", "dmvstairlifts")   =>  "5",
                ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Section title", "dmvstairlifts"),
                "param_name"    =>  "title",
                "description"   =>  esc_html__("Write your section title", "dmvstairlifts")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Title color", "dmvstairlifts"),
                "param_name"    =>  "title_color",
                "description"   =>  esc_html__("Choose section title color", "dmvstairlifts")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Description", "dmvstairlifts"),
                "param_name"    =>  "desc_option",
                "std"           =>  esc_html__("2", "dmvstairlifts"),
                "description"   =>  esc_html__("Enable description with setcion title? Select yes.", "dmvstairlifts"),
                "value"         =>  array(
                    esc_html__("Yes", "dmvstairlifts")   =>  "1",
                    esc_html__("No", "dmvstairlifts")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "textarea",
                "heading"       =>  esc_html__("Section description", "dmvstairlifts"),
                "param_name"    =>  "desc",
                "description"   =>  esc_html__("Write your section title", "dmvstairlifts"),
                "dependency"    =>  array(
                    "element"   =>  "desc_option",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "dmvstairlifts"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling for your section title", "dmvstairlifts"),
                "value"         =>  array(
                    esc_html__("Left", "dmvstairlifts")        =>  "left",
                    esc_html__("Center", "dmvstairlifts")      =>  "center",
                    esc_html__("Right", "dmvstairlifts")       =>  "right"
                ),
            )
        )
    ) 
);


// Primium Brand project addon 
vc_map( 
    array(
        "name" => esc_html__( "Primium brands project", "dmvstairlifts" ),
        "base" => "primium_brands_project",
        "category" => esc_html__( "DMVStairlifts", "dmvstairlifts"),
        "params"   => array(
        	array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Count", "dmvstairlifts"),
                "param_name"    =>  "count",
                "std"           =>  esc_html__( "-1", "dmvstairlifts" ),
                "description"   =>  esc_html__("Type how many items want to display", "dmvstairlifts")
            ),
        )
    ) 
);


// Indie Brand project addon 
vc_map( 
    array(
        "name" => esc_html__( "Indie brands project", "dmvstairlifts" ),
        "base" => "indie_brands_project",
        "category" => esc_html__( "DMVStairlifts", "dmvstairlifts"),
        "params"   => array(
        	array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Count", "dmvstairlifts"),
                "param_name"    =>  "count",
                "std"           =>  esc_html__( "-1", "dmvstairlifts" ),
                "description"   =>  esc_html__("Type how many items want to display", "dmvstairlifts")
            ),
        )
    ) 
);



// Brand banner addon 
vc_map( 
    array(
        "name" => esc_html__( "Brand banner (category page)", "dmvstairlifts" ),
        "base" => "primium_brand_banner",
        "category" => esc_html__( "DMVStairlifts", "dmvstairlifts"),
        "params"   => array(
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "dmvstairlifts"),
                "param_name"    =>  "brand_bg",
                "description"   =>  esc_html__("Upload brand banner image for category page", "dmvstairlifts")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Title type", "dmvstairlifts"),
                "param_name"    =>  "title_type",
                "std"           =>  esc_html__("1", "dmvstairlifts"),
                "description"   =>  esc_html__("Select title type. you can choose logo or text", "dmvstairlifts"),
                "value"         =>  array(
                    esc_html__("Logo", "dmvstairlifts")   =>  "1",
                    esc_html__("Text", "dmvstairlifts")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Upload", "dmvstairlifts"),
                "param_name"    =>  "brand_bg_logo",
                "description"   =>  esc_html__("Upload logo for banner", "dmvstairlifts"),
                "dependency"    =>  array(
                    "element"   =>  "title_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Title", "dmvstairlifts"),
                "param_name"    =>  "brand_bg_title",
                "description"   =>  esc_html__("Type title here", "dmvstairlifts"),
                "dependency"    =>  array(
                    "element"   =>  "title_type",
                    "value"     =>  "2"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Kurian title", "dmvstairlifts"),
                "param_name"    =>  "brand_bg_k_title",
                "description"   =>  esc_html__("Type Kurian title here", "dmvstairlifts"),
            ),
        )
    ) 
);




// Brand wholesale addon 
vc_map( 
    array(
        "name" => esc_html__( "Brand wholesale (category page)", "dmvstairlifts" ),
        "base" => "brand_wholesale",
        "category" => esc_html__( "DMVStairlifts", "dmvstairlifts"),
        "params"   => array(
        	array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Title", "dmvstairlifts" ),
                "param_name" => "wsp_title",
                "std"		 => esc_html__( 'WHOLESALE POLICY', 'dmvstairlifts' ),
                "description"=> esc_html__( "Type title here", "dmvstairlifts" ),
            ),
            array(
                'type' => 'param_group',
                "heading"       =>  esc_html__("Add new text", "dmvstairlifts"),
                'param_name' => 'table_list_text',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 1", "dmvstairlifts" ),
                        'param_name' => 'text1',
                        'description'=> esc_html__( 'Type column 1 text', 'dmvstairlifts' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 2", "dmvstairlifts" ),
                        'param_name' => 'text2',
                        'description'=> esc_html__( 'Type column 2 text', 'dmvstairlifts' )
                    ),
                )
            ),
            array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Text", "dmvstairlifts" ),
                "param_name" => "table_black_text",
                "std"		 => esc_html__( '주문신청하기', 'dmvstairlifts' ),
                "description"=> esc_html__( "Type black table text here", "dmvstairlifts" ),
            ),
        )
    ) 
);

/*====== Start brand image gallery addon ======*/
vc_map( 
	array(
		"name"			=> esc_html__( "Brand gallery images (Category page)", "dmvstairlifts" ),
		"base"			=> "brand_images",
		"category"		=> esc_html__( "DMVStairlifts", "dmvstairlifts" ),
		"params"		=> array(
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( "Select clase", "dmvstairlifts" ),
				"param_name"	=> "gallery_class",
				"std"			=> esc_html__( "left", "dmvstairlifts" ),
				"value"         =>  array(
                    esc_html__("left", "dmvstairlifts")   =>  "left",
                    esc_html__("right", "dmvstairlifts")  =>  "right"
                ),
				"description"	=> esc_html__( "Select gallery class for left or right side design", "dmvstairlifts" ),	
			),
			array(
				"type"			=> "attach_images",
				"heading"		=> esc_html__( "Upload images", "dmvstairlifts" ),
				"param_name"	=> "images",
				"description"	=> esc_html__( "Upload brand gallery images", "dmvstairlifts" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image height", "dmvstairlifts" ),
				"param_name"	=> "height",
				"description"	=> esc_html__( "Type image height in numbers.", "dmvstairlifts" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image size", "dmvstairlifts" ),
				"param_name"	=> "size",
				"std"			=> esc_html__( "large", "dmvstairlifts" ),
				"description"	=> esc_html__( "Type image size.", "dmvstairlifts" ),	
			)
		)
	)
);
// End tile gallery addon




}
add_action( 'vc_before_init', 'dmvstairlifts_integrateWithVC' );