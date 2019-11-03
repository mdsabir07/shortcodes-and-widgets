<?php get_header(); 
/*
  Template Name: Case Four Template
*/
?>




      <?php $case4_hero_bg = cs_get_option('case4_hero_bg');
        $wraper2_img_array = wp_get_attachment_image_src(cs_get_option('case4_hero_bg'), 'large');
        if(!empty($case4_hero_bg)) : ?>
    

        <!--  hero area start -->
        <div style="background-image: url(<?php echo $wraper2_img_array[0]; ?>); height: 768px;" class="hero-area cs_4 case4 display-table">
          <?php endif; ?>
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="case-study-hero-text svg_">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/case4-hero-logo.svg" alt="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="case4-hero-image">
                      <?php $case4_header_image = cs_get_option('case4_header_image'); ?>

                    <?php $c4ogoarray = wp_get_attachment_image_src(cs_get_option('case4_header_image'), 'full'); 
                        if(!empty($case4_header_image)){
                            $case4_header_image = $c4ogoarray[0];
                        }else{
                            $case4_header_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case4_header_image; ?>" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!--  case-study-about area start -->
        <div style="background-color: #f4f5fb;" class="case-study-about case3 ps ">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1 col-md-12">
                <div class="case-study-section-title pdr leter">
                  <?php 
                      $case4_about_title = cs_get_option('case4_about_title');
                      $case4_about_subtitle = cs_get_option('case4_about_subtitle');
                   ?>
                  <h5><?php echo $case4_about_title; ?></h5>
                  <h2><?php echo $case4_about_subtitle; ?></h2>
                </div>

                <div class="row">
                  <?php   
                  $case4_about_list = cs_get_option('case4_about_list');
                  if(!empty($case4_about_list)) : foreach ($case4_about_list as $d4_list):
                 ?>

                  <div class="col-md-3 col-6">
                    <div class="about-list">
                      <h6><?php echo $d4_list['case4_about_title']; ?></h6>
                      <ul>
                        <li><?php echo $d4_list['case4_alist']; ?></li>
                      </ul>
                    </div>
                  </div>
                  <?php endforeach; endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  case-study-about area end -->

        <!--  project overview area start -->

          <?php 
            $case4_content_list = cs_get_option('case4_content_list');  
          ?>
        <?php 
          if(!empty($case4_content_list)) : foreach ($case4_content_list as $c4slist) :
            $case4_secimg = wp_get_attachment_image_src($c4slist['case4_secimg'], 'full', false);
         ?>

        <div class="project-overview-area case4 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $c4slist['case4_sec_title']; ?></h2>
                  <div class="singlecase3-content">
                    <p><?php echo $c4slist['case4_con']; ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-12">
                <img src="<?php echo $case4_secimg[0]; ?>" alt="">
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>
        <!--  project overview area end -->

        <!--  process overview area start -->
        <div style="background-color:  <?php echo cs_get_option('process4_overview_bg'); ?>; ?>; height: 550px;" class="case4 process-overview-area display-table csd ">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                        $process4_overview_title = cs_get_option('process4_overview_title');
                        $process4_overview_subtitle = cs_get_option('process4_overview_subtitle');
                     ?>
                    <h2><?php echo $process4_overview_title; ?></h2>
                    <p><?php echo $process4_overview_subtitle; ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                  <div class="process-overview-detail">

                  <?php   
                      $case4_process_box = cs_get_option('case4_process_box');
                      if(!empty($case4_process_box)) : foreach ($case4_process_box as $pro4_list):
                     ?>

                    <div class="process-overview-details-single sing_p">
                      <h5><?php echo $pro4_list['case4_process_box_title']; ?></h5>
                    </div>
                     <?php endforeach; endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  process overview area end -->


        <!--  project overview area start -->
        <div class="project-overview-area case4 cs_u ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                   <?php 
                      $summary4_title = cs_get_option('summary4_title');
                      $summary44_group_title = cs_get_option('summary44_group_title');
                   ?>
                  <h2><?php echo $summary4_title; ?></h2>
                    <div class="singlecase3-content">

                        <?php   
                          $summary4_group_txt = cs_get_option('summary4_group_txt');
                          if(!empty($summary4_group_txt)) : foreach ($summary4_group_txt as $groups4_txt):
                        ?>

                        <p><?php echo $groups4_txt['summary4_group_content']; ?></p>
                     <?php endforeach; endif; ?>
                    </div>

                    <h2><?php echo $summary44_group_title; ?></h2>
                    <div class="singlecase3-content">
                      <?php   
                          $summary44_group_txt = cs_get_option('summary44_group_txt');
                          if(!empty($summary44_group_txt)) : foreach ($summary44_group_txt as $groups44_txt):
                        ?>

                        <p><?php echo $groups44_txt['summary44_group_title']; ?></p>
                     <?php endforeach; endif; ?>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project overview area start -->
        <div class="project-overview-area case4 ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                      $research_title = cs_get_option('research_title');
                      $research_subtitle = cs_get_option('research_subtitle');
                     ?>
                    <h4><?php echo $research_title; ?></h4>
                    <p><?php echo $research_subtitle; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="primary-research-img">
                 <?php $research_img = cs_get_option('research_img'); ?>

                    <?php $cdogoarray = wp_get_attachment_image_src(cs_get_option('research_img'), 'full'); 
                        if(!empty($research_img)){
                            $research_img = $cdogoarray[0];
                        }else{
                            $research_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $research_img; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project overview area start -->
        <div class="project-overview-area case4 ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                      $research2_title = cs_get_option('research2_title');
                      $research2_subtitle = cs_get_option('research2_subtitle');
                     ?>
                    <h4><?php echo $research2_title; ?></h4>
                    <p><?php echo $research2_subtitle; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="primary-research-img">
                 <?php $research2_img = cs_get_option('research2_img'); ?>

                    <?php $cdogoarray2 = wp_get_attachment_image_src(cs_get_option('research2_img'), 'full'); 
                        if(!empty($research2_img)){
                            $research2_img = $cdogoarray2[0];
                        }else{
                            $research2_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $research2_img; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project slide area start -->
        <div class="project-slide-area case4">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                      $research3_title = cs_get_option('research3_title');
                      $research3_subtitle = cs_get_option('research3_subtitle');
                     ?>
                    <h4><?php echo $research3_title; ?></h4>
                    <p><?php echo $research3_subtitle; ?></p>
                  </div>
                </div>
            </div>


            
            <div class="row margin-lr60">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="case4-slide-active">

                  <?php
                    global $post;
                    $args = array( 'posts_per_page' => -1, 'post_type'=> 'slide2', 'orderby' => 'menu_order', 'order' => 'ASC' );
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ) : setup_postdata($post); ?>
                     
                    <?php

                    $idd = get_the_ID();

                    if(get_post_meta($idd, 'theme2_slide_meta', true)) {
                        $slide_meta = get_post_meta($idd, 'theme2_slide_meta', true);
                    } else {
                        $slide_meta = array();
                    }

                    if(array_key_exists('slide2_project_name', $slide_meta)){
                        $project_name = $slide_meta['slide2_project_name'];
                    }else{
                        $project_name = '';
                    }
                  ?>
                  <div class="case4-single-slide">
                   <img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
                  </div>
                    <?php endforeach; wp_reset_query(); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project slide area end -->


      
      <!--  project overview area start -->
          <?php 
              $case4_group_section = cs_get_option('case4_group_section');  
          ?>

        <?php 
          if(!empty($case4_group_section)) : foreach ($case4_group_section as $c4vlist) :
            $case4_group_img = wp_get_attachment_image_src($c4vlist['case4_group_img'], 'full', false);
         ?>

        <div class="project-overview-area case4">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $c4vlist['case4_group_title'] ?></h2>
                  <p><?php echo $c4vlist['case4_group_subtitle'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="primary-research-img">
                    <img src="<?php echo $case4_group_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>
        <!--  project overview area end -->


        <div class="project-overview-area case4 cd_4">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php $name_choice_title = cs_get_option('name_choice_title'); ?>
                  <h2><?php echo $name_choice_title; ?></h2>

                    <?php   
                          $name_group_section = cs_get_option('name_group_section');
                          if(!empty($name_group_section)) : foreach ($name_group_section as $groupf_txt):
                        ?>

                        <p><?php echo $groupf_txt['case4_name_subtitle']; ?></p>
                     <?php endforeach; endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->




        <!--  project overview area start -->
          <?php 
              $name2_group_section = cs_get_option('name2_group_section');  
          ?>

        <?php 
          if(!empty($name2_group_section)) : foreach ($name2_group_section as $lvvlist) :
            $ui_com_img = wp_get_attachment_image_src($lvvlist['ui_com_img'], 'full', false);
         ?>

        <div class="project-overview-area case4 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $lvvlist['ui_choice_title'] ?></h2>
                  <p><?php echo $lvvlist['ui_name_subtitle'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="primary-research-img">
                    <img src="<?php echo $ui_com_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>


        <!--  project overview result area end -->
        <div class="project-overview-area case4 result">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                        $case4_result_title = cs_get_option('case4_result_title');
                        $case4_result_subtitle = cs_get_option('case4_result_subtitle');
                     ?>
                    <h4><?php echo $case4_result_title; ?></h4>
                    <p><?php echo $case4_result_subtitle; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="row">


                  <?php   
                    $case4_serult_group = cs_get_option('case4_serult_group');
                    if(!empty($case4_serult_group)) : foreach ($case4_serult_group as $case_result_txt):
                  ?>
                     
                  <div class="col-md-6">
                    <div class="case5-number2">
                      <p><?php echo $case_result_txt['case4_group_title']; ?></p>
                      <h1><?php echo $case_result_txt['case4_group_subtitle'] ?></h1>
                    </div>
                  </div>
                  <?php endforeach; endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title cd">
                    <?php 
                        $case4b_result_title = cs_get_option('case4b_result_title');
                        $case4b_result_txt = cs_get_option('case4b_result_txt');
                     ?>
                     <h4><?php echo $case4b_result_title; ?></h4>
                    <p><?php echo $case4b_result_txt; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="primary-research-img">
                 <?php $case4b_result_img = cs_get_option('case4b_result_img'); ?>

                    <?php $rearray2 = wp_get_attachment_image_src(cs_get_option('case4b_result_img'), 'full'); 
                        if(!empty($case4b_result_img)){
                            $case4b_result_img = $rearray2[0];
                        }else{
                            $case4b_result_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case4b_result_img; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--  project overview area start -->
        <div class="project-overview-area case4">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                      $case4_high_ui_title = cs_get_option('case4_high_ui_title');
                      $case4_high_ui_subtitle = cs_get_option('case4_high_ui_subtitle');
                     ?>
                    <h4><?php echo $case4_high_ui_title; ?></h4>
                    <p><?php echo $case4_high_ui_subtitle; ?></p>
                  </div>
                </div>
              </div>
          </div>
        </div>

        
        <!--  hero area start -->
        
        <div  style="background: url(<?php echo get_template_directory_uri(); ?>/assets/svg/case-l.svg;" class="case4-high-image case4">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="case4-long-img">
                  <?php $case4_high_ui_img = cs_get_option('case4_high_ui_img'); ?>

                    <?php $cgogoarray2 = wp_get_attachment_image_src(cs_get_option('case4_high_ui_img'), 'full'); 
                        if(!empty($case4_high_ui_img)){
                            $case4_high_ui_img = $cgogoarray2[0];
                        }else{
                            $case4_high_ui_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case4_high_ui_img; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project overview area start -->
        <div class="key-learning case4_ ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php $case4_key_title = cs_get_option('case4_key_title'); ?>
                    <?php $case4_ref_section_content = cs_get_option('case4_ref_section_content'); ?>
                    <h2><?php echo $case4_key_title; ?></h2>
                    <div class="singlecase3-content">

                        <p><?php echo $case4_ref_section_content; ?></p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  Cta area start -->
        <?php 
            $case4_project_mind_title = cs_get_option('case4_project_mind_title');
            $case4_project_mind_subtitle = cs_get_option('case4_project_mind_subtitle');
            $case4_project_mind_button_txt = cs_get_option('case4_project_mind_button_txt');
            $case4_project_mind_button_link = cs_get_option('case4_project_mind_button_link');
         ?>
        <div style="background-color:<?php echo cs_get_option('case4_project_mind_bg'); ?>; height: 360px;" class="case3 cta-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2><?php echo $case4_project_mind_title; ?></h2>
                  <p><?php echo $case4_project_mind_subtitle; ?></p>
                  <a href="<?php echo $case4_project_mind_button_link; ?>"><?php echo $case4_project_mind_button_txt; ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  Cta area end -->

        <!--  More project area start -->
        <div class="more-project pd-top-140">
          <div class="container">

            <?php echo do_shortcode( '[forms_more]' ); ?>
          </div>
        </div>
        <!--  More project area end -->

       <?php get_footer( ); ?>