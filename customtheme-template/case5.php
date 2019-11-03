<?php get_header(); 
/*
  Template Name: Case Five Template
*/
?>
 

        <!--  hero area start -->

      <?php $case5_hero_bg = cs_get_option('case5_hero_bg');
        $wraper5_img_array = wp_get_attachment_image_src(cs_get_option('case5_hero_bg'), 'full');
        if(!empty($case5_hero_bg)) : ?>
    

        <!--  hero area start -->
        <div style="background-image: url(<?php echo $wraper5_img_array[0]; ?>); height: 768px;" class="hero-area case4 bt display-table">
          <?php endif; ?>
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!--  case-study-about area start -->
        <div class="case-study-about case5 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1 col-md-12">
                <div class="case-study-section-title pdr leter">
                  <?php 
                      $case5_about_title = cs_get_option('case5_about_title');
                      $case5_about_subtitle = cs_get_option('case5_about_subtitle');
                   ?>
                  <h5><?php echo $case5_about_title; ?></h5>
                  <h2><?php echo $case5_about_subtitle; ?></h2>
                </div>

                <div class="row">
                  <?php   
                  $case5_about_list = cs_get_option('case5_about_list');
                  if(!empty($case5_about_list)) : foreach ($case5_about_list as $d5_list):
                 ?>

                  <div class="col-md-3 col-6">
                    <div class="about-list">
                      <h6><?php echo $d5_list['case5_about_title']; ?></h6>
                      <ul>
                        <li><?php echo $d5_list['case5_alist']; ?></li>
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

        <!--  project slide area start -->
        <div class="project-slide-area case4 ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                        $case5_intro_title = cs_get_option('case5_intro_title');
                        $case5_intro_subtitle = cs_get_option('case5_intro_subtitle');
                     ?>
                    <h4><?php echo $case5_intro_title; ?></h4>
                    <p><?php echo $case5_intro_subtitle; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <?php $case5_intro_bg = cs_get_option('case5_intro_bg');
                    $wraper6_img_array = wp_get_attachment_image_src(cs_get_option('case5_intro_bg'), 'large');
                    if(!empty($case5_intro_bg)) : ?>
                <div style="background-image: url(<?php echo $wraper6_img_array[0]; ?>);" class="slide5-bg">
                  <?php endif; ?>

                  <div class="row margin-lr60">
                    <div class="col-md-12">
                      <div class="case5-slide-active">
                        <?php
                            global $post;
                            $args = array( 'posts_per_page' => -1, 'post_type'=> 'slide3', 'orderby' => 'menu_order', 'order' => 'ASC' );
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post); ?>
                             
                            <?php

                            $idd = get_the_ID();

                            if(get_post_meta($idd, 'theme3_slide_meta', true)) {
                                $slide_meta = get_post_meta($idd, 'theme3_slide_meta', true);
                            } else {
                                $slide_meta = array();
                            }

                            if(array_key_exists('slide3_project_name', $slide_meta)){
                                $project_name = $slide_meta['slide3_project_name'];
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
            </div>
          </div>
        </div>
        <!--  project slide area end -->

        <!--  project overview area start -->
        <div class="project-overview-area case4 ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                      $case5_prolem_title = cs_get_option('case5_prolem_title');
                      $case5_problem_subtitle = cs_get_option('case5_problem_subtitle');
                      $case5_challenge_title = cs_get_option('case5_challenge_title');
                      $case5_challenge_subtitle = cs_get_option('case5_challenge_subtitle');
                      $case5_research_title = cs_get_option('case5_research_title');
                      $case5_reasearch_subtitle = cs_get_option('case5_reasearch_subtitle');
                     ?>
                    <h4><?php echo $case5_prolem_title; ?></h4>
                    <p><?php echo $case5_problem_subtitle; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="case5-custom">
                  <div class="custom-content">
                    <strong><?php echo $case5_challenge_title; ?></strong>
                    <p><?php echo $case5_challenge_subtitle; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project overview area start -->
        <div class="project-overview-area case4 case5 ul ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <h4><?php echo $case5_research_title; ?></h4>
                    <p><?php echo $case5_reasearch_subtitle; ?></p>

                    <ul>
                      <?php   
                        $case5_research_list = cs_get_option('case5_research_list');
                        if(!empty($case5_research_list)) : foreach ($case5_research_list as $r1_list):
                       ?>
                       <li><?php echo $r1_list['case5_research_list_content']; ?></li>
                        <?php endforeach; endif; ?>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="row">
                
                  <?php   
                    $case5_research_result = cs_get_option('case5_research_result');
                    if(!empty($case5_research_result)) : foreach ($case5_research_result as $r2_list):
                   ?>
                    
                  <div class="col-md-4">
                    <div class="case5-number">
                      <h1><?php echo $r2_list['case5_research_result_title']; ?></h1>
                      <p><?php echo $r2_list['case5_research_result_content']; ?></p>
                    </div>
                  </div>
                <?php endforeach; endif; ?>
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
                      $case5_insights_title = cs_get_option('case5_insights_title');
                      $case5_insights_subtitle = cs_get_option('case5_insights_subtitle');
                     ?>
                    <h4><?php echo $case5_insights_title; ?></h4>
                    <p><?php echo $case5_insights_subtitle; ?> </p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="row">

                  <?php   
                    $case5_insights_list = cs_get_option('case5_insights_list');
                    if(!empty($case5_insights_list)) : foreach ($case5_insights_list as $r3_list):
                   ?>
                  <div class="col-md-6">
                    <div class="case5-number2">
                      <p><?php echo $r3_list['case5_insights_g_content']; ?></p>
                      <h1><?php echo $r3_list['case5_insights_g_title']; ?></h1>
                    </div>
                  </div>
                  <?php endforeach; endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project overview area start -->
        <div class="project-overview-area case5 ">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="singlecase3-content">


                  <?php   
                    $case5_insights_bottom = cs_get_option('case5_insights_bottom');
                    if(!empty($case5_insights_bottom)) : foreach ($case5_insights_bottom as $r4_list):
                   ?>
                   <p><?php echo $r4_list['case5_insights_b_content'] ?></p>
                  <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  project slide area start -->
        <div class="project-slide-area case4 case5">
          <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 wow fadeInUp">
                  <div class="project-overview-title">
                    <?php 
                      $case5_understanding_title = cs_get_option('case5_understanding_title');
                      $case5_understanding_content = cs_get_option('case5_understanding_content');
                     ?>
                    <h4><?php echo $case5_understanding_title; ?></h4>
                    <p><?php echo $case5_understanding_content; ?></p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="case52-slide-active">
                        <?php
                            global $post;
                          $args = array( 'posts_per_page' => -1, 'post_type'=> 'slide4', 'orderby' => 'menu_order', 'order' => 'ASC' );
                          $myposts = get_posts( $args );
                          foreach( $myposts as $post ) : setup_postdata($post); ?>
                           
                          <?php

                          $idd = get_the_ID();

                          if(get_post_meta($idd, 'theme4_slide_meta', true)) {
                              $slide_meta = get_post_meta($idd, 'theme4_slide_meta', true);
                          } else {
                              $slide_meta = array();
                          }

                          if(array_key_exists('slide4_project_name', $slide_meta)){
                              $project_name = $slide_meta['slide4_project_name'];
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


        <!--  project overview area end -->
          <?php 
            $case5_add_new_section = cs_get_option('case5_add_new_section');  
          ?>
        <?php 
          if(!empty($case5_add_new_section)) : foreach ($case5_add_new_section as $ad_newlist) :
            $new_sec_img = wp_get_attachment_image_src($ad_newlist['new_sec_img'], 'full', false);
         ?>

        <div class="project-overview-area case4 case5 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $ad_newlist['new_sec_title'] ?></h2>
                  <p><?php echo $ad_newlist['new_sec_content'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="primary-research-img">
                  <img src="<?php echo $new_sec_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>

        <!-- landing page start -->
        <div class="project-overview-area case4 case5 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                      $case5_landing_title = cs_get_option('case5_landing_title');
                      $case5_landing_content = cs_get_option('case5_landing_content');
                   ?>
                  <h2><?php echo $case5_landing_title; ?></h2>
                  <p><?php echo $case5_landing_content ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="primary-research-img">
                  <?php $case5_landing_img = cs_get_option('case5_landing_img'); ?>

                    <?php $lan_afiarray = wp_get_attachment_image_src(cs_get_option('case5_landing_img'), 'full'); 
                        if(!empty($case5_landing_img)){
                            $case5_landing_img = $lan_afiarray[0];
                        }else{
                            $case5_landing_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case5_landing_img; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- landing page end -->


        <!--  coming soon area start -->
          <?php 
              $case5_coming_soon_box = cs_get_option('case5_coming_soon_box');  
          ?>

        <?php 
          if(!empty($case5_coming_soon_box)) : foreach ($case5_coming_soon_box as $c5mvlist) :
            $case5_coming_soon_img = wp_get_attachment_image_src($c5mvlist['case5_coming_soon_img'], 'full', false);
         ?>

        <div class="project-overview-area coming-soon pd-top-140 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $c5mvlist['case5_coming_soon_title'] ?></h2>
                  <p><?php echo $c5mvlist['case5_coming_soon_subtitle'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">
                    <img src="<?php echo $case5_coming_soon_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>
        <!--  coming soon area end -->

         <!--  Cta area start -->
        <?php 
            $case5_project_mind_title = cs_get_option('case5_project_mind_title');
            $case5_project_mind_subtitle = cs_get_option('case5_project_mind_subtitle');
            $case5_project_mind_button_txt = cs_get_option('case5_project_mind_button_txt');
            $case5_project_mind_button_link = cs_get_option('case5_project_mind_button_link');
         ?>
        <div style="background-color:<?php echo cs_get_option('case5_project_mind_bg'); ?>; height: 360px;" class="case3 cta-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2><?php echo $case5_project_mind_title; ?></h2>
                  <p><?php echo $case5_project_mind_subtitle; ?></p>
                  <a href="<?php echo $case5_project_mind_button_link; ?>"><?php echo $case5_project_mind_button_txt; ?></a>
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