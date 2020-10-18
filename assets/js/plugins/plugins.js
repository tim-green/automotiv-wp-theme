//var $ = jQuery;

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
          

