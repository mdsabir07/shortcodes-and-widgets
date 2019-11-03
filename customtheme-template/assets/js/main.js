(function ($) {
	"use strict";

    jQuery(document).ready(function($){
        

            $('.slide').slick({
              // centerMode: true,
              // centerPadding: '160px',
              slidesToShow: 3,
              prevArrow: $('.prev'),
              nextArrow: $('.next'),
              responsive: [
                {
                  breakpoint: 992,
                  settings: {
                    // centerPadding: '80px',
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    centerMode: false,
                    centerPadding: '0px',
                    slidesToShow: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    centerMode: false,
                    centerPadding: '0px',
                    slidesToShow: 1
                  }
                }
              ]
            });


 /*====  screenshot slide =====*/
        if ($.fn.owlCarousel) {
            $('.case4-slide-active').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                autoplay: false,
                navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
            });
        }


 /*====  screenshot slide =====*/
        if ($.fn.owlCarousel) {
            $('.case5-slide-active').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                autoplay: false,
                navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
            });
        }



 /*====  screenshot slide =====*/
        if ($.fn.owlCarousel) {
            $('.case52-slide-active').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                autoplay: false,
                navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
            });
        }

        // -------------------------------------------------------------
        // onepage nav start
        // -------------------------------------------------------------
            $('.mainmenu > ul > li > a').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
                || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                   if (target.length) {
                     $('html,body').animate({
                         scrollTop: target.offset().top -30
                    }, 1000);
                    return false;
                }
            }
        }); 

        $(".mainmenu ul#primary-menu").slicknav({
          AllowParentLinks: true,
          prependTo: '.brendan-responsive-menu'
        });



        var alerPrimary = $(".checkbox-inline");
         alerPrimary.on('click', function(){
            $(this).closest('.page-id-1237 .checkbox-inline').toggleClass('active');
        })



      });


  
    /*====  Window Load Function =====*/
    jQuery(window).load(function(){

        /*====  animation js =====*/
        new WOW().init();
        
    });


}(jQuery));	