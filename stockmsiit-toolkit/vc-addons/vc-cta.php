<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit Call to action", "stockmsiit-toolkit" ),
		"base"		=> "stockmsiit_cta",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
            "type"			=> "textfield",
            "heading"		=> esc_html__( "cta title", "stockmsiit-toolkit" ),
            "param_name"	=> "title",
            "description"	=> esc_html__( "Type cta title.", "stockmsiit-toolkit" )
        	),
	        array(
	            "type"		 => "textarea",
	            "heading"	 => __( "Content", "stockmsiit-toolkit" ),
	            "param_name" => "desc",
	            "description"=> esc_html__( "Type cta description.", "stockmsiit-toolkit" )
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
	            "heading"	 => esc_html__( "Theme", "stockmsiit-toolkit" ),
	            "param_name" => "theme",
	            "std"		 => esc_html__( "1", "stockmsiit-toolkit" ),
	            "description"=> esc_html__( "Select theme type", "stockmsiit-toolkit" ),
	            "value" 	 => array(
	            	esc_html__( 'General theme', 'stockmsiit-toolkit' ) => 1,
	            	esc_html__( 'Colored theme', 'stockmsiit-toolkit' ) => 2
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
	            "heading"	 => esc_html__( "Link text", "stockmsiit-toolkit" ),
	            "param_name" => "link_text",
	            "description"=> esc_html__( "Type link text.", "stockmsiit-toolkit" ),
	        ),
		)
	)
);