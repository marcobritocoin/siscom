<?php session_start(); ?>
<?php if(isset($_SESSION['usuario'])){ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
<meta name="author" content="Ing. Marco Brito - Tlf: (0412) 960.07.29" />
<meta name="description" content="Registro de Visita de los Comerciales" />
<meta name="keywords" content="registro, visitas, comercial, comerciales, ventas, fuerza de ventas" />
<title>SISCOM - Actividades de los Comerciales</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
</head>
<body>

<div data-role="page" id="features" class="secondarypage" data-theme="b">

<div class="back_btn"><a href="index.php" data-transition="flip"><img src="images/icons/black/back.png" alt="" title="" /></a></div> 

    <div role="main" class="ui-content">
	
       <div class="pages_maincontent">
	   
	   <div class="form_logo" style="font-size:28px;">ACTIVIDAD DE LA COMERCIAL  <?php echo strtoupper($_SESSION['nombre']); ?></div>
              <!-- <h2 class="page_title">features</h2> --> 
       
	   <div class="page_content"> 
    
      <ul class="features_list_detailed">
	   	  
		  <li></li> 
          
        <?PHP
		include("php/conexion.php");
		date_default_timezone_set('America/Caracas');
		$fecha_hora = date('Y-m-d', time()-1800);// Hora del Servidor (UTC -4:30) Caracas
		$var_usuario = $_SESSION['id_usuario'];
		//$fecha_hora = '2018-02-07';
		//$consulta = "SELECT * FROM `visitas` WHERE `id_usuario`='$id_usuario' AND CAST(`fecha_hora_vis` AS DATE) = '$fecha' ORDER BY `fecha_hora_vis` ASC";
		//$consulta = "SELECT DISTINCT usuarios.id_usuario, usuarios.nombre_comp, COUNT(visitas.id_visitas) AS TOTAL, SUM(visitas.visita_efec) AS EFECTIVAS, MIN(visitas.km) AS KM_INICIAL, MAX(visitas.km) AS KM_ACTUAL FROM (usuarios INNER JOIN visitas ON usuarios.id_usuario=visitas.id_usuario) GROUP BY usuarios.id_usuario";
		$consulta = "SELECT DISTINCT usuarios.id_usuario, usuarios.nombre_comp, COUNT(visitas.id_visitas) AS TOTAL, SUM(visitas.visita_efec) AS EFECTIVAS, MIN(visitas.km) AS KM_INICIAL, MAX(visitas.km) AS KM_ACTUAL FROM (usuarios INNER JOIN visitas ON usuarios.id_usuario=visitas.id_usuario AND CAST(visitas.fecha_hora_vis AS DATE) = '$fecha_hora') WHERE visitas.cliente NOT LIKE 'Por Favor Espere' AND visitas.id_usuario = '$var_usuario' GROUP BY usuarios.id_usuario ";
		$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());
		$num_row = mysqli_num_rows($resultado);				
				if($num_row >=1){ 
					while($row=mysqli_fetch_array($resultado)){ 
						$NoEfectivas = $row['TOTAL'] - $row['EFECTIVAS'];
						$kmrecorrido = $row['KM_ACTUAL'] - $row['KM_INICIAL'];
				       ?>
						 <li>
							  <div class="feat_small_icon"><img src="images/icons/white/user.png" alt="" title="" /></div>
							  <div class="feat_small_details">
							  <h4><?php echo strtoupper($row['nombre_comp']); ?></h4>
							  <a href="ruta_visitada.php?id=<?php echo $row['id_usuario']; ?>&fecha=<?php echo $fecha_hora; ?>&d=1" target="_self">
							  <p style="color:#FFFFFF; font-size:18px;"><b>Total General de Visitas (<?php echo strtoupper($row['TOTAL']); ?>)</b></p>
							  <p style="color:#FFFFFF; font-size:15px;"><b>Efectivas: <?php echo strtoupper($row['EFECTIVAS']); ?></b></p>
							  <p style="color:#FFFFFF; font-size:15px;"><b>No Efectivas: <?php echo strtoupper($NoEfectivas); ?></b></p>
							  <p style="color:#FFFFFF; font-size:15px;"><b>Km Recorrido: <?php echo strtoupper($kmrecorrido); ?> km</b></p>
							  <p style="color:#FFFFFF; font-size:15px;"><b>Km Actual: <?php echo strtoupper($row['KM_ACTUAL']); ?> km</b></p>
							  </a>
							  </div>
							  <div class="view_more"><a href="ruta_visitada.php?id=<?php echo $row['id_usuario']; ?>&fecha=<?php echo $fecha_hora; ?>&d=1" target="_self"><img src="images/load_posts_disabled.png" alt="" title="" /></a></div>
						  </li> 
						<?PHP	
					}
				}else{ 
						echo "<div class='form_logo' style='font-size:25px; color:#FFFFFF;'>No Existen Actividades Registradas</div>";
				}
		?>
          
         
          
          
      </ul>
	  
	  <div class="close_loginpopup_button"><a href="index.php" data-transition="flip"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
	  
     </div>
    </div>

    </div><!-- /content -->

</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>
<?php } else { ?>
<script>
location.href ="index.php";
</script>	
<?php } //fin del IF session ?>

