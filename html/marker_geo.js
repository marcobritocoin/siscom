// JavaScript Document


var divMapa = document.getElementById('mapa');
navigator.geolocation.getCurrentPosition( fn_ok, fn_mal );

function fn_mal( ){ }

function fn_ok( rta){
	var lat = rta.coords.latitude;
	var lon = rta.coords.longitude;

	var gLatLon = new google.maps.LatLng( lat, lon );
	var objConfig = {
		zoom: 17,
		center: gLatLon
	}


	var gMapa = new google.maps.Map( divMapa, objConfig );

	var objConfigMarker = {
		position: gLatLon,
		animation: google.maps.Animation.DROP,
		map: gMapa,
		draggable: true,
		title: "Usted esta Aqui"
	}

	var gMarker = = new google.maps.Marker( objConfigMarker );
	//gMarker.setIcon( 'icon_usuario.gif' );

	var gCoder = new google.maps.Geocoder();
	var objInformacion = {
		address: 'Corrientes 2049,Balvanera,Buenos Aires'
	}


	//objInformacion.address
	gCoder.geocode ( objInformacion, fn_coder );

	function fn_coder( datos ){
		var coordenadas = datos[0].geometry.location;
		//ob LatLong
		var config = {
			map: gMapa,
			animation: google.maps.Animation.DROP,
			position: coordenadas,
			title: '4Tubing'
		}
			
		var gMarkerDV = new google.maps.Marker( config )
			gMarkerDV.setIcon( 'icon_edificio.png' )
	
	}


	var objHTML = {
		content: '<div>codigo html</div>'
	}
	
	var gIW = new google.maps.InfoWindow( objHTML );

	google.maps.event.addListener(gMarkerDV,'click',function(){
			gIW.open( gMapa, gMarkerDV );
		});
		
	//}

	var objConfigDR = {
		map: gMapa,
		suppressMarkers: true
	}

	var objConfigDS = {
		origin: gLatLon,
		destination: objInformacion.address,
		travelMode: google.maps.TravelMode.DRIVING
	}
	

	var ds = new google.maps.DirectionsService(); // obtener coordenadas
	var dr = new google.maps.DirectionsRenderer( objConfigDR ); // traduce coordenas a ruta visible

		ds.route( objConfigDS, fnRutear );

	function fnRutear( resultados, status ){
		//mostrar la linea entre A y B
		if( status == 'OK' ){
			dr.setDirections( resultados );
		}else{
		
			alert('Error: '+status);
		}
	}

}