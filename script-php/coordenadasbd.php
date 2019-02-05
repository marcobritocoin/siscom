<?PHP

include("conexion.php");
$id_usuario = $_GET['id'];

$consulta = "SELECT * FROM `visitas` WHERE `id_usuario`='$id_usuario' AND CAST(`fecha_hora_vis` AS DATE) = '2018-02-07'";
$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());
$num_row = mysqli_num_rows($resultado);
$inicio=1;				
		
		if($num_row >=1){
			while($row=mysqli_fetch_array($resultado)){
				echo "var pto".$inicio++." = {lat: ".$row['latitud'].", lng: ".$row['longitud']."};";
				echo "<br>"; 
			}
		}else{
				echo "<br><h2>Error:</h2> No existen registros para su busqueda.";
		}
?>