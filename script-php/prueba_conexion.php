<?php
//$enlace   = mysqli_connect("localhost", "root", "", "siscom");
$enlace = mysqli_connect("localhost", "britocom_hack", "hack123?123", "britocom_siscom");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "Error de depuracion: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error de depuracion: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "<br>Conexion Exitosa a MySQL! La base de datos esta funcionando al 100%" . PHP_EOL;
echo "<br><br>Informacion del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

mysqli_close($enlace);
?>