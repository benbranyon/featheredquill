(function($){
	jQuery(document).ready(function($) {	

		$('.google-map').each(function(){
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');
			var marker1 = $(this).data('marker');
			var title = $(this).data('title');
			var description = $(this).data('description');
			
			/* ==============================================
MAP -->
=============================================== */

    var locations = [
        ['<div class="infobox"><h3 class="title"><a href="#">'+title+'</a></h3><span>'+description+'</span></div>', latitude, longitude, 2]
        ];     
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
       styles: [
     {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#c0392b"
            },
            {
                "visibility": "on"
            }
        ]
    }
],
        center: new google.maps.LatLng(latitude, longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({ 
        position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
        map: map ,
        icon: marker1
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        }
        })(marker, i));
    }

	})	
		
	});
})(jQuery);