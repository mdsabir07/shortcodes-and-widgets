<?php 

vc_map( array(
		"name"		=> __( "Stockmsiit gmap", "stockmsiit-toolkit" ),
		"base"		=> "gmap",
		"category"	=> __( "Stockmsiit", "stockmsiit-toolkit" ),
		"params"	=> array(
			array(
				"type"		=> "textfield",
				"heading"	=> __( "Map Height", "stockmsiit-toolkit" ),
				"param_name"=> "height",
				"std"		=> __( "600", "stockmsiit-toolkit" ),
				"description"=> __( "Type map height on px. Numbers only.", "stockmsiit-toolkit" )
			)
		)
));