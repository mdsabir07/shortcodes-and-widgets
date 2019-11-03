<?php 

vc_map(
	array(
		"name"			=> esc_html__( "Stockmsiit Testimonials", "stockmsiit-toolkit" ),
		"base"			=> "testimonials",
		"category"		=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"		=> array(
			array(
				"type"			=> "attach_image",
				"heading"		=> esc_html__( "Upload image", "stockmsiit-toolkit" ),
				"param_name"	=> "photo",
				"description"	=> esc_html__( "Upload testmonials photo", "stockmsiit-toolkit" )
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Title", "stockmsiit-toolkit" ),
				"param_name"	=> "title",
				"description"	=> esc_html__( "Type testmonials title", "stockmsiit-toolkit" )
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Position", "stockmsiit-toolkit" ),
				"param_name"	=> "position",
				"description"	=> esc_html__( "Type author position", "stockmsiit-toolkit" )
			),
			array(
				"type"			=> "textarea",
				"heading"		=> esc_html__( "Testimonial text", "stockmsiit-toolkit" ),
				"param_name"	=> "desc",
				"description"	=> esc_html__( "Type testimonial text", "stockmsiit-toolkit" )
			),
		)
	)
);