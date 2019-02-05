<?php
session_start();
include("conexion.php");
$username = $_POST['name'];
$password = $_POST['pwd'];
//$password = md5($_POST['pwd']);
//$username = 'mbrito';
//$password = 'hack123';

$a = mysqli_real_escape_string($conexion, $username);
$b = mysqli_real_escape_string($conexion, $password);

$consulta = "SELECT * FROM usuarios WHERE `usuario`='$a' AND `pass`='$b'";
$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());
$num_row = mysqli_num_rows($resultado);
		$row=mysqli_fetch_array($resultado);
		if( $num_row >=1 ) {
			echo '1,'.$row['usuario'].','.$row['nombre_comp'].','.$row['nivel_acceso'].','.$row['id_usuario'];
			$_SESSION['id_usuario']=$row['id_usuario'];
			$_SESSION['usuario']=$row['usuario'];
			$_SESSION['nombre']=$row['nombre_comp'];
			$_SESSION['nivel']=$row['nivel_acceso'];
		}
		else{
			echo '0';
		}
?>





