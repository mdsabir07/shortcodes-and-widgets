<?php get_header(); 
/*
  Template Name: Case One Template
*/
?>


        <!--  hero area start -->
        <div style="background-color: <?php echo cs_get_option('case1_hero_bg'); ?>; height: 768px;" class="hero-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-11 offset-lg-1 col-md-12">
                  <div class="case-study-hero-img">

                   <?php $case1_header_image = cs_get_option('case1_header_image'); ?>

                    <?php $logoarray = wp_get_attachment_image_src(cs_get_option('case1_header_image'), 'large'); 
                        if(!empty($case1_header_image)){
                            $case1_header_image = $logoarray[0];
                        }else{
                            $case1_header_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_header_image; ?>" alt="">
 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!--  case-study-about area start -->
        <div class="case-study-about ">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1 col-md-12">
                <div class="case-study-section-title pdr leter">
                  <?php 
                      $case1_about_title = cs_get_option('case1_about_title');
                      $case1_about_subtitle = cs_get_option('case1_about_subtitle');
                   ?>
                  <h5><?php echo $case1_about_title; ?></h5>
                  <h2><?php echo $case1_about_subtitle; ?></h2>
                </div>

                <div class="row">
                <?php   
                  $case1_about_list = cs_get_option('case1_about_list');
                  if(!empty($case1_about_list)) : foreach ($case1_about_list as $c_list):
                 ?>

                  <div class="col-md-3 col-6">
                    <div class="about-list">
                      <h6><?php echo $c_list['case1_about_title']; ?></h6>
                      <ul>
                        <li><?php echo $c_list['case1_alist']; ?></li>
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
        <div class="project-overview-area ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                      $case1_p_title = cs_get_option('case1_p_title');
                      $case1_p_content = cs_get_option('case1_p_content');
                   ?>
                  <h2><?php echo $case1_p_title; ?></h2>
                  <p><?php echo $case1_p_content; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img img1_">

                <?php $case1_p_imga = cs_get_option('case1_p_imga'); ?>

                    <?php $case1_imgarray = wp_get_attachment_image_src(cs_get_option('case1_p_imga'), 'full'); 
                        if(!empty($case1_p_imga)){
                            $case1_p_imga = $case1_imgarray[0];
                        }else{
                            $case1_p_imga = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_p_imga; ?>" alt="">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case1_p2_title = cs_get_option('case1_p2_title');
                    $case1_p2_content = cs_get_option('case1_p2_content');
                   ?>
                  <h2><?php echo $case1_p2_title; ?></h2>
                  <p><?php echo $case1_p2_content; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  process overview area start -->
        <div style="background-color:  <?php echo cs_get_option('process_overview_bg'); ?>; ?>; height: 550px;" class="process-overview-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                  <div class="project-overview-title">
                    <?php 
                        $process_overview_title = cs_get_option('process_overview_title');
                        $process_overview_subtitle = cs_get_option('process_overview_subtitle');
                     ?>
                    <h2><?php echo $process_overview_title; ?></h2>
                    <p><?php echo $process_overview_subtitle; ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                  <div class="process-overview-detail case_11">

                  <?php   
                      $case1_process_box = cs_get_option('case1_process_box');
                      if(!empty($case1_process_box)) : foreach ($case1_process_box as $pro_list):
                     ?>

                    <div class="process-overview-details-single">
                      <h5><?php echo $pro_list['case1_process_box_title']; ?></h5>
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
        <div class="project-overview-area pd-top-140 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case1_ui_title = cs_get_option('case1_ui_title');
                    $case1_ui_subtitle = cs_get_option('case1_ui_subtitle');
                    $case1_industry_title = cs_get_option('case1_industry_title');
                    $case1_industry_subtitle = cs_get_option('case1_industry_subtitle');
                   ?>
                  <h2><?php echo $case1_ui_title; ?></h2>
                  <p><?php echo $case1_ui_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">


                  <?php $case1_ui_img = cs_get_option('case1_ui_img'); ?>

                    <?php $case1_uiarray = wp_get_attachment_image_src(cs_get_option('case1_ui_img'), 'full'); 
                        if(!empty($case1_ui_img)){
                            $case1_ui_img = $case1_uiarray[0];
                        }else{
                            $case1_ui_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_ui_img; ?>" alt="">

                </div>
              </div>
            </div>
            
            <div class="row pd-top-140">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $case1_industry_title; ?></h2>
                  <p><?php echo $case1_industry_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="calculation-area">
                  <div class="row">

                  <?php   
                      $case1_industry_box = cs_get_option('case1_industry_box');
                      if(!empty($case1_industry_box)) : foreach ($case1_industry_box as $indus_list):
                     ?>
                    

                    <div class="col-md-4">
                      <div class="single-calculation">
                        <h2><?php echo $indus_list['case1_industries_box_title']; ?></h2>
                        <p><?php echo $indus_list['case1_industries_box_subtitle']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview ui area end -->

        <!--  project overview navigation area start -->
        <div class="project-overview-area pd-top-140 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <?php 
                  $case1_structure_title = cs_get_option('case1_structure_title');
                  $case1_structure_subtitle = cs_get_option('case1_structure_subtitle');
                 ?>
                <div class="project-overview-title">
                  <h2><?php echo $case1_structure_title; ?></h2>
                  <p><?php echo $case1_structure_subtitle ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">

                <?php $case1_structure_image = cs_get_option('case1_structure_image'); ?>
                  <?php $case1_starray = wp_get_attachment_image_src(cs_get_option('case1_structure_image'), 'full'); 
                        if(!empty($case1_structure_image)){
                            $case1_structure_image = $case1_starray[0];
                        }else{
                            $case1_structure_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_structure_image; ?>" alt="">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview navigation area end -->

        <!--  project overview wire frame area start -->
        <div class="project-overview-area pd-top-230 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case1_wire_title = cs_get_option('case1_wire_title');
                    $case1_wire_subtitle = cs_get_option('case1_wire_subtitle');
                   ?>
                  <h2><?php echo $case1_wire_title; ?></h2>
                  <p><?php echo $case1_wire_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">

              <?php $case1_wire_image = cs_get_option('case1_wire_image'); ?>
                  <?php $case1_wirerray = wp_get_attachment_image_src(cs_get_option('case1_wire_image'), 'full'); 
                        if(!empty($case1_wire_image)){
                            $case1_wire_image = $case1_wirerray[0];
                        }else{
                            $case1_wire_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_wire_image; ?>" alt="">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview wire frame area end -->

        <!--  project overview Ui Component area start -->
        <div class="project-overview-area pd-top-140 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case1_component_title = cs_get_option('case1_component_title');
                    $case1_component_subtitle = cs_get_option('case1_component_subtitle');
                   ?>
                  <h2><?php echo $case1_component_title; ?></h2>
                  <p><?php echo $case1_component_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">

                <?php $case1_component_image = cs_get_option('case1_component_image'); ?>
                  <?php $case1_comarray = wp_get_attachment_image_src(cs_get_option('case1_component_image'), 'full'); 
                        if(!empty($case1_component_image)){
                            $case1_component_image = $case1_comarray[0];
                        }else{
                            $case1_component_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_component_image; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview Final UI Solutions area end -->

        <!--  project overview Ui Component area start -->
        <div class="project-overview-area pd-top-140 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <?php 
                    $case1_solu_title = cs_get_option('case1_solu_title');
                    $case1_solu_subtitle = cs_get_option('case1_solu_subtitle');
                   ?>
                  <h2><?php echo $case1_solu_title; ?></h2>
                  <p><?php echo $case1_solu_subtitle; ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">
                  <img src="assets/img/case1-project-img6.png" alt="">

                  <?php $case1_solu_image = cs_get_option('case1_solu_image'); ?>
                  <?php $case1_soluarray = wp_get_attachment_image_src(cs_get_option('case1_solu_image'), 'full'); 
                        if(!empty($case1_solu_image)){
                            $case1_solu_image = $case1_soluarray[0];
                        }else{
                            $case1_solu_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case1_solu_image; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview Final UI Solutions area end -->

       

      <!--  coming soon area start -->
          <?php 
              $case1_coming_soon_box = cs_get_option('case1_coming_soon_box');  
          ?>

        <?php 
          if(!empty($case1_coming_soon_box)) : foreach ($case1_coming_soon_box as $svlist) :
            $case1_coming_soon_img = wp_get_attachment_image_src($svlist['case1_coming_soon_img'], 'full', false);
         ?>


        <div class="project-overview-area coming-soon pd-top-140">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="project-overview-title">
                  <h2><?php echo $svlist['case1_coming_soon_title'] ?></h2>
                  <p><?php echo $svlist['case1_coming_soon_subtitle'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="project-overview-img">
                    <img src="<?php echo $case1_coming_soon_img[0]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; endif; ?>
        <!--  coming soon area end -->

        <!--  Cta area start -->
        <?php 
            $case1_project_mind_title = cs_get_option('case1_project_mind_title');
            $case1_project_mind_subtitle = cs_get_option('case1_project_mind_subtitle');
            $case1_project_mind_button_txt = cs_get_option('case1_project_mind_button_txt');
            $case1_project_mind_button_link = cs_get_option('case1_project_mind_button_link');
         ?>
        <div style="background-color:<?php echo cs_get_option('case1_project_mind_bg'); ?>; height: 360px;" class="cta-area display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2><?php echo $case1_project_mind_title; ?></h2>
                  <p><?php echo $case1_project_mind_subtitle; ?></p>
                  <a href="<?php echo $case1_project_mind_button_link; ?>"><?php echo $case1_project_mind_button_txt; ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  Cta area end -->

        <!--  More project area start -->
        <div class="more-project pd-top-140 ">
          <div class="container">

              <?php echo do_shortcode( '[forms_more]' ); ?>

          </div>
        </div>
        <!--  More project area end -->

        <!-- Footer bottom start -->


    <!-- jquery.js -->
<?php get_footer( ); ?>