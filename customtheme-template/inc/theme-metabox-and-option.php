<?php 

require get_template_directory() . '/inc/cs-framework/cs-framework.php';

function theme_metabox($options) {
$options        = array();

// theme slider metabox
$options[]    = array(
    'id'        => 'theme_slide_meta',
    'title'     => 'Slides Options',
    'post_type' => 'slide1',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'  => 'theme_slide_meta_1',
            'fields' => array(
                array(
                  'id'    => 'slide1_project_name',
                  'type'  => 'text',
                  'title' => 'Project Name',
                ),             
            ),
        ),
    ),
);

// theme slider metabox
$options[]    = array(
    'id'        => 'theme_project_meta',
    'title'     => 'Project Options',
    'post_type' => 'project',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'  => 'theme_project_meta_1',
            'fields' => array(
                array(
                  'id'    => 'project_url',
                  'type'  => 'select',
                  'title' => 'Choose Url',
                  'options' => 'page'
                ),              
            ),
        ),
    ),
);


$options[]    = array(
    'id'        => 'theme_work_meta',
    'title'     => 'Work Options',
    'post_type' => 'work',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'  => 'theme_work_meta_1',
            'fields' => array(
                array(
                  'id'    => 'work_url',
                  'type'  => 'select',
                  'title' => 'Choose Url',
                  'options' => 'page'
                ),             
            ),
        ),
    ),
);


$options[]    = array(
    'id'        => 'theme_more_project',
    'title'     => 'More Project Options',
    'post_type' => 'more',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'  => 'theme_more_meta_1',
            'fields' => array(
                array(
                  'id'    => 'more_url',
                  'type'  => 'select',
                  'title' => 'Choose Url',
                  'options' => 'page'
                ),             
            ),
        ),
    ),
);


	return $options;
}
add_filter('cs_metabox_options', 'theme_metabox');