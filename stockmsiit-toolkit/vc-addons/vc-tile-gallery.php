<?php 

vc_map( 
	array(
		"name"			=> esc_html__( "Stockmsiit tile gallery", "stockmsiit-toolkit" ),
		"base"			=> "tile_gallery",
		"category"		=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"description"	=> esc_html__( "Use this addon for displaying tile gallery", "stockmsiit-toolkit" ),
		"params"		=> array(
			array(
				"type"			=> "attach_images",
				"heading"		=> esc_html__( "Upload images", "stockmsiit-toolkit" ),
				"param_name"	=> "images",
				"description"	=> esc_html__( "Upload gallery images", "stockmsiit-toolkit" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image height", "stockmsiit-toolkit" ),
				"param_name"	=> "height",
				"std"			=> esc_html__( "310", "stockmsiit-toolkit" ),
				"description"	=> esc_html__( "Type image height in numbers.", "stockmsiit-toolkit" ),	
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( "Image size", "stockmsiit-toolkit" ),
				"param_name"	=> "size",
				"std"			=> esc_html__( "large", "stockmsiit-toolkit" ),
				"description"	=> esc_html__( "Type image size.", "stockmsiit-toolkit" ),	
			)
		)
	)
);