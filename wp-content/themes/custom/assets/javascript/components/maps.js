function new_map($el) {
  // var
  var $markers = $el.find('.marker');

  var stylez = [
    {
      featureType: 'administrative',
      elementType: 'labels.text.fill',
      stylers: [
        {
          color: '#0c0b0b'
        }
      ]
    },
    {
      featureType: 'landscape',
      elementType: 'all',
      stylers: [
        {
          color: '#f2f2f2'
        }
      ]
    },
    {
      featureType: 'poi',
      elementType: 'all',
      stylers: [
        {
          visibility: 'off'
        }
      ]
    },
    {
      featureType: 'road',
      elementType: 'all',
      stylers: [
        {
          saturation: -100
        },
        {
          lightness: 45
        }
      ]
    },
    {
      featureType: 'road',
      elementType: 'labels.text.fill',
      stylers: [
        {
          color: '#090909'
        }
      ]
    },
    {
      featureType: 'road.highway',
      elementType: 'all',
      stylers: [
        {
          visibility: 'simplified'
        }
      ]
    },
    {
      featureType: 'road.arterial',
      elementType: 'labels.icon',
      stylers: [
        {
          visibility: 'off'
        }
      ]
    },
    {
      featureType: 'transit',
      elementType: 'all',
      stylers: [
        {
          visibility: 'off'
        }
      ]
    },
    {
      featureType: 'water',
      elementType: 'all',
      stylers: [
        {
          color: '#d4e4eb'
        },
        {
          visibility: 'on'
        }
      ]
    },
    {
      featureType: 'water',
      elementType: 'geometry.fill',
      stylers: [
        {
          visibility: 'on'
        },
        {
          color: '#fef7f7'
        }
      ]
    },
    {
      featureType: 'water',
      elementType: 'labels.text.fill',
      stylers: [
        {
          color: '#9b7f7f'
        }
      ]
    },
    {
      featureType: 'water',
      elementType: 'labels.text.stroke',
      stylers: [
        {
          color: '#fef7f7'
        }
      ]
    }
  ];

  // vars
  var args = {
    zoom: 25,
    styles: stylez,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: false,
    center: new google.maps.LatLng(0, 0),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  // create map
  var map = new google.maps.Map($el[0], args);

  // add a markers reference
  map.markers = [];

  // add markers
  $markers.each(function() {
    add_marker($(this), map);
  });

  // center map
  center_map(map);

  // return
  return map;
}

function add_marker($marker, map) {
  var body = $('body');

  var icon = {
    url: '/wp-content/themes/custom/dist/assets/images/SVG/map-icon.svg',
    scaledSize: new google.maps.Size(25, 25),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(0, 0)
  };

  var latlng = new google.maps.LatLng(
    $marker.attr('data-lat'),
    $marker.attr('data-lng')
  );
  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    icon: icon
  });
  map.markers.push(marker);
  if ($marker.html()) {
    var infowindow = new google.maps.InfoWindow({ content: $marker.html() });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }
}
function center_map(map) {
  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each(map.markers, function(i, marker) {
    var latlng = new google.maps.LatLng(
      marker.position.lat(),
      marker.position.lng()
    );

    bounds.extend(latlng);
  });

  // only 1 marker?
  if (map.markers.length == 1) {
    // set center of map
    map.setCenter(bounds.getCenter());
    map.setZoom(15);
  } else {
    // fit to bounds
    map.fitBounds(bounds);
  }
}

var map = null;

$(document).ready(function() {
  $('.map').each(function() {
    map = new_map($(this));
  });
});
