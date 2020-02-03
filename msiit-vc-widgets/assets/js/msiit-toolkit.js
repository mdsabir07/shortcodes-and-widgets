; (function($){
	"use strict"

	$(document).ready(function($){ 

		$(".msiit-pruduct-carousel").slick({
			dots: false,
			arrows: true,
			infinite: true,
			slidesToShow: 4,
			centerPadding: 30,
			slidesToScroll: 1,
			nextArrow: "<i class=\'fa fa-angle-right\'></i>",
			prevArrow: "<i class=\'fa fa-angle-left\'></i>",
			autoplay: false,
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

	});
	
})(jQuery);