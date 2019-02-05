<?php
session_start();
$cerrar_sesion = isset($_POST["cerrado"]);
if($cerrar_sesion){
unset($_SESSION['usuario']);
session_destroy();
echo "1";
}else{
echo "0";
}
?>