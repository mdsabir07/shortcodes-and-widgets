<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit service box", "stockmsiit-toolkit" ),
		"base"		=> "stockmsiit_service_box",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
            "type"			=> "textfield",
            "heading"		=> esc_html__( "Service title", "stockmsiit-toolkit" ),
            "param_name"	=> "title",
            "description"	=> esc_html__( "Type service title.", "stockmsiit-toolkit" )
        	),
	        array(
	            "type"		 => "textarea",
	            "heading"	 => esc_html__( "Content", "stockmsiit-toolkit" ),
	            "param_name" => "desc",
	            "description"=> esc_html__( "Type service description.", "stockmsiit-toolkit" )
	        ),
	        array(
	            "type"		 => "dropdown",
	            "heading"	 => esc_html__( "Link type", "stockmsiit-toolkit" ),
	            "param_name" => "type",
	            "std"		 => esc_html__( "1", "stockmsiit-toolkit" ),
	            "description"=> esc_html__( "Select link type.", "stockmsiit-toolkit" ),
	            "value" 	 => array(
	            	'link to page'	  => 1,
	            	'link to external'=> 2
	            ),
	        ),
	        array(
	            "type"		 => "dropdown",
	            "heading"	 => esc_html__( "Link to page", "stockmsiit-toolkit" ),
	            "param_name" => "link_to_page",
	            "value" 	 => stockmsiit_toolkit_get_page_as_list(),
	            "description"=> esc_html__( "Select page link.", "stockmsiit-toolkit" ),
	            "dependency"  => array(
	                "element"   => "type",
	                "value"     => array("1")
	            )
	        ),
	        array(
	            "type"		 => "textfield",
	            "heading"	 => esc_html__( "Link to external", "stockmsiit-toolkit" ),
	            "param_name" => "link_to_external",
	            "description"=> esc_html__( "Select external link.", "stockmsiit-toolkit" ),
	            "dependency"  => array(
	                "element"   => "type",
	                "value"     => array("2")
	            )
	        ),
	        array(
	            "type"		 => "textfield",
	            "heading"	 => esc_html__( "Link text", "stockmsiit-toolkitt" ),
	            "param_name" => "link_text",
	            "description"=> esc_html__( "Type link text.", "stockmsiit-toolkit" ),
	        ),
	        array(
	            "type"		 => "dropdown",
	            "heading"	 => esc_html__( "Icon type", "stockmsiit-toolkit" ),
	            "param_name" => "icon_type",
	            "std"		 => esc_html__( "1", "stockmsiit-toolkit" ),
	            "description"=> esc_html__( "Select icon type.", "stockmsiit-toolkit" ),
	            "value" 	 => array(
	            	esc_html__( 'Upload', 'stockmsiit-toolkit' )	  => 1,
	            	esc_html__( 'FontAwesome', 'stockmsiit-toolkit' ) => 2
	            ),
	        ),
	        array(
	            "type"		 => "attach_image",
	            "heading"	 => esc_html__( "Upload icon", "stockmsiit-toolkit" ),
	            "param_name" => "upload_icon",
	            "description"=> esc_html__( "Upload Icon or image.", "stockmsiit-toolkit" ),
	            "dependency"  => array(
	                "element"   => "icon_type",
	                "value"     => array("1")
	            )
	        ),
	        array(
	            "type"		 => "iconpicker",
	            "heading"	 => esc_html__( "Choose icon", "stockmsiit-toolkit" ),
	            "param_name" => "chosse_icon",
	            "description"=> esc_html__( "Choose Icon.", "stockmsiit-toolkit" ),
	            "dependency"  => array(
	                "element"   => "icon_type",
	                "value"     => array("2")
	            )
	        ),
	        array(
	            "type"		 => "attach_image",
	            "heading"	 => esc_html__( "Upload box image", "stockmsiit-toolkit" ),
	            "param_name" => "box_img",
	            "description"=> esc_html__( "Upload service box image.", "stockmsiit-toolkit" ),
	        ),
		)
	)
);