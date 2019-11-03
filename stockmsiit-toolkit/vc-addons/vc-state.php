<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit Statics", "stockmsiit-toolkit" ),
		"base"		=> "stockmsiit_state",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
            "type"			=> "textfield",
            "heading"		=> esc_html__( "Stat Number", "stockmsiit-toolkit" ),
            "param_name"	=> "number",
            "description"	=> esc_html__( "Type statics number.", "stockmsiit-toolkit" )
        	),
	        array(
	            "type"		 => "textarea",
	            "heading"	 => esc_html__( "Ater text", "stockmsiit-toolkit" ),
	            "param_name" => "after_text",
	            "description"=> esc_html__( "Type statics after text.", "stockmsiit-toolkit" )
	        ),
	        array(
	            "type"		 => "textarea",
	            "heading"	 => esc_html__( "Content", "stockmsiit-toolkit" ),
	            "param_name" => "desc",
	            "description"=> esc_html__( "Type statics text.", "stockmsiit-toolkit" )
	        ),
		)
	)
);