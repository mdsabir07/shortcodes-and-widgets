<?php get_header(); 
/*
  Template Name: Case Two Template
*/
?>

 

        <!--  hero area start -->
        <div style="background-color: <?php echo cs_get_option('case2_hero_bg'); ?>; height: 768px;" class="hero-area case2 display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <!-- <div class="col-lg-5 offset-lg-1 col-md-6">
                  <div class="case-study-hero-text">
                    <p>Sheridans<strong>Pro</strong></p>
                  </div>
                </div> -->
                <div class="col-lg-11 offset-lg-1 col-md-12">
                  <div class="case-study-hero-img">

                  <?php $case2_header_image = cs_get_option('case2_header_image'); ?>

                    <?php $clogoarray = wp_get_attachment_image_src(cs_get_option('case2_header_image'), 'full'); 
                        if(!empty($case2_header_image)){
                            $case2_header_image = $clogoarray[0];
                        }else{
                            $case2_header_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case2_header_image; ?>" alt="">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!--  case-study-about area start -->
        <div class="case-study-about case2">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1 col-md-12">
                <div class="case-study-section-title pdr leter">
                  <?php 
                      $case2_about_title = cs_get_option('case2_about_title');
                      $case2_about_subtitle = cs_get_option('case2_about_subtitle');
                   ?>
                  <h5><?php echo $case2_about_title; ?></h5>
                  <h2><?php echo $case2_about_subtitle; ?></h2>
                </div>

                <div class="row">
                  <?php   
                  $case2_about_list = cs_get_option('case2_about_list');
                  if(!empty($case2_about_list)) : foreach ($case2_about_list as $d_list):
                 ?>

                  <div class="col-md-3 col-6">
                    <div class="about-list">
                      <h6><?php echo $d_list['case2_about_title']; ?></h6>
                      <ul>
                        <li><?php echo $d_list['case2_alist']; ?></li>
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
        <div class="project-overview-area fadeInUp">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                      $case2_p_title = cs_get_option('case2_p_title');
                      $case2_p_content = cs_get_option('case2_p_content');
                   ?>
                  <h2><?php echo $case2_p_title; ?></h2>
                  <p><?php echo $case2_p_content; ?></p>
                </div>
              </div>
            </div>

            <div class="row pd-top-110">
              <div class="col-md-12">
                <div class="project-overview-img img1_">
                  <?php $case2_p_imga = cs_get_option('case2_p_imga'); ?>

                    <?php $case2_imgarray = wp_get_attachment_image_src(cs_get_option('case2_p_imga'), 'full'); 
                        if(!empty($case2_p_imga)){
                            $case2_p_imga = $case2_imgarray[0];
                        }else{
                            $case2_p_imga = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case2_p_imga; ?>" alt="">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case2_p2_title = cs_get_option('case2_p2_title');
                    $case2_p2_content = cs_get_option('case2_p2_content');
                   ?>
                  <h2><?php echo $case2_p2_title; ?></h2>
                  <p><?php echo $case2_p2_content; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  process overview area start -->
        <div class="process-overview-area2 display-table">
          <div class="display-tablecell">
            <div class="container">

              <div class="row">
                <div class="col-md-12">
                  <div class="process-overview-detail process_2">

                  <?php   
                      $case2_process_box = cs_get_option('case2_process_box');
                      if(!empty($case2_process_box)) : foreach ($case2_process_box as $pro2_list):
                     ?>
                    
                    <div class="process-overview-details-single">
                      <span><?php echo $pro2_list['case2_process_box_title']; ?></span>
                      <h5><?php echo $pro2_list['case2_process_box_subtitle']; ?></h5>
                    </div>
                     <?php endforeach; endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  process overview area end -->

        <!--  project overview ui area start -->
        <div class="project-overview-area pd-top-110 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title list-p">
                  <?php 
                      $phase1_title = cs_get_option('phase1_title');
                      $phase1_subtitle = cs_get_option('phase1_subtitle');
                   ?>
                  <h2><?php echo $phase1_title; ?></h2>
                  <strong><?php echo $phase1_subtitle; ?></strong>


                  <?php   
                      $case2_group_txt = cs_get_option('case2_group_txt');
                      if(!empty($case2_group_txt)) : foreach ($case2_group_txt as $group1_txt):
                     ?>

                      <p><?php echo $group1_txt['case2_group_content']; ?></p>
                     <?php endforeach; endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #1d2e6c;" class="case2-project-overview-txt">
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-12">
                      <?php 
                        $case2_chalenge_title = cs_get_option('case2_chalenge_title');
                        $case2_chalenge_subtitle = cs_get_option('case2_chalenge_subtitle');
                       ?>
                      <strong><?php echo $case2_chalenge_title; ?></strong>
                      <p><?php echo $case2_chalenge_subtitle; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row pd-top-70">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                      $case2_afinity_title = cs_get_option('case2_afinity_title');
                      $case2_afinity_subtitle = cs_get_option('case2_afinity_subtitle');
                   ?>
                  <strong><?php echo $case2_afinity_title; ?></strong>
                  <p><?php echo $case2_afinity_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row pd-top-70">
              <div class="col-lg-8 offset-lg-2 col-md-12">
                 <?php $case2_afinity_img = cs_get_option('case2_afinity_img'); ?>

                    <?php $case2_afiarray = wp_get_attachment_image_src(cs_get_option('case2_afinity_img'), 'full'); 
                        if(!empty($case2_afinity_img)){
                            $case2_afinity_img = $case2_afiarray[0];
                        }else{
                            $case2_afinity_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case2_afinity_img; ?>" alt="">
              </div>
            </div>

            <div class="row pd-top-110 case2">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title list-p">
                  <?php 
                      $blockers_title = cs_get_option('blockers_title');
                      $schedule_title = cs_get_option('schedule_title');
                   ?>
                  <strong><?php echo $blockers_title; ?></strong>

                  <?php   
                      $blockers_group = cs_get_option('blockers_group');
                      if(!empty($blockers_group)) : foreach ($blockers_group as $blockers_g):
                     ?>

                      <p><?php echo $blockers_g['blockers_list']; ?></p>
                     <?php endforeach; endif; ?>

                  <h6><?php echo $schedule_title; ?></h6>
                </div>
              </div>
            </div>

            <div class="row">

               <?php 
                  $schedule_group = cs_get_option('schedule_group');  
                ?>
              <?php 
                if(!empty($schedule_group)) : foreach ($schedule_group as $cmlist) :
                  $schedule_image = wp_get_attachment_image_src($cmlist['schedule_image'], 'full', false);
               ?>

              <div class="col-md-3">
                <div class="mobile-screen">
                  <img src="<?php echo $schedule_image[0]; ?>" alt="">
                  <span><?php echo $cmlist['schedule_number']; ?></span>
                  <p><?php echo $cmlist['schedule_txt']; ?></p>
                </div>
              </div>
              <?php endforeach; endif; ?>

              
            </div>

            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title list-p">
                  <?php 
                      $phase2_title = cs_get_option('phase2_title');
                      $phase2_subtitle = cs_get_option('phase2_subtitle');
                   ?>
                  <h2><?php echo $phase2_title; ?></h2>
                  <strong><?php echo $phase2_subtitle; ?></strong>


                  <?php   
                      $phase2_group_txt = cs_get_option('phase2_group_txt');
                      if(!empty($phase2_group_txt)) : foreach ($phase2_group_txt as $group2_txt):
                     ?>
                      <p><?php echo $group2_txt['pahse2_group_content']; ?></p>
                     <?php endforeach; endif; ?>



                     <?php   
                      $phase2_bottom_txt = cs_get_option('phase2_bottom_txt');
                      if(!empty($phase2_bottom_txt)) : foreach ($phase2_bottom_txt as $group3_txt):
                     ?>
                     <ul>
                        <li><?php echo $group3_txt['pahse2_bottom_content']; ?></li>
                        <?php endforeach; endif; ?>
                      </ul>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--  project overview journey area end -->
        <div class="project-journeya-area ">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #1d2f6a;"  class="journey-list">
                  <div class="single-journey">
                    <?php 
                      $existing_title = cs_get_option('existing_title');
                     ?>
                    <h5><?php echo $existing_title; ?></h5>
                     <ul>
                      <?php   
                          $existing_group_box = cs_get_option('existing_group_box');
                          if(!empty($existing_group_box)) : foreach ($existing_group_box as $group4_txt):
                         ?>
                        <li><?php echo $group4_txt['existing_group_content']; ?></li>
                        <?php endforeach; endif; ?>
                      </ul>
                  </div>

                  <div class="single-journey">
                    <?php 
                      $existing2_title = cs_get_option('existing2_title');
                     ?>
                    <h5><?php echo $existing2_title; ?></h5>
                     <ul>
                      <?php   
                          $existing2_group_box = cs_get_option('existing2_group_box');
                          if(!empty($existing2_group_box)) : foreach ($existing2_group_box as $group5_txt):
                         ?>
                        <li><?php echo $group5_txt['existing2_group_content']; ?></li>
                        <?php endforeach; endif; ?>
                      </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview journey area end -->
        

        <!--  coming soon area start -->
        <div class="project-overview-area wireframe-2 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title list-p">
                  <?php 
                      $assumptions_title = cs_get_option('assumptions_title');
                      $assumptions_content = cs_get_option('assumptions_content');
                      $wireframe_title = cs_get_option('wireframe_title');
                      $wireframe_content = cs_get_option('wireframe_content');
                   ?>
                  <strong><?php echo $assumptions_title; ?></strong>
                  <p><?php echo $assumptions_content; ?></p>

                  <ul>

                    <?php   
                      $assumptions_group_content = cs_get_option('assumptions_group_content');
                      if(!empty($assumptions_group_content)) : foreach ($assumptions_group_content as $group22_txt):
                     ?>
                      <li><?php echo $group22_txt['assumptions_group_content']; ?></li>
                     <?php endforeach; endif; ?>
                  </ul>

                  <strong><?php echo $wireframe_title; ?></strong>
                  <p><?php echo $wireframe_content; ?></p>
                </div>
              </div>
            </div>
            <div class="row pd-top-50">
              <div class="col-md-12">
                <?php $wireframe_img = cs_get_option('wireframe_img'); ?>

                    <?php $case22_afiarray = wp_get_attachment_image_src(cs_get_option('wireframe_img'), 'full'); 
                        if(!empty($wireframe_img)){
                            $wireframe_img = $case22_afiarray[0];
                        }else{
                            $wireframe_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $wireframe_img; ?>" alt="">
              </div>
            </div>

            <div class="row pd-top-70">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title list-p">
                  <?php 
                      $phase4_title = cs_get_option('phase4_title');
                      $phase4b_title = cs_get_option('phase4b_title');
                      $phase4_subtitle = cs_get_option('phase4_subtitle');
                   ?>
                  <h2><?php echo $phase4_title; ?></h2>
                  <strong><?php echo $phase4_subtitle; ?></strong>

                  <?php   
                      $phase4_group_txt = cs_get_option('phase4_group_txt');
                      if(!empty($phase4_group_txt)) : foreach ($phase4_group_txt as $group34_txt):
                     ?>
                      <p><?php echo $group34_txt['pahse24_group_content']; ?></p>
                    <?php endforeach; endif; ?>


                  <strong><?php echo $phase4b_title; ?></strong>
                  <ul>
                    <?php   
                      $phase4_bottom_txt = cs_get_option('phase4_bottom_txt');
                      if(!empty($phase4_bottom_txt)) : foreach ($phase4_bottom_txt as $group24_txt):
                     ?>
                      <li><?php echo $group24_txt['pahse4_bottom_content']; ?></li>
                     <?php endforeach; endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  coming soon area end -->

        <!--  task area start -->
        <div class="tast-area ">
          <div class="container">

          <?php   
              $scenario_tast = cs_get_option('scenario_tast');
              if(!empty($scenario_tast)) : foreach ($scenario_tast as $scenario_txt):
             ?>
              
            <div class="row">
              <div class="col-lg-4 offset-lg-1 col-md-5 pd-right0">
                <div class="tast-left">
                  <strong><?php echo $scenario_txt['scenario_title']; ?></strong>
                  <p><?php echo $scenario_txt['scenario_content']; ?></p>
                </div>
              </div>

              <div class="col-lg-6 col-md-7 pd-left0">
                <div class="tast-right">
                  <strong><?php echo $scenario_txt['task_title']; ?></strong>
                  <ul>
                    <li><?php echo $scenario_txt['task_content']; ?></li>
                  </ul>
                </div>
              </div>
            </div>
            <?php endforeach; endif; ?>


            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title cta2 list-p">
                  <?php 
                      $pro_title = cs_get_option('pro_title');
                      $ui_solution = cs_get_option('ui_solution');
                      $ui_solution_content = cs_get_option('ui_solution_content');
                   ?>
                  <strong><?php echo $pro_title; ?></strong>
                  <ul>
                    <?php   
                      $pro_test = cs_get_option('pro_test');
                      if(!empty($pro_test)) : foreach ($pro_test as $pro_txt):
                     ?>
                      <li><?php echo $pro_txt['pro_content']; ?></li>
                     <?php endforeach; endif; ?>

                  </ul>
                  <strong><?php echo $ui_solution; ?></strong>
                  <p><?php echo $ui_solution_content; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  task area end -->

        <!--  long image area start -->
        <div style="background-color: <?php echo cs_get_option('ui_solution_bc'); ?>;" class="case2-long-image">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php $ui_solution_image = cs_get_option('ui_solution_image'); ?>

                    <?php $ui22_afiarray = wp_get_attachment_image_src(cs_get_option('ui_solution_image'), 'full'); 
                        if(!empty($ui_solution_image)){
                            $ui_solution_image = $ui22_afiarray[0];
                        }else{
                            $ui_solution_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $ui_solution_image; ?>" alt="">
              </div>
            </div>
          </div>
        </div>
        <!--  long image area end -->



      <!--  coming soon area start -->
          <?php 
              $case2_coming_soon_box = cs_get_option('case2_coming_soon_box');  
          ?>

        <?php 
          if(!empty($case2_coming_soon_box)) : foreach ($case2_coming_soon_box as $cmvlist) :
            $case2_coming_soon_img = wp_get_attachment_image_src($cmvlist['case2_coming_soon_img'], 'full', false);
         ?>

        <div class="project-overview-area coming-soon pd-top-140">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $cmvlist['case2_coming_soon_title'] ?></h2>
                  <p><?php echo $cmvlist['case2_coming_soon_subtitle'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">
                    <img src="<?php echo $case2_coming_soon_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>
        <!--  coming soon area end -->


        <!--  Cta area start -->
        <?php 
            $case2_project_mind_title = cs_get_option('case2_project_mind_title');
            $case2_project_mind_subtitle = cs_get_option('case2_project_mind_subtitle');
            $case2_project_mind_button_txt = cs_get_option('case2_project_mind_button_txt');
            $case2_project_mind_button_link = cs_get_option('case2_project_mind_button_link');
         ?>
        <div style="background-color:<?php echo cs_get_option('case2_project_mind_bg'); ?>; height: 360px;" class="cta-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2><?php echo $case2_project_mind_title; ?></h2>
                  <p><?php echo $case2_project_mind_subtitle; ?></p>
                  <a href="<?php echo $case2_project_mind_button_link; ?>"><?php echo $case2_project_mind_button_txt; ?></a>
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

        <!-- Footer bottom start -->
       <?php get_footer( ); ?>