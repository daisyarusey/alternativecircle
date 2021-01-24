jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDpvXcw5kwuyGD6r6mCOY0Kw6zajTUkHeQ&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        zoom: 4,
        scrollwheel: false,
        //center: new google.maps.LatLng(-1.259489,36.804481)
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
        ['Upper Hill Medical Centre', -1.294793,36.806855],
        ['Waiyaki Way', -1.259876,36.785726],
        ['ABC Place', -1.259652,36.776701],
        ['Java House Sarit Center', -1.260966,36.802016]
    ];
                        
    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Upper Hill Medical Centre</h3>' +
        '<p>Ralph Bunche Road near Nairobi Hospital.</p>' +
        '<p>6:30am - 9pm Weekdays</p>' +
        '<p>7am - 8pm Weekends and Holidays</p>' +
        '<p>+254 713 600 981.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Waiyaki Way</h3>' +
        '<p>Shell petrol station, Waiyaki way.</p>' +
        '<p>6:30am - 9pm Weekdays</p>' +
        '<p>7am - 8pm Weekends and Holidays</p>' +
        '<p>+254 713 600 981.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>ABC Place</h3>' +
        '<p>Waiyaki way.</p>' +
        '<p>6:30am - 9pm Weekdays</p>' +
        '<p>7am - 8pm Weekends and Holidays</p>' +
        '<p>+254 713 600 981.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h5>Java House Sarit Center</h5>' +
        '<p>Parklands Road, Westlands</p>' +
        '<p>6:30am - 9pm Weekdays</p>' +
        '<p>7am - 8pm Weekends and Holidays</p>' +
        '<p>+254 713 600 981.</p>' +
        '</div>']
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}