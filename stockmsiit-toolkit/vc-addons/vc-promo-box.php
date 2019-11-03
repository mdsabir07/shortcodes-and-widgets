<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit Promo box", "stockmsiit-toolkit" ),
		"base"		=> "promo_box",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
            "type"			=> "textfield",
            "heading"		=> esc_html__( "Promo box title", "stockmsiit-toolkit" ),
            "param_name"	=> "title",
            "description"	=> esc_html__( "Type promo box title.", "stockmsiit-toolkit" )
        	),
	        array(
	            "type"		 => "textarea",
	            "heading"	 => __( "Content", "stockmsiit-toolkit" ),
	            "param_name" => "desc",
	            "description"=> esc_html__( "Type promo box description.", "stockmsiit-toolkit" )
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
	            "param_name" => "link_page",
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
	            "param_name" => "link_external",
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
	            "std"		 => esc_html__( "Apply now", "stockmsiit-toolkit" ),
	            "description"=> esc_html__( "Type link text.", "stockmsiit-toolkit" ),
	        ),
		)
	)
);