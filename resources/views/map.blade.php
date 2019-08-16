<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My map</title>
    <style>
    #map{
        height:400px;
        width:100%;
    }
    </style>

</head>
<body>
<div id="map"></div>
        <script>
            var geocoder;
            var map;
            var address = "Nairobi";

            function initMap() {
                geocoder = new google.maps.Geocoder();

                var uluru = { lat: -25.363, lng: 131.044 };
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
                codeAddress(address);

            }

            function codeAddress(address) {

                geocoder.geocode({ 'address': address }, function (results, status) {
                    console.log(results);
                    var latLng = {lat: results[0].geometry.location.lat (), lng: results[0].geometry.location.lng ()};
                    console.log (latLng);
                    if (status == 'OK') {
                        var marker = new google.maps.Marker({
                            position: latLng,
                            map: map
                        });
                        console.log (map);
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFDwP1v9neh0k3aiiZ1yvoAFMIk7Id12c&callback=initMap"
            async defer>
        </script>
</body>
</html>
