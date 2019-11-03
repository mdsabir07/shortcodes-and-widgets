<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit logo carousel", "stockmsiit-toolkit" ),
		"base"		=> "logo_carousel",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
            "type" => "attach_images",
            "heading" => __( "Upload Logos", "stockmsiit-toolkit" ),
            "param_name" => "logos",
            "description" => __( "Upload company logos carousel.", "stockmsiit-toolkit" )
        	),
	        array(
	            "type" => "textfield",
	            "heading" => __( "Desktop Count", "stockmsiit-toolkit" ),
	            "param_name" => "desktop_count",
	            "std" => __( "5", "stockmsiit-toolkit" ),
	            "description" => __( "Type logo carousel count.", "stockmsiit-toolkit" )
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __( "Tablet Count", "stockmsiit-toolkit" ),
	            "param_name" => "tablet_count",
	            "std" => __( "3", "stockmsiit-toolkit" ),
	            "description" => __( "Type logo carousel count.", "stockmsiit-toolkit" )
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __( "Mobile Count", "stockmsiit-toolkit" ),
	            "param_name" => "mobile_count",
	            "std" => __( "2", "stockmsiit-toolkit" ),
	            "description" => __( "Type logo carousel count.", "stockmsiit-toolkit" )
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __( "Enable loop?", "stockmsiit-toolkit" ),
	            "param_name" => "loop",
	            "std" => __( "true", "stockmsiit-toolkit" ),
	            "value" => array(
	            	esc_html__( 'Yes', 'stockmsiit-toolkit' )	=> 'true',
	            	esc_html__( 'No', 'stockmsiit-toolkit' )	=> 'false'
	            ),
	            "description" => __( "Select logo carousel loop. If you want to enable loop, select yes.", "stockmsiit-toolkit" ),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __( "Enable dots?", "stockmsiit-toolkit" ),
	            "param_name" => "dots",
	            "std" => __( "true", "stockmsiit-toolkit" ),
	            "value" => array(
	            	esc_html__( 'Yes', 'stockmsiit-toolkit' )	=> 'true',
	            	esc_html__( 'No', 'stockmsiit-toolkit' )	=> 'false'
	            ),
	            "description" => __( "Select logo carousel dots. If you want to enable dots, select yes.", "stockmsiit-toolkit" ),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __( "Enable navigation icons?", "stockmsiit-toolkit" ),
	            "param_name" => "nav",
	            "std" => __( "true", "stockmsiit-toolkit" ),
	            "value" => array(
	            	esc_html__( 'Yes', 'stockmsiit-toolkit' )	=> 'true',
	            	esc_html__( 'No', 'stockmsiit-toolkit' )	=> 'false'
	            ),
	            "description" => __( "Select logo carousel navigation. If you want to enable navigation icons, select yes.", "stockmsiit-toolkit" ),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __( "Enable autoplay?", "stockmsiit-toolkit" ),
	            "param_name" => "autoplay",
	            "std" => __( "true", "stockmsiit-toolkit" ),
	            "value" => array(
	            	esc_html__( 'Yes', 'stockmsiit-toolkit' )	=> 'true',
	            	esc_html__( 'No', 'stockmsiit-toolkit' )	=> 'false'
	            ),
	            "description" => __( "Select logo carousel autoplay. If you want to enable autoplay, select yes.", "stockmsiit-toolkit" ),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __( "Enable autoplayTimeout?", "stockmsiit-toolkit" ),
	            "param_name" => "autoplayTimeout",
	            "std" => __( "5000", "stockmsiit-toolkit" ),
	            "value" => array(
	            	'1 Second'	=> esc_attr__( '1000', 'stockmsiit-toolkit' ),
	            	'2 Seconds'	=> esc_attr__( '2000', 'stockmsiit-toolkit' ),
	            	'3 Seconds'	=> esc_attr__( '3000', 'stockmsiit-toolkit' ),
	            	'4 Seconds'	=> esc_attr__( '4000', 'stockmsiit-toolkit' ),
	            	'5 Seconds'	=> esc_attr__( '5000', 'stockmsiit-toolkit' ),
	            	'6 Seconds'	=> esc_attr__( '6000', 'stockmsiit-toolkit' ),
	            	'7 Seconds'	=> esc_attr__( '7000', 'stockmsiit-toolkit' ),
	            	'8 Seconds'	=> esc_attr__( '8000', 'stockmsiit-toolkit' ),
	            	'9 Seconds'	=> esc_attr__( '9000', 'stockmsiit-toolkit' ),
	            	'10 Seconds'=> esc_attr__( '10000', 'stockmsiit-toolkit' ),
	            	'11 Seconds'=> esc_attr__( '1100', 'stockmsiit-toolkit' ),
	            	'12 Seconds'=> esc_attr__( '1200', 'stockmsiit-toolkit' ),
	            	'13 Seconds'=> esc_attr__( '1300', 'stockmsiit-toolkit' ),
	            	'14 Seconds'=> esc_attr__( '1400', 'stockmsiit-toolkit' ),
	            	'15 Seconds'=> esc_attr__( '1500', 'stockmsiit-toolkit' )
	            ),
	            "description" => __( "Select autoplay timeout.", "stockmsiit-toolkit" ),
	            "dependency"  => array(
	                "element"   => "autoplay",
	                "value"     => array("true")
	            )
	        ),
		)
	)
);