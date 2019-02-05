<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
<meta name="author" content="Ing. Marco Brito - Tlf: (0412) 960.07.29" />
<meta name="description" content="Registro de Visita de los Comerciales" />
<meta name="keywords" content="registro, visitas, comercial, comerciales, ventas, fuerza de ventas" />
<title>SISCOM - RUTA DE VISITAS</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<style>
#map-page, #map-canvas { width: 100%; height: 100%; padding: 0; }
</style>
</head>
<body>

<div data-role="page" id="map-page" data-url="map-page">
    <div data-role="header" data-theme="a">
    <h1>RUTA DE VISITAS</h1>
    </div>
    <div role="main" class="ui-content" id="map-canvas">
        <!-- Carga de Mapa -->
    </div>
</div>


    <script>
      function initMap() {
		var pto1 = {lat: 10.4919, lng: -66.9225}; //comandancia GNB
		var pto2 = {lat: 10.4952, lng: -66.9316}; //Maternidad Concepcion Palacios
		var pto3 = {lat: 10.4857, lng: -66.9343}; //Redoma la India
		var pto4 = {lat: 10.4843, lng: -66.8852}; //Los Chaguaramos

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: pto1,
          zoom: 12,
		  zoomControl: true,
          scaleControl: false,
		  mapTypeControl: false
		  //disableDefaultUI: true // desabilito todos los controles
        });

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });
		
        // Set destination, origin and travel mode.
        var request = {
          destination: pto2,
          origin: pto1,
		  waypoints: [{location: pto3}, {location: pto4}],
          travelMode: 'DRIVING'
        };

        // Pass the directions request to the directions service.
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          }
        });
		
		
      }// Fin de initMap()
    </script>
	
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAvHwWG3DwQ79QvfwzkdEymTC6bjEmzkY&callback=initMap">
    </script>	

<script src="js/jquery.min.js"></script>
<script src="js/procesos_mobile.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>	