<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
<meta name="author" content="ING. MARCO BRITO" />
<meta name="description" content="Sistema de Gestión y Control de Fuerza de Ventas Móvil" />
<meta name="keywords" content="Sistema de Gestión y Control de Fuerza de Ventas Móvil" />
<title>SISCOM - Sistema de Gestión y Control de Fuerza de Ventas Móvil</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
</head>
<body>

<div data-role="page" id="homepage" data-theme="b">

    <div role="main" class="ui-content">

        <div class="logo_container">
            <div class="logo">
            <img src="images/logo3.png" alt="4tubing" title="4tubing" /></br></br>
            <h2>SISCOM</h2></br>
            <span><b>(Sistema de Gestión y Control de Fuerza de Ventas Móvil)</b></span>                        
            </div>                     
        </div>
        <div class="slide_info">DESLIZA HACIA LA DERECHA</div>

    </div><!-- /content -->


    <div data-role="panel" id="left-panel" data-display="reveal" data-position="left">

              <nav class="main-nav">
			  <?php if(isset($_SESSION['usuario'])){ ?>
			  		 <?php if($_SESSION['nivel']==1){ // Administrador ?>
				  <ul>
					<li><a href="actividadc.php" id="btn_reg" data-transition="slidedown"><img src="images/icons/white/team.png" /><span>Actividad de Comerciales</span></a></li>
				  </ul>
				     <?php } else { // Comercial ?>
					 
					 <ul>
					<li><a href="registrov.php" id="btn_reg" data-transition="slidedown"><img src="images/icons/white/team.png" /><span>Registrar Visita</span></a></li>
					<li><a href="actividad_personal.php" data-transition="slidedown"><img src="images/icons/white/user.png" /><span>Ver mis Visitas</span></a></li>
					<li><a href="ruta_visitada.php?id=<?php echo $_SESSION['id_usuario']; ?>&d=0" target="_self"><img src="images/icons/white/user.png" /><span>GPS de Visitas</span></a></li>
				  </ul>
					 
					 <?php } //fin del IF id_usuario ?>
				  
			  <?php } else { ?>
			 	  <ul>
					<li><a href="login.php" data-transition="slidedown"><img src="images/icons/white/lock.png" alt="" title="" /><span>Iniciar Sesion</span></a></li>
				  </ul>
			  <?php } //fin del IF session ?>
              </nav> 

    </div><!-- /panel -->
	
	
	

<!-- Se Despliega el Panel USUARIO -->
	<div data-role="panel" id="right-panel" data-display="reveal" data-position="right">
    <?php if(isset($_SESSION['usuario'])){ ?>
          <div class="user_login_info">
          
                    <div class="user_thumb_container">
                    <img src="images/profile.jpg" alt="" title="" /> 
                        <div class="user_thumb">
                        <img src="images/perfil/<?php echo $_SESSION['usuario']; ?>.jpg" alt="" title="" />     
                        </div>  
                    </div>
					
                    <div class="user_details">
                    <p><?php echo $_SESSION['nombre']; ?></p>
                    </div>  
 

                   <nav class="user-nav">
                        <ul>
                          <li><a href="#"><img src="images/icons/white/message.png" alt="" title="" /><span>Mensajes l</span><strong class="yellow">1</strong></a></li>
                          <li><a href="#" id="cerrar_sesion" onClick='javascript:cerrar_sesion()'><img src="images/icons/white/lock.png" alt="" title="" /><span>Cerrar Sesion</span></a></li>
                        </ul>
                   </nav>
          </div>
          <div class="close_loginpopup_button"><a href="#" data-rel="close"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
		  <?php } else { ?>
		  		<nav class="user-nav">
                        <ul>
                          <li><a href="login.php" data-transition="slidedown"><img src="images/icons/white/lock.png" alt="" title="" /><span>Iniciar Sesion</span></a></li>
						   <li><a href="#" onClick='javascript:window.location.reload(true)'><img src="images/icons/white/lock.png" alt="" title="" /><span>Actualizar</span></a></li>
                        </ul>
                   </nav>
          <?php } //fin del IF session ?>
    </div><!-- /Panel Derecho -->




</div><!-- /page -->

<script src="js/jquery.min.js"></script>
<script src="js/procesos_mobile.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>
