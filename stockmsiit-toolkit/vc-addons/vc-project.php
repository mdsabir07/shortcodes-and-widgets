<?php 

vc_map(
	array(
		"name"		=> esc_html__( "Stockmsiit Preject", "stockmsiit-toolkit" ),
		"base"		=> "stockmsiit_projects",
		"category"	=> esc_html__( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( "Theme style", "stockmsiit-toolkit" ),
				"param_name"	=> "theme",
				"std"			=> esc_html__( "1", "stockmsiit-toolkit" ),
				"value"			=> array(
					esc_html__( "Theme 1", 'stockmsiit-toolkit' ) => "1",
					esc_html__( "Theme 2", 'stockmsiit-toolkit' ) => "2"
				),
				"description"	=> esc_html__( "Selec theme style.", "stockmsiit-toolkit" )
			)
		)
	)
);