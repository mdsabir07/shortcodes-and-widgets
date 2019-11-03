        <!-- Footer bottom start -->
        <div class="footer-bottom display-table">
          <div class="display-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-sm-12">
                  <?php if(is_active_sidebar( 'footer' )) : ?>
                  <div class="row">
                    <?php dynamic_sidebar( 'footer' ); ?>
                  </div>
                  <?php endif; ?>
                </div>

                <div class="col-md-4 col-sm-12 text-right mobile">
                  <!-- <div class="footer-logo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/footer2.svg" alt=""></a>
                  </div> -->
                  <ul class="footer-socials">
                    <?php 
                    $footer_socials = cs_get_option('footer_socials');
                    if(!empty($footer_socials)) : foreach($footer_socials as $socials) : ?>
                      <li><a target="_blank" href="<?php echo $socials['link']; ?>"><i class="<?php echo $socials['icon']; ?>"></i></a></li>
                    <?php endforeach; endif; ?>
                  </ul>
                  <?php 
                    $footer = cs_get_option('footer');
                   ?>
                  <p><?php echo $footer; ?></p>
                </div>

               <!--  <div class="col-lg-3 offset-lg-3 col-md-6">
                  
                </div> -->
              </div>
            </div>
          </div>
			
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10989143; 
var sc_invisible=1; 
var sc_security="77bfaa2b"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="website
statistics" href="http://statcounter.com/"
target="_blank"><img class="statcounter"
src="//c.statcounter.com/10989143/0/77bfaa2b/1/"
alt="website statistics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42924324-16"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42924324-16');
</script>
			
        </div>
        <!-- Footer bottom end -->
</div>

    <!-- jquery.js -->
    <?php wp_footer(); ?>
  </body>
</html>