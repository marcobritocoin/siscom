<?php
session_start();
$verificar = isset($_POST["verificar"]);
	if(isset($_SESSION['usuario'])){
		echo $_SESSION['id_usuario'];
	}else{
		echo "0";
	}
?>