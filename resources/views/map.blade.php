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
        <h1>My google map</h1>
        <div id="map"></div>
        <script>
                function initMap(){
                  var options={
                      zoom:12,
                      center:{lat:-1.1026,lng:37.0132}
                      
                  }
                  var map = new  google.maps.Map(document.getElementById('map'),options); 
                  var marker=new google.maps.Marker({
                      position:{lat:-1.0969,lng:37.0154},
                      icon:
                      map:map
                  })
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFDwP1v9neh0k3aiiZ1yvoAFMIk7Id12c&callback=initMap"
            async defer>
            </script>   
</body>
</html>