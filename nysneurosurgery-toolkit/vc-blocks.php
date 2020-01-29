<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 
function nysneurosurgery_integrateWithVC() {

// Banner with video/button addon
vc_map(
    array(
        "name"      => esc_html__( "Slider", "nysneurosurgery-toolkit" ),
        "base"      => "nysneurosurgery_banner_slider",
        "category"  => esc_html__( "NYSNeurosurgry", "nysneurosurgery-toolkit" ),
        "params"    => array(
            array(
                "type"       => "attach_image",
                "heading"    => esc_html__( "Upload", "nysneurosurgery-toolkit" ),
                "param_name" => "bg_img",
                "description"=> esc_html__( "Upload slider background image.", "nysneurosurgery-toolkit" ),
            ),
	        array(
	            "type"      => "dropdown",
	            "heading"   => esc_html__( "Enable autoplay?", "nysneurosurgery-toolkit" ),
	            "param_name"=> "autoplay",
	            "std"       => esc_html__( "true", "nysneurosurgery-toolkit" ),
	            "value"     => array(
	                esc_html__( 'Yes', 'nysneurosurgery-toolkit' )   => 'true',
	                esc_html__( 'No', 'nysneurosurgery-toolkit' )    => 'false'
	            ),
	            "description" => esc_html__( "Select slide autoplay. If want to enable autoplay! Select yes.", "nysneurosurgery-toolkit" ),
	        ),
	        array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Autoplay Speed", "nysneurosurgery-toolkit" ),
                "param_name"=> "autoplayspeed",
                "std"       => 2000,
                "value"     => array(
                    esc_attr__( '1 second', 'nysneurosurgery-toolkit' ) => 1000 ,
                    esc_attr__( '2 seconds', 'nysneurosurgery-toolkit' ) => 2000 ,
                    esc_attr__( '3 seconds', 'nysneurosurgery-toolkit' ) => 3000 ,
                    esc_attr__( '4 seconds', 'nysneurosurgery-toolkit' ) => 4000 ,
                    esc_attr__( '5 seconds', 'nysneurosurgery-toolkit' ) => 5000 ,
                    esc_attr__( '6 seconds', 'nysneurosurgery-toolkit' ) => 6000 ,
                    esc_attr__( '7 seconds', 'nysneurosurgery-toolkit' ) => 7000 ,
                    esc_attr__( '8 seconds', 'nysneurosurgery-toolkit' ) => 8000 ,
                    esc_attr__( '9 seconds', 'nysneurosurgery-toolkit' ) => 9000 ,
                    esc_attr__( '10 seconds', 'nysneurosurgery-toolkit' ) => 10000 ,
                ),
                "description" => esc_html__( "Select Autoplay Speed. default (2 seconds)", "nysneurosurgery-toolkit" ),
            ),
	        array(
                "type"      => "dropdown",
                "heading"   => esc_html__( "Slideing Speed", "nysneurosurgery-toolkit" ),
                "param_name"=> "speed",
                "std"       => 2000,
                "value"     => array(
                    esc_attr__( '1 second', 'nysneurosurgery-toolkit' ) => 1000 ,
                    esc_attr__( '2 seconds', 'nysneurosurgery-toolkit' ) => 2000 ,
                    esc_attr__( '3 seconds', 'nysneurosurgery-toolkit' ) => 3000 ,
                    esc_attr__( '4 seconds', 'nysneurosurgery-toolkit' ) => 4000 ,
                    esc_attr__( '5 seconds', 'nysneurosurgery-toolkit' ) => 5000 ,
                    esc_attr__( '6 seconds', 'nysneurosurgery-toolkit' ) => 6000 ,
                    esc_attr__( '7 seconds', 'nysneurosurgery-toolkit' ) => 7000 ,
                    esc_attr__( '8 seconds', 'nysneurosurgery-toolkit' ) => 8000 ,
                    esc_attr__( '9 seconds', 'nysneurosurgery-toolkit' ) => 9000 ,
                    esc_attr__( '10 seconds', 'nysneurosurgery-toolkit' ) => 10000 ,
                ),
                "description" => esc_html__( "Select Speed. default (2 seconds)", "nysneurosurgery-toolkit" ),
            ),
            array(
	            "type"      => "dropdown",
	            "heading"   => esc_html__( "Enable Mouse pause on hover?", "nysneurosurgery-toolkit" ),
	            "param_name"=> "pauseonhover",
	            "std"       => esc_html__( "false", "nysneurosurgery-toolkit" ),
	            "value"     => array(
	                esc_html__( 'True', 'nysneurosurgery-toolkit' )   => 'true',
	                esc_html__( 'False', 'nysneurosurgery-toolkit' )    => 'false'
	            ),
	            "description" => esc_html__( "If want to enable it! Select True. Default (False)", "nysneurosurgery-toolkit" ),
	        ),
        ),
    )
);


// Section image content addon 
vc_map( 
    array(
        "name" => esc_html__( "Features", "nysneurosurgery" ),
        "base" => "img_with_content",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery"),
        "params" => array(
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "nysneurosurgery"),
                "param_name"    =>  "bg_img",
                "description"   =>  esc_html__("Upload background Image", "nysneurosurgery")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Icon", "nysneurosurgery"),
                "param_name"    =>  "icon_img",
                "description"   =>  esc_html__("Upload icon", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textarea_html",
                "heading"       =>  esc_html__("Content", "nysneurosurgery"),
                "param_name"    =>  "content",
                "description"   =>  esc_html__("Write your content here", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Button text", "nysneurosurgery-toolkit"),
                "param_name"    =>  "button_text",
                "std"           => esc_html__( "Learn more", "nysneurosurgery-toolkit" ),
                "description"   =>  esc_html__("Type button text")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select link type", "nysneurosurgery-toolkit"),
                "param_name"    =>  "link_type",
                "std"           =>  esc_html__("1", "nysneurosurgery-toolkit"),
                "value"         =>  array(
                    esc_html__("Wordpress Page", "nysneurosurgery-toolkit") =>  "1",
                    esc_html__("External link", "nysneurosurgery-toolkit")  =>  "2",
                ),
                "description"   =>  esc_html__("Choose link form pages.", "nysneurosurgery-toolkit")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Select page", "nysneurosurgery-toolkit"),
                "param_name"    =>  "link_to_page",
                "value"         =>  nysneurosurgery_toolkit_get_page_as_list(),
                "description"   =>  esc_html__("Select page for using as link", "nysneurosurgery-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Type url", "nysneurosurgery-toolkit"),
                "param_name"    =>  "link_to_external",
                "description"   =>  esc_html__("Type external url", "nysneurosurgery-toolkit"),
                "dependency"    =>  array(
                    "element"   =>  "link_type",
                    "value"     =>  "2"
                )
            )
        )
    ) 
);


// Section title addon 
vc_map( 
    array(
        "name" => esc_html__( "Section Title", "nysneurosurgery" ),
        "base" => "nysneurosurgery_section_title",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Section Style", "nysneurosurgery"),
                "param_name"    =>  "style",
                "std"           =>  esc_html__("1", "nysneurosurgery"),
                "description"   =>  esc_html__("Select section title style", "nysneurosurgery"),
                "value"         =>  array(
                    esc_html__("Font size 40", "nysneurosurgery")   =>  "1",
                    esc_html__("Font size 35", "nysneurosurgery")   =>  "2",
                    esc_html__("Font size 30", "nysneurosurgery")   =>  "3",
                    esc_html__("Font size 27", "nysneurosurgery")   =>  "4",
                    esc_html__("Font size 20", "nysneurosurgery")   =>  "5",
                    esc_html__("Font size 18", "nysneurosurgery")   =>  "6",
                ),
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Section title", "nysneurosurgery"),
                "param_name"    =>  "title",
                "description"   =>  esc_html__("Write your section title", "nysneurosurgery")
            ),
            array(
                "type"          =>  "colorpicker",
                "heading"       =>  esc_html__("Title color", "nysneurosurgery"),
                "param_name"    =>  "title_color",
                "description"   =>  esc_html__("Choose section title color", "nysneurosurgery")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Description", "nysneurosurgery"),
                "param_name"    =>  "desc_option",
                "std"           =>  esc_html__("2", "nysneurosurgery"),
                "description"   =>  esc_html__("Enable description with setcion title? Select yes.", "nysneurosurgery"),
                "value"         =>  array(
                    esc_html__("Yes", "nysneurosurgery")   =>  "1",
                    esc_html__("No", "nysneurosurgery")    =>  "2"
                ),
            ),
            array(
                "type"          =>  "textarea_html",
                "heading"       =>  esc_html__("Section description", "nysneurosurgery"),
                "param_name"    =>  "content",
                "description"   =>  esc_html__("Write your section title", "nysneurosurgery"),
                "dependency"    =>  array(
                    "element"   =>  "desc_option",
                    "value"     =>  "1"
                )
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "nysneurosurgery"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling for your section title", "nysneurosurgery"),
                "value"         =>  array(
                    esc_html__("Left", "nysneurosurgery")        =>  "left",
                    esc_html__("Center", "nysneurosurgery")      =>  "center",
                    esc_html__("Right", "nysneurosurgery")       =>  "right"
                ),
            )
        )
    ) 
);



// Section icon addon 
vc_map( 
    array(
        "name" => esc_html__( "Section Icon", "nysneurosurgery" ),
        "base" => "nysneurosurgery_section_icon",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery"),
        "params" => array(
            array(
                "type"          => "dropdown",
                "heading"       =>  esc_html__("Icon type", "nysneurosurgery"),
                "param_name"    =>  "icon_type",
                "std"           =>  esc_html__("large", "nysneurosurgery"),
                "description"   =>  esc_html__("Select section title type", "nysneurosurgery"),
                "value"         =>  array(
                    esc_html__("Large Icon", "nysneurosurgery")   =>  "large",
                    esc_html__("Small Icon", "nysneurosurgery")   =>  "small",
                ),
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Icon", "nysneurosurgery"),
                "param_name"    =>  "icon_img",
                "description"   =>  esc_html__("Upload icon", "nysneurosurgery")
            ),
            array(
                "type"          =>  "dropdown",
                "heading"       =>  esc_html__("Text align.", "nysneurosurgery"),
                "param_name"    =>  "text_align",
                "std"           =>  "center",
                "description"   =>  esc_html__("Select text aling", "nysneurosurgery"),
                "value"         =>  array(
                    esc_html__("Center", "nysneurosurgery")      =>  "center",
                    esc_html__("Left", "nysneurosurgery")        =>  "left",
                    esc_html__("Right", "nysneurosurgery")       =>  "right"
                ),
            )
        )
    ) 
);




// Testimonials addon 
vc_map( 
    array(
        "name" => esc_html__( "Testimonials", "nysneurosurgery" ),
        "base" => "testimonials",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery"),
        "params" => array(
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "nysneurosurgery"),
                "param_name"    =>  "bg_img",
                "description"   =>  esc_html__("Upload background Image", "nysneurosurgery")
            ),
            array(
                "type"          => "textfield",
                "heading"       =>  esc_html__("Video URL", "nysneurosurgery"),
                "param_name"    =>  "video_url",
                "description"   =>  esc_html__("Insert video URL here", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textarea_html",
                "heading"       =>  esc_html__("Testimonials", "nysneurosurgery"),
                "param_name"    =>  "content",
                "description"   =>  esc_html__("Write testimonials here", "nysneurosurgery")
            ),
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "nysneurosurgery"),
                "param_name"    =>  "author_img",
                "description"   =>  esc_html__("Upload author image", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Name", "nysneurosurgery"),
                "param_name"    =>  "author_name",
                "description"   =>  esc_html__("Write author name here", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Location", "nysneurosurgery-toolkit"),
                "param_name"    =>  "author_location",
                "description"   =>  esc_html__("Type author location here")
            ),
        )
    ) 
);




// Team addon 
vc_map( 
    array(
        "name" => esc_html__( "Team members", "nysneurosurgery" ),
        "base" => "team_members",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery"),
        "params" => array(
            array(
                "type"          =>  "attach_image",
                "heading"       =>  esc_html__("Image", "nysneurosurgery"),
                "param_name"    =>  "img",
                "description"   =>  esc_html__("Upload team member Image", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Name", "nysneurosurgery"),
                "param_name"    =>  "name",
                "description"   =>  esc_html__("Type name here", "nysneurosurgery")
            ),
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Location", "nysneurosurgery-toolkit"),
                "param_name"    =>  "designation",
                "description"   =>  esc_html__("Type designation here")
            ),
        )
    ) 
);

// Brand wholesale addon 
vc_map( 
    array(
        "name" => esc_html__( "Table", "nysneurosurgery-toolkit" ),
        "base" => "tables",
        "category" => esc_html__( "NYSNeurosurgry", "nysneurosurgery-toolkit"),
        "params"   => array(
            array(
                "type"       => "textfield",
                "heading"    => esc_html__( "Title", "nysneurosurgery-toolkit" ),
                "param_name" => "table_title",
                "description"=> esc_html__( "Type title here", "nysneurosurgery-toolkit" ),
            ),
            array(
                'type' => 'param_group',
                "heading"       =>  esc_html__("Add new text", "nysneurosurgery-toolkit"),
                'param_name' => 'table_list_text',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 1", "nysneurosurgery-toolkit" ),
                        'param_name' => 'text1',
                        'description'=> esc_html__( 'Type column 1 text', 'nysneurosurgery-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 2", "nysneurosurgery-toolkit" ),
                        'param_name' => 'text2',
                        'description'=> esc_html__( 'Type column 2 text', 'nysneurosurgery-toolkit' )
                    ),
                    array(
                        'type' => 'textfield',
                        "heading" => esc_html__( "Text 2", "nysneurosurgery-toolkit" ),
                        'param_name' => 'text3',
                        'description'=> esc_html__( 'Type column 3 text', 'nysneurosurgery-toolkit' )
                    ),
                )
            ),
        )
    ) 
);



}
add_action( 'vc_before_init', 'nysneurosurgery_integrateWithVC' );