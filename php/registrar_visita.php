<?php
include("conexion.php");
date_default_timezone_set('America/Caracas');
$fecha_hora = date('Y-m-d H:i:s', time()-1800);// Hora del Servidor (UTC -4:30) Caracas
$visita_efec = mysqli_real_escape_string($conexion,$_POST['visita_efec']); // 0 - 1
$id_usuario = mysqli_real_escape_string($conexion,$_POST['id_usuario']);
$motivo = mysqli_real_escape_string($conexion,$_POST['motivo']); //motivo por que no se efectuo la visita
$Cliente = mysqli_real_escape_string($conexion,$_POST['cliente']);
$NombContact = mysqli_real_escape_string($conexion,$_POST['nom_contacto']);
$tlf_contacto = mysqli_real_escape_string($conexion,$_POST['tlf_contacto']);
$cargo_contacto = mysqli_real_escape_string($conexion,$_POST['cargo_contacto']);
$linea_present = mysqli_real_escape_string($conexion,$_POST['linea_present']);
$latitud = mysqli_real_escape_string($conexion,$_POST['latitud']);
$longitud = mysqli_real_escape_string($conexion,$_POST['longitud']);
$km_vehiculo = mysqli_real_escape_string($conexion,$_POST['km_vehiculo']);

if($Cliente == 'Por Favor Espere'){
	$resultado = 0;
}else{
	$consulta="INSERT INTO `visitas` (`id_visitas`, `id_usuario`, `fecha_hora_vis`, `latitud`, `longitud`, `visita_efec`, `motivo`, `cliente`, `nom_contacto`, `tlf_contacto`, `cargo_contacto`, `linea_present`, `km`) VALUES ('', '$id_usuario', '$fecha_hora', '$latitud', '$longitud', '$visita_efec', '$motivo', '$Cliente', '$NombContact', '$tlf_contacto', '$cargo_contacto', '$linea_present', '$km_vehiculo')";
	$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());	
}
		if( $resultado >=1 ) { // si modifico algun elemento de la tabla
			echo '1'; //Inserto Registro Correctamente
		}
		else{
			echo '0';
		}

?>