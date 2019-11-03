<?php if ( ! defined( 'ABSPATH' ) ) { die; }

$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'menu',
  'menu_slug'       => 'nimbus-theme-options',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => 'Theme Options',
);

$options        = array();


// menu area start
$options[]   = array(
  'name'     => 'menu_area',
  'title'    => 'Menu Setting',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'id'              => 'menu_list',
      'type'            => 'group',
      'title'           => 'Menu list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'menu_title',
          'type'  => 'text',
          'title' => 'Menu title',
        ),
        array(
          'id'    => 'link',
          'type'  => 'text',
          'title' => 'Link',
        ),
      ),
    ), 
  )
);
// menu area end

// wysiwyg

// Home page area start
$options[]   = array(
  'name'     => 'home_area',
  'title'    => 'Home Page Setting',
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'id'    => 'wraper_img',
      'type'  => 'image',
      'title' => 'Header background image ',
    ), 
    array(
      'id'    => 'home_header_subtitle',
      'type'  => 'text',
      'title' => 'Header Subtitle',
    ),
    array(
      'id'    => 'home_header_title',
      'type'  => 'wysiwyg',
      'title' => 'Header Title',
    ),
    array(
      'id'    => 'switch_slider',
      'type'  => 'switcher',
      'title' => 'Slider Switcher',
      'default' => true,
    ), 
  )
);
// home area end


// contact page area start
$options[]   = array(
  'name'     => 'contact_area',
  'title'    => 'Home Contact Setting',
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'id'    => 'contactbg',
      'type'  => 'image',
      'title' => 'Upload background image',
    ), 
    array(
      'id'    => 'contact_title',
      'type'  => 'text',
      'title' => 'Contact Title',
    ), 
    array(
      'id'    => 'contact_subtitle',
      'type'  => 'textarea',
      'title' => 'Contact Subtitle',
    ),
    array(
      'id'    => 'social_title',
      'type'  => 'text',
      'title' => 'Contact right title',
    ),
     array(
      'id'              => 'social_list',
      'type'            => 'group',
      'title'           => 'Social list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'icon',
          'type'  => 'icon',
          'title' => 'Add new icon',
        ),
        array(
          'id'    => 'icon_link',
          'type'  => 'text',
          'title' => 'Icon Link',
        ),
      ),
    ), 
  )
);
// contact area end



// Case 1 page area start
$options[]   = array(
  'name'     => 'case1',
  'title'    => 'Case Study Page One',
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'id'    => 'case1_hero_bg',
      'type'  => 'color_picker',
      'title' => 'Header background color ',
      'default' => '#1d1d1d',
    ), 
    array(
      'id'    => 'case1_header_image',
      'type'  => 'image',
      'title' => 'Header Image',
    ),
    array(
      'id'    => 'case1_about_title',
      'type'  => 'text',
      'title' => 'About Title',
    ),
    array(
      'id'    => 'case1_about_subtitle',
      'type'  => 'wysiwyg',
      'title' => 'About Subtitle',
    ),
    array(
      'id'              => 'case1_about_list',
      'type'            => 'group',
      'title'           => 'About list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case1_about_title',
          'type'  => 'text',
          'title' => 'Add new title',
        ),
        array(
          'id'    => 'case1_alist',
          'type'  => 'wysiwyg',
          'title' => 'Add new item',
        ),
      ),
    ), 
    array(
      'id'    => 'case1_p_title',
      'type'  => 'text',
      'title' => 'Project Overview Title',
    ),
    array(
      'id'    => 'case1_p_content',
      'type'  => 'textarea',
      'title' => 'Project Overview Content',
    ),
    array(
      'id'    => 'case1_p_imga',
      'type'  => 'image',
      'title' => 'Project Overview Image',
    ),
    array(
      'id'    => 'case1_p2_title',
      'type'  => 'text',
      'title' => 'Project Overview Bottom Title',
    ),
    array(
      'id'    => 'case1_p2_content',
      'type'  => 'textarea',
      'title' => 'Project Overview Bottom Subtitle',
    ),


    array(
      'id'    => 'process_overview_bg',
      'type'  => 'color_picker',
      'title' => 'Process Overview Bakground Color',
      'default' => '#9f171f',
    ),
    array(
      'id'    => 'process_overview_title',
      'type'  => 'text',
      'title' => 'Process Overview Title',
    ),
    array(
      'id'    => 'process_overview_subtitle',
      'type'  => 'textarea',
      'title' => 'Process Overview Subtitle',
    ),
    array(
      'id'              => 'case1_process_box',
      'type'            => 'group',
      'title'           => 'Process list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case1_process_box_title',
          'type'  => 'wysiwyg',
          'title' => 'Process Box title',
        ),
      ),
    ), 


    array(
      'id'    => 'case1_ui_title',
      'type'  => 'text',
      'title' => 'Ui Title',
    ),
    array(
      'id'    => 'case1_ui_subtitle',
      'type'  => 'textarea',
      'title' => 'Ui Subtitle',
    ),
    array(
      'id'    => 'case1_ui_img',
      'type'  => 'image',
      'title' => 'Upload Ui Image',
    ),

    array(
      'id'    => 'case1_industry_title',
      'type'  => 'text',
      'title' => 'Industries Title',
    ),
    array(
      'id'    => 'case1_industry_subtitle',
      'type'  => 'textarea',
      'title' => 'Industries Subtitle',
    ),
    array(
      'id'              => 'case1_industry_box',
      'type'            => 'group',
      'title'           => 'Industries Box',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case1_industries_box_title',
          'type'  => 'text',
          'title' => 'Industries Box title',
        ),
        array(
          'id'    => 'case1_industries_box_subtitle',
          'type'  => 'text',
          'title' => 'Industries Box Subtitle',
        ),
      ),
    ), 

    array(
      'id'    => 'case1_structure_title',
      'type'  => 'text',
      'title' => 'Structure Title',
    ),
    array(
      'id'    => 'case1_structure_subtitle',
      'type'  => 'textarea',
      'title' => 'Structure Subtitle',
    ),
    array(
      'id'    => 'case1_structure_image',
      'type'  => 'image',
      'title' => 'Upload Structure Image',
    ),


    array(
      'id'    => 'case1_wire_title',
      'type'  => 'text',
      'title' => 'Wireframe Title',
    ),
    array(
      'id'    => 'case1_wire_subtitle',
      'type'  => 'textarea',
      'title' => 'Wireframe Subtitle',
    ),
    array(
      'id'    => 'case1_wire_image',
      'type'  => 'image',
      'title' => 'Upload Wireframe Image',
    ),

    array(
      'id'    => 'case1_component_title',
      'type'  => 'text',
      'title' => 'Component Title',
    ),
    array(
      'id'    => 'case1_component_subtitle',
      'type'  => 'textarea',
      'title' => 'Component Subtitle',
    ),
    array(
      'id'    => 'case1_component_image',
      'type'  => 'image',
      'title' => 'Upload Component Image',
    ),

    array(
      'id'    => 'case1_solu_title',
      'type'  => 'text',
      'title' => 'Ui Solution Title',
    ),
    array(
      'id'    => 'case1_solu_subtitle',
      'type'  => 'textarea',
      'title' => 'Ui Solution Subtitle',
    ),
    array(
      'id'    => 'case1_solu_image',
      'type'  => 'image',
      'title' => 'Upload Ui Solution Image',
    ),

    array(
      'id'              => 'case1_coming_soon_box',
      'type'            => 'group',
      'title'           => 'Coming Soon',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Project',
      'fields'          => array(
        array(
          'id'    => 'case1_coming_soon_title',
          'type'  => 'text',
          'title' => 'Project title',
        ),
        array(
          'id'    => 'case1_coming_soon_subtitle',
          'type'  => 'text',
          'title' => 'Project Subtitle',
        ),
        array(
          'id'    => 'case1_coming_soon_img',
          'type'  => 'image',
          'title' => 'Upload Project Image',
        ),
      ),
    ), 


    array(
      'id'    => 'case1_project_mind_bg',
      'type'  => 'color_picker',
      'title' => 'Project Mind Background Color',
      'default' => '#141414',
    ),
    array(
      'id'    => 'case1_project_mind_title',
      'type'  => 'text',
      'title' => 'Project Mind Title',
    ),
    array(
      'id'    => 'case1_project_mind_subtitle',
      'type'  => 'textarea',
      'title' => 'Project Mind Subtitle',
    ),
    array(
      'id'    => 'case1_project_mind_button_txt',
      'type'  => 'text',
      'title' => 'Project Mind Button Text',
    ),
    array(
      'id'    => 'case1_project_mind_button_link',
      'type'  => 'text',
      'title' => 'Project Mind Button Link',
    ),
  )
);
// Case 1 area end




// Case 2 page area start
$options[]   = array(
  'name'     => 'case2',
  'title'    => 'Case Study Page Two',
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'id'    => 'case2_hero_bg',
      'type'  => 'color_picker',
      'title' => 'Header background color ',
      'default' => '#1d2f6a',
    ), 
    array(
      'id'    => 'case2_header_image',
      'type'  => 'image',
      'title' => 'Header Image',
    ),
    array(
      'id'    => 'case2_about_title',
      'type'  => 'text',
      'title' => 'About Title',
    ),
    array(
      'id'    => 'case2_about_subtitle',
      'type'  => 'textarea',
      'title' => 'About Subtitle',
    ),
    array(
      'id'              => 'case2_about_list',
      'type'            => 'group',
      'title'           => 'About list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case2_about_title',
          'type'  => 'text',
          'title' => 'Add new title',
        ),
        array(
          'id'    => 'case2_alist',
          'type'  => 'wysiwyg',
          'title' => 'Add new item',
        ),
      ),
    ), 
    array(
      'id'    => 'case2_p_title',
      'type'  => 'text',
      'title' => 'Project Overview Title',
    ),
    array(
      'id'    => 'case2_p_content',
      'type'  => 'textarea',
      'title' => 'Project Overview Content',
    ),
    array(
      'id'    => 'case2_p_imga',
      'type'  => 'image',
      'title' => 'Project Overview Image',
    ),
    array(
      'id'    => 'case2_p2_title',
      'type'  => 'text',
      'title' => 'Project Overview Bottom Title',
    ),
    array(
      'id'    => 'case2_p2_content',
      'type'  => 'textarea',
      'title' => 'Project Overview Bottom Subtitle',
    ),



    array(
      'id'              => 'case2_process_box',
      'type'            => 'group',
      'title'           => 'Process list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case2_process_box_title',
          'type'  => 'text',
          'title' => 'Process Box title',
        ),
        array(
          'id'    => 'case2_process_box_subtitle',
          'type'  => 'text',
          'title' => 'Process Box Subtitle',
        ),
      ),
    ), 


    array(
      'id'    => 'phase1_title',
      'type'  => 'text',
      'title' => 'Phase title',
    ),
    array(
      'id'    => 'phase1_subtitle',
      'type'  => 'text',
      'title' => 'Phase Subtitle',
    ),
    array(
      'id'              => 'case2_group_txt',
      'type'            => 'group',
      'title'           => 'Phase list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case2_group_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 


    array(
      'id'    => 'case2_chalenge_title',
      'type'  => 'text',
      'title' => 'Challenge Title',
    ),
    array(
      'id'    => 'case2_chalenge_subtitle',
      'type'  => 'textarea',
      'title' => 'Challenge Subtitle',
    ),


    array(
      'id'    => 'case2_afinity_title',
      'type'  => 'text',
      'title' => 'Afinity Title',
    ),
    array(
      'id'    => 'case2_afinity_subtitle',
      'type'  => 'textarea',
      'title' => 'Afinity Subtitle',
    ),
    array(
      'id'    => 'case2_afinity_img',
      'type'  => 'image',
      'title' => 'Upload Afinity Image',
    ),


     array(
      'id'    => 'blockers_title',
      'type'  => 'text',
      'title' => 'Blockers Title',
    ),
    array(
      'id'              => 'blockers_group',
      'type'            => 'group',
      'title'           => 'Blockers list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'blockers_list',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 

     array(
      'id'    => 'schedule_title',
      'type'  => 'text',
      'title' => 'Schedule Title',
    ),
    array(
      'id'              => 'schedule_group',
      'type'            => 'group',
      'title'           => 'Schedule list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'schedule_image',
          'type'  => 'image',
          'title' => 'Upload Image',
        ),
        array(
          'id'    => 'schedule_number',
          'type'  => 'text',
          'title' => 'Add New Number',
        ),
        array(
          'id'    => 'schedule_txt',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 



     array(
      'id'    => 'phase2_title',
      'type'  => 'text',
      'title' => 'Phase title',
    ),
    array(
      'id'    => 'phase2_subtitle',
      'type'  => 'text',
      'title' => 'Phase Subtitle',
    ),
    array(
      'id'              => 'phase2_group_txt',
      'type'            => 'group',
      'title'           => 'Phase list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'pahse2_group_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 
    array(
      'id'              => 'phase2_bottom_txt',
      'type'            => 'group',
      'title'           => 'Phase Bottom list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'pahse2_bottom_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 

     array(
        'id'    => 'existing_title',
        'type'  => 'text',
        'title' => 'Existing Title',
      ),
      array(
        'id'              => 'existing_group_box',
        'type'            => 'group',
        'title'           => 'Existing Box list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'existing_group_content',
            'type'  => 'textarea',
            'title' => 'Add New Content',
          ),
        ),
      ), 

     array(
        'id'    => 'existing2_title',
        'type'  => 'text',
        'title' => 'Existing Bottom Title',
      ),
      array(
        'id'              => 'existing2_group_box',
        'type'            => 'group',
        'title'           => 'Existing Bottom Box list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'existing2_group_content',
            'type'  => 'textarea',
            'title' => 'Add New Content',
          ),
        ),
      ), 


     array(
        'id'    => 'assumptions_title',
        'type'  => 'text',
        'title' => 'Assumptions Title',
      ),
     array(
        'id'    => 'assumptions_content',
        'type'  => 'textarea',
        'title' => 'Assumptions Content',
      ),
      array(
        'id'              => 'assumptions_group_content',
        'type'            => 'group',
        'title'           => 'Assumptions list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'assumptions_group_content',
            'type'  => 'textarea',
            'title' => 'Add New Content',
          ),
        ),
      ), 


      array(
        'id'    => 'wireframe_title',
        'type'  => 'text',
        'title' => 'Wireframe Title',
      ),
     array(
        'id'    => 'wireframe_content',
        'type'  => 'textarea',
        'title' => 'Wireframe Content',
      ),

     array(
        'id'    => 'wireframe_img',
        'type'  => 'image',
        'title' => 'Wireframe Image',
      ),




     array(
      'id'    => 'phase4_title',
      'type'  => 'text',
      'title' => 'Phase 3 title',
    ),
    array(
      'id'    => 'phase4_subtitle',
      'type'  => 'text',
      'title' => 'Phase 3 Subtitle',
    ),
    array(
      'id'              => 'phase4_group_txt',
      'type'            => 'group',
      'title'           => 'Phase 3 list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'pahse24_group_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 
    array(
      'id'    => 'phase4b_title',
      'type'  => 'text',
      'title' => 'Phase 3 Bottom Title',
    ),
    array(
      'id'              => 'phase4_bottom_txt',
      'type'            => 'group',
      'title'           => 'Phase 3 Bottom list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'pahse4_bottom_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 



    array(
      'id'              => 'scenario_tast',
      'type'            => 'group',
      'title'           => 'Scenario Task list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'scenario_title',
          'type'  => 'text',
          'title' => 'Scenario Title',
        ),
        array(
          'id'    => 'scenario_content',
          'type'  => 'wysiwyg',
          'title' => 'Scenario Content',
        ),
        array(
          'id'    => 'task_title',
          'type'  => 'text',
          'title' => 'Task Title',
        ),
        array(
          'id'    => 'task_content',
          'type'  => 'wysiwyg',
          'title' => 'Task Content',
        ),
      ),
    ), 




      array(
        'id'    => 'pro_title',
        'type'  => 'text',
        'title' => 'Pro Test Title',
        ),
        array(
      'id'              => 'pro_test',
      'type'            => 'group',
      'title'           => 'Pro Test list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        
        array(
          'id'    => 'pro_content',
          'type'  => 'textarea',
          'title' => 'Pro Content',
        ),
      ),
    ), 

      array(
        'id'    => 'ui_solution',
        'type'  => 'text',
        'title' => 'Ui Solution Title',
        ),
      array(
        'id'    => 'ui_solution_content',
        'type'  => 'textarea',
        'title' => 'Ui Solution Content',
        ),

      array(
        'id'    => 'ui_solution_image',
        'type'  => 'image',
        'title' => 'Ui Solution Image',
        ),

      array(
        'id'    => 'ui_solution_bc',
        'type'  => 'color_picker',
        'title' => 'Ui Solution Background Color',
        ),


    array(
          'id'              => 'case2_coming_soon_box',
          'type'            => 'group',
          'title'           => 'Coming Soon',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Project',
          'fields'          => array(
            array(
              'id'    => 'case2_coming_soon_title',
              'type'  => 'text',
              'title' => 'Project title',
            ),
            array(
              'id'    => 'case2_coming_soon_subtitle',
              'type'  => 'text',
              'title' => 'Project Subtitle',
            ),
            array(
              'id'    => 'case2_coming_soon_img',
              'type'  => 'image',
              'title' => 'Upload Project Image',
            ),
          ),
        ), 

      array(
            'id'    => 'case2_project_mind_bg',
            'type'  => 'color_picker',
            'title' => 'Project Mind Background Color',
            'default' => '#1d2f6a',
          ),
          array(
            'id'    => 'case2_project_mind_title',
            'type'  => 'text',
            'title' => 'Project Mind Title',
          ),
          array(
            'id'    => 'case2_project_mind_subtitle',
            'type'  => 'textarea',
            'title' => 'Project Mind Subtitle',
          ),
          array(
            'id'    => 'case2_project_mind_button_txt',
            'type'  => 'text',
            'title' => 'Project Mind Button Text',
          ),
          array(
            'id'    => 'case2_project_mind_button_link',
            'type'  => 'text',
            'title' => 'Project Mind Button Link',
          ),   
      )
    );
// Case 2 area end


  // Case 3 area start
  $options[]   = array(
    'name'     => 'case3',
    'title'    => 'Case Study Page Three',
    'icon'     => 'fa fa-shield',
    'fields'   => array(
      array(
        'id'    => 'case3_hero_bg',
        'type'  => 'color_picker',
        'title' => 'Header background color ',
        'default' => '#39d582',
      ), 
      array(
        'id'    => 'case3_header_image',
        'type'  => 'image',
        'title' => 'Header Image',
      ),
      array(
        'id'    => 'case3_about_title',
        'type'  => 'text',
        'title' => 'About Title',
      ),
      array(
        'id'    => 'case3_about_subtitle',
        'type'  => 'textarea',
        'title' => 'About Subtitle',
      ),
      array(
        'id'              => 'case3_about_list',
        'type'            => 'group',
        'title'           => 'About list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case3_about_title',
            'type'  => 'text',
            'title' => 'Add new title',
          ),
          array(
            'id'    => 'case3_alist',
            'type'  => 'wysiwyg',
            'title' => 'Add new item',
          ),
        ),
      ), 


    array(
      'id'    => 'summary_title',
      'type'  => 'text',
      'title' => 'Summary Title',
    ),
    array(
      'id'    => 'summary_subtitle',
      'type'  => 'textarea',
      'title' => 'Summary Subtitle',
    ),
    array(
      'id'              => 'summary_group_txt',
      'type'            => 'group',
      'title'           => 'Summary Text List',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'summary_group_content',
          'type'  => 'textarea',
          'title' => 'Add New Content',
        ),
      ),
    ), 


    array(
      'id'              => 'summary2_group_txt',
      'type'            => 'group',
      'title'           => 'Summary Center Text List',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'summary2_group_title',
          'type'  => 'text',
          'title' => 'Title',
        ),
        array(
          'id'    => 'summary2_group_content',
          'type'  => 'wysiwyg',
          'title' => 'Add New Content',
        ),
      ),
    ), 


      array(
        'id'    => 'summary3_group_title',
        'type'  => 'text',
        'title' => 'Summary Bottom Text Title',
        ),
        array(
      'id'              => 'summary3_group_txt',
      'type'            => 'group',
      'title'           => 'Summary Bottom Text List',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'summary3_group_content',
          'type'  => 'wysiwyg',
          'title' => 'Add New Content',
        ),
      ),
    ), 

    array(
      'id'    => 'summary3_bottom_img',
      'type'  => 'image',
      'title' => 'Add Bottom Image',
    ),
    array(
      'id'    => 'summary4_bottom_txt',
      'type'  => 'textarea',
      'title' => 'Add Image Title',
    ),


    array(
      'id'    => 'case3_project_mind_bg',
      'type'  => 'color_picker',
      'title' => 'Project Mind Background Color',
      'default' => '#39d582',
    ),
    array(
      'id'    => 'case3_project_mind_title',
      'type'  => 'text',
      'title' => 'Project Mind Title',
    ),
    array(
      'id'    => 'case3_project_mind_subtitle',
      'type'  => 'textarea',
      'title' => 'Project Mind Subtitle',
    ),
    array(
      'id'    => 'case3_project_mind_button_txt',
      'type'  => 'text',
      'title' => 'Project Mind Button Text',
    ),
    array(
      'id'    => 'case3_project_mind_button_link',
      'type'  => 'text',
      'title' => 'Project Mind Button Link',
    ),


  )
);

// Case 3 area end








  // Case 4 area start
  $options[]   = array(
    'name'     => 'case4',
    'title'    => 'Case Study Page Four',
    'icon'     => 'fa fa-shield',
    'fields'   => array(
      array(
        'id'    => 'case4_hero_bg',
        'type'  => 'image',
        'title' => 'Header background Image ',
      ), 
      array(
        'id'    => 'case4_header_image',
        'type'  => 'image',
        'title' => 'Header Image',
      ),
      array(
        'id'    => 'case4_about_title',
        'type'  => 'text',
        'title' => 'About Title',
      ),
      array(
        'id'    => 'case4_about_subtitle',
        'type'  => 'textarea',
        'title' => 'About Subtitle',
      ),
      array(
        'id'              => 'case4_about_list',
        'type'            => 'group',
        'title'           => 'About list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case4_about_title',
            'type'  => 'text',
            'title' => 'Add new title',
          ),
          array(
            'id'    => 'case4_alist',
            'type'  => 'wysiwyg',
            'title' => 'Add new item',
          ),
        ),
      ), 

      array(
        'id'              => 'case4_content_list',
        'type'            => 'group',
        'title'           => 'Add New Section',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case4_sec_title',
            'type'  => 'text',
            'title' => 'Add new title',
          ),
          array(
            'id'    => 'case4_con',
            'type'  => 'wysiwyg',
            'title' => 'Add new Content',
          ),
          array(
            'id'    => 'case4_secimg',
            'type'  => 'image',
            'title' => 'Upload Section Image',
          ),
        ),
      ), 


    array(
      'id'    => 'process4_overview_bg',
      'type'  => 'color_picker',
      'title' => 'Process Overview Bakground Color',
      'default' => '#494cf1',
    ),
    array(
      'id'    => 'process4_overview_title',
      'type'  => 'text',
      'title' => 'Process Overview Title',
    ),
    array(
      'id'    => 'process4_overview_subtitle',
      'type'  => 'textarea',
      'title' => 'Process Overview Subtitle',
    ),
    array(
      'id'              => 'case4_process_box',
      'type'            => 'group',
      'title'           => 'Process list',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'case4_process_box_title',
          'type'  => 'wysiwyg',
          'title' => 'Process Box title',
        ),
      ),
    ), 


    array(
      'id'    => 'summary4_title',
      'type'  => 'text',
      'title' => 'Summary Title',
    ),
    array(
      'id'              => 'summary4_group_txt',
      'type'            => 'group',
      'title'           => 'Summary Text List',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'summary4_group_content',
          'type'  => 'wysiwyg',
          'title' => 'Add New Content',
        ),
      ),
    ), 

      array(
        'id'    => 'summary44_group_title',
        'type'  => 'text',
        'title' => 'Summary Bottom Title',
      ),
    array(
      'id'              => 'summary44_group_txt',
      'type'            => 'group',
      'title'           => 'Summary Bottom Text List',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'summary44_group_title',
          'type'  => 'wysiwyg',
          'title' => 'Add new Content',
        ),
      ),
    ), 


      array(
        'id'    => 'research_title',
        'type'  => 'text',
        'title' => 'Primary Research Title',
      ),
      array(
        'id'    => 'research_subtitle',
        'type'  => 'text',
        'title' => 'Primary Research Subtitle',
      ),
      array(
        'id'    => 'research_img',
        'type'  => 'image',
        'title' => 'Primary Research Image',
      ),



      array(
        'id'    => 'research2_title',
        'type'  => 'text',
        'title' => 'Research Results Title',
      ),
      array(
        'id'    => 'research2_subtitle',
        'type'  => 'text',
        'title' => 'Research Results Subtitle',
      ),
      array(
        'id'    => 'research2_img',
        'type'  => 'image',
        'title' => 'Research Results Image',
      ),


      array(
        'id'    => 'research3_title',
        'type'  => 'text',
        'title' => 'Empathizing the Users Title',
      ),
      array(
        'id'    => 'research3_subtitle',
        'type'  => 'wysiwyg',
        'title' => 'Empathizing the Users Subtitle',
      ),



       array(
          'id'              => 'case4_group_section',
          'type'            => 'group',
          'title'           => 'Add New Section',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Project',
          'fields'          => array(
            array(
              'id'    => 'case4_group_title',
              'type'  => 'text',
              'title' => 'Project title',
            ),
            array(
              'id'    => 'case4_group_subtitle',
              'type'  => 'wysiwyg',
              'title' => 'Project Subtitle',
            ),
            array(
              'id'    => 'case4_group_img',
              'type'  => 'image',
              'title' => 'Upload Project Image',
            ),
          ),
        ), 



       array(
          'id'    => 'name_choice_title',
          'type'  => 'text',
          'title' => 'Aida Name Choice title',
        ),
       array(
          'id'              => 'name_group_section',
          'type'            => 'group',
          'title'           => 'Add New Conetnt',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Project',
          'fields'          => array(
            array(
              'id'    => 'case4_name_subtitle',
              'type'  => 'wysiwyg',
              'title' => 'Content',
            ),
          ),
        ), 


       
       array(
          'id'              => 'name2_group_section',
          'type'            => 'group',
          'title'           => 'Add New Ui & User Component',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Project',
          'fields'          => array(
            array(
                'id'    => 'ui_choice_title',
                'type'  => 'text',
                'title' => 'Title',
              ),
            array(
              'id'    => 'ui_name_subtitle',
              'type'  => 'wysiwyg',
              'title' => 'Content',
            ),
            array(
              'id'    => 'ui_com_img',
              'type'  => 'image',
              'title' => 'Upload Image',
            ),
          ),
        ), 


        array(
          'id'    => 'case4_result_title',
          'type'  => 'text',
          'title' => 'Case 4 Result Title',
        ),
        array(
          'id'    => 'case4_result_subtitle',
          'type'  => 'text',
          'title' => 'Case 4 Result Subtitle',
        ),
       array(
          'id'              => 'case4_serult_group',
          'type'            => 'group',
          'title'           => 'Add New group',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New',
          'fields'          => array(
            array(
              'id'    => 'case4_group_title',
              'type'  => 'text',
              'title' => 'Title',
            ),
            array(
              'id'    => 'case4_group_subtitle',
              'type'  => 'text',
              'title' => 'Content',
            ),
          ),
        ), 

        array(
          'id'    => 'case4b_result_title',
          'type'  => 'text',
          'title' => 'Marketing Title',
        ),
        array(
          'id'    => 'case4b_result_txt',
          'type'  => 'wysiwyg',
          'title' => 'Marketing Content',
        ),
        array(
          'id'    => 'case4b_result_img',
          'type'  => 'image',
          'title' => 'Upload Image',
        ),



        array(
          'id'    => 'case4_high_ui_title',
          'type'  => 'text',
          'title' => 'Marketing Title',
        ),
        array(
          'id'    => 'case4_high_ui_subtitle',
          'type'  => 'wysiwyg',
          'title' => 'Marketing Subtitle',
        ),
        array(
          'id'    => 'case4_high_ui_img',
          'type'  => 'image',
          'title' => 'Upload Project Image',
        ),



      array(
          'id'    => 'case4_key_title',
          'type'  => 'text',
          'title' => 'Reflection title',
        ),
        array(
            'id'    => 'case4_ref_section_content',
            'type'  => 'wysiwyg',
            'title' => 'Reflection Content',
          ),


array(
      'id'    => 'case4_project_mind_bg',
      'type'  => 'color_picker',
      'title' => 'Project Mind Background Color',
      'default' => '#494eed',
    ),
    array(
      'id'    => 'case4_project_mind_title',
      'type'  => 'text',
      'title' => 'Project Mind Title',
    ),
    array(
      'id'    => 'case4_project_mind_subtitle',
      'type'  => 'textarea',
      'title' => 'Project Mind Subtitle',
    ),
    array(
      'id'    => 'case4_project_mind_button_txt',
      'type'  => 'text',
      'title' => 'Project Mind Button Text',
    ),
    array(
      'id'    => 'case4_project_mind_button_link',
      'type'  => 'text',
      'title' => 'Project Mind Button Link',
    ), 
  )
);

// Case 4 area end







  // Case 5 area start
  $options[]   = array(
    'name'     => 'case5',
    'title'    => 'Case Study Five',
    'icon'     => 'fa fa-shield',
    'fields'   => array(
      array(
        'id'    => 'case5_hero_bg',
        'type'  => 'image',
        'title' => 'Header background image ',
      ), 
      array(
        'id'    => 'case5_about_title',
        'type'  => 'text',
        'title' => 'About Title',
      ),
      array(
        'id'    => 'case5_about_subtitle',
        'type'  => 'textarea',
        'title' => 'About Subtitle',
      ),
      array(
        'id'              => 'case5_about_list',
        'type'            => 'group',
        'title'           => 'About list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case5_about_title',
            'type'  => 'text',
            'title' => 'Add new title',
          ),
          array(
            'id'    => 'case5_alist',
            'type'  => 'wysiwyg',
            'title' => 'Add new item',
          ),
        ),
      ), 


      array(
        'id'    => 'case5_intro_title',
        'type'  => 'text',
        'title' => 'Introduction Title',
      ),
      array(
        'id'    => 'case5_intro_subtitle',
        'type'  => 'textarea',
        'title' => 'Introduction Subtitle',
      ),
      array(
        'id'    => 'case5_intro_bg',
        'type'  => 'image',
        'title' => 'Introduction Slider Shape',
      ),


      array(
        'id'    => 'case5_prolem_title',
        'type'  => 'text',
        'title' => 'Problem Space Title',
      ),
      array(
        'id'    => 'case5_problem_subtitle',
        'type'  => 'textarea',
        'title' => 'Problem Space Subtitle',
      ),

      array(
        'id'    => 'case5_challenge_title',
        'type'  => 'text',
        'title' => 'Challenge Title',
      ),
      array(
        'id'    => 'case5_challenge_subtitle',
        'type'  => 'textarea',
        'title' => 'Challenge Subtitle',
      ),


      array(
        'id'    => 'case5_research_title',
        'type'  => 'text',
        'title' => 'Reasearch Title',
      ),
      array(
        'id'    => 'case5_reasearch_subtitle',
        'type'  => 'textarea',
        'title' => 'Reasearch Subtitle',
      ),
      array(
        'id'              => 'case5_research_list',
        'type'            => 'group',
        'title'           => 'Research list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case5_research_list_content',
            'type'  => 'textarea',
            'title' => 'Add new Content',
          ),
        ),
      ), 


      array(
        'id'              => 'case5_research_result',
        'type'            => 'group',
        'title'           => 'Research Number',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case5_research_result_title',
            'type'  => 'text',
            'title' => 'Title',
          ),
          array(
            'id'    => 'case5_research_result_content',
            'type'  => 'textarea',
            'title' => 'Subtitle',
          ),
        ),
      ), 


      array(
        'id'    => 'case5_insights_title',
        'type'  => 'text',
        'title' => 'Insights Title',
      ),
      array(
        'id'    => 'case5_insights_subtitle',
        'type'  => 'textarea',
        'title' => 'Insights Subtitle',
      ),
      array(
        'id'              => 'case5_insights_list',
        'type'            => 'group',
        'title'           => 'Insights list',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case5_insights_g_content',
            'type'  => 'text',
            'title' => 'Country',
          ),
          array(
            'id'    => 'case5_insights_g_title',
            'type'  => 'text',
            'title' => 'Number',
          ),
        ),
      ), 

      array(
        'id'              => 'case5_insights_bottom',
        'type'            => 'group',
        'title'           => 'Insights Bottom Content',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'case5_insights_b_content',
            'type'  => 'textarea',
            'title' => 'Content',
          ),
        ),
      ), 


      array(
        'id'    => 'case5_understanding_title',
        'type'  => 'text',
        'title' => 'Understanding Users Title',
      ),
      array(
        'id'    => 'case5_understanding_content',
        'type'  => 'textarea',
        'title' => 'Understanding Users Conetnt',
      ),

      array(
       'id'              => 'case5_add_new_section',
        'type'            => 'group',
        'title'           => 'Add New Section',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Item',
        'fields'          => array(
          array(
            'id'    => 'new_sec_title',
            'type'  => 'text',
            'title' => 'Title',
          ),
          array(
            'id'    => 'new_sec_content',
            'type'  => 'textarea',
            'title' => 'Content',
          ),
          array(
            'id'    => 'new_sec_img',
            'type'  => 'image',
            'title' => 'Upload Image',
          ),
        ),
      ), 


      array(
        'id'    => 'case5_landing_title',
        'type'  => 'text',
        'title' => 'Landing Title',
      ),
      array(
        'id'    => 'case5_landing_content',
        'type'  => 'textarea',
        'title' => 'Landing Content',
      ),
      array(
        'id'    => 'case5_landing_img',
        'type'  => 'image',
        'title' => 'Upload Image',
      ),



      array(
          'id'              => 'case5_coming_soon_box',
          'type'            => 'group',
          'title'           => 'Coming Soon',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Project',
          'fields'          => array(
            array(
              'id'    => 'case5_coming_soon_title',
              'type'  => 'text',
              'title' => 'Project title',
            ),
            array(
              'id'    => 'case5_coming_soon_subtitle',
              'type'  => 'text',
              'title' => 'Project Subtitle',
            ),
            array(
              'id'    => 'case5_coming_soon_img',
              'type'  => 'image',
              'title' => 'Upload Project Image',
            ),
          ),
        ), 


        array(
            'id'    => 'case5_project_mind_bg',
            'type'  => 'color_picker',
            'title' => 'Project Mind Background Color',
            'default' => '#fa7f56',
          ),
          array(
            'id'    => 'case5_project_mind_title',
            'type'  => 'text',
            'title' => 'Project Mind Title',
          ),
          array(
            'id'    => 'case5_project_mind_subtitle',
            'type'  => 'textarea',
            'title' => 'Project Mind Subtitle',
          ),
          array(
            'id'    => 'case5_project_mind_button_txt',
            'type'  => 'text',
            'title' => 'Project Mind Button Text',
          ),
          array(
            'id'    => 'case5_project_mind_button_link',
            'type'  => 'text',
            'title' => 'Project Mind Button Link',
          ),   

        // Case 5 area end


  )
);

// Case 5 area end


// Case 5 area start
$options[]   = array(
  'name'     => 'footer',
  'title'    => 'Footer',
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'id'              => 'footer_socials',
      'type'            => 'group',
      'title'           => 'Add New Section',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Item',
      'fields'          => array(
        array(
          'id'    => 'icon',
          'type'  => 'icon',
          'title' => 'Icon',
        ),
        array(
          'id'    => 'link',
          'type'  => 'text',
          'title' => 'Link',
        ),
      ),
    ), 
    array(
      'id'    => 'footer',
      'type'  => 'wysiwyg',
      'title' => 'Footer Copyright Text',
    ), 
  )
);






CSFramework::instance( $settings, $options );