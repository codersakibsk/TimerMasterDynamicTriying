(function ($) {

    var testimonial = function ($scope, $) {

		if ( $().slick ) {
					$('.testimonial-slider').slick({
					dots: true,
					autoplay: true,
					autoplaySpeed:5000,
					arrows:false,
					infinite: true,
					speed: 500,
					fade: false,
				});
		} 

    };    

 

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/aixohost-testimonial.default', testimonial);
   
    });

})(jQuery);