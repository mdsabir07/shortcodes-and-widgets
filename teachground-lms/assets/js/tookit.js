;(function ($) {

	$(document).ready(function() {
		$('.list').click(function() {
			const value = $(this).attr('data-filter');
			if (value === 'all') {
				$('.itemBx').show('1000');
			} else {
				$('.itemBx').not('.'+value).hide('1000');
				$('.itemBx').filter('.'+value).show('1000');
			}
		})

		$('.list').click(function() {
			$(this).addClass('active').siblings().removeClass('active');
		})

		$(".trigger").click(function(){
		    var obj = $(this).next();
		    if($(obj).hasClass("hidden")){
		        $(obj).removeClass("hidden").slideDown();
		    } else {
		        $(obj).addClass("hidden").slideUp();
		    }
		 });


	});


}(jQuery));