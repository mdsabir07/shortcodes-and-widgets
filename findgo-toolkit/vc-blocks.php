<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly 

// Listing tags addon
vc_map(
    array(
        "name"      => esc_html__( "Findgo Listing tag", "findgo-toolkit" ),
        "base"      => "tags_show",
        "tag"  => esc_html__( "Findgo", "findgo-toolkit" ),
        "params"    => array(
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Select tag", "findgo-toolkit" ),
                "param_name"=> "tag_ids",
                "value"     => findgo_listing_tag_as_list(),
                "description" => esc_html__( "Select tag. You can select any tag.", "findgo-toolkit" ),
            ),
        )
    )
);

// Post tags addon
vc_map(
    array(
        "name"      => esc_html__( "Findgo Post tag", "findgo-toolkit" ),
        "base"      => "findgo_post_tags",
        "tag"  => esc_html__( "Findgo", "findgo-toolkit" ),
        "params"    => array(
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Select tag", "findgo-toolkit" ),
                "param_name"=> "tag_ids",
                "value"     => findgo_post_tag_as_list(),
                "description" => esc_html__( "Select tag. You can select any tag.", "findgo-toolkit" ),
            ),
        )
    )
);


// Post tags addon
vc_map(
    array(
        "name"      => esc_html__( "Findgo new Post tag", "findgo-toolkit" ),
        "base"      => "tags_show_with_list_desc",
        "tag"  => esc_html__( "Findgo", "findgo-toolkit" ),
        "params"    => array(
            array(
                "type"      => "checkbox",
                "heading"   => esc_html__( "Select tag", "findgo-toolkit" ),
                "param_name"=> "tag_ids",
                "value"     => findgo_listing_tag_as_list(),
                "description" => esc_html__( "Select tag. You can select any tag.", "findgo-toolkit" ),
            ),
            array(
                "type"      => "textfield",
                "heading"   => esc_html__( "Count", "findgo-toolkit" ),
                "param_name"=> "count",
                "description" => esc_html__( "Type count", "findgo-toolkit" ),
            ),
        )
    )
);