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


// Mapbox

mapboxgl.accessToken = 'pk.eyJ1IjoiZ3JvdW5kY3RybCIsImEiOiJjanhvb2FuczkwOTBxM2RwOWR2M2dzcTBvIn0.4OIjhU9J4sQVJGkNIF1eVg';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [133.77, -25.27], // starting position
zoom: 3
});


map.addControl(
  new MapboxDirections({
  accessToken: mapboxgl.accessToken
  }),
  'top-left'
  );