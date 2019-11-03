<?php get_header(); 
/*
  Template Name: Home template
*/
?>

      <?php 
        $home_header_subtitle = cs_get_option('home_header_subtitle');
        $home_header_title = cs_get_option('home_header_title');
       ?>

      <?php $wraper_img = cs_get_option('wraper_img');
        $wraper_img_array = wp_get_attachment_image_src(cs_get_option('wraper_img'), 'large');
        if(!empty($wraper_img)) : ?>
    

        <!--  hero area start -->
        <div style="background-image: url(<?php echo $wraper_img_array[0]; ?>); height: 768px;" class="hero-area ho_ display-table home_h">
          <?php endif; ?>
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="hero-txt">
                    <h4><?php echo $home_header_subtitle; ?> 👋</h4>
                    <h1><?php echo $home_header_title; ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  hero area end -->

        <!-- slide area start -->

  <?php 
    $switch_slider = cs_get_option('switch_slider');
   ?>
  <?php if($switch_slider == true) : ?>

       <div class="slide-area">
          <div class="container">
          <div class="row">
          <div class="col-md-12">
            <button class="prev slick-arrow"> <i class="zmdi zmdi-long-arrow-left"></i> </button>
            <button class="next slick-arrow"> <i class="zmdi zmdi-long-arrow-right"></i> </button>


          <div class="slide">
            <!-- slide item one -->
            <?php
              global $post;
              $args = array( 'posts_per_page' => -1, 'post_type'=> 'slide1', 'orderby' => 'menu_order', 'order' => 'ASC' );
              $myposts = get_posts( $args );
              foreach( $myposts as $post ) : setup_postdata($post); ?>
               
              <?php

              $idd = get_the_ID();

              if(get_post_meta($idd, 'theme_slide_meta', true)) {
                  $slide_meta = get_post_meta($idd, 'theme_slide_meta', true);
              } else {
                  $slide_meta = array();
              }

              if(array_key_exists('slide1_project_name', $slide_meta)){
                  $project_name = $slide_meta['slide1_project_name'];
              }else{
                  $project_name = '';
              }
               ?>

            <div class="single_slide">
              <p><?php the_content(); ?></p>
              <div class="slide-img">
                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="">

                <h6><?php the_title(); ?> <span><?php echo $project_name; ?></span></h6>

              </div>
            </div>

            <?php endforeach; wp_reset_query(); ?>

          </div>
          </div>
          </div>
          </div>
        </div>
      <?php endif; ?>
        <!-- slide area end -->

        <!-- Project area start -->
        <div class="project-area wow fadeInUp" id="portfolio">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-title">
                  <h2>Selected Projects</h2>
                </div>
              </div>
            </div>

            <?php echo do_shortcode( '[forms_testimonial]' ); ?>
            

            <div class="row">
              <div class="col-md-12 text-center load_more_btn" id="project1">
               
              </div>
            </div>
          </div>
        </div>
        <!-- Project area end -->

        <?php the_content(); ?>

        <!-- Work area start -->
        <div class="project-area work-area wow fadeInUp" id="work">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-title">
                  <h2>More Design Work</h2>
                </div>
              </div>
            </div>

            <?php echo do_shortcode( '[forms_work]' ); ?>

            <div class="row">
              <div class="col-md-12 text-center" id="project22">
                
              </div>
            </div>
          </div>
        </div>
        
        <?php echo do_shortcode('[cta]'); ?>
        <!-- Project area end -->

        <!-- Footer area start -->
<!--         .wraper_area:after{
            background: <?php echo cs_get_option('overlay'); ?>
          } -->

<!--         <?php $contactbg = cs_get_option('contactbg');
        $contactbg_array = wp_get_attachment_image_src(cs_get_option('contactbg'), 'large');
        if(!empty($contactbg)) : ?>

        <div style="background-image: url(<?php echo $contactbg_array[0]; ?>); height: 820px; " class="footer-area display-table" id="contact">
        <?php endif; ?>
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="contact-form">
                        <?php 
                            $contact_title = cs_get_option('contact_title');
                            $contact_subtitle = cs_get_option('contact_subtitle');
                            $social_title = cs_get_option('social_title');
                         ?>
                        <h2><?php echo $contact_title; ?></h2>
                        <p><?php echo $contact_subtitle; ?></p>

                        <?php echo do_shortcode('[contact-form-7 id="59" title="Contact form 1"]'); ?>
                      </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1 col-md-6">
                      <div class="contact-social contact-form">
                        <h2><?php echo $social_title; ?></h2>


                          <?php $social_list = cs_get_option('social_list'); 
                                if(!empty($social_list)) : 
                                foreach ($social_list as $social) :  
                            ?>
                            <a href="<?php echo $social['icon_link'];?>" target="_blank"><i class="<?php echo $social['icon']; ?>"></i></a>
                        <?php endforeach; endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- Footer area end -->
      <?php get_footer( ); ?>