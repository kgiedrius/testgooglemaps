var routeData = false;
var map = false;
var directionsService;
var directionsDisplay;

function initMap(centerCoordinates) {
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: centerCoordinates,
        backgroundColor: '#FFF',
        disableDefaultUI: true
    });

    directionsDisplay.setMap(map);
    calculateAndDisplayRoute('Kaunas');
}

function addMarker(location, title) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title
    });

    marker.addListener('click', function () {
        calculateAndDisplayRoute(this.title);
    });
}


function calculateAndDisplayRoute(origin) {
    var waypoints = [];

    $.each(routeData, function (key, value) {
        waypoints.push({'location': value.formatted_address, stopover: true});
        addMarker(value.location, value.formatted_address)
    });

    directionsService.route({
        origin: origin,
        destination: origin,
        waypoints: waypoints,
        optimizeWaypoints: true,
        travelMode: 'DRIVING'
    }, function (response, status) {
        if (status === 'OK') {
            var output = '<br><ol>';
            var totalDistance = 0;
            var totalTime = 0;
            $.each(response['routes'][0].legs, function (key, value) {
                if (value.start_address != value.end_address) {
                    output += '<li>' + value.start_address.split(',')[0] + ' -> ' + value.end_address.split(',')[0] + '(' + value.distance.text + '/' + value.duration.text + ')' + '</li>';
                    totalTime+=value.duration.value;
                    totalDistance+=value.distance.value;
                }
            });
            output += '</ol><br><div class="text-center">'+'Total distance: '+ Math.round(totalDistance/1000) + 'km. Total time:'+ Math.round(totalTime/3600)+'val. ' +Math.round((totalTime%3600/60))+'min </div><br><br>';
            $('#routeInfo').html(output);

            directionsDisplay.setDirections(response);
            google.maps.event.addListener('K', 'click', function () {
                this.setTitle('I am clicked');
            });

        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}