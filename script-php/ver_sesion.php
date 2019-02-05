<?php
session_start();

if(isset($_SESSION['usuario'])){
	echo "<b>Usuario:</b>  ".strtoupper($_SESSION['usuario'])."<br><br>";
	echo "<b>Nombre:</b>  ".strtoupper($_SESSION['nombre'])."<br><br>";
	echo "<b>Nivel de Acceso:</b>  ".strtoupper($_SESSION['nivel']);
}else {
	echo "No hay sesion Activa";
} 
?>
