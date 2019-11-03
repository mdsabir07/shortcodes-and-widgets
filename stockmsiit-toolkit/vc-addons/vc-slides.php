<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit Slider", "stockmsiit-toolkit" ),
		"base"		=> "stockmsiit_slides",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
				"type"		=> "textfield",
				"heading"	=> esc_html__( "Count", "stockmsiit-toolkit" ),
				"param_name"=> "count",
				"value"		=> esc_html__( "3", "stockmsiit-toolkit" ),
				"description"=> esc_html__( "Type slides count. If you want to show unlimited slides, type -1.", "stockmsiit-toolkit" ),
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Select slide", "stockmsiit-toolkit" ),
				"param_name"=> "slide_id",
				"value"		=> stockmsiit_toolkit_get_slide_as_list(),
				"description" => esc_html__( "Select slide. You can select any slide.", "stockmsiit-toolkit" ),
				"dependency"=> array(
					"element"	=> "count",
					"value"		=> array("1")
				)
			),
			array(
				"type"		=> "textfield",
				"heading"	=> esc_html__( "Slider height", "stockmsiit-toolkit" ),
				"param_name"=> "height",
				"std"		=> esc_html__( "730", "stockmsiit-toolkit" ),
				"description" => esc_html__( "Type slider height on px. Numbers only.", "stockmsiit-toolkit" ),
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Enable Loop?", "stockmsiit-toolkit" ),
				"param_name"=> "loop",
				"std"		=> esc_html__( "true", "stockmsiit-toolkit" ),
				"value"		=> array(
					'Yes'	=> 'true',
					'No'	=> 'false'
				),
				"description" => esc_html__( "Select slide loop. If want to enable loop! Select yes.", "stockmsiit-toolkit" ),
				"dependency"  => array(
	                "element"   => "count",
	                "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
	            )
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Enable dots?", "stockmsiit-toolkit" ),
				"param_name"=> "dots",
				"std"		=> esc_html__( "true", "stockmsiit-toolkit" ),
				"value"		=> array(
					'Yes'	=> 'true',
					'No'	=> 'false'
				),
				"description" => esc_html__( "Select slide dots. If want to enable dots! Select yes.", "stockmsiit-toolkit" ),
				"dependency"  => array(
	                "element"   => "count",
	                "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
	            )
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Enable navigation icon?", "stockmsiit-toolkit" ),
				"param_name"=> "nav",
				"std"		=> esc_html__( "true", "stockmsiit-toolkit" ),
				"value"		=> array(
					'Yes'	=> 'true',
					'No'	=> 'false'
				),
				"description" => esc_html__( "Select slide navigation. If want to enable navigation icon! Select yes.", "stockmsiit-toolkit" ),
				"dependency"  => array(
	                "element"   => "count",
	                "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
	            )
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Enable autoplay?", "stockmsiit-toolkit" ),
				"param_name"=> "autoplay",
				"std"		=> esc_html__( "true", "stockmsiit-toolkit" ),
				"value"		=> array(
					esc_html__( 'Yes', 'stockmsiit-toolkit' )	=> 'true',
					esc_html__( 'No', 'stockmsiit-toolkit' )	=> 'false'
				),
				"description" => esc_html__( "Select slide autoplay. If want to enable autoplay! Select yes.", "stockmsiit-toolkit" ),
				"dependency"  => array(
	                "element"   => "count",
	                "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
	            )
			),
			array(
				"type"		=> "dropdown",
				"heading"	=> esc_html__( "Enable autoplayTimeout?", "stockmsiit-toolkit" ),
				"param_name"=> "autoplayTimeout",
				"std"		=> esc_html__( "5000", "stockmsiit-toolkit" ),
				"value"		=> array(
					'1 second'	=> esc_attr__( '1000', 'stockmsiit-toolkit' ),
					'2 seconds'	=> esc_attr__( '2000', 'stockmsiit-toolkit' ),
					'3 seconds'	=> esc_attr__( '3000', 'stockmsiit-toolkit' ),
					'4 seconds'	=> esc_attr__( '4000', 'stockmsiit-toolkit' ),
					'5 seconds'	=> esc_attr__( '5000', 'stockmsiit-toolkit' ),
					'6 seconds'	=> esc_attr__( '6000', 'stockmsiit-toolkit' ),
					'7 seconds'	=> esc_attr__( '7000', 'stockmsiit-toolkit' ),
					'8 seconds'	=> esc_attr__( '8000', 'stockmsiit-toolkit' ),
					'9 seconds'	=> esc_attr__( '9000', 'stockmsiit-toolkit' ),
					'10 seconds'=> esc_attr__( '10000', 'stockmsiit-toolkit' ),
					'11 seconds'=> esc_attr__( '11000', 'stockmsiit-toolkit' ),
					'12 seconds'=> esc_attr__( '12000', 'stockmsiit-toolkit' ),
					'13 seconds'=> esc_attr__( '13000', 'stockmsiit-toolkit' ),
					'14 seconds'=> esc_attr__( '14000', 'stockmsiit-toolkit' ),
					'15 seconds'=> esc_attr__( '15000', 'stockmsiit-toolkit' ),
				),
				"description" => esc_html__( "Select slide autoplayTimeout", "stockmsiit-toolkit" ),
				"dependency"  => array(
	                "element"   => "count",
	                "value"     => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15")
	            )
			),
		)
	)
);