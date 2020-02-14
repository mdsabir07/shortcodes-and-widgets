(function ($) {
	"use strict";

    jQuery(document).ready(function($){
        // Testimonials
		$(".testimonial-carousel").slick({
			dots: true,
			arrows: false,
			infinite: true,
			slidesToShow: 3,
			centerMode: true,
			centerPadding: 30,
			slidesToScroll: 1,
			autoplay: true,
    		autoplaySpeed: 5000,
			responsive: [
				{
				breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					}
				},
				{
				breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});

		// Sticky navbar
		$('#primary-menu > li > a').click(function() {
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


		$(".tab-titles li").hover(function() {
			$(".tab-content").hide();
			$(".tab-titles li").removeClass('active');					
			$(this).addClass("active");					
			var selected_tab = $(this).find("a").attr("href");
			$(selected_tab).stop().fadeIn();
			return false;
		});



    });
  
    /*====  Window Load Function =====*/
    jQuery(window).load(function(){

        /*====  animation js =====*/
        new WOW().init();
        
    });


}(jQuery));	