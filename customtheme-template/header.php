
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="https://brendanho.com/favicon.ico" type="image/x-icon">
    <link rel=icon href=/favicon.png>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICON -->
    <!--  <link rel="icon" href="img/favicon.png"> -->
    <!-- TITLE -->
    <title><?php the_title(); ?></title>
    <!-- bootstrap.min.css -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>> 
    <div class="site-wrapper">
    <!--  header area start -->
        <div class="header_area">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <nav class="navbar navbar-expand-lg" id="mainNav">
                  <!--logo-->
                  <div class="logo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo.svg" alt=""></a>
                  </div>
                  <!--logo-->
                  <!--responsive toggle icon-->
                  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                    <i class="zmdi zmdi-menu"></i>
                  </span>
                  </button> -->
                  <!--responsive toggle icon-->
                  <!--nav link-->
                  <div class="brendan-responsive-menu"></div>
                  <div class="mainmenu text-right">
                    <?php
                      wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                      ) );
                    ?>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!--  header area end -->