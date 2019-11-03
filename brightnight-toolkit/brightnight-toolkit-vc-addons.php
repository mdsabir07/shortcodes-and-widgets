<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Dynamic project category list on VC addons
function brightnight_get_post_cat_as_list( ) {
    $post_categories = get_terms( 'category' );

    $post_category_options = array(esc_html__('All category', 'brightnight-toolkit')=>'');
    if ( !empty($post_categories) ) {
        foreach ( $post_categories as $post_category ) {
            $post_category_options[ $post_category->name ] = $post_category->term_id;
        }
    }
    return $post_category_options;
}

/*====== Start vc addons ======*/
function brightnight_addons_integrateWithVC() {
	/*====== Start post box addon ======*/
	vc_map( 
		array(
			"name"			=> esc_html__( "Post box", "bright-night" ),
			"base"			=> "brightnight_post_box",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			//"description"	=> esc_html__( "Use this addon for display post", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Select categories", "bright-night" ),
					"param_name"	=> "post_cats",
					"description"	=> esc_html__( "Select categories", "bright-night" ),	
					"value"			=> brightnight_get_post_cat_as_list(),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Height", "bright-night" ),
					"param_name"	=> "height",
					"std"			=> esc_html__( "350", "bright-night" ),
					"description"	=> esc_html__( "Type image height, Numbers only.", "bright-night" ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Meta Style", "bright-night" ),
					"param_name"	=> "style",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "Select meta style.", "bright-night" ),	
					"value"			=> array(
						"Date"		=> "1",
						"Author"	=> "2",
					),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Button", "bright-night" ),
					"param_name"	=> "button",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "If want to button, select yes.", "bright-night" ),	
					"value"			=> array(
						"Yes"	=> "1",
						"No"	=> "2",
					),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Button text", "bright-night" ),
					"param_name"	=> "btn_text",
					"description"	=> esc_html__( "Type button text", "bright-night" ),
					"dependency"	=> array(
						"element"	=> "button",
						"value"		=> array("1")
					)	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Columns", "bright-night" ),
					"param_name"	=> "columns",
					"description"	=> esc_html__( "Type columns number. Numbers only", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Count", "bright-night" ),
					"param_name"	=> "count",	
					"description"	=> esc_html__( "Type posts count. Numbers only", "bright-night" ),	
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Pagination", "bright-night" ),
					"param_name"	=> "paginate",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "If want to paginate, select yes.", "bright-night" ),
					"value"			=> array(
						"Yes"	=> "1",
						"No"	=> "2",
					),	
				)
			)
		)
	);
	// End post box addon

	/*====== Start project addon ======*/
	vc_map( 
		array(
			"name"			=> esc_html__( "Brightnight project", "bright-night" ),
			"base"			=> "brightnight_projects",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Project title", "bright-night" ),
					"param_name"	=> "title",
					"description"	=> esc_html__( "Type project title", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Height", "bright-night" ),
					"param_name"	=> "height",
					"std"			=> esc_html__( "400", "bright-night" ),
					"description"	=> esc_html__( "Type image height, Numbers only.", "bright-night" ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Meta Style", "bright-night" ),
					"param_name"	=> "style",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "Select meta style.", "bright-night" ),	
					"value"			=> array(
						"Date"		=> "1",
						"Author"	=> "2",
					),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Button", "bright-night" ),
					"param_name"	=> "button",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "If want to button, select yes.", "bright-night" ),	
					"value"			=> array(
						"Yes"	=> "1",
						"No"	=> "2",
					),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Button text", "bright-night" ),
					"param_name"	=> "btn_text",
					"std"			=> esc_html__( "view full details", "bright-night" ),
					"description"	=> esc_html__( "Type button text", "bright-night" ),
					"dependency"	=> array(
						"element"	=> "button",
						"value"		=> array("1")
					)	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Columns", "bright-night" ),
					"param_name"	=> "columns",
					"description"	=> esc_html__( "Type columns number. Numbers only", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Count", "bright-night" ),
					"param_name"	=> "count",
					"std"			=> esc_html__( "9", "bright-night" ),
					"description"	=> esc_html__( "Type posts count. Numbers only", "bright-night" ),	
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Pagination", "bright-night" ),
					"param_name"	=> "paginate",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "If want to paginate, select yes.", "bright-night" ),
					"value"			=> array(
						"Yes"	=> "1",
						"No"	=> "2",
					),	
				)
			)
		)
	);
	// End project addon

	/*====== Start project masonry addon ======*/
	vc_map( 
		array(
			"name"			=> esc_html__( "Brightnight project masonry", "bright-night" ),
			"base"			=> "brightnight_projects_masonry",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Project title", "bright-night" ),
					"param_name"	=> "title",
					"description"	=> esc_html__( "Type project masonry title", "bright-night" ),	
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Meta Style", "bright-night" ),
					"param_name"	=> "style",
					"std"			=> esc_html__( "1", "bright-night" ),
					"description"	=> esc_html__( "Select meta style.", "bright-night" ),	
					"value"			=> array(
						"Date"		=> "1",
						"Author"	=> "2",
					),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Count", "bright-night" ),
					"param_name"	=> "count",
					"std"			=> esc_html__( "9", "bright-night" ),
					"description"	=> esc_html__( "Type posts count. Numbers only", "bright-night" ),	
				),
			)
		)
	);
	// End project masonry addon

	/*====== Start section title addon ======*/
	vc_map(
		array(
			"name"			=> esc_html__( "Section title", "bright-night" ),
			"base"			=> "section_title",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			//"description"	=> esc_html__( "Use this addon for display section title", "bright-night" ),
			"params"		=> array(
				array(
					"type"		=> "textfield",
					"heading"	=> esc_html__( "Title", "bright-night" ),
					"param_name"=> "title",
					"description" => esc_html__( "Type section title", "bright-night" ),
				),
				array(
					"type"		=> "textarea",
					"heading"	=> esc_html__( "Sub Title", "bright-night" ),
					"param_name"=> "sub_title",
					"description" => esc_html__( "Type section sub title", "bright-night" ),
				),
				array(
					"type"		=> "textarea",
					"heading"	=> esc_html__( "Description", "bright-night" ),
					"param_name"=> "desc",
					"description" => esc_html__( "Type section title description", "bright-night" ),
				)
			)
		)
	);
	// End section title addon

	/*====== Start slider addon ======*/
	vc_map( 
		array(
		    "name"    => __( "Brightnight Slider", "bright-night" ),
		    "base"    => "brightnight_slides",
		    "category"=> __( "Brightnight", "bright-night"),
		    "params"  => array(
		        array(
		            "type"       => "textfield",
		            "heading"    => __( "Count", "bright-night" ),
		            "param_name" => "count",
		            "value"      => __( "3", "bright-night" ),
		            "description"=> __( "Type slide count. If you want to unlimited slides, type -1", "bright-night" )
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable loop?", "bright-night" ),
		            "param_name" => "loop",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select slide loop. If you want to enable loop, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable dots?", "bright-night" ),
		            "param_name" => "dots",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select slide dots. If you want to enable dots, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable navigation icons?", "bright-night" ),
		            "param_name" => "nav",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select slide navigation. If you want to enable navigation icons, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplay?", "bright-night" ),
		            "param_name" => "autoplay",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes'=> 'true',
		            	'No' => 'false'
		            ),
		            "description" => __( "Select slide autoplay. If you want to enable autoplay, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplayTimeout?", "bright-night" ),
		            "param_name" => "autoplayTimeout",
		            "std"        => __( "5000", "bright-night" ),
		            "value"      => array(
		            	'1 Second'	=> '1000',
		            	'2 Seconds'	=> '2000',
		            	'3 Seconds'	=> '3000',
		            	'4 Seconds'	=> '4000',
		            	'5 Seconds'	=> '5000',
		            	'6 Seconds'	=> '6000',
		            	'7 Seconds'	=> '7000',
		            	'8 Seconds'	=> '8000',
		            	'9 Seconds'	=> '9000',
		            	'10 Seconds'	=> '10000',
		            	'11 Seconds'	=> '11000',
		            	'12 Seconds'	=> '12000',
		            	'13 Seconds'	=> '13000',
		            	'14 Seconds'	=> '14000',
		            	'15 Seconds'	=> '15000'
		            ),
		            "description" => __( "Select autoplay timeout.", "bright-night" ),
		            "dependency"  => array(
		            	"element"	=> "autoplay",
		            	"value"		=> array("true")
		            )
		        ),
		    )
		) 
	);
	// End slider addon

	/*====== Start project slider addon ======*/
	vc_map( 
		array(
		    "name"    => __( "Brightnight Image Slider", "bright-night" ),
		    "base"    => "img_slides",
		    "category"=> __( "Brightnight", "bright-night"),
		    "params"  => array(
		        array(
		            "type"       => "textfield",
		            "heading"    => __( "Count", "bright-night" ),
		            "param_name" => "count",
		            "value"      => __( "2", "bright-night" ),
		            "description"=> __( "Type image slide count. If you want to unlimited slides, type -1", "bright-night" )
		        ),
		        array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Height", "bright-night" ),
					"param_name"	=> "height",
					"std"			=> esc_html__( "530", "bright-night" ),
					"description"	=> esc_html__( "Type image height, Numbers only.", "bright-night" ),
				),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable loop?", "bright-night" ),
		            "param_name" => "loop",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select image slide loop. If you want to enable loop, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable dots?", "bright-night" ),
		            "param_name" => "dots",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select image slide dots. If you want to enable dots, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable navigation icons?", "bright-night" ),
		            "param_name" => "nav",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select image slide navigation. If you want to enable navigation icons, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplay?", "bright-night" ),
		            "param_name" => "autoplay",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes'=> 'true',
		            	'No' => 'false'
		            ),
		            "description" => __( "Select image slide autoplay. If you want to enable autoplay, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplayTimeout?", "bright-night" ),
		            "param_name" => "autoplayTimeout",
		            "std"        => __( "5000", "bright-night" ),
		            "value"      => array(
		            	'1 Second'	=> '1000',
		            	'2 Seconds'	=> '2000',
		            	'3 Seconds'	=> '3000',
		            	'4 Seconds'	=> '4000',
		            	'5 Seconds'	=> '5000',
		            	'6 Seconds'	=> '6000',
		            	'7 Seconds'	=> '7000',
		            	'8 Seconds'	=> '8000',
		            	'9 Seconds'	=> '9000',
		            	'10 Seconds'	=> '10000',
		            	'11 Seconds'	=> '1100',
		            	'12 Seconds'	=> '1200',
		            	'13 Seconds'	=> '1300',
		            	'14 Seconds'	=> '1400',
		            	'15 Seconds'	=> '1500'
		            ),
		            "description" => __( "Select autoplay timeout.", "bright-night" ),
		            "dependency"  => array(
		            	"element"	=> "autoplay",
		            	"value"		=> array("true")
		            )
		        ),
		    )
		) 
	);
	// End project slider addon

	/*====== Start product slider addon ======*/
	vc_map( 
		array(
		    "name"    => __( "Brightnight Product Slider", "bright-night" ),
		    "base"    => "product_slides",
		    "category"=> __( "Brightnight", "bright-night"),
		    "params"  => array(
		        array(
		            "type"       => "textfield",
		            "heading"    => __( "Count", "bright-night" ),
		            "param_name" => "count",
		            "value"      => __( "2", "bright-night" ),
		            "description"=> __( "Type product slide count. If you want to unlimited slides, type -1", "bright-night" )
		        ),
		        array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Height", "bright-night" ),
					"param_name"	=> "height",
					"std"			=> esc_html__( "565", "bright-night" ),
					"description"	=> esc_html__( "Type product height, Numbers only.", "bright-night" ),
				),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable loop?", "bright-night" ),
		            "param_name" => "loop",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select product slide loop. If you want to enable loop, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable dots?", "bright-night" ),
		            "param_name" => "dots",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select product slide dots. If you want to enable dots, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable navigation icons?", "bright-night" ),
		            "param_name" => "nav",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes' => 'true',
		            	'No'  => 'false'
		            ),
		            "description" => __( "Select product slide navigation. If you want to enable navigation icons, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplay?", "bright-night" ),
		            "param_name" => "autoplay",
		            "std"        => __( "true", "bright-night" ),
		            "value"      => array(
		            	'Yes'=> 'true',
		            	'No' => 'false'
		            ),
		            "description" => __( "Select product slide autoplay. If you want to enable autoplay, select yes.", "bright-night" ),
		        ),
		        array(
		            "type"       => "dropdown",
		            "heading"    => __( "Enable autoplayTimeout?", "bright-night" ),
		            "param_name" => "autoplayTimeout",
		            "std"        => __( "5000", "bright-night" ),
		            "value"      => array(
		            	'1 Second'	=> '1000',
		            	'2 Seconds'	=> '2000',
		            	'3 Seconds'	=> '3000',
		            	'4 Seconds'	=> '4000',
		            	'5 Seconds'	=> '5000',
		            	'6 Seconds'	=> '6000',
		            	'7 Seconds'	=> '7000',
		            	'8 Seconds'	=> '8000',
		            	'9 Seconds'	=> '9000',
		            	'10 Seconds'	=> '10000',
		            	'11 Seconds'	=> '11000',
		            	'12 Seconds'	=> '12000',
		            	'13 Seconds'	=> '13000',
		            	'14 Seconds'	=> '14000',
		            	'15 Seconds'	=> '15000'
		            ),
		            "description" => __( "Select autoplay timeout.", "bright-night" ),
		            "dependency"  => array(
		            	"element"	=> "autoplay",
		            	"value"		=> array("true")
		            )
		        ),
		    )
		) 
	);
	// End project slider addon

	/*====== Start buttons addon ======*/ 
	vc_map(
		array(
			"name"		=> esc_html__( "Brightnight button", "bright-night" ),
			"base"		=> "brightnight_btn",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			"params"	=> array(
		        array(
		            "type"		 => "dropdown",
		            "heading"	 => esc_html__( "Link type", "bright-night" ),
		            "param_name" => "type",
		            "std"		 => esc_html__( "1", "bright-night" ),
		            "description"=> esc_html__( "Select link type.", "bright-night" ),
		            "value" 	 => array(
		            	'link to page'	  => 1,
		            	'link to external'=> 2
		            ),
		        ),
		        array(
		            "type"		 => "dropdown",
		            "heading"	 => esc_html__( "Link to page", "bright-night" ),
		            "param_name" => "link_to_page",
		            "value" 	 => brightnight_toolkit_get_page_as_list(),
		            "description"=> esc_html__( "Select page link.", "bright-night" ),
		            "dependency"  => array(
		                "element"   => "type",
		                "value"     => array("1")
		            )
		        ),
		        array(
		            "type"		 => "textfield",
		            "heading"	 => esc_html__( "Link to external", "bright-night" ),
		            "param_name" => "link_to_external",
		            "description"=> esc_html__( "Type external link text.", "bright-night" ),
		            "dependency"  => array(
		                "element"   => "type",
		                "value"     => array("2")
		            )
		        ),
		        array(
		            "type"		 => "textfield",
		            "heading"	 => esc_html__( "Link text", "bright-night" ),
		            "param_name" => "link_text",
		            "std"		 => esc_html__( "Read more about us", "bright-night" ),
		            "description"=> esc_html__( "Type link text.", "bright-night" ),
		        ),
			)
		)
	);
	// End buttons addon

	/*====== Start contact details addon ======*/
	vc_map(
		array(
			"name"		=> esc_html__( "Contact Details", "bright-night" ),
			"base"		=> "contact_details",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			//"description"=> esc_html__( "Use this addon for display contact details", "bright-night" )
		)
	);
	// End contact details addon

	/*====== Start contact page contact details addon ======*/ 
	vc_map(
		array(
			"name"		=> esc_html__( "Contact page Contact Details", "bright-night" ),
			"base"		=> "contact_page_contact_details",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			//"description"=> esc_html__( "Use this addon for display contact details", "bright-night" )
		)
	);
	// End contact page contact details addon

	/*====== Start gmap addon ======*/ 
	vc_map(
		array(
			"name"		=> esc_html__( "Brightnight gmap", "bright-night" ),
			"base"		=> "gmap",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			//"description" => esc_html__( "Use this addon for display google map", "bright-night" ),
			"params"	=> array(
				array(
					"type"		=> "textfield",
					"heading"	=> esc_html__( "Map height", "bright-night" ),
					"param_name"=> "height",
					"std"		=> esc_html__( "600", "bright-night" ),
					"description" => esc_html__( "Type map height on px. Numbers only.", "bright-night" )
				)
			)
		)
	);
	// End gmap addon

	/*====== Start home 4 static post addon ======*/
	vc_map(
		array(
			"name"			=> esc_html__( "Brightnight home 4 post", "bright-night" ),
			"base"			=> "home4_post",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			//"description"	=> esc_html__( "Use this addon for displaying home 4 post.", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "attach_image",
					"heading"		=> esc_html__( "Upload image", "bright-night" ),
					"param_name"	=> "photo",
					"description"	=> esc_html__( "Upload home 4 post photo", "bright-night" )
				),
				array(
					"type"			=> "textarea_html",
					"heading"		=> esc_html__( "Title", "bright-night" ),
					"param_name"	=> "content",
					"description"	=> esc_html__( "Type post title", "bright-night" )
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Product type", "bright-night" ),
					"param_name"	=> "product_type",
					"description"	=> esc_html__( "Type product position", "bright-night" )
				),
				array(
					"type"			=> "textarea",
					"heading"		=> esc_html__( "Post text", "bright-night" ),
					"param_name"	=> "desc",
					"description"	=> esc_html__( "Type home 4 post text", "bright-night" )
				),
			)
		)
	);
	// End home 4 static post addon

	/*====== Start like comment addon ======*/
	vc_map(
		array(
			"name"		=> esc_html__( "Like comment", "bright-night" ),
			"base"		=> "like_comment",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			//"description" => esc_html__( "Use this addon for display like comment post.", "bright-night" ),
		)
	);
	// End like comment addon

	/*====== Start popup video addon ======*/
	vc_map(
		array(
			"name"		=> esc_html__( "Brightnight popup video", "bright-night" ),
			"base"		=> "popup_video",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			"params"	=> array(
		        array(
		            "type"		 => "textfield",
		            "heading"	 => esc_html__( "Link text", "bright-night" ),
		            "param_name" => "link_text",
		            "std"		 => esc_html__( "Play this interior", "bright-night" ),
		            "description"=> esc_html__( "Type link text.", "bright-night" ),
		        ),
		        array(
		            "type"		 => "textfield",
		            "heading"	 => esc_html__( "Link url", "bright-night" ),
		            "param_name" => "link_url",
		            "description"=> esc_html__( "Type link url.", "bright-night" ),
		        ),
			)
		)
	);
	// End popup video addon

	/*====== Start tile gallery addon ======*/
	vc_map( 
		array(
			"name"			=> esc_html__( "Brightnight tile gallery", "bright-night" ),
			"base"			=> "tile_gallery",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			//"description"	=> esc_html__( "Use this addon for displaying tile gallery", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "attach_images",
					"heading"		=> esc_html__( "Upload images", "bright-night" ),
					"param_name"	=> "images",
					"description"	=> esc_html__( "Upload gallery images", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Image height", "bright-night" ),
					"param_name"	=> "height",
					"std"			=> esc_html__( "310", "bright-night" ),
					"description"	=> esc_html__( "Type image height in numbers.", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Image size", "bright-night" ),
					"param_name"	=> "size",
					"std"			=> esc_html__( "large", "bright-night" ),
					"description"	=> esc_html__( "Type image size.", "bright-night" ),	
				)
			)
		)
	);
	// End tile gallery addon

	/*====== Start full width sections addon ======*/
	vc_map( 
		array(
			"name"			=> esc_html__( "Brightnight full width section", "bright-night" ),
			"base"			=> "fullwidth_section",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			//"description"	=> esc_html__( "Use this addon for displaying full width section", "bright-night" ),
			"params"		=> array(
				array(
					"type"			=> "attach_image",
					"heading"		=> esc_html__( "Upload", "bright-night" ),
					"param_name"	=> "image",
					"description"	=> esc_html__( "Upload image", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Image size", "bright-night" ),
					"param_name"	=> "size",
					"std"			=> esc_html__( "large", "bright-night" ),
					"description"	=> esc_html__( "Type image size.", "bright-night" ),	
				),
				array(
					"type"			=> "textarea_html",
					"heading"		=> esc_html__( "Full width content", "bright-night" ),
					"param_name"	=> "content",
					"description"	=> esc_html__( "Type full width content here.", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Column", "bright-night" ),
					"param_name"	=> "col_count",
					"description"	=> esc_html__( "Type column count. Numbers only.", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Content align", "bright-night" ),
					"param_name"	=> "content_align",
					"std"			=> esc_html__( "end", "bright-night" ),
					"description"	=> esc_html__( "Type content align.", "bright-night" ),
				),
			)
		)
	);
	// End full width sections addon


	/*====== Start contact details addon ======*/
	vc_map(
	    array(
	    	"name"			=> esc_html__( "Brightnight contact info", "bright-night" ),
			"base"			=> "contact_details",
			"category"		=> esc_html__( "Brightnight", "bright-night" ),
			"description"	=> esc_html__( "Use this addon for displaying full width section", "bright-night" ),
	        'params' => array(
	            array(
	                'type' => 'textfield',
	                'heading' => 'Title',
	                'param_name' => 'title',
	            ),
	            // params group
	            array(
	                'type' => 'param_group',
	                'param_name' => 'contact_info',
	                // Note params is mapped inside param-group:
	                'params' => array(
	                    array(
	                        'type' => 'textfield',
	                        'heading' => 'Sub title',
	                        'param_name' => 'sub_title',
	                    ),
	                    array(
	                        'type' => 'textarea',
	                        'heading' => 'Descripton',
	                        'param_name' => 'desc',
	                    )
	                )
	            )
	        )
	    )
	);


	/*====== Start service box addon ======*/
	vc_map(
	    array(
	    	"name"		=> esc_html__( "Brightnight service box", "bright-night" ),
			"base"		=> "brightnight_service",
			"category"	=> esc_html__( "Brightnight", "bright-night" ),
			"params"	=> array(
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Columns", "bright-night" ),
					"param_name"	=> "columns",
					"description"	=> esc_html__( "Type columns number. Numbers only", "bright-night" ),	
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Count", "bright-night" ),
					"param_name"	=> "count",
					"description"	=> esc_html__( "Type posts count. Numbers only", "bright-night" ),	
				),
			)	
	    )
	);

}
add_action( 'vc_before_init', 'brightnight_addons_integrateWithVC' );
// End service box addon