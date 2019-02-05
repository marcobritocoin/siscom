<?php
//setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
date_default_timezone_set('America/Caracas');
echo date('Y-m-d H:i:s', time()-1800); // (UTC -4:30) Caracas
$id_usuario = $_GET['id'];
$fecha = $_GET['fecha'];
echo "<br>".$id_usuario." / ".$fecha;
?>