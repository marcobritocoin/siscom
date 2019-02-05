<?php session_start(); ?>
<?php if(isset($_SESSION['usuario'])){ ?>
<!DOCTYPE html>
<html>
  <head>
	 <style>

      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
	  	<?PHP
		include("php/conexion.php");
		date_default_timezone_set('America/Caracas');
		$fecha_hora = date('Y-m-d', time()-1800);// Hora del Servidor (UTC -4:30) Caracas
		$id_usuario = $_GET['id'];
		$url = $_GET['d'];
		$redir  = array('index.php', 'actividadc.php', 'visitasc.php');
		$fecha = (empty($_GET['fecha']) ? $fecha_hora :  $_GET['fecha']);
		$consulta = "SELECT * FROM `visitas` WHERE `id_usuario`='$id_usuario' AND CAST(`fecha_hora_vis` AS DATE) = '$fecha' AND cliente NOT LIKE 'Por Favor Espere' ORDER BY `fecha_hora_vis` ASC";
		$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());
		$num_row = mysqli_num_rows($resultado);
		$inicio=1;					
				if($num_row >=1){
					while($row=mysqli_fetch_array($resultado)){
						echo "var pto".$inicio++." = {lat: ".$row['latitud'].", lng: ".$row['longitud']."};";
						//echo " var fecha_hora".$inicio++." = ".$row['fecha_hora_vis'].";";
						echo "\n"; 
					}
				}else{ ?>
							location.href = "<?php echo $redir[$url]; ?>"; //redireccionar por no tener registros
						<?php		
				}
		$inicio--;
		
			if($inicio == 1){
		?>
		//var myLatlng = new google.maps.LatLng(37.192869,-3.613186);
        var mapOptions = {
          zoom: 16,
          center: pto1,
		  zoomControl: true,
		  disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var contentString = '<div>'
         +'<h2>Ultima Visita</h2>'
         //+'<p>Coordenadas: '+pto1+'</p>'
         +'</div>';
         
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
        });
        //var myLatlng = new google.maps.LatLng(37.209277,-3.636875);
        var marker = new google.maps.Marker({
            position: pto1,
            map: map,
            title: 'A'
        });
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
		<?php
			}else if($inicio == 2){
		?>
		
		var map = new google.maps.Map(document.getElementById('map'), {
          center: pto1,
          zoom: 12,
		  zoomControl: true,
          scaleControl: false,
		  mapTypeControl: false,
		  disableDefaultUI: true // desabilito todos los controles
        });
		

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });

        var request = {
          destination: pto2,
          origin: pto1,
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
		
		<?php
			}else if($inicio > 2){
			
			$fin = $inicio-1;
			echo "var ptofinal=pto".$inicio;
		?>

        var map = new google.maps.Map(document.getElementById('map'), {
          center: pto1,
          zoom: 12,
		  zoomControl: true,
          scaleControl: false,
		  mapTypeControl: false,
		  disableDefaultUI: true // desabilito todos los controles
        });
		

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });
		
        var request = {
		  destination: ptofinal,
          origin: pto1,
		  waypoints: [<?php for($i=2;$i<=$fin;$i++){ echo " {location: pto".$i."}"; if($i!=$fin){ echo ", "; }} ?>],
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
		<?php
			}// fin del else
		?>
		
		var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map);

        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
		
      }// Fin de initMap()
	  
	  function CenterControl(controlDiv, map) {

        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Presiona el Boton';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Volver a SISCOM';
        controlUI.appendChild(controlText);

        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener('click', function() {
          //map.setCenter(chicago);
		  location.href = "<?php echo $redir[$url]; ?>";
		  //location.reload(true);
        });

      }
	  
	  

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAvHwWG3DwQ79QvfwzkdEymTC6bjEmzkY&callback=initMap">
    </script>	
		
  </body>
</html>
<?php } else { ?>
<script>
location.href ="index.php";
</script>	
<?php } //fin del IF session ?>		