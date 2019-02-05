<!DOCTYPE html>
<html>
 <head>
    <style type="text/css">
        body{
            text-align:center;
            margin: 0 auto;
            padding: 0 auto;
        }
        #map_canvas{
            margin: 0 auto;
            padding: 0 auto;
            width:700px;
            height:400px;
            /*background:blue;*/
            text-align:left;
        }
    </style>
    <title>Mapa de mis contactos</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
    function inicializar(){
        var ventana;
        var latitudlongitud = new google.maps.LatLng(37.206167,-3.644254);
        var opciones = {
            zoom: 12,
            center: latitudlongitud,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var mapa = new google.maps.Map(document.getElementById("map_canvas"),opciones);
        
        <?php
        // Conecta con BD y ejecutar consulta
            // Conectar con el Servidor
    $link = mysql_connect("localhost", "root", "acrear2012") or die ("No puedo conectarme con el servidor");
    // Usar la BD
    mysql_select_db("agenda",$link) or die ("No puedo abrir la BD");
    // Hacer la consulta
    $consulta= "SELECT * FROM agenda"; // Consulta por defecto
    $resultado = mysql_query($consulta, $link) or die ("No puedo ejecutar la consulta");
    // Voy leyendo fila a fila
    while ($fila = mysql_fetch_array($resultado)){
        $latitud=$fila['X'];
        $longitud=$fila['Y'];
        $id=$fila['id'];
        $nombrecompleto= $fila['nombre'].' '.$fila['apellido1'].' '.$fila['apellido2'];
        $direccion=$fila['direccion'];
        $provincia=$fila['provincia'];
        $telefono=$fila['telefono'];
        $correo=$fila['email'];
        $fecha=$fila['fechanacimiento'];   
  echo "var coordenadas = new google.maps.LatLng($latitud,$longitud);
        var marcador$id = new google.maps.Marker({
            position: coordenadas,
            map: mapa,
            title: '$nombrecompleto',
            icon: 'imagenes/statue-2.png'
        });
        var cadena$id='<div>'
        +'<h1>$nombrecompleto</h1>'
        +'<p>$direccion ($provincia)</p>'
        +'<p>Teléfono: $telefono</p>'
        +'<p>email: $correo</p>'
        +'<p>Fecha de nacimiento: $fecha</p>'
        +'<p><img src=\"imagenes/pepito.jpg\" alt=\"foto de pepito\" width=50px/></p>'
        +'</div>';
        google.maps.event.addListener(marcador$id, 'click', function() {
          if (ventana) ventana.close();
          ventana = new google.maps.InfoWindow({content: cadena$id});
          ventana.open(mapa,marcador$id);          
        }); 
        ";
    }
    mysql_close($link);
?>
            
        }        
    </script>    
        
        
 </head>
 <body onload="inicializar()">
    <h1>Mapa de mis contactos</h1>
    <div id="map_canvas">&nbsp;</div>
        
 </body>
</html>