<?php 

// project addon 
vc_map( 
    array(
        "name" => esc_html__( "Primium brands", "intrunk" ),
        "base" => "primium_brands_project",
        // "icon"  => intrunk_ACC_URL.'/assets/img/section-title.png',
        "category" => esc_html__( "Intrunk", "intrunk"),
        "params"   => array(
            array(
                "type"          =>  "textfield",
                "heading"       =>  esc_html__("Count", "intrunk"),
                "param_name"    =>  "count",
                "std"           =>  esc_html__( "-1", "intrunk" ),
                "description"   =>  esc_html__("Type how many items want to display", "intrunk")
            ),
        )
    ) 
);