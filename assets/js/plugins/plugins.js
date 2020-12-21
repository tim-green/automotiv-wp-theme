var $ = jQuery;

  jQuery(document).ready(function(){
    jQuery('.home-slider').slick({
        accessibility: true,
        infinite: true,
        arrows: true,
        autoplay: false,
        prevArrow: '<span class="motiv-slide-prev"><i class="fal fa-angle-left"></i></span>',
        nextArrow: '<span class="motiv-slide-next"><i class="fal fa-angle-right"></i></span>'
      });
  });
          

  // load defered videos
	(function($){
		$(window).load(function(e) {
			$('[data-src-defer]').each(function(index, element) {
				$(element).attr('src', $(element).attr('data-src-defer'));
			});
		});
	})(jQuery);
