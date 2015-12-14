<!doctype html>
<html>
    <head>
        <title>Google Maps API - harviacode.com</title>
        <!--1. Memanggil google Maps API-->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
 
        <script>
            // 6. menambahkan direction
            var tampilarah;
            var layananarah = new google.maps.DirectionsService();
 
            // 2. menambahkan properti peta
            function initialize() {
                // PETA PERTAMA
                var properti_peta = {
                    center: new google.maps.LatLng(-6.3145891999999995, 106.9596627),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                // 4. membuat object peta
                var peta = new google.maps.Map(document.getElementById("tempat_peta"), properti_peta);
 
                // 7. tambahkan arah ke peta
                tampilarah = new google.maps.DirectionsRenderer();
                tampilarah.setMap(peta);
                rute();
            }
 
            // 8. membuat fungsi rute
            function rute() {
                var request = {
                    origin: new google.maps.LatLng(-6.3145891999999995, 106.9596627),
                    destination: new google.maps.LatLng(-6.4145891999999995, 106.9596627),
                    travelMode: google.maps.TravelMode.DRIVING
                };
                layananarah.route(request, function (result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        tampilarah.setDirections(result);
                    }
                });
            }
 
            // 5. load peta
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <style>
            #tempat_peta{height: 30%; margin: 0px};
        </style>
    </head>
    <body>
        <!--3. membuat div untuk menampilkan peta-->
        <div id="tempat_peta" style="width:30%"></div>
    </body>
</html>