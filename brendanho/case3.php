<?php get_header(); 
/*
  Template Name: Case Three Template
*/
?>
 

         <!--  hero area start -->
        <div style="background-color: <?php echo cs_get_option('case3_hero_bg'); ?>; height: 768px;" class="hero-area case3 display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <!-- <div class="col-lg-5 offset-lg-1 col-md-6">
                  <div class="case-study-hero-text">
                    <p>Sheridans<strong>Pro</strong></p>
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="case-study-hero-img">

                  <?php $case3_header_image = cs_get_option('case3_header_image'); ?>

                    <?php $c3ogoarray = wp_get_attachment_image_src(cs_get_option('case3_header_image'), 'full'); 
                        if(!empty($case3_header_image)){
                            $case3_header_image = $c3ogoarray[0];
                        }else{
                            $case3_header_image = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $case3_header_image; ?>" alt="">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!--  case-study-about area start -->
        <div class="case-study-about case3 ">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1 col-md-12">
                <div class="case-study-section-title pdr leter">
                  <?php 
                      $case3_about_title = cs_get_option('case3_about_title');
                      $case3_about_subtitle = cs_get_option('case3_about_subtitle');
                   ?>
                  <h5><?php echo $case3_about_title; ?></h5>
                  <h2><?php echo $case3_about_subtitle; ?></h2>
                </div>

                <div class="row">
                  <?php   
                  $case3_about_list = cs_get_option('case3_about_list');
                  if(!empty($case3_about_list)) : foreach ($case3_about_list as $d2_list):
                 ?>

                  <div class="col-md-3 col-6">
                    <div class="about-list">
                      <h6><?php echo $d2_list['case3_about_title']; ?></h6>
                      <ul>
                        <li><?php echo $d2_list['case3_alist']; ?></li>
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
                      $summary_title = cs_get_option('summary_title');
                      $summary_subtitle = cs_get_option('summary_subtitle');
                   ?>
                  <h2><?php echo $summary_title; ?></h2>

                
                  <div class="singlecase3-content">
                    <strong><?php echo $summary_subtitle; ?></strong>

                    <?php   
                      $summary_group_txt = cs_get_option('summary_group_txt');
                      if(!empty($summary_group_txt)) : foreach ($summary_group_txt as $groups_txt):
                     ?>

                    <p><?php echo $groups_txt['summary_group_content']; ?></p>
                     <?php endforeach; endif; ?>
                  </div>
                 
                  
                
                  <?php   
                      $summary2_group_txt = cs_get_option('summary2_group_txt');
                      if(!empty($summary2_group_txt)) : foreach ($summary2_group_txt as $groupd_txt):
                     ?>

                  <div class="singlecase3-content">
                    <strong><?php echo $groupd_txt['summary2_group_title']; ?></strong>
                    <p><?php echo $groupd_txt['summary2_group_content']; ?></p>
                  </div>
                 <?php endforeach; endif; ?>



                  <div class="singlecase3-content">
                    <?php $summary3_group_title = cs_get_option('summary3_group_title'); ?>
                    <strong><?php echo $summary3_group_title; ?></strong>

                    <?php   
                      $summary3_group_txt = cs_get_option('summary3_group_txt');
                      if(!empty($summary3_group_txt)) : foreach ($summary3_group_txt as $groupe_txt):
                     ?>

                    <p><?php echo $groupe_txt['summary3_group_content']; ?></p>
                     <?php endforeach; endif; ?>
                  </div>

                  <div class="case3-img">
                     <?php 
                        $summary4_bottom_txt = cs_get_option('summary4_bottom_txt');
                        $summary3_bottom_img = cs_get_option('summary3_bottom_img');
                      ?>

                    <?php $c3eogoarray = wp_get_attachment_image_src(cs_get_option('summary3_bottom_img'), 'full'); 
                        if(!empty($summary3_bottom_img)){
                            $summary3_bottom_img = $c3eogoarray[0];
                        }else{
                            $summary3_bottom_img = ''.get_template_directory_uri(). '/assets/img/case-study-hero-img1.png';
                        }
                    ?>
                      <img src="<?php echo $summary3_bottom_img; ?>" alt="">

                    <p><?php echo $summary4_bottom_txt; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  project overview area end -->

        <!--  Cta area start -->
        <?php 
            $case3_project_mind_title = cs_get_option('case3_project_mind_title');
            $case3_project_mind_subtitle = cs_get_option('case3_project_mind_subtitle');
            $case3_project_mind_button_txt = cs_get_option('case3_project_mind_button_txt');
            $case3_project_mind_button_link = cs_get_option('case3_project_mind_button_link');
         ?>
        <div style="background-color:<?php echo cs_get_option('case3_project_mind_bg'); ?>; height: 360px;" class="case3 cta-area display-table ">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2><?php echo $case3_project_mind_title; ?></h2>
                  <p><?php echo $case3_project_mind_subtitle; ?></p>
                  <a href="<?php echo $case3_project_mind_button_link; ?>"><?php echo $case3_project_mind_button_txt; ?></a>
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